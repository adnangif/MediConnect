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
                color: #3600e6;
            }

            .status.completed {
                color: #1b5e20;
            }

            .status.cancelled {
                color: #c62828;
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
                        <p><strong>Appointment ID</strong> <span>{{ $appointment->appointment_id }}</span></p>
                        <p><strong>Doctor</strong> <span>{{ $appointment->doctor->name }}</span></p>
                        <p><strong>Specialization</strong> <span>{{ $appointment->doctor->specialization }}</span></p>
                        <p><strong>Date</strong> <span>{{ date('d F, Y', strtotime($appointment->date)) }}</span></p>
                        <p><strong>Time</strong> <span>{{ date('h : i  A', strtotime($appointment->time)) }}</span></p>
                        <p><strong>Consultation Mode</strong> <span>MediConnect Session</span></p>
                        <p><strong>Status</strong> <span class="status pending">{{ $appointment->status }}</span></p>
                        <p><strong>Estimated Duration</strong> <span>30 minutes</span></p>
                        @if ($appointment->status == 'finished')
                            <p><strong>Prescription</strong> <span><a class="outline-btn"
                                        href="{{ route('prescription-details', $appointment) }}">View</a></span></p>
                        @endif
                        @php
                            date_default_timezone_set('Asia/Dhaka');

                            $appointmentTime = \Illuminate\Support\Carbon::createFromFormat(
                                'H:i:s',
                                $appointment->time,
                            );
                        @endphp
                        <div class="actions  justify-end gap-4 pt-4 grid grid-cols-2">
                            @if (Auth::user()->isUser() && $appointment->status == 'pending' && $appointmentTime->greaterThan(now()->addMinutes(30)))
                                <a href="{{ route('update-appointment', $appointment) }}"
                                    class="btn icon-text col-span-1 bg-emerald-200 text-emerald-950">
                                    <img width="24" src="/image/redo.svg" />
                                    Reschedule
                                </a>
                            @else
                                <button class="btn bg-gray-300 cursor-not-allowed text-gray-500">Reschedule
                                    Unavailable</button>
                            @endif
                            @if ($appointment->status == 'pending' && $appointmentTime->greaterThan(now()->addMinutes(30)))
                                <form action="{{ route('delete-appointment', $appointment) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to cancel this appointment?')"
                                    class="col-span-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn icon-text bg-red-200 text-red-950" type="submit">
                                        <img width="24" src="/image/cancel.svg" />
                                        Cancel appointment</button>
                                </form>
                            @else
                                @if ($appointment->status == 'finished')
                                    <button class="btn bg-gray-300 cursor-not-allowed text-gray-500">Appointment
                                        Completed</button>
                                @else
                                    <button class="btn bg-gray-300 cursor-not-allowed text-gray-500">Cancel
                                        Unavailable</button>
                                @endif
                            @endif

                                @if (1)
                                    @if (Auth::user()->isUser() &&
                                            $appointmentTime->between(now()->subMinutes(30), now()->addMinutes(30)) &&
                                            $appointment->status == 'pending')
                                        <a href="{{ route('waiting-room', $appointment->consultation) }}"
                                            class="col-span-2 btn icon-text bg-blue-200 text-blue-950">Join Now
                                            <img width="20" src="/image/new-tab.svg" />
                                        </a>
                                    @endif

                                    @if (Auth::user()->isDoctor() &&
                                            $appointmentTime->between(now()->subMinutes(30), now()->addMinutes(30)) &&
                                            $appointment->status == 'pending')
                                        <a href="{{ route('consultation-room', $appointment->consultation) }}"
                                            class="col-span-2 btn icon-text bg-blue-200 text-blue-950">Join Now
                                            <img width="20" src="/image/new-tab.svg" />
                                        </a>
                                    @endif
                                @else
                                    @if ($appointment->status == 'pending')
                                        <button
                                            class="col-span-2 btn bg-gray-300 cursor-not-allowed text-emerald-950">Join
                                            at
                                            {{ \Illuminate\Support\Carbon::createFromFormat('H:i:s', $appointment->time)->format('h:i A') }}
                                        </button>
                                    @endif
                                @endif
                        </div>

                    </div>
                @endforeach


            </div>
        </div>
    </div>
</x-layout>
