<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Konseling;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $siswa = Auth::guard('siswa')->user();

        $totalKonseling = Konseling::where('id_siswa', $siswa->id)->count();
        $proses = Konseling::where('id_siswa', $siswa->id)->where('status', 'Proses')->count();
        $selesai = Konseling::where('id_siswa', $siswa->id)->where('status', 'Selesai')->count();

        return view('siswa.dashboard', compact(
            'siswa', 'totalKonseling', 'proses', 'selesai'
        ));
    }
}
