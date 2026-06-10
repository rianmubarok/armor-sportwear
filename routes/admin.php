<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Routes di sini dilindungi oleh dua middleware:
|   1. 'auth'  → user harus sudah login
|   2. 'admin' → user harus memiliki is_admin = true
|
| Semua route menggunakan prefix '/admin' dan name prefix 'admin.'
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Dashboard utama admin
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Manajemen Produk
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::delete('product-images/{productImage}', [\App\Http\Controllers\Admin\ProductImageController::class, 'destroy'])->name('product-images.destroy');

        // Manajemen Portofolio
        Route::resource('portfolios', \App\Http\Controllers\Admin\PortfolioController::class);

        // Manajemen Hero Image
        Route::resource('hero-images', \App\Http\Controllers\Admin\HeroImageController::class)->only(['index', 'create', 'store', 'destroy']);

        // Manajemen Pesanan
        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);

    });
