<?php
// Cart actions
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('/cart/{id}/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/contact', [PageController::class, 'contact']);
Route::post('/contact', [PageController::class, 'send'])->name('contact.submit');

Route::get('/shop', [ProductController::class, 'index'])->name('user.products.index');
Route::get('/shop/product/{slug}/{product}', [ProductController::class, 'show'])->name('user.products.show');

Route::get('/categories', [CategoryController::class, 'index']);
//Route::get('/shop', [CategoryController::class, 'show'])->name('category.products');


Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
});

// User order history and details
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});
