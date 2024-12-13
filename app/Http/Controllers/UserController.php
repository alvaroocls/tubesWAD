<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
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
        
    }

}
