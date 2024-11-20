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
                <p><strong>Name:</strong> {{ $doctor->name }}</p>
                <p><strong>Specialization:</strong> {{$doctor->specialization}}</p>
                <p><strong>Email:</strong> {{$doctor->user->email}}</p>
            </div>

            <!-- Patient's Information -->
            <div class="details-section">
                <h3>Patient's Information</h3>
                <p><strong>Name:</strong>{{$patient->name}}</p>
                <p><strong>Age:</strong> {{$patient->age}}</p>
                <p><strong>Gender:</strong> {{$patient->gender}}</p>
                <p><strong>Email:</strong> {{$patient->user->email}}</p>
            </div>



            <!-- Medication Information -->
            <div class="details-section">
                <h3>Medication</h3>
                <ul>
                    @foreach ($medicines as $medicine)  
                        <li><strong>Medicine {{ $loop->iteration }}:</strong> {{ $medicine->medicine_text }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Doctor's Suggestions -->
            <div class="details-section">
                <h3>Doctor's Suggestions</h3>
                <p>{{$prescription->rx}}</p>
            </div>

        </div>
    </div>
</body>
</html>
