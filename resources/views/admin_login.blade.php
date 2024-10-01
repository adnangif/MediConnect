<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor/Patient Login</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href='/css/admin_login_styles.css'>
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

        <!--Admin Login Form -->
        <div class="login-container">
            <h1>Admin Login</h1>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="login-button">Login</button>

                <p class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
