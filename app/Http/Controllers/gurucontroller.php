<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // ================= DASHBOARD =================
    public function dashboard()
{
    return view('guru.dashboard', [
        'menunggu' => Konseling::where('status', 'terjadwal')->count(),
        'proses'   => 0, // belum dipakai
        'selesai'  => Konseling::where('status', 'selesai')->count(),
        'latest'   => Konseling::with('siswa')
                        ->orderByDesc('id_konseling')
                        ->limit(5)
                        ->get(),
    ]);
}


    // ================= KONSELING MASUK =================
 public function index()
{
    $konseling = Konseling::with('siswa')
        ->where('status', 'terjadwal')
        ->orderByDesc('id_konseling')
        ->get();

    return view('guru.konseling.index', compact('konseling'));
}


    // ================= DETAIL =================
 public function show($id)
{
    $konseling = Konseling::with('siswa')->findOrFail($id);
    return view('guru.konseling.show', compact('konseling'));
}


    // ================= SOLUSI =================
public function solusi(Request $request, $id)
{
    $request->validate([
        'solusi' => 'required'
    ]);

    $konseling = Konseling::findOrFail($id);
    $konseling->update([
        'solusi' => $request->solusi,
        'status' => 'selesai'
    ]);

    return redirect('/guru/riwayat')->with('success', 'Solusi berhasil dikirim');
}

    // ================= RIWAYAT =================
public function riwayat()
{
    $riwayat = Konseling::with('siswa')
        ->orderByDesc('id_konseling')
        ->get(); // ⬅️ AMBIL SEMUANYA, TANPA FILTER STATUS

    return view('guru.riwayat.index', compact('riwayat'));
}





    /* ======================
     * PROFIL
     * ====================== */
  public function profil()
{
    $guru = Guru::first();

    if (!$guru) {
        return redirect()->back()->with('error', 'Data guru belum ada di database');
    }

    return view('guru.profile', [
        'title' => 'Profil Guru',
        'guru'  => $guru
    ]);
}


     // UPDATE PROFIL
    public function updateProfil(Request $request)
    {
        $guru = Guru::find($request->id_guru);

        if (!$guru) {
            return back()->with('error', 'Data guru tidak ditemukan');
        }

        $guru->nama = $request->nama;
        
        // update password kalau diisi
        if ($request->password) {
            $guru->password = bcrypt($request->password);
        }

        // update foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move('foto_guru/', $namaFile);
            $guru->foto = $namaFile;
        }

        $guru->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

}
