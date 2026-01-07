<?php

namespace App\Http\Controllers;

use App\Mail\UserCreated;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            'company_name'         => ['required', 'min:3'],
            'password' => ['required', 'string', 'min:8', 'confirmed',],
        ]);
        //create the user
        $user = User::create($validated_attributes);
        //login the user

        Auth::login($user);
        Mail::to($user->email)->send(
            new UserCreated($user)
        );

        Employer::create([
            'name'    => $validated_attributes['company_name'],
            'user_id' => $user->id,
        ]);
        


        //redirect somewhere

        return redirect('jobs');

    }
}
