<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Search</title>
    <link rel="stylesheet" href='/css/search_doctor_styles.css'>
</head>
<body>
    <div class="search-container">
        <h1>Search for Doctors</h1>
        <form action="#" method="get" id="searchForm">
            <!-- Search by Doctor's Name -->
            <div class="form-group">
                <input type="text" id="doctor-name" name="doctor-name" placeholder="Enter doctor's name">
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
            <button type="button" class="search-button" onclick="searchDoctor()">Search</button>
        </form>

        <!-- Search Results Section -->
        <div class="search-results">
            <h2>Search Results</h2>
            <ul id="result-list">
                <!-- Results will be displayed here -->
            </ul>
        </div>
    </div>

    <script>
        function searchDoctor() {
            const doctorName = document.getElementById("doctor-name").value;
            const specialization = document.getElementById("specialization").value;
            const resultList = document.getElementById("result-list");

            // Clear previous results
            resultList.innerHTML = '';

            // Placeholder logic to display results
            if (doctorName || specialization) {
                let resultItem = document.createElement("li");
                resultItem.textContent = `Searching for doctor: ${doctorName || 'Any'} with specialization: ${specialization || 'Any'}`;
                resultList.appendChild(resultItem);
            } else {
                let resultItem = document.createElement("li");
                resultItem.textContent = "Please enter a doctor's name or select a specialization.";
                resultList.appendChild(resultItem);
            }
        }
    </script>
</body>
</html>
