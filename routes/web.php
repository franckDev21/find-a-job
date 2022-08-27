<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ListingController::class,'index'])->name('listing.index');

Route::middleware(['auth'])->group(function(){

    // Listings
    Route::get('/listings/create', [ListingController::class,'create'])->name('listing.create');

    Route::get('/listings/{listing}/show', [ListingController::class,'show'])->name('listing.show');

    Route::post('/listings', [ListingController::class,'store'])->name('listing.store');

    Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->name('listing.edit');

    Route::patch('/listings/{listing}', [ListingController::class,'update'])->name('listing.update');

    Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->name('listing.delete');

    // Logout
    Route::post('/logout',[UserController::class,'logout'])->name('logout');

    // Manager
    Route::get('/listings/manage',[ListingController::class,'manage'])->name('manage');
});

// Auth
Route::middleware(['guest'])->group(function(){
    Route::get('/register',[UserController::class,'create'])->name('register');

    Route::post('/register',[UserController::class,'store'])->name('register');

    Route::get('/login',[UserController::class,'login'])->name('login');

    Route::post('/login',[UserController::class,'authenticate'])->name('login');
});

