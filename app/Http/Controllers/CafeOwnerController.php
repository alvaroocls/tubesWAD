<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CafeOwner;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CafeOwnerController extends Controller
{
    public function index()
    {
        $cafe = User::where('id', auth()->id())->first();
        return view('cafeOwner.profile.index', compact('cafeOwner'));
    }
    public function show()
    {
        $cafe = CafeOwner::where('user_id', auth()->id())->first();

        if (!$cafe) {
        // Jika tidak ada data musician, redirect atau tampilkan pesan
        return redirect()->route('cafeOwner.profile.create')->with('error', 'Profile not found, please create one.');
    }

        return view('cafeOwner.profile.show', compact('cafeOwner'));
    }
    
}
