@extends('layouts.siswa')

@section('content')

<h1 class="page-title">Dashboard Siswa</h1>

{{-- ================= NOTIFIKASI ================= --}}
@if($lastKonseling)
<div class="alert alert-info mb-4">
    @if($lastKonseling->status == 'Menunggu')
        🔔 Konseling kamu sedang <b>menunggu respon</b> dari guru BK
    @elseif($lastKonseling->status == 'Diproses')
        🔄 Konseling kamu sedang <b>diproses</b>
    @else
        ✅ Konseling kamu <b>sudah selesai</b>, silakan lihat solusi
    @endif
</div>
@else
<div class="alert alert-secondary mb-4">
    ℹ️ Kamu belum pernah mengajukan konseling
</div>
@endif

{{-- ================= RINGKASAN ================= --}}
<div class="row g-3">

    <div class="col-md-6">
        <div class="stat-card">
            <h6>Masalah Terakhir</h6>
            <h4>
                {{ $lastKonseling->masalah ?? 'Belum ada konseling' }}
            </h4>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card">
            <h6>Status</h6>
            <span class="badge bg-{{ 
                $lastKonseling?->status == 'Menunggu' ? 'warning' :
                ($lastKonseling?->status == 'Diproses' ? 'primary' : 'success')
            }}">
                {{ $lastKonseling->status ?? '-' }}
            </span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card">
            <h6>Jadwal</h6>
            <h5>
                {{ $lastKonseling?->tanggal ?? '-' }}
            </h5>
        </div>
    </div>

</div>

{{-- ================= AKSI ================= --}}
<div class="mt-5 d-flex gap-3">

    <a href="{{ route('siswa.konseling.ajukan') }}" class="btn-action">
        <i class="bi bi-chat-right-text-fill me-2"></i>
        Ajukan Konseling
    </a>

    <a href="{{ route('siswa.riwayat.index') }}" class="btn-action">
        <i class="bi bi-clock-history me-2"></i>
        Riwayat Konseling
    </a>

</div>

@endsection
