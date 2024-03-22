<?php

// use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Carpart controller
use App\Http\Controllers\Admin\CarPartController as AdminCarPartController;
use App\Http\Controllers\Admin\DecisionController as AdminDecisionController;

// Basket controller
use App\Http\Controllers\BasketController;

// User controllers
use App\Http\Controllers\User\CarPartController as UserCarPartController;
use App\Http\Controllers\User\DecisionController as UserDecisionController; 

// Define routes

// Welcome routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Register route
// Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Admin routes

// CARPARTS ADMIN VIEWS
Route::resource('Admin/carparts', AdminCarPartController::class)->middleware(['auth'])->names('admin.carparts');
Route::get('Admin/carparts/{id}', [UserCarPartController::class, 'show'])->name('admin.carparts.show');

// CARPARTS USER VIEWS
Route::resource('carparts', UserCarPartController::class)->names('user.carparts');
Route::get('/carparts/{id}', [UserCarPartController::class, 'show'])->name('user.carparts.show');

// Basket routes
Route::get('/basket', [BasketController::class, 'index'])->name('user.basket.index');
Route::post('/basket/add/{car_part_id}', [BasketController::class, 'addToBasket'])->name('user.basket.add');
Route::delete('/basket/remove/{car_part_id}', [BasketController::class, 'removeFromBasket'])->name('user.basket.remove');

// DECISIONS USER
Route::middleware('auth')->group(function () {
    Route::get('/decisions/create', [UserDecisionController::class, 'create'])->name('decisions.create');
    Route::post('/decisions', [UserDecisionController::class, 'store'])->name('decisions.store');
});

Route::get('/decisions/{id}', [UserDecisionController::class, 'show'])->name('decisions.show');
Route::get('/user/decisions/past_forms', [UserDecisionController::class, 'index'])->name('user.decisions.past_forms');
Route::delete('/decisions/{id}', [UserDecisionController::class, 'destroy'])->name('decisions.destroy');

// DECISIONS ADMIN
Route::middleware(['auth'])->group(function () {
    Route::resource('Admin/decisions', AdminDecisionController::class)->names('admin.decisions');
});

// Custom DECISIONS ADMIN routes
Route::post('/admin/decisions/{id}/submit', [AdminDecisionController::class, 'updateStatus'])->name('admin.decisions.submit');
Route::get('/admin/decisions/decided', [AdminDecisionController::class, 'index'])->name('admin.decisions.decided');

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth routes
require __DIR__.'/auth.php';
