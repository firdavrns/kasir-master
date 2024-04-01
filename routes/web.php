<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'loginProcess'])->name('auth.login.process');
Route::get('/auth/registration', [AuthController::class, 'registration'])->name('auth.registration');
Route::post('/auth/registration', [AuthController::class, 'registrationProcess'])->name('auth.registration.process');
Route::get('/auth/logout', [AuthController::class, 'logoutProcess'])->name('auth.logout.process');

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/produk/update', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');

    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::post('/pengguna/update', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::get('/pengguna/delete/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');

    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::post('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::post('/pelanggan/update', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'delete'])->name('pelanggan.delete');

    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('/pembelian/regenerate', [PembelianController::class, 'regenerate'])->name('pembelian.regenerate');
    Route::post('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::get('/pembelian/delete/{id}', [PembelianController::class, 'delete'])->name('pembelian.delete');

    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/process', [LaporanController::class, 'process'])->name('laporan.process');
});
