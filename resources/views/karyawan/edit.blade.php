@extends('layouts.main')

@section('content-header')
    <h1>
        Karyawan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="">Karyawan</li>
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
                            <form action="{{ url('karyawan', $karyawan->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$karyawan->nama}}" placeholder="Masukkan Nama">
                                    @error('nama')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">NIK</label>
                                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{$karyawan->nik}}" placeholder="Masukkan NIK">
                                    @error('nik')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tanggal Masuk</label>
                                    <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{$karyawan->tanggal_masuk}}" placeholder="Masukkan tanggal_masuk">
                                    @error('tanggal_masuk')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Divisi</label>
                                    <select name="divisi_id" class="form-control @error('divisi_id') is-invalid @enderror" value="{{$karyawan->divisi}}" id="">
                                        <option value="" hidden>-- Pilih Divisi --</option>
                                        @foreach ($divisi as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($item->id == $karyawan->divisi_id)
                                                selected
                                            @endif
                                            >{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('divisi_id')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">No. Telpon</label>
                                    <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{$karyawan->telepon}}" placeholder="Masukkan No. Telp">
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
