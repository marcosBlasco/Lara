<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function show(User $user)
    {
        $user->load('employer');

        return view('users.show', compact('user'));
    }
    // app/Http/Controllers/UserController.php
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated_attributes = request()->validate([
            // User
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email', 'unique:users,email,' . $user->id],
            'avatar'     => ['nullable', 'image', 'max:2048'],

            // Employer
            'company_name'  => ['nullable', 'string', 'max:255'],
            'description'   => ['nullable', 'string'],
            'website'       => ['nullable', 'string', 'max:255'],
            'company_logo'  => ['nullable', 'image', 'max:2048'],
        ]);
        
        if (request()->hasFile('avatar')) {
            $avatarPath = request()->file('avatar')
                ->store('avatars/users', 'public');
        } else {
            $avatarPath = null;
        }
        
        
        $user->update([
            'first_name' => $validated_attributes['first_name'],
            'last_name'  => $validated_attributes['last_name'],
            'email'      => $validated_attributes['email'],
            'avatar'     => $avatarPath,
        ]);



        // Logo empresa (solo si sube uno)
        $companyLogoPath = null;

        if (request()->hasFile('company_logo')) {
            $companyLogoPath = request()->file('company_logo')
                ->store('logos/employers', 'public');
        }

        // Nombre de la compañía
        $companyName = $validated_attributes['company_name'] ?? $user->last_name;
        $user->employer()->update([
            'name'         => $companyName,
            'description'  => $validated_attributes['description'] ?? null,
            'website'      => $validated_attributes['website'] ?? null,
            'logo'         => $companyLogoPath, // null → SVG dinámico
        ]);

        return redirect()
            ->route('users.show', $user)
            ->with('success', 'Profile updated');
    }

}
