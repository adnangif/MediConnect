<?php

namespace App\Http\Controllers;

use App\Events\AnswerCreated;
use App\Events\DoctorConnected;
use App\Events\OfferCreated;
use App\Events\PatientConnected;
use App\Models\Appointment;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;

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
        $user = Auth::user();
        Log::info("creating offer for {$user}");
        // $consultation->doctor_sdp = $offer;
        // $consultation->save();
        OfferCreated::dispatch($consultation->consultation_id, $offer);
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
        $user = Auth::user();
        Log::info("creating Answer for {$user}");
        // $consultation->patient_sdp = $request->input('answer');
        // $consultation->save();
        AnswerCreated::dispatch($consultation->consultation_id, $request->input('answer'));
        return response("Saved successfully!!");
    }

    public function consultationEnded(Request $request, Consultation $consultation)
    {
        return view("consultation_ended_success", [
            "consultation" => $consultation
        ]);
    }
}
