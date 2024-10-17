@if ($doctors->isEmpty())
    <div class="flex flex-col items-center justify-center h-full">
        <img src="/image/no-results-found.png" width="250" height="250" />
        <h2 class="text-gray-400">No Results Found.</h2>
    </div>
@else
    @foreach ($doctors as $doctor)
        <div class="w-full flex gap-4 p-4 shadow-md rounded-[0.5rem] relative border">
            <div class="w-24 h-24 bg-gray-200">

            </div>
            <div class="text-start grow">
                <div class="font-semibold text-lg">Dr. {{ $doctor->name }}</div>
                <div class=" text-gray-500">{{ $doctor->specialization }} Specialist </div>
                <div class="text-gray-500">Specializing in Joint Replacement & Sports Injuries</div>
                <div class="text-gray-500 italic">Contact@gmail.com</div>
            </div>
            <div class="flex flex-col justify-end">
                <button class="btn">Get an appointment</button>
            </div>
        </div>
    @endforeach
@endif
