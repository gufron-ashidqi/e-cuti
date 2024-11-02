@extends('layouts.main')

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-titlle">Selamat Datang, <b>{{ Auth::user()->name }}</b></h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                Data Karyawan
            </div>
            <div class="box-body">
                <ul>
                    <li> Nama : {{ $karyawan->karyawan->nama }} </li>
                    <li> NIK : {{ $karyawan->karyawan->nik }} </li>
                    <li> Tanggal Masuk : {{ $karyawan->karyawan->tanggal_masuk }} </li>
                    <li> Sisa Cuti : {{ $karyawan->karyawan->jumlah_cuti - $cuti->jumlah_hari_cuti }} </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection