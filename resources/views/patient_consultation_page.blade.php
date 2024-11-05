<x-layout>
    <x-slot:styles>
        <style>
            body {
                height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .video-container {
                position: relative;
                overflow: clip;
            }

            video {
                margin: 0 auto;
                transform: scaleX(-1);
                object-fit: fill;
                height: 100%;
            }
        </style>


    </x-slot:styles>
    <x-navbar />
    <div class="w-full grow bg-gray-50 mx-auto flex">
        <div class="video-container grow m-6 bg-gray-600 rounded-lg flex items-end">
            <video id="remote-video" class=" bg-gray-600 h-full" autoplay playsinline>
            </video>
        </div>
        <div class="min-w-64 w-1/4 py-6 pe-6 flex flex-col justify-end">

            <video id="local-video" class=" bg-gray-600 rounded-lg" autoplay playsinline>
            </video>
        </div>
    </div>

    <script defer>
        let localStream;
        let remoteStream;
        let peerConnection;
        let prevOffer;

        let servers = {
            iceServers: [{
                urls: [
                    'stun:stun1.1.google.com:19302',
                    'stun:stun2.1.google.com:19302',
                ]
            }]
        }


        async function sendAnswer(answer) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post('{{ route('set-answer', $consultation->consultation_id) }}', {
                    answer: JSON.stringify(answer),
                }, {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        async function getOffer() {
            let response = await axios.get('{{ route('get-offer', $consultation->consultation_id) }}')
            let offer = await response.data
            return offer.offer
        }

        async function init(callback = () => {}) {
            console.log('waiting for offer...')
            localStream = await navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true,
            });

            document.getElementById('local-video').srcObject = localStream;
            callback()
        }

        async function createAnswer() {

            let offer = await getOffer()

            if (!offer) {
                console.log('no offer')
                return
            }

            if (offer == null) {
                console.log('offer is null')
                return
            }

            if (offer === prevOffer) {
                console.log('offer did not change')
                return
            } else {
                prevOffer = offer;
            }

            peerConnection = new RTCPeerConnection(servers);

            remoteStream = new MediaStream();
            document.getElementById('remote-video').srcObject = remoteStream;

            localStream.getTracks().forEach(track => {
                peerConnection.addTrack(track, localStream)
            })

            peerConnection.ontrack = async (event) => {
                event.streams[0].getTracks().forEach(track => {
                    remoteStream.addTrack(track)
                })
            }

            peerConnection.onicecandidate = async (event) => {
                if (event.candidate) {
                    await sendAnswer(peerConnection.localDescription)
                }
            }



            offer = JSON.parse(offer)
            await peerConnection.setRemoteDescription(offer)
            let answer = await peerConnection.createAnswer()
            await peerConnection.setLocalDescription(answer)
            await sendAnswer(answer);
            console.log('created answer')
        }

        // createAnswer()

        document.onreadystatechange = function() {
            if (document.readyState === 'complete') {
                window.Echo.channel('consultation.{{ $consultation->consultation_id }}')
                    .listen('OfferCreated', async (event) => {
                        console.log("Now Creating Answer...")
                        await createAnswer()
                    })
                    .listen('DoctorConnected', async (event) => {
                        window.location.reload();
                    })
                init()
            }
        }
    </script>
</x-layout>
