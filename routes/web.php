<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\doctor_profile;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureRoleIsUser;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\EnsureRoleIsDoctor;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\EnsureRoleIsUserOrDoctor;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrescriptionController;

Route::get('/', [HomeController::class, 'index']);


Route::middleware([EnsureRoleIsUser::class])->group(function () {
    Route::get('/book-appointment/{doctor}', [AppointmentController::class, 'showAppointmentForm'])
        ->name('appointment-form');
    Route::post('/book-appointment/{doctor}', [AppointmentController::class, 'handleAppointmentFormSubmit']);
    Route::get('/update-appointment/{appointment}', [AppointmentController::class, 'showAppointmentUpdateForm'])
        ->name('update-appointment');
    Route::post('/update-appointment/{appointment}', [AppointmentController::class, 'handleAppointmentUpdateForm'])
        ->name('update-appointment-post');


    Route::get('/connect/patient/{consultation}', [ConsultationController::class, 'waitingRoom'])
        ->name('waiting-room');

    Route::get('/connect/patient/{consultation}/offer', [ConsultationController::class, 'getOffer'])
        ->name('get-offer');
    Route::post('/connect/patient/{consultation}/answer', [ConsultationController::class, 'setAnswer'])
        ->name('set-answer');

    Route::get('/write-review/{consultation}', [ReviewController::class, 'showReviewForm'])
        ->name('write-review');

    Route::post('/write-review/{consultation}', [ReviewController::class, 'handleReviewFormSubmit'])
        ->name('write-review-post');

    Route::get('/consultation-ended/{consultation}', [ConsultationController::class, 'consultationEnded'])->name('consultation-ended');
    Route::get("/prescription-details{appointment}", [PrescriptionController::class, "showPrescriptionDetails"])->name("prescription-details");
    
});


Route::middleware([EnsureRoleIsUserOrDoctor::class])->group(function () {
    Route::get('/all-appointments/', [AppointmentController::class, 'showAllAppointments'])
        ->name('all-appointments');
    Route::delete('appointment/{appointment}', [AppointmentController::class, 'destroy'])
        ->name('delete-appointment');
});


Route::get('/success', function () {
    return view('success');
})->name('success');



Route::middleware([EnsureRoleIsDoctor::class])->group(function () {
    Route::get('/connect/doctor/{consultation}', [ConsultationController::class, 'consultationRoom'])
        ->name('consultation-room');

    Route::post('/connect/doctor/{consultation}/offer', [ConsultationController::class, 'setOffer'])
        ->name('set-offer');
    Route::get('/connect/doctor/{consultation}/answer', [ConsultationController::class, 'getAnswer'])
        ->name('get-answer');
    Route::get('/prescription-write/{consultation}', [PrescriptionController::class, 'showPrescriptionForm'])
        ->name('prescription-write');
    
    Route::post('/prescription-write/{consultation}', [PrescriptionController::class, 'handlePrescriptionFormSubmit'])
        ->name('prescription-write-post');
});




Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/user/register', [UserController::class, 'showRegisterForm']);
Route::post('/user/register', [UserController::class, 'userRegister']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/user/profile', [UserController::class, 'showUserProfile']);

Route::get('/doctor/register', [DoctorController::class, 'showRegisterForm']);
Route::post('/doctor/register', [DoctorController::class, 'doctorRegister']);




Route::get('/search', SearchController::class);
Route::get('/get-search-results', [SearchController::class, 'getSearchResults'])
    ->name('searchResults');



Route::get('/doctor/profile/{doctor}', [DoctorController::class, 'showDoctorProfile']);

Route::get('/specialized-doctors-list/{specialization}', [DoctorController::class, 'showSpecializedDoctorsList'])
    ->name('specialized-doctors-list');

// Route::get('/specialized-doctors-list/cardiologist', function () {
//     return "Route works!";
// });



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
