@extends('admin.layout')

@section('content')
<div class="container">
    <h4>Edit Siswa</h4>

    <form action="/admin/siswa/{{ $siswa->id_siswa }}" method="POST">
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

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas"
                   value="{{ $siswa->kelas }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan"
                   value="{{ $siswa->jurusan }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">

            @if($siswa->foto)
                <div class="mt-2">
                    <img src="{{ asset('uploads/siswa/'.$siswa->foto) }}"
                        width="100"
                        class="img-thumbnail">
                </div>
            @endif
        </div>


        <div class="mt-3">
            <button class="btn btn-primary">Update</button>
            <a href="/admin/siswa" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
