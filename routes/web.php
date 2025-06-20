<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OpenFoodFactsController;
use Illuminate\Support\Facades\Route;

// Authentication routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Product search routes
Route::get('/', [OpenFoodFactsController::class, 'index'])->name('products.search');
Route::post('/fetch', [OpenFoodFactsController::class, 'fetch'])->name('products.fetch');