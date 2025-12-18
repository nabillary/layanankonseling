<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Guru;
use Illuminate\Support\Facades\DB; 

class GuruController extends Controller
{
    public function dashboard()
    {
        return view('guru.dashboard', [
            'title'     => 'Dashboard Guru',
            'menunggu'  => Konseling::where('status', 'Menunggu')->count(),
            'proses'    => Konseling::where('status', 'Diproses')->count(),
            'selesai'   => Konseling::where('status', 'Selesai')->count(),
            'latest'    => Konseling::orderBy('id_konseling', 'desc')->limit(5)->get(),
        ]);
    }
    public function index()
    {
        $konseling = DB::table('konseling')
            ->orderBy('id_konseling', 'desc')
            ->get();

        return view('guru.konseling.index', [
            'konseling' => $konseling
        ]);
    }
    public function profil()
    {
        //ini nnti diganti ini ko $guru = Auth::guard('guru')->user();
        $guru = \App\Models\Guru::first(); 
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
