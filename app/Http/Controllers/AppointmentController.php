<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Support\Facades\Request;

class AppointmentController extends Controller
{
    public function showAppointmentForm(Request $request,  Doctor $doctor)
    {
        return view('book_appointment', [
            'doctor' => $doctor,
        ]);
    }
}
