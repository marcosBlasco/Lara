<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

//home
Route::redirect('/', '/en');
Route::view('/es', 'home-es');
Route::view('/en', 'home-en');

Route::resource('jobs', JobController::class);

Route::view('/about', 'about');
Route::view('/contact', 'contact'); 

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);



Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);