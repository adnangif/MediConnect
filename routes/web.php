<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\doctor_profile;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home_page');
});

Route::get('/all-appointments/', function () {
    return view('all_appointments');
});

Route::get('/book-appointment/', function () {
    return view('book_appointment');
});

Route::get('/consultation/', function () {
    return view('consultation_page');
});

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/user/register', [UserController::class, 'showRegisterForm']);
Route::post('/user/register', [UserController::class, 'userRegister']);

Route::get('/doctor/register/', function () {
    return view('doctor_register');
});

Route::get("/prescription-details/", function () {
    return view('prescription_details');
});

Route::get('/prescription-write/', function () {
    return view('prescription_write');
});

Route::get('/search/', function () {
    return view('search_doctor');
});



Route::get('/doctor/profile/', [doctor_profile::class, 'index']);


Route::get('/user/profile/', function () {
    return view('user_profile');
});


Route::get('/admin/doctor-details/', function(){
    return view('doctor_details');
});

Route::get('/admin/approve-doctor/', function(){
    return view('approve_doctor');
});

Route::get('/admin/doctor-reviews/', function(){
    return view('doctor_reviews');
});

Route::get('/admin/all-doctors/', function(){
    return view('all_doctors');
});

Route::get('/admin/login/', function(){
    return view('admin_login');
});