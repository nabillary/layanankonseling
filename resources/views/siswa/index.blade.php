@extends('admin.layout')

@section('content')
<h1 class="page-title">Data Siswa</h1>

<a href="/admin/siswa/create" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Tambah Siswa
</a>

<div class="table-card">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Username</th>
                <th width="160">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $i => $s)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->username }}</td>
                <td>
                    <a href="/admin/siswa/edit/{{ $s->id }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    <form action="/admin/siswa/delete/{{ $s->id }}" method="POST" class="d-inline">
                        @csrf
                        <button onclick="return confirm('Hapus siswa?')" class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
