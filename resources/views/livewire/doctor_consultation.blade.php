<?php

use App\Events\OfferCreated;
use Livewire\Volt\Component;
use App\Events\DoctorConnected;
use Illuminate\Support\Facades\Log;

new class extends Component {
    public $consultation;
    public $message;
    public function mount($consultation)
    {
        $this->consultation = $consultation;
        $this->message = 'Waiting For Patient...';
    }

    public function createOffer($offer)
    {
        OfferCreated::dispatch($this->consultation->consultation_id, $offer);
    }

    public function doctorConnected()
    {
        DoctorConnected::dispatch($this->consultation->consultation_id);
    }

    public function changeMessage($message)
    {
        $this->message = $message;
    }
}; ?>

<div class="h-full">
    <div class="w-full h-full grow bg-gray-50 mx-auto flex">
        <div class="video-container grow m-6 bg-gray-600 rounded-lg flex items-end">
            <video id="remote-video" class=" bg-gray-600 h-full" autoplay playsinline>
            </video>
        </div>
        <div class="min-w-64 w-1/4 py-6 pe-6 flex flex-col justify-end">
            <div class="grid gap-2 m-4">
                <div id="message-container" class="text-center border border-gray-400 rounded-lg p-2">{{ $this->message }}</div>
                <button class="btn icon-text bg-yellow-500 text-center"><img src="/image/mute.svg" height="20" width="20" class="icon" /> Mute</button>
                <button class="btn icon-text bg-yellow-500 text-center"><img src="/image/video-off.svg" height="20" width="20" class="icon" /> Turn off Video</button>
                <a href="{{ route('all-appointments') }}" class="btn bg-red-500 text-center">Leave</a>
            </div>
            <video id="local-video" class=" bg-gray-600 rounded-lg" autoplay playsinline>
            </video>
        </div>
    </div>

    {{-- // document.getElementById('local-video').srcObject = localStream --}}
    @script
        <script>
            window.localStream = await navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true
            })
            
            document.getElementById('local-video').srcObject = window.localStream

            const setupPeer = async function() {
                window.peer = new SimplePeer({
                    initiator: true,
                })

                window.peer.on('error', err => {
                    console.log('ERROR ', err)
                    window.location.reload()
                })

                window.peer.on('signal', async data => {
                    await $wire.call('createOffer', JSON.stringify(data))
                })

                window.peer.on('connect', async () => {
                    window.peer.send('whatever' + Math.random())
                    window.peer.addStream(window.localStream)
                    console.log("added stream")

                })

                window.peer.on('data', data => {
                    console.log('data: ' + data)
                })
            }

            console.log("Waiting for patient...")

            Echo.channel('consultation.{{ $this->consultation->consultation_id }}')
                .listen('PatientConnected', async (event) => {
                    console.log("Patient Connected")

                    await setupPeer()
                })


            Echo.channel('consultation.{{ $this->consultation->consultation_id }}')
                .listen('AnswerCreated', async (event) => {
                    await $wire.call('changeMessage', 'Connecting...')
                    const answer = JSON.parse(event.answer)
                    console.log("found Answer")
                    window.peer.signal(answer)
                    await $wire.call('changeMessage', 'Connected')
                })

            await $wire.call('doctorConnected')

        </script>
    @endscript
</div>
