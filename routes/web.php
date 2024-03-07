<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//carpart controller
use App\Http\Controllers\Admin\CarPartController as AdminCarPartController;
use App\Http\Controllers\User\CarPartController as UserCarPartController;

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

Route::resource('Admin/carparts', AdminCarPartController::class)->middleware(['auth'])->names('admin.carparts'); //middleware is responible for authencating and forcing the user to log in, removing this we can make it so that a user can be classed as 'guest' so they do not have to log in, unless they want too.
Route::resource('User/carparts', UserCarPartController::class)->middleware(['auth'])->names('user.carparts'); 

require __DIR__.'/auth.php';
