<x-layout>

    <x-slot:title>
        Login
    </x-slot:title>

    <x-slot:styles>
        <link rel="stylesheet" href='/css/login_styles.css'>
    </x-slot:styles>



    <div class="login-container">
        <div class="grow flex justify-center mb-8">
            <a href="/" class="flex items-center w-fit">
                <img class="main-logo" src={{ asset('image/logo.svg') }} />
                <span class="side-logo">MediConnect</span>
            </a>
        </div>

        <div class="flex gap-6">
            <button id="doctor-btn" class="outline-btn grow " onclick="showDoctorForm()">Doctor</button>
            <button id="user-btn" class="outline-btn grow active" onclick="showuserForm()">user</button>
        </div>

        <div id="doctor-form" style="display: none;" class="mt-4">
            <h1 class="text-3xl py-4 font-semibold">Doctor Login</h1>
            <form method="POST">
                @csrf
                <input type="hidden" name="role" value="doctor" />
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div>
                    @if ($errors->any())
                        <div class="p-2 my-2 bg-red-50 text-red-800 rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn w-full">Login</button>

                <p class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </p>
            </form>
        </div>

        <div id="user-form" class="mt-4">
            <h1 class="text-3xl py-4 font-semibold">User Login</h1>
            <form method="POST">
                @csrf
                <input type="hidden" name="role" value="user" />

                <div class="form-group">
                    <label for="user-email">Email Address:</label>
                    <input type="email" id="user-email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="user-password">Password:</label>
                    <input type="password" id="user-password" name="password" placeholder="Enter your password"
                        required>
                </div>

                <div>
                    @if ($errors->any())
                        <div class="p-2 my-2 bg-red-50 text-red-800 rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
            document.getElementById("user-form").style.display = "none";
            document.getElementById("doctor-btn").classList.add("active");
            document.getElementById("user-btn").classList.remove("active");
        }

        function showuserForm() {
            document.getElementById("doctor-form").style.display = "none";
            document.getElementById("user-form").style.display = "block";
            document.getElementById("doctor-btn").classList.remove("active");
            document.getElementById("user-btn").classList.add("active");
        }
    </script>

</x-layout>
