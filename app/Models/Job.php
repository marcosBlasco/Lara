<?php

namespace App\Models;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model{
    use HasFactory;
    protected $table = 'job_listings';
    protected $fillable = ['employer_id', 'title', 'salary', 'published_from', 'published_until'];
    protected $guarded = [];

    protected $casts = [
    'published_from' => 'datetime',
    'published_until' => 'datetime',
];
    

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
