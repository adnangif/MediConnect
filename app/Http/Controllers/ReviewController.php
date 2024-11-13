<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function showReviewForm(Request $request)
    {
        return view('write_review');
    }

    public function handleReviewFormSubmit(Request $request)
    {
        $validated = request()->validate([
            'review' => ['required'],
            'rating' => ['required'],
        ]);

        // dd($validated);

        Auth::user()->patient->reviews()->create($validated);


        return redirect()->route('success');
    }
}
