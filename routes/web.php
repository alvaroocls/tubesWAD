<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing') ;

Route::get('/login',function(){
    return view('registration.login');
}) -> name('login');

Route::get('/register',function(){
    return view('registration.register');
})->name('register');