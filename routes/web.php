<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Product;
use App\Models\Order;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\UserOrderController;

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

// CART PAGE
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// ABOUT PAGE
Route::get('/about', function () {
    return view('about');
})->name('about');


/*
|--------------------------------------------------------------------------
| USER DASHBOARD & ORDERS (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        $orders = Order::where('user_id', Illuminate\Support\Facades\Auth::id())
            ->with('items.product')
            ->latest()
            ->get();

        return view('dashboard', compact('orders'));
    })->name('dashboard');

    Route::get('/my-orders/{id}', [UserOrderController::class, 'show'])
        ->name('user.orders.show');

});


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
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::put('/orders/{id}', [AdminOrderController::class, 'update'])->name('orders.update');
});

require __DIR__ . '/auth.php';
