<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showLoginForm(Request $request)
    {
        Auth::logout();
        return view('login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }
    }

    public function showRegisterForm(Request $request)
    {
        return view('user_register');
    }

    public function userRegister(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'name' => 'required|max:100',
            'gender' => 'required|max:10',
            'age' => 'required|max:150',

        ]);

        $user = User::create($validated);

        return redirect()->to('/login');
    }

    public function logout(){
        Auth::logout();
        Session::flush();

        return redirect()->to('login');
    }
}
