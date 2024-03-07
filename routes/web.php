<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//carpart controller
use App\Http\Controllers\Admin\CarPartController as AdminCarPartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //place other routes here, will require a route to add to basket
});

Route::resource('Admin/carparts', AdminCarPartController::class)->middleware(['auth'])->names('admin.carparts'); //deleted / before admin might break


require __DIR__.'/auth.php';
