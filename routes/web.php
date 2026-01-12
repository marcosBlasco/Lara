<?php

use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

//home
Route::redirect('/', '/jobs');
// Route::view('/es', 'home-es');
// Route::view('/en', 'home-en');

Route::resource('jobs', JobController::class);

//index
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
//create
Route::get('/jobs/create', [JobController::class, 'create'])->middleware(['auth', 'verified']);
//store
// Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware(['auth', 'verified']);
//show
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
//edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
        ->middleware(['auth', 'verified'])
        ->can('edit','job');
//update
Route::patch('/jobs/{job}', [JobController::class, 'update'])
        ->middleware(['auth', 'verified'])
        ->middleware('can:edit,job');
//destroy
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
        ->middleware(['auth', 'verified'])
        ->middleware('can:edit,job');



Route::get('/jobs/{job}/apply', [JobApplyController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->can('apply', 'job')
    ->name('jobs.apply.create');

Route::post('/jobs/{job}/apply', [JobApplyController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->can('apply', 'job')
    ->name('jobs.apply.store');





Route::view('/about', 'about');
Route::view('/contact', 'contact'); 

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);



Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);




Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    $request->fulfill();
    return redirect()->route('verification.success');;
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verificado', function () {
    return view('auth.verified');
})->middleware('auth')->name('verification.success');