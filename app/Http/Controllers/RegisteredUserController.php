<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        //validate
        $validated_attributes = request()->validate([
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'email'         => ['required', 'email', 'unique:users', 'max:254'],
            'password' => ['required', 'string', 'min:8', 'confirmed',],
        ]);
        //create the user
        $user = User::create($validated_attributes);
        //login the user

        Auth::login($user);

        //redirect somewhere

        return redirect('jobs');

    }
}
