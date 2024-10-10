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
@endsection
