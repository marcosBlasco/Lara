<?php

namespace App\Models;
use Illuminate\Database\eloquent\Model;

class Job extends Model
{
    protected $table = 'job_listing';
    protected $fillable = ['title', 'salary'];
    
}
