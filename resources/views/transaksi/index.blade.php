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
                <a class="btn btn-success" href="{{ route('transaksi.create') }}"> Create New Transaksi</a>
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
            <th>Nama Pelanggan</th>
            <th>Tgl pesan</th>
            <th>Tgl diambil</th>
            <th>total_harga</th>
            <th>total dibayar</th>
            <th>status transaksi</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($transaksi as $tr)
        <tr>
            <td>{{ $tr->id_transaksi }}</td>
            <td>{{ $tr->nama_pelanggan }}</td>
            <td>{{ $tr->tgl_pesan }}</td>
            <td>{{ $tr->tgl_diambil }}</td>
            <td>{{ $tr->total_harga }}</td>
            <td>{{ $tr->total_dibayar }}</td>
            <td>{{ $tr->status_transaksi }}</td>
            <td>
                <form action="{{ route('transaksi.delete',['id' => $tr->id_transaksi]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-info" href="{{ route('transaksi.show', $tr->id_transaksi) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('transaksi.edit',$tr->id_transaksi) }}">Edit</a>
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $transaksi->links() !!}
</div>
</div>
</div>
</div>
      
@endsection