<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    // SISWA - RIWAYAT
    public function index()
    {
        $riwayat = Konseling::where('siswa_id', Auth::guard('siswa')->id())
            ->where('status', 'Selesai')
            ->latest()
            ->get();

        return view('siswa.riwayat.index', compact('riwayat'));
    }

    public function show($id)
    {
        $data = Konseling::findOrFail($id);
        return view('siswa.riwayat.detail', compact('data'));
    }


    // GURU - TAMBAH CATATAN RIWAYAT
    public function store(Request $request, $id)
    {
        $data = Konseling::findOrFail($id);
        $data->update([
            'catatan_guru' => $request->catatan_guru
        ]);

        return back()->with('success', 'Catatan berhasil ditambahkan');
    }
}
