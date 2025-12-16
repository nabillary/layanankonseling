@extends('layouts.siswa')

@section('content')
<h1>Riwayat Konseling</h1>

<table class="table">
    <tr>
        <th>Masalah</th>
        <th>Solusi</th>
        <th>Status</th>
       
    </tr>

@foreach($riwayat as $item)
<tr>
    <td>{{ $item->masalah }}</td>
    <td>{{ $item->solusi }}</td>
    <td>{{ $item->status }}</td>
   
</tr>
@endforeach

</table>
@endsection
