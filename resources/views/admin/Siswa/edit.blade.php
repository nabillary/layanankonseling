@extends('admin.layout')

@section('content')
<div class="container">
    <h4>Edit Siswa</h4>

    <form action="/admin/siswa/{{ $siswa->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIS</label>
            <input type="text" name="nis"
                   value="{{ $siswa->nis }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama"
                   value="{{ $siswa->nama }}"
                   class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/admin/siswa" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
