<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

//home
Route::redirect('/', '/en');
Route::view('/es', 'home-es');
Route::view('/en', 'home-en');

//index
Route::get('/jobs', [JobController::class, 'index']);
//create
Route::get('/jobs/create', [JobController::class, 'create']);
//store
Route::post('/jobs', [JobController::class, 'store']);
//show
Route::get('/jobs/{job}', [JobController::class, 'show']);
//edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
//update
Route::patch('/jobs/{job}', [JobController::class, 'update']);
//destroy
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::view('/about', 'about');
Route::view('/contact', 'contact');
