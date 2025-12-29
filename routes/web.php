<?php

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

//home
Route::redirect('/', '/en');
Route::view('/es', 'home-es');
Route::view('/en', 'home-en');

Route::controller(JobController::class)->group(function(){
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}', 'show');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});

Route::view('/about', 'about');
Route::view('/contact', 'contact'); 
