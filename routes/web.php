<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [BarangController::class, 'index']);
// Route::post('/barangs', [BarangController::class, 'store']);
// Route::put('/barangs/{barang}', [BarangController::class, 'update']);
// Route::delete('/barangs/{barang}', [BarangController::class, 'destroy']);
Route::resource('barangs', BarangController::class)->only([
    'index', 'store', 'update', 'destroy'
]);