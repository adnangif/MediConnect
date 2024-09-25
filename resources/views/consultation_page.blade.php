<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultation Video Conference - MediConnect</title>
    <link rel="stylesheet" href= '/css/consultation_page_styles.css'>    
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

        <!-- Video Conference Section -->
        <div class="conference-container">
            <h2 class="form-title">Consultation Video Conference</h2>
            <p class="conference-description">Join or start your video consultation session below</p>

            <!-- Start Conference -->
            <div class="form-group">
                <button class="btn start-conference">Start a New Conference</button>
            </div>

            <!-- Join Conference -->
            <form class="conference-form" action="#" method="post">
                <div class="form-group">
                <p>or,</p >
                    <label for="meeting-id">Enter Meeting ID</label>
                    <input type="text" id="meeting-id" name="meeting-id" required placeholder="Meeting ID">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn join-conference">Join Conference</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
