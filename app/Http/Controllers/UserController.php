<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        return redirect()->route('register')->with('success', 'Registration successful! Please log in to continue.');
    }

    public function loginAuth(AuthUserRequest $request)
    {  
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){

            #check if user is musician or cafeOwner
            if(Auth::user()->isMusician()){
                return redirect()->route('musician.dashboard');
            }elseif(Auth::user()->isCafeOwner()){
                return redirect()->route('cafeOwner.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

}
