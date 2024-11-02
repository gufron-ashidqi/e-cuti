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
                                    <input type="text" name="karyawan_id" class="form-control @error('karyawan_id') is-invalid @enderror" value="{{ $nama }}" 
                                    placeholder="Masukkan karyawan_id" readonly>
                                    @error('karyawan_id')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">NIK</label>
                                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ $nik }}" 
                                    placeholder="Masukkan NIK" readonly>
                                    @error('nik')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" placeholder="Masukkan tanggal">
                                    @error('tanggal_mulai')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tanggal Akhir</label>
                                    <input type="date" name="tanggal_akhir" class="form-control @error('tanggal_akhir') is-invalid @enderror" placeholder="Masukkan Tanggal">
                                    @error('tanggal_akhir')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Jenis Cuti</label>
                                    <select name="jenis_cuti_id" class="form-control @error('jenis_cuti_id') is-invalid @enderror">
                                        <option value="" hidden>-- Pilih Jenis Cuti --</option>
                                        @foreach ($jenis_cuti as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis_cuti_id')
                                    <span class="help-block text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="" cols="5"></textarea>
                                    @error('keterangan')
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
