<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use App\Models\Guru;
use App\Models\RiwayatKonseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    // ================= DASHBOARD =================
    public function dashboard()
    {
        return view('guru.dashboard', [
            'menunggu' => Konseling::where('status', 'terjadwal')->count(),
            'proses'   => 0,
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

    // ================= SOLUSI (AUTO MASUK RIWAYAT) =================
    public function solusi(Request $request, $id)
    {
        $request->validate([
            'solusi' => 'required'
        ]);

        $konseling = Konseling::findOrFail($id);

        // update konseling
        $konseling->update([
            'solusi' => $request->solusi,
            'status' => 'selesai'
        ]);

        // INSERT KE RIWAYAT (INI YANG KEMARIN BELUM KEJADI)
        RiwayatKonseling::create([
            'id_konseling' => $konseling->id_konseling,
            'tanggal'      => now(),
            'catatan'      => $request->solusi,
            'id_guru'      => $konseling->id_guru,
        ]);

        return redirect('/guru/riwayat');
    }
    // ================= RIWAYAT =================
    public function riwayat()
    {
        $riwayat = RiwayatKonseling::with('konseling.siswa')
            ->orderByDesc('tanggal')
            ->get();

        return view('guru.riwayat.index', compact('riwayat'));
    }
    // =================================================
    // GURU - BATALKAN KONSELING
    // =================================================
    public function batal($id)
    {
        $konseling = Konseling::findOrFail($id);

        $konseling->update([
            'status' => 'batal'
        ]);

        return redirect('/guru/konseling')
            ->with('success', 'Konseling berhasil ditolak');
    }
    /* ======================
     * PROFIL
     * ====================== */
    public function profil()
    {
        $guru = Auth::user()->guru ?? Guru::first();

        if (!$guru) {
            return redirect()->back()
                ->with('error', 'Data guru belum ada di database');
        }

        return view('guru.profile', [
            'title' => 'Profil Guru',
            'guru'  => $guru
        ]);
    }

    // ================= UPDATE PROFIL =================
    public function updateProfil(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $guru = Guru::find($request->id_guru);

        if (!$guru) {
            return back()->with('error', 'Data guru tidak ditemukan');
        }

        if ($request->hasFile('foto')) {
            if ($guru->foto && file_exists(public_path('foto_guru/' . $guru->foto))) {
                unlink(public_path('foto_guru/' . $guru->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_guru'), $namaFile);

            $guru->foto = $namaFile;
            $guru->save();

            return back()->with('success', 'Foto profil berhasil diperbarui!');
        }

        return back()->with('info', 'Tidak ada perubahan yang disimpan.');
    }
}
