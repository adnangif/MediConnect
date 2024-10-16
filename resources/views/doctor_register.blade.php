<x-layout>
    <x-slot:styles>
        <link rel="stylesheet" href='/css/doctor_register_styles.css'>
    </x-slot:styles>

    <div class="registration-container">
        <h1 class="text-3xl font-semibold mb-4">Doctor Enroll</h1>
        @if ($errors->any())
            <div class="text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <label for="specialization">Specialization</label>
                <select name="specialization">
                    <option selected disabled>Select an option</option>
                    @foreach ($doctor_specializations as $specialization)
                        <option value="{{ $specialization }}">{{ $specialization }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="password_confirmation" placeholder="Confirm password"
                    required>
            </div>


            <button type="submit" class="btn bg-gray-600 w-full">Register</button>
        </form>
    </div>
</x-layout>
