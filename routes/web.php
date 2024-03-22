<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//carpart controller
use App\Http\Controllers\Admin\CarPartController as AdminCarPartController;
use App\Http\Controllers\Admin\DecisionController as AdminDecisionController;

//basketContrller

use App\Http\Controllers\BasketController;



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



//admin routes
require __DIR__.'/auth.php';

//CARPARTS ADMIN VIEWS
Route::resource('Admin/carparts', AdminCarPartController::class)->middleware(['auth'])->names('admin.carparts');
Route::get('Admin/carparts/{id}', [UserCarPartController::class, 'show'])->name('admin.carparts.show');

//CARPARTS USER VIEWS
Route::resource('carparts', UserCarPartController::class)->names('user.carparts');
Route::get('/carparts/{id}', [UserCarPartController::class, 'show'])->name('user.carparts.show');


//basket
Route::get('/basket', [BasketController::class, 'index'])->name('user.basket.index');
Route::post('/basket/add/{car_part_id}', [BasketController::class, 'addToBasket'])->name('user.basket.add');
Route::delete('/basket/remove/{car_part_id}', [BasketController::class, 'removeFromBasket'])->name('user.basket.remove');





///DECISIONS USER
Route::middleware('auth')->group(function () {
    Route::get('/decisions/create', [UserDecisionController::class, 'create'])->name('decisions.create');
    Route::post('/decisions', [UserDecisionController::class, 'store'])->name('decisions.store');
});
Route::get('/decisions/{id}', [UserDecisionController::class, 'show'])->name('decisions.show');
Route::get('/user/decisions/past_forms', [UserDecisionController::class, 'index'])->name('user.decisions.past_forms');
Route::delete('/decisions/{id}', [UserDecisionController::class, 'destroy'])->name('decisions.destroy');


//Basket controller USER




//DECISIONS ADMIN
Route::middleware(['auth'])->group(function () {
    Route::resource('Admin/decisions', AdminDecisionController::class)->names('admin.decisions');
});

//needs own routes as laravel in built routing for crud doesnt account for foreign routes
Route::post('/admin/decisions/{id}/submit', [AdminDecisionController::class, 'updateStatus'])->name('admin.decisions.submit');
Route::get('/admin/decisions/decided', [AdminDecisionController::class, 'index'])->name('admin.decisions.decided');




// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
