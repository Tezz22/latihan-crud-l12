<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [BarangController::class, 'index']);
// Route::post('/barangs', [BarangController::class, 'store']);
// Route::put('/barangs/{barang}', [BarangController::class, 'update']);
// Route::delete('/barangs/{barang}', [BarangController::class, 'destroy']);
Route::get('/', function () {
    return redirect()->route('barangs.index');
});
Route::resource('barangs', BarangController::class)->only([
    'index', 'store', 'update', 'destroy'
]);
Route::resource('suppliers', SupplierController::class)->only([
    'index', 'store', 'update', 'destroy'
]);
Route::resource('transaksis', TransaksiController::class)->only([
    'index', 'store', 'destroy']);