<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
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
}
