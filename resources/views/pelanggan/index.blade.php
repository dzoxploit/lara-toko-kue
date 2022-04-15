@extends('pelanggan.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Toko Kue Dani Ardeanto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Pelanggan</a>
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
            <th>Nama</th>
            <th>Alamat</th>
            <th>No telepon</th>
            <th>Tanggal Pembelian Terakhir</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pelanggan as $pel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pel->nama_pelanggan }}</td>
            <td>{{ $pel->alamat_lengkap }}</td>
            <td>{{ $pel->no_telepon }}</td>
            <td>{{ $pel->tanggal_pembelian_terbaru }}</td>
            <td>
                <form action="{{ route('pelanggan.destroy',$pel->id_pelanggan) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('pelanggan.show',$pel->id_pelanggan) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('pelanggan.edit',$pel->id_pelanggan) }}">Edit</a>
   
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