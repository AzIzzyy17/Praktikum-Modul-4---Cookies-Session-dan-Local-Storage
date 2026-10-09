<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeranjangController;

Route::get('/', [KeranjangController::class, 'index']);
Route::post('/tambah/{id}', [KeranjangController::class, 'tambah']);
Route::get('/keranjang', [KeranjangController::class, 'keranjang']);
Route::get('/keranjang/tambah/{id}', [KeranjangController::class, 'tambahJumlah']);
Route::get('/keranjang/kurang/{id}', [KeranjangController::class, 'kurangJumlah']);
Route::get('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus']);
Route::get('/keranjang/kosongkan', [KeranjangController::class, 'kosongkan']);