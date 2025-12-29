<?php

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

//home
Route::redirect('/', '/en');
Route::view('/es', 'home-es');
Route::view('/en', 'home-en');

Route::resource('jobs', JobController::class);

Route::view('/about', 'about');
Route::view('/contact', 'contact'); 
