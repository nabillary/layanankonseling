@extends('layouts.guru')

@section('content')
<h1 class="page-title">Riwayat Konseling</h1>

<div class="table-card">
    @if(count($riwayat) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Jenis Masalah</th>
                <th>Tanggal</th>
                <th style="width: 120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $item)
            <tr>
                <td><strong>{{ $item->nama_siswa }}</strong></td>
                <td>{{ $item->jenis }}</td>
                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="/guru/riwayat/{{ $item->id }}" class="btn-action">
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
        <h5>Belum Ada Riwayat Konseling</h5>
        <p>Konseling yang selesai akan muncul di sini</p>
    </div>
    @endif
</div>
@endsection
