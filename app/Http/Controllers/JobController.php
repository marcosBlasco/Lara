<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;

class JobController extends Controller
{
    public function index(){    
    $jobs = Job::with('employer')->latest()->simplePaginate(2);
    
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
    }

    public function create(){
        return view("jobs.create");
    }

    public function store(){
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            'description' => ['required'],
            'published_from' => ['required', 'date'],
            'published_until' => ['nullable', 'date', 'after:published_from'],
        ]);
        
        $jobsCount = Auth::user()->employer->jobs()->count();

        if ($jobsCount >= 3){
            return redirect('/jobs')
            ->with('error', 'You have reached the maximum number of job postings.');
        }
        echo "error";

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'description' => request('description'),
            'employer_id' => Auth::user()->employer->id,
            'published_from' => request('published_from'),
            'published_until' => request('published_until'),
            
        ]);
        $jobs = Auth::user()->employer->jobs;
        

        Mail::to($job->employer->user->email)->send(
            new JobPosted($job)
        );
        dd($jobs->count());
        return redirect('/jobs');
    }

    public function show(Job $job){
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job){
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job){
        //validate
    request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            'description' => ['required'],
            'published_from' => ['required', 'date'],
            'published_until' => ['nullable', 'date', 'after:published_from'],
        ]);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
        'description' => request('description'),
        'published_from' => request('published_from'),
        'published_until' => request('published_until'),
    ]);

        
        //redirect
        return redirect('/jobs/'.$job->id);
    }

    public function destroy(Job $job){
        $job->delete();
        return redirect('/jobs');
    }
}
