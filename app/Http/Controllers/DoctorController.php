<?php

namespace App\Http\Controllers;


use App\Enums\DoctorSpecializations;
use App\Enums\UserTypes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function showRegisterForm(Request $request)
    {
        return view('doctor_register', [
            'doctor_specializations' => DoctorSpecializations::toArray()
        ]);
    }

    public function showDoctorProfile(Request $request,  Doctor $doctor)
    {
        return view('doctor_profile', [
            'doctor' => $doctor,
        ]);
    }

    public function showSpecializedDoctorsList(Request $request,  string $specialization)
    {
        $doctors = Doctor::getDoctorByNameSpecialization(null, $specialization);

        return view('specialized_doctors_list', [
            'doctors' => $doctors,
        ]);
    }

    public function doctorRegister(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'specialization' => ['required', Rule::in(DoctorSpecializations::toArray())],
            'name' => 'required',
        ]);
        $validated['role'] = UserTypes::DOCTOR->value;


        $user = User::createDoctor($validated);

        return redirect()->to('login');
    }
}
