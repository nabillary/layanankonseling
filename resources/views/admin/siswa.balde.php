@extends('admin.layout')

@section('content')
<h1 class="page-title">Data Siswa</h1>

<div class="table-card">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>102001</td>
                <td>Rara Tini</td>
                <td>XI RPL</td>
                <td>
                    <button class="btn-action btn-sm">Detail</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>102002</td>
                <td>Andi Saputra</td>
                <td>X AKL</td>
                <td>
                    <button class="btn-action btn-sm">Detail</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
