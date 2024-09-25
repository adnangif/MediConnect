<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Appointment - MediConnect</title>
    <link rel="stylesheet" href='/css/book_appointment_styles.css'>
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

        <!-- Book Appointment Form -->
        <div class="form-container">
            <h2 class="form-title">Book an Appointment</h2>

            <form class="appointment-form" action="#" method="post">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your full name">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="date">Preferred Date</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="time">Preferred Time</label>
                    <input type="time" id="time" name="time" required>
                </div>

                <div class="form-group">
                    <label for="message">Reason for Appointment</label>
                    <textarea id="message" name="message" rows="4" placeholder="Briefly describe the reason for your visit"></textarea>
                </div>

                <button type="submit" class="btn book-appointment">Book Appointment</button>
            </form>
        </div>
    </div>
</body>
</html>
