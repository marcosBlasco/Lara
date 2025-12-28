<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Arr;
use App\Models\Job;

Route::get('/', function () {
    return redirect('/en');
});
Route::get('/es', function () {
    return view('home-es');
});
Route::get('/en', function () {
    return view('home-en');
});


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


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
