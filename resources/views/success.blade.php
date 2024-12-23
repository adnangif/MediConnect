<x-layout>
    <x-navbar />
    <x-slot:styles>
        <style>
            body {
                background-color: #f7f7f7;
            }
        </style>
    </x-slot:styles>
    <div class="container mx-auto p-6">
        <section class="p-8 flex flex-col items-center gap-3 text-center">
            <h1 class="text-2xl font-bold text-emerald-600 mb-4">{{ $title ?? 'Successful' }}</h1>
            <img width="300" src="/image/success.png" />
            <p class="text-gray-700">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @else
                    <a class="underline text-blue-600" href="{{ route('all-appointments') }}">See all appointments</a>
                @endif
            </p>
        </section>
    </div>

</x-layout>
