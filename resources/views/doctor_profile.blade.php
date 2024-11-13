<x-layout>
    <x-slot:styles>
        <link rel="stylesheet" href='/css/user_profile_styles.css'>
    </x-slot:styles>
    <x-navbar />
    <div class="w-full flex justify-center mt-6">
        <div class="patient-profile-container">
            <div class="patient-profile-header">
                <img src="/image/doctorPic.jpeg" alt="Doctor's Photo" class="patient-photo">
                <div class="doctor-info">
                    <div class="text-2xl font-bold">{{ $doctor->name }}</div>
                    <div class="text-xl font-semibold">{{ $doctor->specialization }}</div>
                    <p class="experience">Experience: {{ $doctor->experience }}</p>
                </div>
            </div>

            <div class="profile-body">
                <div class="text-2xl font-bold">About Me</div>
                <p>
                    {{ $doctor->name }} is a highly skilled {{ $doctor->specialization }} with over
                    {{ $doctor->experience }} years of experience in treating
                    patients.
                    He is dedicated to providing the best care possible and staying updated with the latest advancements
                    in
                    the sector of {{ $doctor->specialization }}.
                </p>

                <div class="text-2xl font-bold">Contact Information</div>
                <p><strong>Email:</strong> {{ $doctor->user->email }}</p>
                <p><strong>Phone:</strong> {{ $doctor->contact }}</p>


                <h2>Consultation Fees</h2>
                <p><strong>Fees:</strong> {{ $doctor->fee }} tk only</p>

                <a href="{{ route('appointment-form', $doctor->doctor_id) }}" class="btn mt-4">
                    Get an appointment</a>
            </div>
        </div>
</x-layout>
