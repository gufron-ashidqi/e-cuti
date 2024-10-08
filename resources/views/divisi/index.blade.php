@extends('layouts.main')

@section('content-header')
    <h1>
        Divisi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Divisi</li>
    </ol>
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ url('/divisi/tambah') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Divisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <a href="{{ url('/divisi/edit', $item->id) }}" class="btn btn-xs btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form class="d-inline" onsubmit="return confirm('Yakin mau hapus data ini?')" action="{{ url('/divisi', $item->id) }}" method="post">
                                            <button type="submit" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                              @method('delete')
                                              @csrf
                                            </form>
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
