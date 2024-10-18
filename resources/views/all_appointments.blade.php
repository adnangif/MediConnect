<x-layout>
    <x-slot:styles>
        <style>
            .container {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
                height: 100%;
            }

            .buttons {
                display: flex;
                gap: 20px;
            }

            .appointments-container {
                border-radius: 0.5rem;
                background-color: white;
                margin: 1rem;
                min-width: 70%;
                padding: 1rem;
            }

            .section-title {
                font-size: 30px;
                margin-bottom: 30px;
                text-align: center;
                font-weight: 600;
                color: var(--color-primary);
            }

            .appointment-list {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
            }

            .appointment-card {
                padding: 0.5rem;
                background-color: var(--bg-secondary);
                border-radius: 0.5rem;
                box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);

            }

            .appointment-card p {
                margin: 5px 0;
                display: grid;
                grid-template-columns: 1fr 1fr;
                align-items: center;
            }

            /* Appointment status styling */
            .status {
                border-radius: 0.5rem;
                text-transform: uppercase;
                font-weight: 600;
            }

            .status.pending {
                color: #e65100;
            }

            .status.completed {
                background-color: #1b5e20;
            }

            .status.canceled {
                background-color: #c62828;
            }
        </style>
    </x-slot:styles>
    <x-navbar />
    <div class="flex flex-col items-center">

        <div class="appointments-container">
            <h2 class="section-title ">Your Appointments</h2>
            <div class="appointment-list">

                @foreach ($appointments as $appointment)
                    <div class="appointment-card">
                        <p><strong>Doctor</strong> <span>{{ $appointment->doctor->name }}</span></p>
                        <p><strong>Specialization</strong> <span>{{ $appointment->doctor->specialization }}</span></p>
                        <p><strong>Date</strong> <span>{{ date('d F, Y', strtotime($appointment->date)) }}</span></p>
                        <p><strong>Time</strong> <span>10:00 AM</span></p>
                        <p><strong>Consultation Mode:</strong> <span>Telehealth Session</span></p>
                        <p><strong>Status</strong> <span class="status pending">Pending</span></p>
                        <p><strong>Estimated Duration</strong> <span>30 minutes</span></p>
                        <p class="actions flex justify-end gap-4 pt-4">
                            <button class="btn bg-emerald-200 text-emerald-950">Reschedule</button>
                            <button class="btn bg-red-200 text-red-950">Cancel appointment</button>
                        </p>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</x-layout>
