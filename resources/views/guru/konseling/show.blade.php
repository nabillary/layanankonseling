@extends('layouts.guru')

@section('content')
<h1 class="page-title">Detail Konseling</h1>

<div class="table-card p-4">

    <h5 class="mb-3">Informasi Konseling</h5>

    <div class="mb-3">
        <strong>Nama Siswa:</strong> {{ $konseling->nama_siswa }}
    </div>

    <div class="mb-3">
        <strong>Jenis Masalah:</strong> {{ $konseling->jenis }}
    </div>

    <div class="mb-3">
        <strong>Deskripsi:</strong>
        <p>{{ $konseling->deskripsi }}</p>
    </div>

    <div class="mb-4">
        <strong>Status:</strong>
        <span class="badge bg-{{ $konseling->status == 'Menunggu' ? 'warning' : ($konseling->status == 'Diproses' ? 'primary' : 'success') }}">
            {{ $konseling->status }}
        </span>
    </div>

    <hr>

    <h5 class="mt-4">Berikan Solusi</h5>

    <form action="/guru/konseling/solusi/{{ $konseling->id }}" method="POST">
        @csrf
        <textarea name="solusi" class="form-control mb-3" rows="4" placeholder="Tulis solusi untuk konseling ini..."></textarea>

        <button class="btn-action" type="submit">
            <i class="bi bi-send"></i> Kirim Solusi
        </button>
    </form>

</div>
@endsection
