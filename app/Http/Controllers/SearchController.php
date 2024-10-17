<?php

namespace App\Http\Controllers;

use App\Enums\DoctorSpecializations;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function __invoke(Request $request)
    {
        return view('search_doctor', [
            'doctor_specializations' => DoctorSpecializations::toArray(),
        ]);
    }

    public function getSearchResults(Request $request)
    {
        $name = $request->input('name');
        if(trim($name) == ''){
            $name = null;
        }
        $specialization = $request->input('specialization');
        $doctors = Doctor::getDoctorByNameSpecialization($name, $specialization);

        return view('doctor_search_results', [
            'doctors' => $doctors,
        ]);
    }
}
