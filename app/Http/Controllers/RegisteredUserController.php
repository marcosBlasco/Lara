<?php

namespace App\Http\Controllers;

use App\Mail\UserCreated;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
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


        /* ------------------------
        USER
        ------------------------ */

        // Avatar
        if (request()->hasFile('avatar')) {
            $avatarPath = request()->file('avatar')
                ->store('avatars/users', 'public');
        } else {
            $avatarPath = null;
        }

        $user = User::create([
            'first_name' => $validated_attributes['first_name'],
            'last_name'  => $validated_attributes['last_name'],
            'email'      => $validated_attributes['email'],
            'password'   => Hash::make($validated_attributes['password']),
            'avatar'     => $avatarPath,
        ]);

        $user->sendEmailVerificationNotification();

        Auth::login($user);


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
            'slug'        => Str::slug($companyName),
            'description'  => $validated_attributes['description'] ?? null,
            'website'      => $validated_attributes['website'] ?? null,
            'logo'         => $companyLogoPath, // null → SVG dinámico
        ]);





        return redirect()->route('verification.notice');

        //redirect somewhere


    }
}
