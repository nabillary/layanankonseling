@extends('layouts.guru')

@section('content')
<h1 class="page-title">Dashboard Overview</h1>

<div class="row g-3">
    <div class="col-lg-4 col-md-6">
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <h6>Konseling Menunggu</h6>
            <h3>{{ $menunggu }}</h3>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="stat-card primary">
            <div class="stat-icon">
                <i class="bi bi-arrow-repeat"></i>
            </div>
            <h6>Sedang Diproses</h6>
            <h3>{{ $proses }}</h3>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <h6>Selesai</h6>
            <h3>{{ $selesai }}</h3>
        </div>
    </div>
</div>

<h2 class="section-title">Konseling Terbaru</h2>

<div class="table-card">
    @if(count($latest) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Jenis Masalah</th>
                <th>Status</th>
                <th style="width: 100px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($latest as $item)
            <tr>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-person-circle" style="font-size: 20px; color: #6ba5a7;"></i>
                        <strong>{{ $item->nama_siswa }}</strong>
                    </div>
                </td>
                <td>{{ $item->jenis }}</td>
                <td>
                    <span class="badge bg-{{ $item->status == 'Menunggu' ? 'warning' : ($item->status == 'Diproses' ? 'primary' : 'success') }}">
                        {{ $item->status }}
                    </span>
                </td>
                <td>
                    <a href="/guru/konseling/{{ $item->id }}" class="btn-action">
                        <i class="bi bi-eye"></i> Lihat
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="empty-state">
        <i class="bi bi-inbox"></i>
        <h5>Belum Ada Data</h5>
        <p>Data konseling akan muncul di sini</p>
    </div>
    @endif
</div>
@endsection