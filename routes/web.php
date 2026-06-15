<?php

use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\DokterController;

Route::get('/', [poliController::class, 'index']);
Route::get('/dokter/trash', [DokterController::class, 'trash'])
    ->name('dokter.trash');
Route::resource('/poli', PoliController::class);
Route::resource('/pasien', PasienController::class);
Route::resource('/dokter', DokterController::class);