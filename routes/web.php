<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Log in routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/product', function () {
    return view('product');
})->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// CRUD
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/create', [ProductController::class, 'store']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
Route::post('/product/{id}/delete', [ProductController::class, 'destroy'])->name('product.delete');
