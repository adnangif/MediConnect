<?php

use Livewire\Volt\Component;
use App\Events\AnswerCreated;
use App\Events\PatientConnected;
use Illuminate\Support\Facades\Log;
use App\Enums\AppointmentStatusTypes;

new class extends Component {
    public $consultation;
    public $message;
    public $isMuted;

    public function mount($consultation)
    {
        $this->consultation = $consultation;
        $this->message = 'Waiting For Doctor...';
        $this->isMuted = false;
    }

    public function createAnswer($answer)
    {
        Log::debug('Answer created: ' . $answer);
        AnswerCreated::dispatch($this->consultation->consultation_id, $answer);
    }

    public function patientConnected()
    {
        PatientConnected::dispatch($this->consultation->consultation_id);
    }
    public function changeMessage($message)
    {
        $this->message = $message;
    }

    public function patientLeave()
    {
        Log::debug('Patient left: ' . $this->consultation->consultation_id);
        $this->consultation->appointment->status = AppointmentStatusTypes::FINISHED->value;
        $this->consultation->appointment->save();
        Log::debug($this->consultation->appointment->status);
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
                <div id="message-container" class="text-center border border-gray-400 rounded-lg p-2">{{ $this->message }}
                </div>
                <button id="mute-btn" class="btn icon-text bg-yellow-500 text-center"><img src="/image/mute.svg"
                        height="20" width="20" class="icon" /> Mute</button>
                <button id="video-btn" class="btn icon-text bg-yellow-500 text-center"><img src="/image/video-off.svg" height="20"
                        width="20" class="icon" /> Turn off Video</button>
                <a wire:click="patientLeave" href="{{ route('consultation-ended', $consultation) }}" class="btn bg-red-500 text-center">Leave</a>
            </div>
            <video id="local-video" class=" bg-gray-600 rounded-lg" autoplay playsinline>
            </video>
        </div>
    </div>


    @script
        <script>
            window.localStream = await navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true
            })

            document.getElementById('mute-btn').addEventListener('click', async () => {
                window.localStream.getAudioTracks()[0].enabled = !window.localStream.getAudioTracks()[0].enabled

                if (window.localStream.getAudioTracks()[0].enabled) {
                    document.getElementById('mute-btn').innerHTML =
                        '<img src="/image/mute.svg" height="20" width="20" class="icon" /> Mute'
                    document.getElementById('mute-btn').classList.toggle('bg-red-500')
                    document.getElementById('mute-btn').classList.toggle('bg-yellow-500')

                } else {
                    document.getElementById('mute-btn').innerHTML =
                        '<img src="/image/mute.svg" height="20" width="20" class="icon" /> Unmute'
                    document.getElementById('mute-btn').classList.toggle('bg-red-500')
                    document.getElementById('mute-btn').classList.toggle('bg-yellow-500')
                }
            })

            document.getElementById('video-btn').addEventListener('click', async () => {
                window.localStream.getVideoTracks()[0].enabled = !window.localStream.getVideoTracks()[0].enabled;

                if (window.localStream.getVideoTracks()[0].enabled) {
                    document.getElementById('video-btn').innerHTML =
                        '<img src="/image/video-off.svg" height="20" width="20" class="icon" /> Turn Off Video';
                    document.getElementById('video-btn').classList.toggle('bg-red-500');
                    document.getElementById('video-btn').classList.toggle('bg-yellow-500');
                } else {
                    document.getElementById('video-btn').innerHTML =
                        '<img src="/image/video-off.svg" height="20" width="20" class="icon" /> Start Video';
                    document.getElementById('video-btn').classList.toggle('bg-red-500');
                    document.getElementById('video-btn').classList.toggle('bg-yellow-500');
                }
            });


            document.getElementById('local-video').srcObject = window.localStream

            const setupPeer = async function() {
                window.peer = new SimplePeer({
                    initiator: false,
                    stream: window.localStream,
                })

                window.peer.on('error', async err => {
                    console.log('ERROR ', err)
                    await $wire.call('changeMessage', 'Disconnected')
                })

                window.peer.on('signal', async data => {
                    console.log('SIGNAL')
                    await $wire.call('createAnswer', JSON.stringify(data))
                })

                window.peer.on('connect', () => {
                    console.log('CONNECT')
                    window.peer.send('sending-->' + Math.random())
                })

                window.peer.on('data', data => {
                    console.log('received: ' + data)
                })
                window.peer.on('stream', stream => {
                    console.log('found stream')
                    document.getElementById('remote-video').srcObject = stream
                })
            }

            await setupPeer()



            Echo.channel('consultation.{{ $this->consultation->consultation_id }}')
                .listen('OfferCreated', async (event) => {
                    await $wire.call('changeMessage', 'Connecting...')
                    console.log("found Offer")
                    const offer = JSON.parse(event.offer)
                    window.peer.signal(offer)
                    await $wire.call('changeMessage', 'Connected')
                })
                .listen('DoctorConnected', async (event) => {
                    setTimeout(() => {
                        window.location.reload()
                    }, 500);
                })
            setTimeout(async () => {
                await $wire.call('patientConnected')
            }, 500);
        </script>
    @endscript
</div>
