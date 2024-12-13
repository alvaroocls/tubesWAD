<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('landing');
})->name('landing') ;

Route::get('/login',function(){
    return view('registration.login');
}) -> name('login');

Route::get('/register',function(){
    return view('registration.register');
})->name('register');

Route::post('/register',[UserController::class,'store'])->name('registration.store');