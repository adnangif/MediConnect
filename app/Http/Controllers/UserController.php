<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function showLoginForm(Request $request){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if(Auth::guard('web')->attempt($credentials)){
            return "<h1>logged in </h1>";
        }else{
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }
    }

    public function userRegister(Request $request){
        $validated = $request.validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required|max:100',
            'gender' => 'required|max:10',
        ]);
    }
}
