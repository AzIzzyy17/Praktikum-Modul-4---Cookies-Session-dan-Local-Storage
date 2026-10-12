<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'processLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', [ProductController::class, 'index']);
Route::get('/keranjang/tambah-produk/{id}', [ProductController::class, 'tambahKeranjang']);
Route::get('/keranjang', [ProductController::class, 'keranjang']);
Route::get('/keranjang/hapus/{id}', [ProductController::class, 'hapusKeranjang']);
Route::get('/keranjang/kosongkan', [ProductController::class, 'kosongkanKeranjang']);

Route::post('/checkout', [OrderController::class, 'checkout']);
Route::get('/riwayat-pesanan', [OrderController::class, 'riwayat']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'processRegister']);

Route::get('/', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');