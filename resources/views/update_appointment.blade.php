<x-layout>
    <x-slot:styles>
        <link rel="stylesheet" href='/css/book_appointment_styles.css'>
    </x-slot:styles>
    <x-navbar />
    <div class="container">
        <div class="form-container shadow">
            <h2 class="text-2xl pb-8 ">{{ $doctor->name }}<span class="text-base text-gray-600"> - Create Appointment</span></h2>

            <form class="appointment-form" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date">Preferred Date</label>
                    <input class="p-2" type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="message">Reason for Appointment</label>
                    <textarea class="resize-none w-full outline-none p-2" id="message" name="message" rows="4"
                        placeholder="Briefly describe the reason for your Appointment."></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="btn">Confirm</button>

                </div>
            </form>
        </div>
    </div>
    <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date').value = today;
    </script>
</x-layout>
