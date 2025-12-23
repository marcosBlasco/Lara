<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Arr;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

//index
Route::get('/jobs', function () {
    
    $jobs = Job::with('employer')->latest()->simplePaginate(2);
    
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

//create
Route::get('/jobs/create', function () {
    return view("jobs.create");
});

//store
Route::post('/jobs', function () {
    
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

//show
Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);    
    return view('jobs.show', ['job' => $job]);
});

//edit
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::find($id);    
    return view('jobs.edit', ['job' => $job]);
});

//update
Route::patch('/jobs/{id}', function ($id) {

    //validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    //authorize  (I'm gonna solve this later...)
    //update the job
    $job = Job::findOrFail($id);
    // $job->title = request('title');
    // $job->salary = request('salary');
     

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    //redirect
    return redirect('/jobs/'.$job->id);
    
});

//destroy
Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);

    $job->delete();

    return redirect('/jobs');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
