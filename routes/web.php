<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ListingController::class,'index'])->name('listing.index');

Route::get('/listings/create', [ListingController::class,'create'])->name('listing.create');

Route::get('/listings/{listing}/show', [ListingController::class,'show'])->name('listing.show');

Route::post('/listings', [ListingController::class,'store'])->name('listing.store');

Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->name('listing.edit');

Route::patch('/listings/{listing}', [ListingController::class,'update'])->name('listing.update');

Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->name('listing.delete');
