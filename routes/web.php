<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/all-appointments/', function(){
    return view('all_appointments');
});

Route::get('/book-appointment/', function(){
    return view('book_appointment');
});

Route::get('/consultation/', function(){
    return view('consultation_page');
});

Route::get('/doctor/login/', function(){
    return view('doctor_login');
});

Route::get('/doctor/register/', function(){
    return view('doctor_register');
});

Route::get("/prescription-details/", function(){
    return view('prescription_details');
});

Route::get('/prescription-write/', function(){
    return view('prescription-write');
});

Route::get('/search/', function(){
    return view('search_doctor');
});

Route::get('/user/login/', function(){
    return view('user_login');
});

Route::get('/user/register/', function(){
    return view('user_register');
});

Route::get('/doctor/profile/', function(){
    return view('doctor_profile');
});


Route::get('/user/profile/',function(){
    return view('user_profile');
});