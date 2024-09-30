<x-layout>

    <x-slot:title>
        Login
    </x-slot:title>

    <x-slot:styles>
        <link rel="stylesheet" href='/css/login_styles.css'>
    </x-slot:styles>



    <div class="login-container">
        <div class="toggle-buttons">
            <button id="doctor-btn" class="active" onclick="showDoctorForm()">Doctor</button>
            <button id="patient-btn" onclick="showPatientForm()">Patient</button>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="doctor-form">
            <h1>Doctor Login</h1>
            <form action="/login" method="POST">
                @csrf
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

        <div id="patient-form" style="display: none;">
            <h1>Patient Login</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="patient-email">Email Address:</label>
                    <input type="email" id="patient-email" name="patient-email" placeholder="Enter your email"
                        required>
                </div>

                <div class="form-group">
                    <label for="patient-password">Password:</label>
                    <input type="password" id="patient-password" name="patient-password"
                        placeholder="Enter your password" required>
                </div>

                <button type="submit" class="login-button">Login</button>

                <p class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </p>
            </form>
        </div>
    </div>

    <script>
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

</x-layout>
