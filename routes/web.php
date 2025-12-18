<?php

use Illuminate\Support\Facades\Route;

// Import Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KonselingController as AdminKonselingController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;


// Landing Page
Route::get('/', function () {
    return view('home');
});


// ========================
// LOGIN
// ========================
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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




// ========================
// GURU
// ========================
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', [GuruController::class, 'dashboard']);
    Route::get('/guru/konseling', [KonselingController::class, 'index']);
    Route::get('/guru/konseling/{id}', [KonselingController::class, 'show']);
    Route::get('/guru/riwayat', [RiwayatController::class, 'indexGuru']);
    Route::get('/guru/riwayat/{id}', [RiwayatController::class, 'showGuru']);
    Route::get('/guru/profil', [GuruController::class, 'profil']);
    Route::post('/guru/profil/update', [GuruController::class, 'updateProfil']);
});


// ========================
// ADMIN
// ========================
Route::middleware(['auth', 'role:admin'])->group(function () {
   Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
    
    // Konseling (READ ONLY)
    Route::get('/admin/konseling', [AdminKonselingController::class, 'index']);
    Route::get('/admin/konseling/{id}', [AdminKonselingController::class, 'show']);

    // CRUD SISWA
    Route::get('/admin/siswa', [AdminSiswaController::class, 'index']);
    Route::get('/admin/siswa/create', [AdminSiswaController::class, 'create']);
    Route::post('/admin/siswa', [AdminSiswaController::class, 'store']);
    Route::get('/admin/siswa/{id}/edit', [AdminSiswaController::class, 'edit']);
    Route::put('/admin/siswa/{id}', [AdminSiswaController::class, 'update']);
    Route::delete('/admin/siswa/{id}', [AdminSiswaController::class, 'destroy']);

    // CRUD GURU
    Route::get('/admin/guru', [AdminGuruController::class, 'index']);
    Route::get('/admin/guru/create', [AdminGuruController::class, 'create']);
    Route::post('/admin/guru', [AdminGuruController::class, 'store']);
    Route::get('/admin/guru/{id}/edit', [AdminGuruController::class, 'edit']);
    Route::put('/admin/guru/{id}', [AdminGuruController::class, 'update']);
    Route::delete('/admin/guru/{id}', [AdminGuruController::class, 'destroy']);
});