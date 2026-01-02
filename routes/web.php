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

//index
Route::get('/jobs', [JobController::class, 'index']);
//create
Route::get('/jobs/create', [JobController::class, 'create']);
//store
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
//show
Route::get('/jobs/{job}', [JobController::class, 'show']);
//edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth', 'can:edit-job, job');
//update
Route::patch('/jobs/{job}', [JobController::class, 'update']);
//destroy
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);






Route::view('/about', 'about');
Route::view('/contact', 'contact'); 

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);



Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);