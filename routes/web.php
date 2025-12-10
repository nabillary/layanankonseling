<?php

use Illuminate\Support\Facades\Route;

// Import Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\RiwayatController;


// Landing Page
Route::get('/', function () {
    return view('home');
});


// ========================
// LOGIN
// ========================
Route::get('/login/siswa', [AuthController::class, 'loginSiswaPage']);
Route::post('/login/siswa', [AuthController::class, 'loginSiswa']);

Route::get('/login/guru', [AuthController::class, 'loginGuruPage']);
Route::post('/login/guru', [AuthController::class, 'loginGuru']);


// ========================
// SISWA
// ========================
Route::middleware('auth:siswa')->group(function () {

    Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard']);

    Route::get('/siswa/konseling/ajukan', [KonselingController::class, 'create']);
    Route::post('/siswa/konseling/store', [KonselingController::class, 'store']);

    Route::get('/siswa/riwayat', [RiwayatController::class, 'index']);
    Route::get('/siswa/riwayat/{id}', [RiwayatController::class, 'show']);

});


// ========================
// GURU BK
// ========================
Route::middleware('auth:guru')->group(function () {

    Route::get('/guru/dashboard', [GuruController::class, 'dashboard']);

    Route::get('/guru/konseling', [KonselingController::class, 'index']);
    Route::get('/guru/konseling/{id}', [KonselingController::class, 'show']);
    Route::post('/guru/konseling/solusi/{id}', [KonselingController::class, 'solusi']);

    Route::post('/guru/riwayat/add/{id}', [RiwayatController::class, 'store']);

});
