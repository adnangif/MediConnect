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
                    <h1>{{ $user->name }}</h1>
                    <p class="age">Age:</p>
                    <p class="gender">Gender: Male</p>
                </div>
            </div>

            <div class="patient-profile-body">
                <h2>Medical History</h2>
                <p>
                    {{ $user->name }} has a history of Acidity
                </p>

                <h2>Contact Information</h2>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Phone:</strong> </p>

                <button class="btn mt-4">Update Profile</button>
            </div>
        </div>
    </div>

</x-layout>
