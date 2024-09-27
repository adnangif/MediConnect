<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor/Patient Login</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href='/css/login_styles.css'>
    </head>
<body>
    <div class="login-container">
        <!-- Toggle Buttons for Doctor and Patient -->
        <div class="toggle-buttons">
            <button id="doctor-btn" class="active" onclick="showDoctorForm()">Doctor</button>
            <button id="patient-btn" onclick="showPatientForm()">Patient</button>
        </div>

        <!-- Doctor Login Form -->
        <div id="doctor-form">
            <h1>Doctor Login</h1>
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

        <!-- Patient Login Form (Initially hidden) -->
        <div id="patient-form" style="display: none;">
            <h1>Patient Login</h1>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="patient-email">Email Address:</label>
                    <input type="email" id="patient-email" name="patient-email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="patient-password">Password:</label>
                    <input type="password" id="patient-password" name="patient-password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="login-button">Login</button>

                <p class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        // JavaScript to toggle between Doctor and Patient forms
        function showDoctorForm() {
            document.getElementById("doctor-form").style.display = "block";
            document.getElementById("patient-form").style.display = "none";
            document.getElementById("doctor-btn").classList.add("active");
            document.getElementById("patient-btn").classList.remove("active");
        }

        function showPatientForm() {
            document.getElementById("doctor-form").style.display = "none";
            document.getElementById("patient-form").style.display = "block";
            document.getElementById("doctor-btn").classList.remove("active");
            document.getElementById("patient-btn").classList.add("active");
        }
    </script>
</body>
</html>
