<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        //validation
        $attribute = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //attempt
        if (! Auth::attempt($attribute)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry those credentials dop not match', 
            ]);
        }
        //regenerate the session token (if attempt was succesfull)
        request()->session()->regenerate();
        //redirect
        return redirect('/jobs');

    }
    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
