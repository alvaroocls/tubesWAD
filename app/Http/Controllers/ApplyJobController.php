<?php

namespace App\Http\Controllers;

use App\Models\PostingJob;
use App\Models\ApplyJob;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{

    public function index()
    {
 
        $jobs = PostingJob::all();

        // Mengirimkan data pekerjaan ke view yang berada di folder musician/jobs/index
        return view('musician.jobs.index', compact('jobs'));
    }

    // Menampilkan detail pekerjaan berdasarkan ID
    public function show($id)
    {
        $job = PostingJob::with('user')->findOrFail($id); // Menampilkan pekerjaan berdasarkan ID
        return view('musician.jobs.show', compact('job')); // Update path view ke musician.jobs.show
    }

    // Menangani aplikasi lamaran pekerjaan
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

    // Pastikan user hanya bisa menghapus lamarannya sendiri
    if ($application->user_id !== auth()->id()) {
        return redirect()->route('jobs.showapply')->with('error', 'Anda tidak memiliki izin untuk membatalkan lamaran ini.');
    }

    $application->delete();

    return redirect()->route('jobs.showapply')->with('success', 'Lamaran berhasil dibatalkan.');
    }
    public function edit($id)
    {
    // Cari lamaran berdasarkan ID
    $application = ApplyJob::findOrFail($id);

    // Pastikan pengguna hanya bisa mengedit lamarannya sendiri
    if ($application->user_id !== auth()->id()) {
        return redirect()->route('jobs.showapply')->with('error', 'Anda tidak memiliki izin untuk mengedit lamaran ini.');
    }

    // Tampilkan form untuk edit lamaran
    return view('musician.jobs.edit', compact('application'));  
    }
    public function update(Request $request, $id)
    {
    // Validasi input dari pengguna
    $request->validate([
        'message' => 'nullable|string|max:255',
    ]);

    // Cari lamaran berdasarkan ID
    $application = ApplyJob::findOrFail($id);

    // Pastikan pengguna hanya bisa mengedit lamarannya sendiri
    if ($application->user_id !== auth()->id()) {
        return redirect()->route('jobs.showapply')->with('error', 'Anda tidak memiliki izin untuk mengedit lamaran ini.');
    }

    // Perbarui pesan lamaran
    $application->update([
        'message' => $request->message,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('jobs.showapply')->with('success', 'Lamaran Anda berhasil diperbarui.');
    }




}
