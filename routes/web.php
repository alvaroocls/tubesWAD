<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostingJobController;
use App\Http\Controllers\ApplyJobController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MusicianController;
use App\Http\Controllers\CafeOwnerController;
use Illuminate\Support\Facades\Auth;

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

Route::post('/logout', function () {
    Auth::logout(); 
    return redirect('/login');
})->name('logout');




Route::middleware('auth')->group(function () {
    Route::get('/musician/dashboard',function(){
        return view('musician.dashboard');
    })->name('musician.dashboard');


    Route::middleware(['auth'])->group(function () {
        Route::get('/musician/profile', [MusicianController::class, 'index'])->name('musician.profile.index');
        Route::get('/musician/profile/create', [MusicianController::class, 'create'])->name('musician.profile.create');
        Route::post('musician/profile/create', [MusicianController::class, 'store'])->name('musician.profile.store');
        Route::get('/musician/{id}/profile', [MusicianController::class, 'show'])->name('musician.profile.show');
        Route::get('/musician/{id}/profile/edit', [MusicianController::class, 'edit'])->name('musician.profile.edit');
        Route::put('/musician/{id}/profile/update', [MusicianController::class, 'update'])->name('musician.profile.update');
        Route::delete('/musician/{id}/profile/delete', [MusicianController::class, 'destroy'])->name('musician.profile.destroy');
    });
    // Route::get('/musician/profile',function(){
    //     return view('musician.profile');
    // })->name('musician.profile');

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

    Route::get('/cafeOwner/postingjob/{id}',[PostingJobController::class,'show'])->name('cafeOwner.postingjob.show');

    Route::get('/cafeOwner/postingjob/{id}/edit', [PostingJobController::class, 'edit'])->name('cafeOwner.postingjob.edit');

    Route::put('/cafeOwner/postingjob/{id}', [PostingJobController::class, 'update'])->name('cafeOwner.postingjob.update');

    Route::delete('/cafeOwner/postingjob/{id}', [PostingJobController::class, 'destroy'])->name('cafeOwner.postingjob.destroy');

    Route::get('/cafeOwner/postingjob/{id}/applicants', [PostingJobController::class, 'applicants'])->name('cafeOwner.postingjob.applicants');

    Route::put('/cafeOwner/postingJob/applicants/{id}/update', [PostingJobController::class, 'updateStatus'])->name('cafeOwner.postingJob.applicants.update');

    // Posting job section

    Route::middleware(['auth'])->group(function () {
        Route::get('/cafeOwner/profile', [CafeOwnerController::class, 'index'])->name('cafeOwner.profile.index');
        Route::get('/cafeOwner/profile/create', [CafeOwnerController::class, 'create'])->name('cafeOwner.profile.create');
        Route::post('/cafeOwner/profile/create', [CafeOwnerController::class, 'store'])->name('cafeOwner.profile.store');
        Route::get('/cafeOwner/{id}/profile', [CafeOwnerController::class, 'show'])->name('cafeOwner.profile.show');
        Route::get('/cafeOwner/{id}/profile/edit', [CafeOwnerController::class, 'edit'])->name('cafeOwner.profile.edit');
        Route::put('/cafeOwner/{id}/profile/update', [CafeOwnerController::class, 'update'])->name('cafeOwner.profile.update');
        Route::delete('/cafeOwner/{id}/profile/delete', [CafeOwnerController::class, 'destroy'])->name('cafeOwner.profile.destroy');
    });
    
    

    // Route::get('/cafeOwner/profile',function(){
    //     return view('cafeOwner.profile');
    // })->name('cafeOwner.profile');

    Route::get('/cafeOwner/review',function(){
        return view('cafeOwner.review');
    })->name('cafeOwner.review');

    Route::get('/cafeOwner/payment', [PaymentController::class, 'index'])->name('cafeOwner.payment.index');


    Route::get('/jobs', [ApplyJobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [ApplyJobController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{id}/apply', [ApplyJobController::class, 'apply'])->name('jobs.apply');
    Route::delete('/jobs/{id}/cancel', [ApplyJobController::class, 'cancel'])->name('jobs.cancel');
    Route::get('/jobs/{id}/edit', [ApplyJobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [ApplyJobController::class, 'update'])->name('jobs.update');
    Route::get('/showapply', [ApplyJobController::class, 'showAppliedJobs'])->name('jobs.showapply');
});




