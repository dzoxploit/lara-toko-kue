@extends('products.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Pelanggan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pelanggan.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pelanggan</strong>
                {{ $pelanggan->nama_pelanggan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat Pelanggan:</strong>
                {{ $pelanggan->alamat_lengkap }}
            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No telepon:</strong>
                {{ $pelanggan->no_telepon }}
            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Pembelian Terakhir:</strong>
                {{ $pelanggan->tanggal_pembelian_terbaru }}
            </div>
        </div>
    </div>
@endsection