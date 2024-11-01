<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserTypes;
use Illuminate\Support\Facades\Log;

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

        $appointment = Appointment::createAppointment($validated);

        return view('appointment_create_success');
    }

    public function showAllAppointments(Request $request)
    {
        $user = User::where('id', '=', Auth::user()->id)->first();
        $appointments = [];

        if ($user->isUser()) {
            $appointments = $user->patient->appointments()->orderBy('created_at', 'desc')->get();
        }

        if ($user->isDoctor()) {
            $appointments = $user->doctor->appointments()->orderBy('created_at', 'desc')->get();
        }
        return view('all_appointments', [
            'appointments' => $appointments,
        ]);
    }

    public function showAppointmentUpdateForm(Request $request, Appointment $appointment)
    {
        return view('update_appointment', [
            'appointment' => $appointment,
            'doctor' => $appointment->doctor,
        ]);
    }

    public function handleAppointmentUpdateForm(Request $request, Appointment $appointment){

        $validated = $request->validate([
            'date' => ['required', 'date'],
            'message' => ['required'],
        ]);

        $appointment->date = $validated['date'];
        $appointment->message = $validated['message'];
        $appointment->save();

        return redirect()->route('success')
                        ->with('message', 'Thank you For Your request. Appointment Reshedule Request has been made;');



    }

    public function destroy(Appointment $appointment)
    {
        Log::debug('Appointment deleted: ' . $appointment->id);
        $appointment->delete();
        return redirect()->route('all-appointments');
    }
}
