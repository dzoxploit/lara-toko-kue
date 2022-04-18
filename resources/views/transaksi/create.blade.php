@extends('layouts.app')
 
@section('content')


<div class="container">
    <h2 align="center">Toko kue dani ardeanto</h2>  
    <div class="form-group">
         <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf  
            <div class="alert alert-danger error-message-display" style="display:none">
            <ul></ul>
            </div>
            <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
            </div>
            <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kue:</strong>
                <select class="form-control" name="id_pelanggan" required id="id_pelanggan">
                        <option>Select Pelanggan</option>
                        @foreach($pelanggan as $pl)
                            <option value="{{ $pl->id_pelanggan }}">{{ $pl->nama_pelanggan}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tgl pesan:</strong>
                <input type="date" name="harga_kue" class="form-control" placeholder="tgl_pesan">
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tgl diambil</strong>
                <input type="date" name="harga_kue" class="form-control" placeholder="tgl_diambil">
            </div>
        </div>
        </div>
        <br/>
        <br/>
        <br/>
            
            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                        <td><select class="form-control" name="id_produk[]" required id="id_produk[]">
                        <option>Select Produk</option>
                        @foreach($produk as $prod)
                            <option value="{{ $prod->id_kue }}">{{ $prod->nama_kue}}</option>
                        @endforeach
                        </select><td>
                        <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                        <td><input type="text" name="jumlah_kue[]" placeholder="Enter jumlah kue" class="form-control name_list" /></td>
                        <td><input type="date" name="tanggal_sudah_jadi[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                        <td><input type="text" name="total_harga[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                        <td><input type="text" name="status_jadi[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>
                    <div class="container">
        <div class="row">
    <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Total Harga</strong>
                <input type="text" name="total_harga" class="form-control" placeholder="total_harga">
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Total Dibayar</strong>
                <input type="text" name="total_harga" class="form-control" placeholder="total_harga">
            </div>
        </div>
</div>
</div>
<br/>
<br/>  
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
            </div>
         </form>  
    </div> 
</div>


<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addProduct'); ?>";
      var i=1;  

      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" name="id_produk[]" required id="id_produk[]"><option>Select Produk</option>@foreach($produk as $prod)<option value="{{ $prod->id_kue }}">{{ $prod->nama_kue}}</option> @endforeach</select><td><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="jumlah_kue[]" placeholder="Enter jumlah kue" class="form-control name_list" /></td> <td><input type="date" name="tanggal_sudah_jadi[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="total_harga[]" placeholder="Enter your Name" class="form-control name_list" /></td> <td><input type="text" name="status_jadi[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#product_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        previewMessage(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#product_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".error-message-display").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function previewMessage (msg) {
         $(".error-message-display").find("ul").html('');
         $(".error-message-display").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".error-message-display").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>
@endsection