@extends('admin.layout')

@section('content')
<div class="container">
    <h4 class="mb-4">📊 Data Konseling</h4>

    {{-- Pencarian --}}
    <form method="GET" class="mb-3">
        <input type="text" name="q" class="form-control"
               placeholder="Cari nama siswa / status..."
               value="{{ request('q') }}">
    </form>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>Guru BK</th>
                <th>Masalah</th>
                <th>Solusi</th>                
                <th>Status</th>
                <th>Tanggal</th>
                
            </tr>
        </thead>
        <tbody>
        @forelse($konseling as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->siswa->nama }}</td>
            <td>{{ $item->guru->nama ?? '-' }}</td>

            <td>
                {{ Str::limit($item->masalah, 40) }}
            </td>

            <td>
                @if($item->solusi)
                    {{ Str::limit($item->solusi, 40) }}
                @else
                    <span class="text-muted fst-italic">Belum ada solusi</span>
                @endif
            </td>

            <td>
                <span class="badge bg-light text-dark border">
                    {{ ucfirst($item->status) }}
                </span>
            </td>

            <td>
                {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center text-muted">
                Data konseling tidak ditemukan
            </td>
        </tr>
        @endforelse
    </tbody>

    </table>

    <small class="text-muted">
        🔒 Data konseling bersifat read-only untuk admin
    </small>
</div>
@endsection
