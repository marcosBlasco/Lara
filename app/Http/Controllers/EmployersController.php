<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployersController extends Controller
{
    //
    public function show(Employer $employer)
    {
        return view('employers.show', compact('employer'));
    }
}
