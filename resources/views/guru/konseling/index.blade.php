@extends('layouts.guru')

@section('content')
<h1 class="page-title">Konseling Masuk</h1>

<div class="table-card">
    @if(isset($konseling) && $konseling->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Jenis Konseling</th>
                <th>Status</th>
                <th style="width: 120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($konseling as $item)
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
                        <i class="bi bi-eye"></i> Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="empty-state">
        <i class="bi bi-inbox"></i>
        <h5>Belum Ada Pengajuan Konseling</h5>
        <p>Siswa belum mengajukan konseling</p>
    </div>
    @endif
</div>
@endsection
