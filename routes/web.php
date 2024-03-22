<?php

// use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Carpart controller
use App\Http\Controllers\Admin\CarPartController as AdminCarPartController;
use App\Http\Controllers\Admin\DecisionController as AdminDecisionController;

// Basket controller
use App\Http\Controllers\Admin\BasketController as AdminBasketController;
use App\Http\Controllers\User\BasketController as UserBasketController;


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


// Admin routes

// CARPARTS ADMIN VIEWS
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/carparts/create', [AdminCarPartController::class, 'create'])->name('admin.carparts.create');
    Route::get('/admin/carparts/index', [AdminCarPartController::class, 'index'])->name('admin.carparts.index');
    Route::post('/admin/carparts', [AdminCarPartController::class, 'store'])->name('admin.carparts.store');
    Route::get('/admin/carparts/{id}', [AdminCarPartController::class, 'show'])->name('admin.carparts.show');
    Route::get('/admin/carparts/{id}/edit', [AdminCarPartController::class, 'edit'])->name('admin.carparts.edit');
    Route::put('/admin/carparts/{id}', [AdminCarPartController::class, 'update'])->name('admin.carparts.update');
    Route::delete('/admin/carparts/{id}', [AdminCarPartController::class, 'destroy'])->name('admin.carparts.destroy');
});


// CARPARTS USER VIEWS
Route::resource('carparts', UserCarPartController::class)->names('user.carparts');
Route::get('/carparts/{id}', [UserCarPartController::class, 'show'])->name('user.carparts.show');

// Basket routes USER
Route::get('/basket', [UserBasketController::class, 'index'])->name('user.basket.index');
Route::post('/basket/add/{car_part_id}', [UserBasketController::class, 'addToBasket'])->name('user.basket.add');
Route::delete('/basket/remove/{car_part_id}', [UserBasketController::class, 'removeFromBasket'])->name('user.basket.remove');

// Basket routes ADMIN
Route::get('ADMIN/basket', [UserBasketController::class, 'index'])->name('admin.basket.index');
Route::post('ADMIN/basket/add/{car_part_id}', [UserBasketController::class, 'addToBasket'])->name('admin.basket.add');
Route::delete('ADMIN/basket/remove/{car_part_id}', [UserBasketController::class, 'removeFromBasket'])->name('admin.basket.remove');


// DECISIONS USER
Route::middleware('auth')->group(function () {
    Route::get('/user/decisions/create', [UserDecisionController::class, 'create'])->name('user.decisions.create');
    Route::post('/user/decisions', [UserDecisionController::class, 'store'])->name('user.decisions.store');
});
Route::get('/decisions/{id}', [UserDecisionController::class, 'show'])->name('decisions.show');
Route::get('/user/decisions/past_forms', [UserDecisionController::class, 'index'])->name('user.decisions.past_forms');
Route::delete('/decisions/{id}', [UserDecisionController::class, 'destroy'])->name('decisions.destroy');


// DECISIONS ADMIN
Route::middleware(['auth'])->group(function () {
    Route::resource('Admin/decisions', AdminDecisionController::class)->names('admin.decisions');
});
Route::middleware('auth')->group(function () {
    Route::get('/admin/decisions/create', [AdminDecisionController::class, 'create'])->name('admin.decisions.create');
    Route::post('/admin/decisions', [AdminDecisionController::class, 'store'])->name('admin.decisions.store');
});
Route::post('/admin/decisions/{id}/submit', [AdminDecisionController::class, 'updateStatus'])->name('admin.decisions.submit');
Route::get('/admin/decisions/decided', [AdminDecisionController::class, 'index'])->name('admin.decisions.decided');

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth routes
require __DIR__.'/auth.php';
