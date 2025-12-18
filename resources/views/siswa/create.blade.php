@extends('admin.layout')

@section('content')
<h1 class="page-title">Tambah Siswa</h1>

<form action="/admin/siswa/store" method="POST" class="table-card p-4">
    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="/admin/siswa" class="btn btn-secondary">Kembali</a>
</form>
@endsection
