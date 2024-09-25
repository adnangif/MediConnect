<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Appointments - MediConnect</title>
    <link rel="stylesheet" href='/css/all_appointments_styles.css'>
</head>
<body>
    <div class="container">
        <!-- Header section -->
        <header>
            <div class="logo">
                <img src="logo.png" alt="MediConnect Logo">
            </div>
            <div class="buttons">
                <button class="btn register">Register</button>
                <button class="btn sign-in">Sign In</button>
            </div>
        </header>

        <!-- All Appointments Section -->
        <div class="appointments-container">
            <h2 class="section-title">Your Appointments</h2>

            <!-- Appointments List -->
            <div class="appointment-list">

                <!-- Single Appointment -->
                <div class="appointment-card">
                    <div class="appointment-details">
                        <p><strong>Date:</strong> September 25, 2024</p>
                        <p><strong>Time:</strong> 10:00 AM</p>
                        <p><strong>Doctor:</strong> Dr. Sarah Lee</p>
                        <p><strong>Status:</strong> <span class="status pending">Pending</span></p>
                    </div>
                </div>

                <!-- Single Appointment -->
                <div class="appointment-card">
                    <div class="appointment-details">
                        <p><strong>Date:</strong> September 20, 2024</p>
                        <p><strong>Time:</strong> 2:00 PM</p>
                        <p><strong>Doctor:</strong> Dr. John Smith</p>
                        <p><strong>Status:</strong> <span class="status completed">Completed</span></p>
                    </div>
                </div>

                <!-- Single Appointment -->
                <div class="appointment-card">
                    <div class="appointment-details">
                        <p><strong>Date:</strong> September 15, 2024</p>
                        <p><strong>Time:</strong> 11:00 AM</p>
                        <p><strong>Doctor:</strong> Dr. Emily Davis</p>
                        <p><strong>Status:</strong> <span class="status canceled">Canceled</span></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
