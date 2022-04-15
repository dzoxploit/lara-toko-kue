@extends('pelanggan.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Toko Kue Dani Ardeanto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Produk</a>
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
            <th>Nama Kue</th>
            <th>Detail Kue</th>
            <th>Harga Kue</th>
            <th>Gambar Kue</th>
            <th>Status Kue</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($produk as $prod)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $prod->nama_kue }}</td>
            <td>{{ $prod_detail_kue }}</td>
            <td>{{ $prod->harga_kue }}</td>
            <td><img src="{{ Storage::url($prod->gambar_kue) }}" height="75" width="75" alt="" /></td>
            <td>{{ $prod->status_kue }}</td>
            <td>
                <form action="{{ route('produk.destroy',$prod->id_kue) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('produk.show',$pel->id_kue) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('produk.edit',$pel->id_kue) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $pelanggan->links() !!}
      
@endsection