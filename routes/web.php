<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//carpart controller
use App\Http\Controllers\Admin\CarPartController as AdminCarPartController;
use App\Http\Controllers\User\CarPartController as UserCarPartController;
use App\Http\Controllers\User\DecisionController as UserDecisionController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

    //place other routes here, will require a route to add to basket


Route::resource('Admin/carparts', AdminCarPartController::class)->middleware(['auth'])->names('admin.carparts'); //middleware is responible for authencating and forcing the user to log in, removing this we can make it so that a user can be classed as 'guest' so they do not have to log in, unless they want too.
Route::resource('carparts', UserCarPartController::class)->names('user.carparts');
Route::middleware('auth')->group(function () {
    Route::get('/decisions/create', [UserDecisionController::class, 'create'])->name('decisions.create');
    Route::post('/decisions', [UserDecisionController::class, 'store'])->name('decisions.store');
});

require __DIR__.'/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
