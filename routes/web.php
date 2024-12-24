<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostingJobController;

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


Route::get('/musician/portofolio',function(){
    return view('musician.portofolio');
})->name('musician.portofolio');





Route::get('/cafeOwner/dashboard',function(){
    return view('cafeOwner.dashboard');
})->name('cafeOwner.dashboard');

Route::get('/cafeOwner/filter',function(){
   return view('cafeOwner.filter');
}) -> name('cafeOwner.filter');


// Posting job section

Route::get('/cafeOwner/postingjob',[PostingJobController::class,'index'])->name('cafeOwner.postingjob.index');

Route::get('/cafeOwner/postingjob/create',[PostingJobController::class,'create'])->name('cafeOwner.postingjob.create');

Route::post('/cafeOwner/postingjob',[PostingJobController::class,'store'])->name('cafeOwner.postingjob.store');
// Posting job section




Route::get('/cafeOwner/profile',function(){
    return view('cafeOwner.profile');
})->name('cafeOwner.profile');

Route::get('/cafeOwner/review',function(){
    return view('cafeOwner.review');
})->name('cafeOwner.review');

use App\Http\Controllers\ApplyJobController;

Route::middleware('auth')->group(function () {
    Route::get('/jobs', [ApplyJobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [ApplyJobController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{id}/apply', [ApplyJobController::class, 'apply'])->name('jobs.apply');
    Route::delete('/jobs/{id}/cancel', [ApplyJobController::class, 'cancel'])->name('jobs.cancel');
    Route::get('/jobs/{id}/edit', [ApplyJobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [ApplyJobController::class, 'update'])->name('jobs.update');
    Route::get('/showapply', [ApplyJobController::class, 'showAppliedJobs'])->name('jobs.showapply');
});




