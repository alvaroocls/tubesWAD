<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostingJobController;
use App\Http\Controllers\ApplyJobController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MusicianController;
use App\Http\Controllers\CafeOwnerController;
use App\Http\Controllers\PortfolioController;
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
    // Posting job section

    Route::get('/cafeOwner/profile',function(){
        return view('cafeOwner.profile');
    })->name('cafeOwner.profile');

    Route::get('/cafeOwner/review',function(){
        return view('cafeOwner.review');
    })->name('cafeOwner.review');

    Route::get('/jobs', [ApplyJobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [ApplyJobController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{id}/apply', [ApplyJobController::class, 'apply'])->name('jobs.apply');
    Route::get('/jobs/showapply', [ApplyJobController::class, 'showAppliedJobs'])->name('jobs.apply.view');
});




    Route::middleware(['auth'])->prefix('musician/portfolio')->group(function () {
        Route::get('/', [App\Http\Controllers\PortfolioController::class, 'index'])->name('musician.portfolio.index'); // READ: Lihat semua portofolio
        Route::get('/create', [App\Http\Controllers\PortfolioController::class, 'create'])->name('musician.portfolio.create'); // CREATE: Form tambah portofolio
        Route::post('/', [App\Http\Controllers\PortfolioController::class, 'store'])->name('musician.portfolio.store'); // CREATE: Simpan portofolio baru
        Route::get('/{id}/edit', [App\Http\Controllers\PortfolioController::class, 'edit'])->name('musician.portfolio.edit'); // UPDATE: Form edit portofolio
        Route::put('/{id}', [App\Http\Controllers\PortfolioController::class, 'update'])->name('musician.portfolio.update'); // UPDATE: Simpan perubahan portofolio
        Route::delete('/{id}', [App\Http\Controllers\PortfolioController::class, 'destroy'])->name('musician.portfolio.destroy'); // DELETE: Hapus portofolio
    });
    


    Route::middleware(['auth'])->group(function () {
        Route::get('/musician/profile', [MusicianController::class, 'index'])->name('musician.profile.index');
        Route::get('/musician/profile/create', [MusicianController::class, 'create'])->name('musician.profile.create');
        Route::post('musician/profile/create', [MusicianController::class, 'store'])->name('musician.profile.store');
        Route::get('/musician/{id}/profile', [MusicianController::class, 'show'])->name('musician.profile.show');
        Route::get('/musician/{id}/profile/edit', [MusicianController::class, 'edit'])->name('musician.profile.edit');
        Route::put('/musician/{id}/profile/update', [MusicianController::class, 'update'])->name('musician.profile.update');
        Route::delete('/musician/{id}/profile/delete', [MusicianController::class, 'destroy'])->name('musician.profile.destroy');
    });


