<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Konseling;

class GuruController extends Controller
{
    public function dashboard()
    {
        $guru = Auth::guard('guru')->user();

        $menunggu = Konseling::where('status', 'Proses')->count();
        $selesai = Konseling::where('status', 'Selesai')->count();

        return view('guru.dashboard', compact(
            'guru', 'menunggu', 'selesai'
        ));
    }
}
