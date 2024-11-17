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
        return view('prescription_write', [
            'consultation' => $consultation,
        ]);
    }

  

}