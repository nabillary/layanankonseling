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
