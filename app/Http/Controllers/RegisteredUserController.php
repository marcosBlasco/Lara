<?php

namespace App\Http\Controllers;

use App\Mail\UserCreated;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        // //validate
        // $validated_attributes = request()->validate([
        //     'first_name'    => ['required'],
        //     'last_name'     => ['required'],
        //     'email'         => ['required', 'email', 'unique:users', 'max:254'],
        //     'company_name'         => ['required', 'min:3'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed',],
        // ]);

        $validated_attributes = request()->validate([
            // User
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email', 'unique:users,email'],
            'password'   => ['required', 'confirmed', 'min:8'],
            'avatar'     => ['nullable', 'image', 'max:2048'],

            // Employer
            'company_name'  => ['nullable', 'string', 'max:255'],
            'description'   => ['nullable', 'string'],
            'website'       => ['nullable', 'string', 'max:255'],
            'company_logo'  => ['nullable', 'image', 'max:2048'],
        ]);





        // dd($validated_attributes);
        
        



        /* ------------------------
        USER
        ------------------------ */

        // Avatar
        if (request()->hasFile('avatar')) {
            $avatarPath = request()->file('avatar')
                ->store('avatars/users', 'public');
        } else {
            $avatarPath = 'avatars/users/default-user.png';
        }


        // $avatarPath = request()->hasFile('avatar')
        //     ? request()->file('avatar')->store('avatars/users', 'public')
        //     : 'avatars/users/default-user.png';
        $user = User::create([
            'first_name' => $validated_attributes['first_name'],
            'last_name'  => $validated_attributes['last_name'],
            'email'      => $validated_attributes['email'],
            'password'   => Hash::make($validated_attributes['password']),
            'avatar'     => $avatarPath,
        ]);

        //create the user
        // $user = User::create($validated_attributes);
        //login the user

        $user->sendEmailVerificationNotification();

        Auth::login($user);




        // Employer::create([
        //     'name'    => $validated_attributes['company_name'],
        //     'user_id' => $user->id,
        // ]);
        


        /* ------------------------
        EMPLOYER
        ------------------------ */

        // Logo empresa (solo si sube uno)
        $companyLogoPath = null;

        if (request()->hasFile('company_logo')) {
            $companyLogoPath = request()->file('company_logo')
                ->store('logos/employers', 'public');
        }

        // Nombre de la compañía
        $companyName = $validated_attributes['company_name'] ?? $user->last_name;
        $employer = Employer::create([
            'user_id'      => $user->id,
            'name'         => $companyName,
            'description'  => $validated_attributes['description'] ?? null,
            'website'      => $validated_attributes['website'] ?? null,
            'logo'         => $companyLogoPath, // null → SVG dinámico
        ]);





        return redirect()->route('verification.notice');

        //redirect somewhere


    }
}
