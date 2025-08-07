<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRatingController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\Services\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BkashController;


Route::post('/cart/{id}/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/contact', [PageController::class, 'contact']);
Route::post('/contact', [PageController::class, 'send'])->name('contact.submit');

Route::get('/shop', [ProductController::class, 'index'])->name('shop.products.index');
Route::get('/shop/product/{slug}/{product}', [ProductController::class, 'show'])->name('shop.products.show');

Route::get('/categories', [CategoryController::class, 'categoryView']);


Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

    Route::get('/my-orders', [OrderController::class, 'index'])->name('my.orders.index');
    Route::get('/my-orders/{order}', [OrderController::class, 'show'])->name('my.orders.show');
    Route::patch('/my-orders/{order}/cancel', [OrderController::class, 'cancel'])->name('my.orders.cancel');

});
Route::post('/product/{product}/rating', [ProductRatingController::class, 'store'])->name('product.rating.store');
Route::post('/product/{product}/review', [ProductReviewController::class, 'store'])->name('product.review.store');


Route::get('/ssl-checkout', [PaymentController::class, 'create']);
Route::post('/ssl-checkout', [PaymentController::class, 'sslCheckout']);
Route::any('/ssl/success', [PaymentController::class, 'sslSuccess'])->name('ssl.success');
Route::any('/ssl/fail', [PaymentController::class, 'sslFail'])->name('ssl.fail');
Route::post('/ssl/cancel', [PaymentController::class, 'sslCancel'])->name('ssl.cancel');


Route::get('/bkash/checkout', [BkashController::class, 'checkout']);
Route::get('/bkash/token', [BkashController::class, 'getToken']);
Route::post('/bkash/pay', [BkashController::class, 'makePayment']);
