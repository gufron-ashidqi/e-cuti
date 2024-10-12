@extends('layouts.main')

@section('content-header')
    <h1>
        Karyawan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Karyawan</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ url('/karyawan/create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Divisi</th>
                                <th>No. Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyawan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->divisi->nama }}</td>
                                    <td>{{ $item->telepon }}</td> 
                                    <td>
                                        <a href="{{ url('karyawan/' . $item->id . '/edit') }}" class="btn btn-xs btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a onclick="return confirm('Yakin mau hapus data ini?')" href="{{ url('/karyawan', $item->id) }}" class="btn btn-xs btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
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
