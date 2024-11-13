<?php

namespace App\Listeners;

use App\Events\PatientConnected;
use App\Models\Consultation;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ObservePatientConnection
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PatientConnected $event): void
    {
        $consultation = Consultation::find($event->consultation_id);
        $doctor = $consultation->appointment->doctor;
        
        $doctor->user->notifications()->create([
            'message' => "Patient is waiting for appointment #{$consultation->appointment->appointment_id}",
            'link' => '/all-appointments',
        ]);

    }
}
