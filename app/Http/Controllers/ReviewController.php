<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function showReviewForm(Request $request, Consultation $consultation)
    {
        return view('write_review');
    }

    public function handleReviewFormSubmit(Request $request, Consultation $consultation)
    {
        $validated = request()->validate([
            'review' => ['required'],
            'rating' => ['required'],
        ]);

        $validated['appointment_id'] = $consultation->appointment_id;


        Auth::user()->patient->reviews()->create($validated);


        return redirect()->route('success');
    }
}
