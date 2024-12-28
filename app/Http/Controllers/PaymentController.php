<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ApplyJob;
use App\Models\PostingJob;
use App\Models\Payment;


class PaymentController extends Controller
{
    public function index()
    {
        $loggedInUserId = Auth::id();

        $jobIds = PostingJob::where('user_id', $loggedInUserId)->pluck('id');

        // ambil payment data yang job_id nya ada di $jobIds dan status dari applyJob nya adalah 'finished'
        $paymentData = Payment::whereIn('job_id', $jobIds)
            ->whereHas('applyJob', function ($query) {
                $query->where('status', 'finished');
            })
            ->get();
        
        
        return view('cafeOwner.payment.index', compact('paymentData', 'loggedInUserId', 'jobIds'));
    }


    public function pay(Request $request, $id){
        $validated = $request->validate([
            'payment_id' => 'required|exists:payments,id',
            'amount' => 'required|numeric|min:1',
        ]);
    
        // Cari payment dan user terkait
        $payment = Payment::findOrFail($validated['payment_id']);
        $user = $payment->applyJob->user;
    
        // Tambahkan saldo ke user
        $user->increment('saldo', $validated['amount']);
    
        // Update status payment menjadi 'paid'
        $payment->update([
            'status' => 'paid',
        ]);
    
        return redirect()->back()->with('success', 'Payment successfully processed.');
    }
}
