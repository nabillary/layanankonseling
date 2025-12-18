@extends('admin.layout')

@section('content')
<h1 class="page-title">Edit Siswa</h1>

<form action="/admin/siswa/update/{{ $siswa->id }}" method="POST" class="table-card p-4">
    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" value="{{ $siswa->username }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Password (opsional)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button class="btn btn-warning">Update</button>
    <a href="/admin/siswa" class="btn btn-secondary">Kembali</a>
</form>
@endsection
