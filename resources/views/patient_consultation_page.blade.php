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
    <livewire:patient_consultation :consultation="$consultation" />

</x-layout>
