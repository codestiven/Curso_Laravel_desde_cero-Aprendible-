<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Chirp;
use App\Http\Controllers\ChirpController;

Route::view( '/', 'welcome') ->name('welcome'); ;

// Route::get('/Chirps', function () {
//     return "coa coal";
// });




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');







    // Route::get('/Chirps/{chirp?}', function ($chirp = null) {
    // if($chirp == "coca cola") {
    //     return to_route('Chirps');
    // }

    // return view('cositas', ['chirp' => $chirp]);

    // }) ->name('Chirps');

    Route::get('/Chirps', [ChirpController::class, 'index']) ->name('Chirps');

    Route::post('/Chirps', [ChirpController::class, 'store']) ->name('Chirps');

    Route::get('/Chirps/{chirp}/edit', [ChirpController::class, 'edit']) ->name('chirps.edit');

    Route::put('/Chirps/{chirp}', [ChirpController::class, 'update']) ->name('chirps.update');

    Route::delete('/Chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');

    








});



require __DIR__.'/auth.php';
