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
Route::prefix('siswa')->name('siswa.')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])
        ->name('dashboard');

    // AJUKAN KONSELING ✅ (INI YANG TADI KEHAPUS)
    Route::get('/konseling/ajukan', [KonselingController::class, 'create'])
        ->name('konseling.ajukan');

    Route::post('/konseling/store', [KonselingController::class, 'store'])
        ->name('konseling.store');

// RIWAYAT SISWA
Route::get('/riwayat', [RiwayatController::class, 'indexSiswa'])
    ->name('riwayat.index');

Route::get('/riwayat/{id}', [RiwayatController::class, 'showSiswa'])
    ->name('riwayat.detail');

    // PROFIL
    Route::get('/profil', [SiswaController::class, 'profil'])
        ->name('profil');

    Route::post('/profil/update', [SiswaController::class, 'updateProfil'])
        ->name('profil.update');
});




// ========================
// GURU BK
// ========================
Route::get('/guru/dashboard', [GuruController::class, 'dashboard']);
Route::get('/guru/dashboard', [GuruController::class, 'dashboard']);
Route::get('/guru/konseling', [KonselingController::class, 'index']);
Route::get('/guru/konseling/{id}', [KonselingController::class, 'show']);
 Route::get('/guru/riwayat', [RiwayatController::class, 'indexGuru']);
Route::get('/guru/riwayat/{id}', [RiwayatController::class, 'showGuru']);