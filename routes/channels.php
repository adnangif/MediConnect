<?php

use App\Models\Consultation;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('consultation.{consultation_id}', function ($user, $consultation_id) {
    $consultation = Consultation::find($consultation_id);
    $appointment = $consultation->appointment;

    $doctor = $appointment->doctor;
    $patient = $appointment->patient->patient;

    if ((int)$user->id === (int)$patient->user_id) {
        return true;
    }
    if ((int)$user->id === (int)$doctor->user_id) {
        return true;
    }
    return false;
});

Broadcast::channel('doctor-channel.{doctor_id}', function ($user, $doctor_id) {
    return (int) $user->doctor->doctor_id === (int) $doctor_id;
});
