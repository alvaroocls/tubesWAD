<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;

use App\Models\PostingJob;
use App\Models\ApplyJob;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{

    public function index(Request $request)
{
    $search = $request->input('search');

    $jobs = PostingJob::query();

    if ($search) {
        $jobs->where('title', 'LIKE', '%' . $search . '%')
             ->orWhere('description', 'LIKE', '%' . $search . '%');
    }

    $jobs = $jobs->paginate(10);

    return view('musician.jobs.index', compact('jobs'));
}

    public function show($id)
    {
        $job = PostingJob::with('user')->findOrFail($id); 
        return view('musician.jobs.show', compact('job')); 
    }

    public function apply(Request $request, $id)
    {
    $request->validate([
        'message' => 'nullable|string|max:255',
    ]);

    $existingApplication = ApplyJob::where('job_id', $id)
        ->where('user_id', auth()->id())
        ->first();

    if ($existingApplication) {
        return back()->with('error', 'Anda sudah melamar pekerjaan ini.');
    }

    ApplyJob::create([
        'job_id' => $id,
        'user_id' => auth()->id(),
        'message' => $request->message,
    ]);

    return redirect()->route('jobs.showapply')->with('success', 'Lamaran berhasil diajukan.');
    }



    public function showAppliedJobs()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        $appliedJobs = $user->applications()->with('job')->get();

        return view('musician.jobs.showapply', compact('appliedJobs'));
    }
    public function cancel($id)
    {
    $application = ApplyJob::findOrFail($id);

    if ($application->user_id !== auth()->id()) {
        return redirect()->route('jobs.showapply')->with('error', 'Anda tidak memiliki izin untuk membatalkan lamaran ini.');
    }

    $application->delete();

    return redirect()->route('jobs.showapply')->with('success', 'Lamaran berhasil dibatalkan.');
    }
    public function edit($id)
    {
    $application = ApplyJob::findOrFail($id);

    if ($application->user_id !== auth()->id()) {
        return redirect()->route('jobs.showapply')->with('error', 'Anda tidak memiliki izin untuk mengedit lamaran ini.');
    }

    return view('musician.jobs.edit', compact('application'));  
    }
    public function update(Request $request, $id)
    {
    $request->validate([
        'message' => 'nullable|string|max:255',
    ]);

    $application = ApplyJob::findOrFail($id);

    if ($application->user_id !== auth()->id()) {
        return redirect()->route('jobs.showapply')->with('error', 'Anda tidak memiliki izin untuk mengedit lamaran ini.');
    }

    $application->update([
        'message' => $request->message,
    ]);

    return redirect()->route('jobs.showapply')->with('success', 'Lamaran Anda berhasil diperbarui.');
    }
    
    




}
