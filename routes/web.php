<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('landing');
})->name('landing') ;

Route::get('/login',function(){
    return view('registration.login');
}) -> name('login');

Route::post('login',[UserController::class,'loginAuth'])->name('login.auth');

Route::get('/register',function(){
    return view('registration.register');
})->name('register');

Route::post('/register',[UserController::class,'store'])->name('registration.store');






Route::get('/musician/dashboard',function(){
    return view('musician.dashboard');
})->name('musician.dashboard');

Route::get('/musician/profile',function(){
    return view('musician.profile');
})->name('musician.profile');

Route::get('/musician/filter',function(){
    return view('musician.filter');
})->name('musician.filter');

Route::get('/musician/review',function(){
    return view('musician.review');
})->name('musician.review');

Route::get('/musician/apply',function(){
    return view('musician.apply');
})->name('musician.apply');

Route::get('/musician/portofolio',function(){
    return view('musician.portofolio');
})->name('musician.portofolio');





Route::get('/cafeOwner/dashboard',function(){
    return view('cafeOwner.dashboard');
})->name('cafeOwner.dashboard');

Route::get('/cafeOwner/filter',function(){
   return view('cafeOwner.filter');
}) -> name('cafeOwner.filter');

Route::get('/cafeOwner/postingjob',function(){
    return view('cafeOwner.postingjob');
})->name('cafeOwner.postingjob');

Route::get('/cafeOwner/profile',function(){
    return view('cafeOwner.profile');
})->name('cafeOwner.profile');

Route::get('/cafeOwner/review',function(){
    return view('cafeOwner.review');
})->name('cafeOwner.review');
