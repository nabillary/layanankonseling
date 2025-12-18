@extends('admin.layout')

@section('content')
<h1 class="page-title">Data Guru BK</h1>

<div class="table-card">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1987654321</td>
                <td>Bu Sari</td>
                <td>sari@guru.sch.id</td>
            </tr>
            <tr>
                <td>2</td>
                <td>1987654322</td>
                <td>Pak Dedi</td>
                <td>dedi@guru.sch.id</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
