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
            <h1 class="text-2xl font-bold text-emerald-600 mb-4">Consultaion Ended</h1>
            <img width="300" src="/image/success.png" />
            <p class="text-gray-700">
                Thank you for using our services.
                <br />
                @if (Auth::user()->isUser())
                    <a class="text-blue-600 underline" href="{{ route('write-review', $consultation) }}">write a review</a>
                @endif
            </p>
        </section>
    </div>

</x-layout>
