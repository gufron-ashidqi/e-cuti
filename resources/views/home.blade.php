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

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $karyawan->karyawan->jumlah_cuti ??'' }}</h3>

              <p>Sisa Cuti</p>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $pengajuan_diterima }}</h3>

              <p>Cuti Diterima</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3>{{ $pengajuan_pending}}</h3>

              <p>Menunggu Persetujuan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $pengajuan_ditolak }}</h3>

              <p>Ditolak</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
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
                    <li> NIK : {{ $karyawan->karyawan->nik ?? ''}} </li>
                    <li> Tanggal Masuk : {{ $karyawan->karyawan->tanggal_masuk ??''}} </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endif
@endsection