<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\doctor_profile;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureRoleIsUser;

Route::get('/', function () {
    return view('home_page');
});

Route::get('/all-appointments/', function () {
    return view('all_appointments');
});

Route::middleware([EnsureRoleIsUser::class])->group(function () {
    Route::get('/book-appointment/{doctor}', [AppointmentController::class, 'showAppointmentForm'])
        ->name('appointment-form');
    Route::post('/book-appointment/{doctor}', [AppointmentController::class, 'handleAppointmentFormSubmit']);
});


Route::get('/consultation/', function () {
    return view('consultation_page');
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/user/register', [UserController::class, 'showRegisterForm']);
Route::post('/user/register', [UserController::class, 'userRegister']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/user/profile', [UserController::class, 'showUserProfile']);

Route::get('/doctor/register', [DoctorController::class, 'showRegisterForm']);
Route::post('/doctor/register', [DoctorController::class, 'doctorRegister']);



Route::get("/prescription-details", function () {
    return view('prescription_details');
});

Route::get('/prescription-write', function () {
    return view('prescription_write');
});

Route::get('/search', SearchController::class);
Route::get('/get-search-results', [SearchController::class, 'getSearchResults'])
    ->name('searchResults');



Route::get('/doctor/profile/', [doctor_profile::class, 'index']);



Route::get('/admin/doctor-details/', function () {
    return view('doctor_details');
});

Route::get('/admin/approve-doctor/', function () {
    return view('approve_doctor');
});

Route::get('/admin/doctor-reviews/', function () {
    return view('doctor_reviews');
});

Route::get('/admin/all-doctors/', function () {
    return view('all_doctors');
});

Route::get('/admin/login/', function () {
    return view('admin_login');
});
