<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'prosesLogin']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'showDashboard']);
    Route::post('/logout', [AuthController::class, 'logout']);
});