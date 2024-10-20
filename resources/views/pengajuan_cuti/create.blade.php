@extends('layouts.main')

@section('content-header')
    <h1>
        Pengajuan Cuti
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="">Pengajuan Cuti</li>
        <li class="active">Tambah</li>
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
                            <form action="{{ url('pengajuan-cuti') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{Auth::user()->name}}" 
                                    placeholder="Masukkan Nama">
                                    @error('nama')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">NIK</label>
                                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{Auth::user()->nik}}" 
                                    placeholder="Masukkan NIK">
                                    @error('nik')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" placeholder="Masukkan tanggal">
                                    @error('tanggal_masuk')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Akhir</label>
                                    <input type="date" name="telepon" class="form-control @error('telepon') is-invalid @enderror" placeholder="Masukkan Tanggal">
                                    @error('telepon')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Jenis Cuti</label>
                                    <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" placeholder="Masukkan Jenis Cuti">
                                    @error('telepon')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                  <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                  <a href="{{ url('karyawan') }}" class="btn btn-sm btn-danger">Batal</a>
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
