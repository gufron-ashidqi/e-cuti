@extends('layouts.main')

@section('content-header')
    <h1>
        Riwayat Cuti
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Riwayat Cuti</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- <div class="box-header">
                    <a href="#" class="btn btn-sm btn-success">
                        <i class="fa fa-export"></i> Export Data
                    </a>
                </div> -->
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama Karyawan</th>
                                <th>NIK</th>
                                <th>Jenis Cuti</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Jumlah Cuti</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat_cuti as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->karyawan->nama }}</td>
                                    <td>{{ $item->karyawan->nik }}</td>
                                    <td>{{ $item->jenis_cuti->nama }}</td> 
                                    <td>{{ $item->tanggal_mulai }}</td> 
                                    <td>{{ $item->tanggal_akhir }}</td>
                                    <td>{{ $item->jumlah_hari_cuti }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
