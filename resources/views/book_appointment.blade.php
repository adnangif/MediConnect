<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Appointment - MediConnect</title>
    <link rel="stylesheet" href='/css/book_appointment_styles.css'>
    <link rel="stylesheet" href={{asset('css/global_styles.css')}} >
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar />
    <div class="container">
        <div class="form-container">
            <h2 class="text-[30px] pb-8">Book an Appointment</h2>

            <form class="appointment-form" action="#" method="post">

                <div class="form-group">
                    <label for="date">Preferred Date</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="time">Preferred Time</label>
                    <input type="time" id="time" name="time" required>
                </div>

                <div class="form-group">
                    <label for="message">Reason for Appointment</label>
                    <textarea id="message" name="message" rows="4" placeholder="Briefly describe the reason for your visit."></textarea>
                </div>
                <div class="flex justify-end">
                <button type="submit" class="btn">Book Appointment</button>

                </div>
            </form>
        </div>
    </div>
</body>
</html>

<script>
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('date').value = today;
</script>
