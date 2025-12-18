<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('id_siswa', 'desc')->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }   

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa',
            'nama' => 'required',
            'password' => 'required|min:6',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $id,
            'nama' => 'required',
        ]);

        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
        ]);

        return redirect('/admin/siswa')->with('success', 'Data siswa berhasil diubah');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();
        return back()->with('success', 'Data siswa berhasil dihapus');
    }
}
