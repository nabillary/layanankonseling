<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    // ============================
    // SISWA - RIWAYAT
    // ============================
    public function indexSiswa()
    {
        $riwayat = Konseling::where('id_siswa', Auth::guard('siswa')->id())
            ->where('status', 'Selesai')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('siswa.riwayat.index', compact('riwayat'));
    }

    public function showSiswa($id)
    {
        $data = Konseling::findOrFail($id);
        return view('siswa.riwayat.detail', compact('data'));
    }


    // ============================
    // GURU - RIWAYAT
    // ============================
    public function indexGuru()
    {
        $riwayat = Konseling::where('id_guru', Auth::guard('guru')->id())
            ->where('status', 'Selesai')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('guru.riwayat.index', compact('riwayat'));
    }

    public function showGuru($id)
    {
        $data = Konseling::findOrFail($id);
        return view('guru.riwayat.detail', compact('data'));
    }
}
