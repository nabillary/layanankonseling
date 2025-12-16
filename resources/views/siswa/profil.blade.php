@extends('layouts.siswa')

@section('content')
<h1 class="page-title">Profil Saya</h1>
<div class="table-card p-4">
    @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('siswa.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <img 
                    src="{{ ($siswa && $siswa->foto && file_exists(public_path('assets/img/'.$siswa->foto))) ? asset('assets/img/'.$siswa->foto) : 'https://ui-avatars.com/api/?name='.urlencode($siswa->nama ?? 'Siswa').'&background=5A9FB5&color=fff' }}"
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
                    <input type="text" class="form-control" name="nama" value="{{ $siswa->nama }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-secondary">NIS</label>
                    <input type="text" class="form-control" value="{{ $siswa->nis }}" disabled>
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