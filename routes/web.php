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


Route::prefix('siswa')
    ->name('siswa.')
   
    ->group(function () {

        Route::get('/dashboard', [SiswaController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/konseling/ajukan', [KonselingController::class, 'create'])
            ->name('konseling.ajukan');

        Route::post('/konseling/store', [KonselingController::class, 'store'])
            ->name('konseling.store');

        Route::get('/riwayat', [RiwayatController::class, 'indexSiswa'])
            ->name('riwayat.index');

        Route::get('/riwayat/{id}', [RiwayatController::class, 'showSiswa'])
            ->name('riwayat.detail');

        Route::get('/profil', [SiswaController::class, 'profil'])
            ->name('profil');

        Route::post('/profil/update', [SiswaController::class, 'updateProfil'])
            ->name('profil.update');
    });

// ========================
// GURU (PAKAI AUTH)
// ========================
Route::middleware(['auth', 'role:guru'])->group(function () {

    Route::get('/guru/dashboard', [GuruController::class, 'dashboard']);

    Route::get('/guru/konseling', [GuruController::class, 'index']);
    Route::get('/guru/konseling/{id}', [GuruController::class, 'show']);

    Route::get('/guru/riwayat', [RiwayatController::class, 'indexGuru']);
    Route::get('/guru/riwayat/{id}', [RiwayatController::class, 'showGuru']);

    Route::post('/guru/konseling/{id}/solusi', [GuruController::class, 'solusi']);
    Route::post('/guru/konseling/{id}/batal', [KonselingController::class, 'batal'])->name('guru.konseling.batal');
    Route::get('/guru/profil', [GuruController::class, 'profil']);
    Route::post('/guru/profil/update', [GuruController::class, 'updateProfil']);
});


// ========================
// ADMIN
// ========================
Route::middleware(['auth', 'role:admin'])->group(function () {

    // DASHBOARD
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // ======================
    // KONSELING (READ ONLY)
    // ======================
    Route::get('/admin/konseling', [AdminKonselingController::class, 'index'])
        ->name('admin.konseling.index');

    Route::get('/admin/konseling/{id}', [AdminKonselingController::class, 'show'])
        ->name('admin.konseling.show');

    // ======================
    // CRUD SISWA
    // ======================
    Route::get('/admin/siswa', [AdminSiswaController::class, 'index'])
        ->name('admin.siswa.index');

    Route::get('/admin/siswa/create', [AdminSiswaController::class, 'create'])
        ->name('admin.siswa.create');

    Route::post('/admin/siswa', [AdminSiswaController::class, 'store'])
        ->name('admin.siswa.store');

    Route::get('/admin/siswa/{id}/edit', [AdminSiswaController::class, 'edit'])
        ->name('admin.siswa.edit');

    Route::put('/admin/siswa/{id}', [AdminSiswaController::class, 'update'])
        ->name('admin.siswa.update');

    Route::delete('/admin/siswa/{id}', [AdminSiswaController::class, 'destroy'])
        ->name('admin.siswa.destroy');

    // ======================
    // CRUD GURU
    // ======================
    Route::get('/admin/guru', [AdminGuruController::class, 'index'])
        ->name('admin.guru.index');

    Route::get('/admin/guru/create', [AdminGuruController::class, 'create'])
        ->name('admin.guru.create');

    Route::post('/admin/guru', [AdminGuruController::class, 'store'])
        ->name('admin.guru.store');

    Route::get('/admin/guru/{id}/edit', [AdminGuruController::class, 'edit'])
        ->name('admin.guru.edit');

    Route::put('/admin/guru/{id}', [AdminGuruController::class, 'update'])
        ->name('admin.guru.update');

    Route::delete('/admin/guru/{id}', [AdminGuruController::class, 'destroy'])
        ->name('admin.guru.destroy');
});