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

@if (Auth::user()->role == 4)
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
                    <li> Sisa Cuti : 
                        {{-- @dd($cuti->status); --}}
                        @if ($cuti->status = 'reject')
                        {{ $karyawan->karyawan->jumlah_cuti - $cuti->jumlah_hari_cuti_reject }}
                        @elseif($cuti->status = 'pending')
                        {{ $karyawan->karyawan->jumlah_cuti - $cuti->jumlah_hari_cuti_pending }}
                        @else
                        {{ $karyawan->karyawan->jumlah_cuti - $cuti->jumlah_hari_cuti }}
                        @endif
                    </li>
                    {{-- PR = jumlah cuti belum sesuai --}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endif
@endsection