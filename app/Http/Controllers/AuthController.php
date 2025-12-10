<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ==========================
    // LOGIN SISWA
    // ==========================
    public function loginSiswaPage()
    {
        return view('auth.login_siswa');
    }

    public function loginSiswa(Request $request)
    {
        $credentials = $request->only('nis', 'password');

        if (Auth::guard('siswa')->attempt($credentials)) {
            return redirect('/siswa/dashboard');
        }

        return back()->with('error', 'NIS atau password salah');
    }


    // ==========================
    // LOGIN GURU
    // ==========================
    public function loginGuruPage()
    {
        return view('auth.login_guru');
    }

    public function loginGuru(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('guru')->attempt($credentials)) {
            return redirect('/guru/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }
}
