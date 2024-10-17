<x-layout>
    <x-slot:styles>
        <link rel="stylesheet" href='/css/book_appointment_styles.css'>
    </x-slot:styles>
    <x-navbar />
    <div class="container">
        <div class="form-container shadow">
            <h2 class="text-[30px] pb-8 ">Book an Appointment</h2>

            <form class="appointment-form" action="#" method="post">

                <div class="form-group">
                    <label for="date">Preferred Date</label>
                    <input class="p-2" type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="message">Reason for Appointment</label>
                    <textarea class="resize-none w-full outline-none p-2" id="message" name="message" rows="4" placeholder="Briefly describe the reason for your visit."></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="btn">Book Appointment</button>

                </div>
            </form>
        </div>
    </div>
</x-layout>
