@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Produk</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produk.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pelanggan:</strong>
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail Kue:</strong>
                <textarea class="form-control" style="height:150px" name="detail_kue" placeholder="detail_kue"></textarea>
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Kue</strong>
                <input type="text" name="harga_kue" class="form-control" placeholder="harga_kue">
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar Kue</strong>
                <input type="file" name="gambar_kue" class="form-control" placeholder="Gambar kue">
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status Kue</strong>
                <select name="status_kue" class="form-control">
                <option value="1">Active</option>
                <option value="0">Non Active</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</div>
</div>
</div>
</div>
@endsection