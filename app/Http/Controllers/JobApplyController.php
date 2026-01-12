<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplyController extends Controller
{
    //
    /**
     * Muestra el formulario de postulación
     */
    public function create(Job $job)
    {
        return view('jobs.apply.create', [
            'job' => $job,
        ]);
    }

    /**
     * Guarda la postulación en la base de datos
     */
    public function store(Request $request, Job $job)
    {
        $data = $request->validate([
            'message' => ['nullable', 'string', 'max:2000'],
        ]);
//         dd(
//     Job::where('id', 26)->exists(),
//     Job::find(26)
// );
        // Seguridad extra (aunque la DB ya protege)
        if (
            $job->applications()
                ->where('user_id', Auth::user()->id)
                ->exists()
        ) {
            return back()->with('error', 'You’ve already applied to this position.');
        }

        $job->applications()->create([
            'user_id' => Auth::user()->id,
            'message' => $data['message'] ?? null,
        ]);

        return redirect()
            ->route('jobs.show', $job)
            ->with('success', 'You’ve applied successfully.');
    }
}
