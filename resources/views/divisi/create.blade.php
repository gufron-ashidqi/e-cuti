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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('divisi') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Divisi</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Divisi">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
