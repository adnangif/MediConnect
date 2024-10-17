<x-layout>

    <x-slot:styles>
        <link rel="stylesheet" href='/css/search_doctor_styles.css'>
    </x-slot:styles>

    <x-navbar />
    <div class="max-w-4xl mx-auto flex flex-col pt-5 gap-6 items-center">
        <h1 class="text-3xl font-bold">Search for Doctors</h1>
        <form
        hx-get="{{ route('searchResults') }}"
        hx-target="#search-results"
        hx-swap="innerHTML"
        id="searchForm">
            <!-- Search by Doctor's Name -->
            <div class="form-group">
                <input type="text" id="doctor-name" name="name" placeholder="doctor's name(optional)">
            </div>

            <!-- Select Specialization -->
            <div class="form-group">
                <select id="specialization" name="specialization">
                    <option disabled>Select Specialization</option>
                    @foreach ($doctor_specializations as $specialization)
                        <option value="{{ $specialization }}">{{$specialization}}</option>
                    @endforeach
                    <option value="cardiologist">Cardiologist</option>
                    <option value="dermatologist">Dermatologist</option>
                    <option value="pediatrician">Pediatrician</option>
                    <option value="neurologist">Neurologist</option>
                    <option value="orthopedic">Orthopedic</option>
                    <option value="general-practitioner">General Practitioner</option>
                </select>
            </div>

            <!-- Search Button -->
            <button type="submit" class="btn bg-emerald-200 text-emerald-800 flex items-center justify-between gap-2"
                onclick="searchDoctor()">
                <img src="/image/search.svg" width="20" />
                <span>
                    Search
                </span>
            </button>
        </form>

        <!-- Search Results Section -->
        <div id="search-results" class="items-start w-full max-w-3xl p-4 grid gap-4">
            <div class="flex flex-col items-center justify-center h-full">
                <img src="/image/search.png" width="250" height="250" />
                <h2 class="text-gray-400">Click 'Search' to begin.</h2>
            </div>

        </div>
    </div>
</x-layout>
