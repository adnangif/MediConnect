<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prescription Details - MediConnect</title>
    <link rel="stylesheet" href='/css/prescription_details_styles.css'>
    <link rel="stylesheet" href={{asset('css/global_styles.css')}}>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar />
    <div class="container">

        <!-- Prescription Details Section -->
        <div class="prescription-container">
            <h2 class="section-title">Prescription Details</h2>

            <!-- Doctor's Information -->
            <div class="details-section">
                <h3>Doctor's Information</h3>
                <p><strong>Name:</strong> Dr. Sarah Lee</p>
                <p><strong>Specialization:</strong> Cardiologist</p>
                <p><strong>Contact:</strong> +1 555-123-4567</p>
                <p><strong>Email:</strong> sarah.lee@mediconnect.com</p>
            </div>

            <!-- Patient's Information -->
            <div class="details-section">
                <h3>Patient's Information</h3>
                <p><strong>Name:</strong> John Doe</p>
                <p><strong>Age:</strong> 45</p>
                <p><strong>Gender:</strong> Male</p>
                <p><strong>Contact:</strong> +1 555-987-6543</p>
                <p><strong>Email:</strong> john.doe@gmail.com</p>
            </div>

            <!-- Consultation Information -->
            <div class="details-section">
                <h3>Consultation Information</h3>
                <p><strong>Date:</strong> September 10, 2024</p>
                <p><strong>Time:</strong> 3:00 PM</p>
                <p><strong>Problem Description:</strong> Chest pain, shortness of breath, and high blood pressure</p>
            </div>

            <!-- Medication Information -->
            <div class="details-section">
                <h3>Medication</h3>
                <ul>
                    <li><strong>Medicine 1:</strong> Aspirin 100 mg, once daily</li>
                    <li><strong>Medicine 2:</strong> Lisinopril 10 mg, once daily</li>
                    <li><strong>Medicine 3:</strong> Atorvastatin 20 mg, once daily</li>
                </ul>
            </div>

            <!-- Doctor's Suggestions -->
            <div class="details-section">
                <h3>Doctor's Suggestions</h3>
                <p>Maintain a low-sodium diet and engage in regular exercise. Monitor blood pressure at home, and avoid stress and smoking.</p>
            </div>

            <!-- Referral Information -->
            <div class="details-section">
                <h3>Referral (if any)</h3>
                <p>Referred to Dr. John Smith for further cardiovascular examination.</p>
            </div>

            <!-- Next Visit Information -->
            <div class="details-section">
                <h3>Next Visit</h3>
                <p><strong>Date:</strong> September 30, 2024</p>
                <p><strong>Time:</strong> 10:00 AM</p>
            </div>
        </div>
    </div>
</body>
</html>
