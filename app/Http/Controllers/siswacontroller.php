<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Konseling;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    // DASHBOARD
   public function dashboard()
    {
        // sementara (tanpa login)
        $siswa = Siswa::first();

        // konseling terakhir
        $lastKonseling = Konseling::where('id_siswa', $siswa->id_siswa ?? null)
            ->latest('tanggal')
            ->first();

        return view('siswa.dashboard', compact(
            'siswa',
            'lastKonseling'
        ));
    }

    // PROFIL
    public function profil()
    {
        $siswa = Siswa::first();

        return view('siswa.profil', compact('siswa'));
    }

    // UPDATE PROFIL
    public function updateProfil(Request $request)
    {
        $siswa = Siswa::first();

        $request->validate([
            'nama'     => 'required',
            'password' => 'nullable|min:5',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $siswa->nama = $request->nama;

        if ($request->filled('password')) {
            $siswa->password = Hash::make($request->password);
        }

      // UPLOAD FOTO
if ($request->hasFile('foto')) {
    $file = $request->file('foto');
    $namaFile = time().'_'.$file->getClientOriginalName();

    // SIMPAN KE public/assets/img
    $file->move(public_path('assets/img'), $namaFile);

    $siswa->foto = $namaFile;
}


        $siswa->save();

        return redirect()
            ->route('siswa.profil')
            ->with('success', 'Profil berhasil diperbarui');
    }
}
