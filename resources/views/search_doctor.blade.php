<x-layout>

    <x-slot:styles>
        <link rel="stylesheet" href='/css/search_doctor_styles.css'>
    </x-slot:styles>

    <x-navbar />
    <div class="max-w-4xl mx-auto flex flex-col pt-5 gap-6 items-center">
        <h1 class="text-3xl font-bold">Search for Doctors</h1>
        <form action="#" method="get" id="searchForm">
            <!-- Search by Doctor's Name -->
            <div class="form-group">
                <input type="text" id="doctor-name" name="doctor-name" placeholder="doctor's name">
            </div>

            <!-- Select Specialization -->
            <div class="form-group">
                <select id="specialization" name="specialization">
                    <option value="">Select Specialization</option>
                    <option value="cardiologist">Cardiologist</option>
                    <option value="dermatologist">Dermatologist</option>
                    <option value="pediatrician">Pediatrician</option>
                    <option value="neurologist">Neurologist</option>
                    <option value="orthopedic">Orthopedic</option>
                    <option value="general-practitioner">General Practitioner</option>
                </select>
            </div>

            <!-- Search Button -->
            <button type="button" class="btn bg-emerald-200 text-emerald-800 flex items-center justify-between gap-2" onclick="searchDoctor()">
                <img src="/image/search.svg" width="20"/>
                <span>
                    Search
                </span>
            </button>
        </form>

        <!-- Search Results Section -->
        <div
        id="search-results"
        class="items-start w-full max-w-3xl p-4 grid gap-4"
        hx-get="{{ route('searchResults') }}"
        hx-trigger='load'
        hx-swap='innerHTML'
        >
            <div class="flex flex-col items-center justify-center h-full">
                <img src="/image/search.png" width="250" height="250" />
                <h2 class="text-gray-400">Click 'Search' to begin.</h2>
            </div>

        </div>
    </div>

    <script>
        function searchDoctor() {
            const doctorName = document.getElementById("doctor-name").value;
            const specialization = document.getElementById("specialization").value;
            const resultList = document.getElementById("result-list");


        }
    </script>

</x-layout>
