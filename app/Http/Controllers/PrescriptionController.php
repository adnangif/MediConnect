<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserTypes;
use App\Models\Consultation;
use Illuminate\Support\Facades\Log;

class PrescriptionController extends Controller
{
    public function showPrescriptionForm(Request $request,  Consultation $consultation)
    {
        $appointment = $consultation->appointment;
        return view('prescription_write', [
            'appointment' => $appointment,
            'medicines' => $appointment->prescription->medicines,
            'prescription' => $appointment->prescription
        ]);
    }

    public function handlePrescriptionFormSubmit(Request $request, Consultation $consultation)
    {
        $appointment = $consultation->appointment;
        $prescription = $consultation->appointment->prescription;

        $validated = $request->validate([
            'rx' => ['required'],
            'medicines' => ['required'],
        ]);
        Log::debug($validated);

        $prescription->rx = $validated['rx'];
        $prescription->save();

        $prescription->save_medicines($validated['medicines']);

        return redirect()->back();
    }   




}