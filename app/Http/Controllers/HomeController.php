<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve a sample of recommended doctors (adjust number as desired)
        $doctors = Doctor::inRandomOrder()->take(5)->get();

        // Pass the doctor data to the view
        return view('home_page', compact('doctors'));
    }
}
