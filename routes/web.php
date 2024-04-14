<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\FormRequests;

use Illuminate\Support\Facades\Route;



Route::GET('/', [LandingController::class, 'index'])->name('landing.create');

Route::POST('/', [LandingController::class, 'create'])->name('landing.create');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::GET('/employers', [EmployerController::class, 'index'])->name('user.index')->middleware('can:admin');
    Route::GET('/employer/{user}', [EmployerController::class, 'edit'])->name('user.edit')->middleware('can:admin');
    Route::GET('/employers/create', [EmployerController::class, 'create'])->name('user.create')->middleware('can:admin');
    Route::POST('/employers/create', [EmployerController::class, 'store'])->name('user.store')->middleware('can:admin');
    Route::POST('/employers', [EmployerController::class, 'search'])->name('user.search')->middleware('can:admin');

    Route::delete('/employer/{user}', [EmployerController::class, 'destroy'])->name('users.destroy')->middleware('can:admin');
    Route::PUT('/employer/{user}', [EmployerController::class, 'update'])->name('user.update')->middleware('can:admin');



    Route::GET('/requests', [FormRequests::class, 'index'])->name('request.index');
    Route::GET('/request/{formrequest}', [FormRequests::class, 'edit'])->name('request.edit');

    Route::POST('/requests', [FormRequests::class, 'search'])->name('request.search');

    Route::PUT('/request/{formrequest}', [FormRequests::class, 'update'])->name('request.update');
    Route::delete('/request/{formrequest}', [FormRequests::class, 'destroy'])->name('request.destroy');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
