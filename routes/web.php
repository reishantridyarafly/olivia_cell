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

    Route::get('/rekening', [App\Http\Controllers\Backend\BankAccountController::class, 'index'])->name('account.index');
    Route::get('/rekening/tambah', [App\Http\Controllers\Backend\BankAccountController::class, 'create'])->name('account.create');
    Route::get('/rekening/{id}/edit', [App\Http\Controllers\Backend\BankAccountController::class, 'edit'])->name('account.edit');
    Route::post('/rekening', [App\Http\Controllers\Backend\BankAccountController::class, 'store'])->name('account.store');
    Route::delete('/rekening/{id}', [App\Http\Controllers\Backend\BankAccountController::class, 'destroy'])->name('account.destroy');

    Route::get('/pelanggan', [App\Http\Controllers\Backend\CustomersController::class, 'index'])->name('customers.index');
    Route::post('/pelanggan', [App\Http\Controllers\Backend\CustomersController::class, 'store'])->name('customers.store');
    Route::post('/pelanggan/updateStatus', [App\Http\Controllers\Backend\CustomersController::class, 'updateStatus'])->name('customers.updateStatus');
    Route::get('/pelanggan/{id}/edit', [App\Http\Controllers\Backend\CustomersController::class, 'edit'])->name('customers.edit');
    Route::delete('/pelanggan/{id}', [App\Http\Controllers\Backend\CustomersController::class, 'destroy'])->name('customers.destroy');

    Route::get('/pengguna', [App\Http\Controllers\Backend\UsersController::class, 'index'])->name('users.index');
    Route::post('/pengguna', [App\Http\Controllers\Backend\UsersController::class, 'store'])->name('users.store');
    Route::post('/pengguna/updateStatus', [App\Http\Controllers\Backend\UsersController::class, 'updateStatus'])->name('users.updateStatus');
    Route::get('/pengguna/{id}/edit', [App\Http\Controllers\Backend\UsersController::class, 'edit'])->name('users.edit');
    Route::delete('/pengguna/{id}', [App\Http\Controllers\Backend\UsersController::class, 'destroy'])->name('users.destroy');
});
