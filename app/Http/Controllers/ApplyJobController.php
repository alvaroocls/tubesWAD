<?php

namespace App\Http\Controllers;

use App\Models\PostingJob;
use App\Models\ApplyJob;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{
    // Menampilkan daftar pekerjaan
    public function index()
    {
        // Mengambil semua pekerjaan yang tersedia
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

    // Cek apakah user sudah melamar pekerjaan
    $existingApplication = ApplyJob::where('job_id', $id)
        ->where('user_id', auth()->id())
        ->first();

    if ($existingApplication) {
        return back()->with('error', 'Anda sudah melamar pekerjaan ini.');
    }

    // Simpan lamaran pekerjaan
    ApplyJob::create([
        'job_id' => $id,
        'user_id' => auth()->id(),
        'message' => $request->message,
    ]);

    return redirect()->route('jobs.apply.view')->with('success', 'Lamaran berhasil diajukan.');
    }

    public function showAppliedJobs()
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();
    $appliedJobs = $user->applications()->with('job')->get();

    // Debugging untuk memastikan data yang dikirim ke view
    dd($appliedJobs);

    return view('musician.jobs.showapply', compact('appliedJobs'));
}




 







}
