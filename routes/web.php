<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NewsController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('loginproses', 'loginproses')->name('loginproses');
    Route::get('logout', 'logout')->name('logout');
});


Route::middleware(['auth', 'checkrole'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/user/{user}/update-password', [UserController::class, 'updatePasswordForm'])
        ->name('user.updatePasswordForm');
    Route::patch('/user/{user}/update-password', [UserController::class, 'updatePassword'])
        ->name('user.updatePassword');

    Route::resource('user', UserController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('profil', ProfilController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('kategori', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product-image', ProductImageController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('news', NewsController::class);
});
