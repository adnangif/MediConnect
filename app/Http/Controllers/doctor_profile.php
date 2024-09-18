<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class doctor_profile extends Controller
{
    public function index(){
        return view( 'doctor_profile' );
    }
}
