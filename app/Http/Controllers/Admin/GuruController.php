<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest()->get();
        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:guru',
            'nama' => 'required',
            'password' => 'required|min:6'
        ]);

        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/guru')->with('success', 'Data guru ditambahkan');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $guru->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
        ]);

        return redirect('/admin/guru')->with('success', 'Data guru diperbarui');
    }

    public function destroy($id)
    {
        Guru::findOrFail($id)->delete();
        return back()->with('success', 'Data guru dihapus');
    }
}
