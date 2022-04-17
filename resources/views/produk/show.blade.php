@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Produk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produk.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                {{ $produk->nama_kue }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                {{ $produk->detail_kue }}
            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Kue:</strong>
                {{ $produk->harga_kue }}
            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar Kue:</strong>
                <td><img src="{{ Storage::url($produk->gambar_kue) }}" height="75" width="75" alt="" /></td>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection