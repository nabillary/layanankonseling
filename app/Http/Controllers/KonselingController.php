<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use Illuminate\Support\Facades\Auth;

class KonselingController extends Controller
{
    // =================================================
    // SISWA - FORM AJUKAN KONSELING
    // =================================================
    public function create()
    {
        return view('siswa.konseling.ajukan');
    }

    // =================================================
    // SISWA - SIMPAN KONSELING
    // =================================================
// SIMPAN KONSELING
public function store(Request $request)
{
    $request->validate([
        'masalah' => 'required|string'
    ]);

    Konseling::create([
        'id_siswa' => Auth::user()->id,
        'masalah'  => $request->masalah,
        'status'   => 'terjadwal', // 🔥 HARUS SAMA ENUM
        'tanggal'  => now()->toDateString(),
    ]);

    return redirect()
        ->route('siswa.dashboard')
        ->with('success', 'Konseling berhasil diajukan');
}

    // =================================================
    // GURU - LIST KONSELING MASUK
    // =================================================
    public function index()
    {
        $data = Konseling::with('siswa')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('guru.konseling.index', compact('data'));
    }

    // =================================================
    // GURU - DETAIL KONSELING
    // =================================================
    public function show($id)
    {
        $data = Konseling::with('siswa')->findOrFail($id);
        return view('guru.konseling.detail', compact('data'));
    }

    // =================================================
    // GURU - KIRIM SOLUSI
    // =================================================
    public function solusi(Request $request, $id)
    {
        $request->validate([
            'solusi' => 'required|string'
        ]);

        $konseling = Konseling::findOrFail($id);

        $konseling->update([
            'solusi' => $request->solusi,
            'status' => 'Selesai'
        ]);

        return redirect('/guru/konseling')
            ->with('success', 'Solusi berhasil dikirim');
    }
}
