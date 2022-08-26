<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ListingController::class,'index'])->name('listing.index');

Route::get('/listings/create', [ListingController::class,'create'])->name('listing.create');

Route::get('/listings/{listing:title}', [ListingController::class,'show'])->name('listing.show');

Route::post('/listings', [ListingController::class,'store'])->name('listing.store');
