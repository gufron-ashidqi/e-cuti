@extends('layouts.main')

@section('content-header')
    <h1>
        Divisi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="">Divisi</li>
        <li class="active">Edit</li>
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
                            <form action="{{ url('divisi/edit', $divisi->id) }}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label class="control-label">Nama Divisi</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $divisi->nama }}" placeholder="Masukkan Nama Divisi">
                                    @error('nama')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                  </div>
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                <a href="{{ url('divisi') }}" class="btn btn-sm btn-danger">Batal</a>
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
