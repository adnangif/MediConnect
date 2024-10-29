<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Doctor Approval Requests - MediConnect</title>
    <link rel="stylesheet" href='\css\approve_doctor_styles.css'>
</head>
<body>
    <div class="container">
        <!-- Header section -->
        <header>
            <div class="logo">
                <img src="\image\logo.png" alt="MediConnect Logo">
            </div>
            <div class="buttons">
                <button class="btn register">Register</button>
                <button class="btn sign-in">Sign In</button>
            </div>
        </header>
        <h3 class="title">Doctor Approval Requests</h3>
        <!-- Requests Section -->
        <div class="requests-container">
            <!-- See all requests link -->
            <div class="top-options">
                <a href="#" class="see-all">See all requests</a>
            </div>

            <!-- Request List -->
            <div class="requests-list">
                <!-- Single Request -->
                <div class="request-card">
                    <div class="profile-picture">
                        <img src="\image\dummy-person.png" alt="Profile Picture of John Doe">
                    </div>
                    <div class="request-info">
                        <p class="name">John Doe</p>
                        <div class="actions">
                            <button class="btn approve">Approve</button>
                            <button class="btn decline">Decline</button>
                        </div>
                    </div>
                </div>

                <!-- Single Request -->
                <div class="request-card">
                    <div class="profile-picture">
                        <img src="\image\dummy-person.png" alt="Profile Picture of Jane Smith">
                    </div>
                    <div class="request-info">
                        <p class="name">Jane Smith</p>
                        <div class="actions">
                            <button class="btn approve">Approve</button>
                            <button class="btn decline">Decline</button>
                        </div>
                    </div>
                </div>

                <!-- Single Request -->
                <div class="request-card">
                    <div class="profile-picture">
                        <img src="\image\dummy-person.png" alt="Profile Picture of Alice Brown">
                    </div>
                    <div class="request-info">
                        <p class="name">Alice Brown</p>
                        <div class="actions">
                            <button class="btn approve">Approve</button>
                            <button class="btn decline">Decline</button>
                        </div>
                    </div>
                </div>

                <!-- Additional requests can be added similarly -->
            </div>
        </div>
    </div>
</body>
</html>
