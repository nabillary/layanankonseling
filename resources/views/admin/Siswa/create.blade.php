@extends('admin.layout')

@section('content')
<div class="container">
    <h4>Tambah Siswa</h4>

    <form action="/admin/siswa" method="POST">
        @csrf

        <div class="mb-3">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="/admin/siswa" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
