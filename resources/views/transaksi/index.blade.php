@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Toko Kue Dani Ardeanto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('produk.create') }}"> Create New Produk</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Id Transaksi</th>
            <th>Id Pelanggan</th>
            <th>Tgl pesan</th>
            <th>Tgl diambil</th>
            <th>total_harga</th>
            <th>Status Kue</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($produk as $prod)
        <tr>
            <td>{{ $prod->id_kue }}</td>
            <td>{{ $prod->nama_kue }}</td>
            <td>{{ $prod->detail_kue }}</td>
            <td>{{ $prod->harga_kue }}</td>
            <td><img src="{{ Storage::url($prod->gambar_kue) }}" height="75" width="75" alt="" /></td>
            <td>{{ $prod->status_kue }}</td>
            <td>
                <form action="{{ route('produk.delete_data',['id' => $prod->id_kue]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-info" href="{{ route('produk.show',$prod->id_kue) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('produk.edit',$prod->id_kue) }}">Edit</a>
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $produk->links() !!}
</div>
</div>
</div>
</div>
      
@endsection