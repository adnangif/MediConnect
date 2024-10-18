<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function showAppointmentForm(Request $request,  Doctor $doctor)
    {
        return view('book_appointment', [
            'doctor' => $doctor,
        ]);
    }

    public function handleAppointmentFormSubmit(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'date' => ['required', 'date'],
            'message' => ['required'],
        ]);

        $validated['doctor_id'] = $doctor->doctor_id;
        $validated['patient_id'] = Auth::user()->patient->patient_id;

        $appointment = Appointment::create($validated);

        return view('appointment_create_success');
    }

    public function showAllAppointments(Request $request)
    {
        return view('all_appointments', [
            'appointments' => Auth::user()->patient->appointments,
        ]);
    }
}
