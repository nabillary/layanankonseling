@extends('admin.layout')

@section('content')
<div class="container">
    <h4 class="mb-4">✏️ Edit Guru BK</h4>

    <form action="{{ route('admin.guru.update', $guru->id_guru) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" name="nip"
                   class="form-control"
                   value="{{ old('nip', $guru->nip) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Guru</label>
            <input type="text" name="nama"
                   class="form-control"
                   value="{{ old('nama', $guru->nama) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <input type="password" name="password" class="form-control">
            <small class="text-muted">
                Kosongkan jika tidak ingin mengubah password
            </small>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">

            @if($guru->foto)
                <div class="mt-2">
                    <img src="{{ asset('uploads/guru/'.$guru->foto) }}"
                         width="80"
                         class="rounded">
                </div>
            @endif
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
