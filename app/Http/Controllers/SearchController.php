<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function __invoke(Request $request)
    {
        return view('search_doctor');
    }

    public function getSearchResults(Request $request)
    {
        $query = $request->input('q', 'default');

        return view('doctor_search_results', [
            'doctors' => Doctor::all(),
        ]);
    }
}
