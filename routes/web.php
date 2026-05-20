<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Public
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;

// Landing page publik (tidak perlu login)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Katalog Produk
Route::get('/katalog', [ProductController::class, 'index'])->name('katalog');
Route::get('/katalog/{product:slug}', [ProductController::class, 'show'])->name('katalog.show');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/admin.php';

/*
|--------------------------------------------------------------------------
| Auth Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
