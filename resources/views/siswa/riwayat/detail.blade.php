@extends('layouts.siswa')

@section('content')
<h1>Detail Konseling</h1>

<p><strong>Masalah:</strong> {{ $data->masalah }}</p>
<p><strong>Status:</strong> {{ $data->status }}</p>

<hr>

<p><strong>Cerita Masalah:</strong><br>{{ $data->solusi }}</p>

@if($data->solusi)
<hr>
<h4>Tanggapan / Solusi Dari Guru</h4>
<p>{{ $data->solusi }}</p>
@endif

@endsection
