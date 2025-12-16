@extends('layouts.siswa')

@section('content')
<h1 class="page-title">Ajukan Konseling</h1>

<div class="table-card p-4">

<form action="{{ route('siswa.konseling.store') }}" method="POST">
    @csrf

    {{-- MASALAH --}}
    <div class="mb-3">
        <label class="fw-bold">Masalah Konseling</label>
        <input type="text"
               name="masalah"
               class="form-control"
               placeholder="Contoh: Masalah belajar, keluarga, pertemanan"
               required>
    </div>


    <button class="btn-action">Kirim</button>
</form>

</div>
@endsection
