<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ApplyJob;
use App\Models\PostingJob;


class PaymentController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $loggedInUserId = Auth::id();

        // Mendapatkan job_id dari tabel PostingJob yang dibuat oleh user yang login
        $jobIds = PostingJob::where('user_id', $loggedInUserId)->pluck('id');

        // Mendapatkan data dari ApplyJob dengan status 'accepted' dan job_id yang sesuai
        $acceptedApplications = ApplyJob::whereIn('job_id', $jobIds)
            ->where('status', 'accepted')
            ->with(['user:id,firstName,lastName']) // Mengambil user data
            ->get();

        // Format data untuk ditampilkan
        $paymentData = $acceptedApplications->map(function ($application) {
            return [
                'name' => $application->user->firstName . ' ' . $application->user->lastName,
                'apply_date' => $application->created_at->format('Y-m-d H:i:s'),
            ];
        });

        // Return ke view dengan data
        return view('cafeOwner.payment.index', compact('paymentData'));
    }
}
