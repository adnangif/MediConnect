<x-layout>

    <x-slot:title>
        Login
    </x-slot:title>

    <x-slot:styles>
        <link rel="stylesheet" href='/css/login_styles.css'>
    </x-slot:styles>



    <div class="login-container">
        <div class="flex gap-6">
            <button id="doctor-btn" class="active btn grow" onclick="showDoctorForm()">Doctor</button>
            <button id="patient-btn" class="btn grow" onclick="showPatientForm()">Patient</button>
        </div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="doctor-form" class="mt-4">
            <h1 class="text-3xl py-2 font-semibold">Doctor Login</h1>
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn w-full">Login</button>

                <p class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </p>
            </form>
        </div>

        <div id="patient-form" style="display: none;" class="mt-4">
            <h1 class="text-3xl py-2 font-semibold">Patient Login</h1>
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="patient-email">Email Address:</label>
                    <input type="email" id="patient-email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="patient-password">Password:</label>
                    <input type="password" id="patient-password" name="password" placeholder="Enter your password"
                        required>
                </div>

                <button type="submit" class="btn w-full">Login</button>

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
