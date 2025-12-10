<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use Illuminate\Support\Facades\Auth;

class KonselingController extends Controller
{
    // SISWA - FORM AJUKAN
    public function create()
    {
        return view('siswa.konseling.ajukan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        Konseling::create([
            'siswa_id' => Auth::guard('siswa')->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'Proses',
        ]);

        return redirect('/siswa/dashboard')->with('success', 'Pengajuan konseling berhasil dikirim');
    }


    // GURU - LIST KONSELING MASUK
    public function index()
    {
        $data = Konseling::latest()->get();
        return view('guru.konseling.index', compact('data'));
    }

    public function show($id)
    {
        $data = Konseling::findOrFail($id);
        return view('guru.konseling.detail', compact('data'));
    }

    public function solusi(Request $request, $id)
    {
        $request->validate([
            'solusi' => 'required'
        ]);

        $data = Konseling::findOrFail($id);
        $data->update([
            'solusi' => $request->solusi,
            'status' => 'Selesai'
        ]);

        return redirect('/guru/konseling')->with('success', 'Solusi berhasil dikirim');
    }
}
