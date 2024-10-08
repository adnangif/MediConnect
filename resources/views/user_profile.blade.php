<x-layout>
    <x-slot:styles>
        <link rel="stylesheet" href='/css/user_profile_styles.css'>
    </x-slot:styles>
    <x-navbar />
    <div class="w-full flex justify-center mt-6">
        <div class="patient-profile-container">
            <div class="patient-profile-header">
                <img src="patient-photo.jpg" alt="Patient's Photo" class="patient-photo">
                <div class="patient-info">
                    <h1>Radhika Chatterjee</h1>
                    <p class="age">Age: 35</p>
                    <p class="gender">Gender: Female</p>
                </div>
            </div>

            <div class="patient-profile-body">
                <h2>Medical History</h2>
                <p>
                    Radhika has a history of hypertension and coronary heart disease. She is currently taking medication
                    to
                    manage these conditions. Several times she is feeling chest pain,shortness of breath. Also pain in
                    neck,shoulders,jaw or arms.
                </p>

                <h2>Contact Information</h2>
                <p><strong>Email:</strong> Radhika39@example.com</p>
                <p><strong>Phone:</strong> +123 456 7890</p>

                <button class="btn mt-4">Update Profile</button>
            </div>
        </div>
    </div>

</x-layout>
