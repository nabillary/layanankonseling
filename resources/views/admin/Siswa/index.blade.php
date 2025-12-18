@extends('admin.layout')

@section('content')
<div class="container">
    <h4>Data Siswa</h4>

    <a href="/admin/siswa/create" class="btn btn-primary mb-3">
        Tambah Siswa
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th width="160">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswa as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->nis }}</td>
                <td>{{ $s->nama }}</td>
                <td>
                    <a href="/admin/siswa/{{ $s->id }}/edit" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="/admin/siswa/{{ $s->id }}" method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Data siswa kosong</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
