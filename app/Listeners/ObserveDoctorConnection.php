<?php

namespace App\Listeners;

use App\Models\Consultation;
use App\Events\DoctorConnected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ObserveDoctorConnection
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
    public function handle(DoctorConnected $event): void
    {
        $consultation = Consultation::find($event->consultation_id);
        $patient = $consultation->appointment->patient;
        
        $patient->user->notifications()->create([
            'message' => "Doctor is waiting for appointment #{$consultation->appointment->appointment_id}",
            'link' => '/all-appointments',
        ]);
    }
}
