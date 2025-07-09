<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/dashboard')->group(function () {

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('orders', OrderController::class);

    Route::post('logout', [AdminController::class, 'destroy'])->name('admin.logout');
});
});

Route::middleware(['admin.auth','role:super_admin'])->prefix('admin/dashboard')->name('admin.')->group(function () {
    Route::get('roles', [RolePermissionController::class, 'index'])->name('roles.index');
    Route::post('roles/', [RolePermissionController::class, 'update'])->name('roles.update');
    Route::post('/users/{id}/change-role', [AdminController::class, 'changeRole'])->name('users.changeRole');

    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}/edit', [AdminController::class, 'update'])->name('users.update');

    Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::post('/users/create', [AdminController::class, 'store'])->name('users.store');

    Route::delete('/users/{id}/delete', [AdminController::class, 'delete'])->name('users.delete');

});

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);

//Route::middleware('admin.auth')->group(function () {
//    Route::get('admin2/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//});


