@extends('layouts.main')

@section('content-header')
    <h1>
        Karyawan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="">Karyawan</li>
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
                            <form action="{{ url('karyawan') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                                    @error('nama')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">NIK</label>
                                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="Masukkan NIK">
                                    @error('nik')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Divisi</label>
                                    <select name="divisi_id" class="form-control @error('divisi_id') is-invalid @enderror" id="">
                                        <option value="" hidden>-- Pilih Divisi --</option>
                                        @foreach ($divisi as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('divisi_id')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">No. Telpon</label>
                                    <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror" placeholder="Masukkan No. Telp">
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
