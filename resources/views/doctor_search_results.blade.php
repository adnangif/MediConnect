@if ($doctors->isEmpty())
    <div class="flex flex-col items-center justify-center h-full">
        <img src="/image/no-results-found.png" width="250" height="250" />
        <h2 class="text-gray-400">No Results Found.</h2>
    </div>
@else
    @foreach ($doctors as $doctor)
        <div class="w-full flex gap-4 p-4 shadow-md rounded-[0.5rem] relative border">
            <div class="w-24 h-24 bg-gray-200">
                <a
                    href="/doctor/profile/{{ $doctor->doctor_id }}"class="button max-w-xs transition duration-100 ease-in-out hover:scale-110">
                    <img width="200" src="{{ $doctor->image ?? '/image/dummy-person.png' }}" alt="Doctor Image" />
                </a>
            </div>
            <div class="text-start grow">
                <div class="font-semibold text-lg">Dr. {{ $doctor->name }}</div>
                <div class=" text-gray-500">{{ $doctor->specialization }} Specialist </div>
                <div class="text-gray-500">{{ $doctor->experience }} years of experience in
                    {{ $doctor->specialization }}</div>
                <div class="text-gray-500 italic">{{ $doctor->user->email }}</div>
            </div>
            @if (Auth::check() && Auth::user()->isUser())
                <div class="flex flex-col justify-end">
                    <a href="{{ route('appointment-form', $doctor->doctor_id) }}" class="btn">Get an
                        appointment</a>
                </div>
            @else
                @if (Auth::check() && Auth::user()->isDoctor())
                    <div class="flex flex-col justify-end">
                        <button disabled class="btn bg-gray-400 cursor-not-allowed">You are a doctor</button>
                    </div>
                
            @else
                <div class="flex flex-col justify-end">
                    <button disabled class="btn bg-gray-400 cursor-not-allowed">Login to Get an appointment</button>
                </div>
                @endif
            @endif
        </div>
    @endforeach
@endif
