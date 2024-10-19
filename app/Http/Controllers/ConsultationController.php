<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function waitingRoom(Request $request, Consultation $consultation)
    {
        return view("patient_consultation_page",  [
            'consultation' => $consultation,
        ]);
    }

    public function consultationRoom(Request $request, Consultation $consultation)
    {
        return view("doctor_consultation_page", [
            'consultation' => $consultation,
        ]);
    }

    public function setOffer(Request $request, Consultation $consultation)
    {
        $offer = $request->input('offer');
        Debugbar::info($offer);
        $consultation->doctor_sdp = $offer;
        $consultation->save();
        return response("Saved successfully!!");
    }

    public function getOffer(Request $request, Consultation $consultation)
    {
        $offer = $consultation->doctor_sdp;
        return response()->json([
            'offer' => $offer,
        ]);
    }

    public function getAnswer(Request $request, Consultation $consultation)
    {
        $answer = $consultation->patient_sdp;
        return response()->json([
            'answer' => $answer,
        ]);
    }

    public function setAnswer(Request $request, Consultation $consultation)
    {
        $consultation->patient_sdp = $request->input('answer');
        $consultation->save();
        return response("Saved successfully!!");
    }
}
