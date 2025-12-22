@extends('admin.layout')

@section('content')
<div class="container">
    <h4 class="mb-4">➕ Tambah Guru BK</h4>

    <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" name="nip"
                   class="form-control"
                   value="{{ old('nip') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Guru</label>
            <input type="text" name="nama"
                   class="form-control"
                   value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password"
                   class="form-control" required>
            <small class="text-muted">
                Password digunakan untuk login guru BK
            </small>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto (opsional)</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
