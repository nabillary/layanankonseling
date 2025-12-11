@extends('layouts.guru')

@section('content')
<h1 class="page-title">Detail Riwayat Konseling</h1>

<div class="table-card p-4">

    <h5 class="mb-3">Informasi Konseling</h5>

    <div class="mb-3">
        <strong>Nama Siswa:</strong> {{ $riwayat->nama_siswa }}
    </div>

    <div class="mb-3">
        <strong>Jenis Masalah:</strong> {{ $riwayat->jenis }}
    </div>

    <div class="mb-3">
        <strong>Deskripsi Konseling:</strong>
        <p>{{ $riwayat->deskripsi }}</p>
    </div>

    <hr>

    <h5 class="mt-4">Solusi dari Guru</h5>
    <div class="alert alert-success">
        {{ $riwayat->solusi }}
    </div>

    <div class="mt-3 text-muted">
        <i class="bi bi-clock-history"></i>
        <small>Diselesaikan pada {{ $riwayat->updated_at->format('d F Y • H:i') }}</small>
    </div>

</div>
@endsection
