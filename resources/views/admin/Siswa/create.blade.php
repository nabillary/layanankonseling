@extends('admin.layout')

@section('content')
<div class="container">
    <h4>Tambah Siswa</h4>

    {{-- ALERT ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin/siswa" method="POST" enctype="multipart/form-data">
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
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
            <small class="text-muted">Opsional (jpg, png)</small>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="/admin/siswa" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
