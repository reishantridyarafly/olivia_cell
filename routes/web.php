<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'user-access:Administrator'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/katalog', [App\Http\Controllers\Backend\CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/katalog/tambah', [App\Http\Controllers\Backend\CatalogController::class, 'create'])->name('catalog.create');
    Route::get('/katalog/{id}/edit', [App\Http\Controllers\Backend\CatalogController::class, 'edit'])->name('catalog.edit');
    Route::post('/katalog', [App\Http\Controllers\Backend\CatalogController::class, 'store'])->name('catalog.store');
    Route::delete('/katalog/{id}', [App\Http\Controllers\Backend\CatalogController::class, 'destroy'])->name('catalog.destroy');

    Route::get('/produk', [App\Http\Controllers\Backend\ProductController::class, 'index'])->name('product.index');
    Route::get('/produk/tambah', [App\Http\Controllers\Backend\ProductController::class, 'create'])->name('product.create');
    Route::post('/produk', [App\Http\Controllers\Backend\ProductController::class, 'store'])->name('product.store');
    Route::post('/produk/updateStatus', [App\Http\Controllers\Backend\ProductController::class, 'updateStatus'])->name('product.updateStatus');
    Route::get('/produk/{id}/edit', [App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('product.edit');
    Route::post('/produk/{id}', [App\Http\Controllers\Backend\ProductController::class, 'update'])->name('product.update');
    Route::delete('/produk/{id}', [App\Http\Controllers\Backend\ProductController::class, 'destroy'])->name('product.destroy');
});
