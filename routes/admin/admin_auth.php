<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\auth\AdminAuthController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
Route::middleware(['admin.auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [AdminAuthController::class, 'dashboard'])->name('dashboard');
});
});

Route::middleware(['admin.auth'])->prefix('admin/dashboard')->name('admin.')->group(function () {
    Route::get('roles', [RolePermissionController::class, 'index'])->name('roles.index');
    Route::post('roles/', [RolePermissionController::class, 'update'])->name('roles.update');
    Route::post('/users/{id}/change-role', [RolePermissionController::class, 'changeRole'])->name('users.changeRole');

    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}/edit', [AdminController::class, 'update'])->name('users.update');

    Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::post('/users/create', [AdminController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}/delete', [AdminController::class, 'delete'])->name('users.delete');

    Route::get('/my-user-list', [UserController::class, 'create'])->name('my.users.index');
    Route::get('/my-user-list/{id}', [UserController::class, 'show'])->name('my.users.show');
    Route::delete('/my-user-list/bulk-delete', [UserController::class, 'bulkDelete'])->name('my.users.bulk.delete');


});

Route::middleware('admin.auth')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');

    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [AdminProfileController::class, 'passwordUpdate'])->name('password.update');
});


