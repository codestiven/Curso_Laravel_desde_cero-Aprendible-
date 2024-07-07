<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    Route::view('/Chirps', 'cositas') ->name('Chirps');

    Route::post('/Chirps', function () {

        $message = request("message");
        // insert the message into the database
    });








});



require __DIR__.'/auth.php';
