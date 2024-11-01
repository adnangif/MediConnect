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



    <script type="module" defer>
        let localStream;
        let remoteStream;
        let peerConnection;
        let prevAnswer;

        let servers = {
            iceServers: [{
                urls: [
                    'stun:stun1.1.google.com:19302',
                    'stun:stun2.1.google.com:19302',
                ]
            }]
        }


        async function createOffer(callback) {
            localStream = await navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true,
            });
            peerConnection = new RTCPeerConnection(servers);

            remoteStream = new MediaStream();
            document.getElementById('remote-video').srcObject = remoteStream;
            document.getElementById('local-video').srcObject = localStream;

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
                    await sendOffer(peerConnection.localDescription)
                }
            }
            let offer = await peerConnection.createOffer()
            await peerConnection.setLocalDescription(offer)

            await sendOffer(offer)
            callback()
        }

        async function sendOffer(offer) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post('{{ route('set-offer', $consultation->consultation_id) }}', {
                    offer: JSON.stringify(offer),
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

        async function getAnswer() {
            let response = await axios.get('{{ route('get-answer', $consultation->consultation_id) }}')
            let answer = await response.data
            return answer.answer
        }


        async function addAnswer() {
            let answer = await getAnswer()

            if (answer === prevAnswer) {
                console.log("Answer did not change")
                return
            } else {
                prevAnswer = answer
            }

            if (answer == null) {
                console.log('null answer found')
                return
            }

            if (!answer) {
                console.log('No answer found')
                return
            }

            answer = JSON.parse(answer)

            if (!peerConnection.currentRemoteDescription) {
                peerConnection.setRemoteDescription(answer)
            }
        }

        createOffer(()=>{
            setInterval(async () => {
                addAnswer()
            }, 1000);
        });

    </script>
</x-layout>
