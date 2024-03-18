<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//carpart controller
use App\Http\Controllers\Admin\CarPartController as AdminCarPartController;
use App\Http\Controllers\Admin\DecisionController as AdminDecisionController;





use App\Http\Controllers\User\CarPartController as UserCarPartController;
use App\Http\Controllers\User\DecisionController as UserDecisionController; 


//both of these welcome adminstrate for logged in users and guests
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


Route::resource('Admin/carparts', AdminCarPartController::class)->middleware(['auth'])->names('admin.carparts'); //middleware is responible for authencating and forcing the user to log in, removing this we can make it so that a user can be classed as 'guest' so they do not have to log in, unless they want too.
Route::resource('carparts', UserCarPartController::class)->names('user.carparts');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::view('/admin/welcome', 'admin.welcome')->name('admin.welcome');
});

///decisions users and guests DONT FUCKING TOUCH THESE
Route::middleware('auth')->group(function () {
    Route::get('/decisions/create', [UserDecisionController::class, 'create'])->name('decisions.create');
    Route::post('/decisions', [UserDecisionController::class, 'store'])->name('decisions.store');
});
Route::get('/decisions/{id}', [UserDecisionController::class, 'show'])->name('decisions.show');
Route::get('/user/decisions/past_forms', [UserDecisionController::class, 'index'])->name('user.decisions.past_forms');
// Change your route definition to accept the ID
Route::delete('/decisions/{id}', [UserDecisionController::class, 'destroy'])->name('decisions.destroy');





//admin routes
require __DIR__.'/auth.php';


//this routes all the views in admin -> decisions folder
Route::middleware(['auth'])->group(function () {
    Route::resource('Admin/decisions', AdminDecisionController::class)->names('admin.decisions');
});

Route::post('/admin/decisions/{id}/submit', [AdminDecisionController::class, 'updateStatus'])->name('admin.decisions.submit');

Route::get('/admin/decisions/decided', [AdminDecisionController::class, 'index'])->name('admin.decisions.decided');




// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
