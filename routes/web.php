<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostingJobController;
use App\Http\Controllers\ApplyJobController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
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

    Route::get('/cafeOwner/postingjob/{id}',[PostingJobController::class,'show'])->name('cafeOwner.postingjob.show');

    Route::get('/cafeOwner/postingjob/{id}/edit', [PostingJobController::class, 'edit'])->name('cafeOwner.postingjob.edit');

    Route::put('/cafeOwner/postingjob/{id}', [PostingJobController::class, 'update'])->name('cafeOwner.postingjob.update');

    Route::delete('/cafeOwner/postingjob/{id}', [PostingJobController::class, 'destroy'])->name('cafeOwner.postingjob.destroy');

    Route::get('/cafeOwner/postingjob/{id}/applicants', [PostingJobController::class, 'applicants'])->name('cafeOwner.postingjob.applicants');

    Route::put('/cafeOwner/postingJob/applicants/{id}/update', [PostingJobController::class, 'updateStatus'])->name('cafeOwner.postingJob.applicants.update');

    // Posting job section

    Route::get('/cafeOwner/profile',function(){
        return view('cafeOwner.profile');
    })->name('cafeOwner.profile');

    Route::get('/cafeOwner/review',function(){
        return view('cafeOwner.review');
    })->name('cafeOwner.review');

    Route::get('/cafeOwner/payment', [PaymentController::class, 'index'])->name('cafeOwner.payment.index');

    Route::put('cafeOwner/payment/{id}', [PaymentController::class, 'pay'])->name('cafeOwner.payment.pay');



    Route::get('/jobs', [ApplyJobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [ApplyJobController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{id}/apply', [ApplyJobController::class, 'apply'])->name('jobs.apply');
    Route::delete('/jobs/{id}/cancel', [ApplyJobController::class, 'cancel'])->name('jobs.cancel');
    Route::get('/jobs/{id}/edit', [ApplyJobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [ApplyJobController::class, 'update'])->name('jobs.update');
    Route::get('/showapply', [ApplyJobController::class, 'showAppliedJobs'])->name('jobs.showapply');


    Route::middleware(['auth'])->prefix('musician/reviews')->group(function () {
        Route::get('/', [ReviewController::class, 'indexForMusicians'])->name('musician.review');
        Route::get('/reviewcafe', [ReviewController::class,'showCreate'])->name('musician.review.create');
        Route::post('/',[ReviewController::class,'createReviewForMusician'])->name('musician.review.store');
        Route::get('review/edit/{id}', [ReviewController::class, 'edit'])->name('musician.review.edit');
        Route::put('review/update/{id}', [ReviewController::class, 'update'])->name('musician.review.update');
        Route::delete('review/destroy/{id}', [ReviewController::class, 'destroy'])->name('musician.review.destroy');
    });
    
    Route::middleware(['auth'])->prefix('cafeOwner/reviews')->group(function () {
        Route::get('/', [App\Http\Controllers\ReviewController::class, 'indexForCafes'])->name('cafeOwner.review');
        Route::get('/create', [App\Http\Controllers\ReviewController::class, 'showCreateCafe'])->name('cafeOwner.review.create');
        Route::post('/', [ReviewController::class, 'createReviewForCafe'])->name('cafeOwner.review.store');
        Route::get('/{id}/edit', [App\Http\Controllers\ReviewController::class, 'edit'])->name('cafeOwner.review.edit');
        Route::put('/{id}', [App\Http\Controllers\ReviewController::class, 'update'])->name('cafeOwner.review.update');
        Route::delete('/{id}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('cafeOwner.review.destroy');
    });

});