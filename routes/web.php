<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| USER FRONT PAGE
|--------------------------------------------------------------------------
*/

// HOME
Route::get('/', function () {
    $best_sellers = Product::take(4)->get();
    return view('home', compact('best_sellers'));
})->name('home');

// MENU PAGE
Route::get('/menu', [ProductController::class, 'index'])
    ->name('menu.index');

// DETAIL PRODUK
Route::get('/product/{id}', [ProductController::class, 'show'])
    ->name('product.show');

// ABOUT PAGE
Route::get('/about', function () {
    return view('about');
})->name('about');


/*
|--------------------------------------------------------------------------
| USER DASHBOARD (BREEZE DEFAULT)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| USER PROFILE (EDIT / UPDATE / DELETE)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN / REGISTER)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
