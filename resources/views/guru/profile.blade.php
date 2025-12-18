@extends('layouts.guru')

@section('content')

<h1 class="page-title">Profil Saya</h1>

<div class="table-card p-4">

    @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="/guru/profil/update" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_guru" value="{{ $guru->id_guru }}">
        <div class="row g-4">

            <div class="col-md-4 text-center">
                <img 
                    src="{{ $guru->foto ? asset('foto_guru/'.$guru->foto) : 'https://ui-avatars.com/api/?name='.$guru->nama.'&background=4D869C&color=fff' }}"
                    class="rounded-4 shadow-sm"
                    style="width: 160px; height: 160px; object-fit: cover;"
                >

                <div class="mt-3">
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>

            <div class="col-md-8">

                <div class="mb-3">
                    <label class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="{{ $guru->nama }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-secondary">NIP</label>
                    <input type="text" class="form-control" value="{{ $guru->nip }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-secondary">Password Baru</label>
                    <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diganti">
                </div>

                <div class="text-end">
                    <button class="btn-action">
                        <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                    </button>
                </div>

            </div>

        </div>
    </form>

</div>

@endsection
