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
});
