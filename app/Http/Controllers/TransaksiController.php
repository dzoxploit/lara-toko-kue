<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
       public function index()
        {
            $transaksi = Transaksi::join('pelanggan','pelanggan.id_pelanggan','=','transaksi.id_pelanggan')
                                    ->select('transaksi.id_transaksi','pelanggan.nama_pelanggan','transaksi.tgl_pesan',
                                     'transaksi.tgl_diambil','total_harga','total_dibayar',
                                     'status_transaksi')->orderBy('id_transaksi','desc')->paginate(5);
            return view('transaksi.index', ['transaksi' => $transaksi]);
        }

        public function detail($id) {
            $transaksi = Transaksi::join('pelanggan','pelanggan.id_pelanggan','=','transaksi.id_pelanggan')->where('id_transaksi',$id)->first();
            $detailtransaksi = DetailTransaksi::where('id_transaksi', $transaksi->id_transaksi)->get();
            return view('transaksi.index', ['transaksi' => $transaksi, 'detailtransaksi' => $detailtransaksi]);
        }

        public function create() {
            $produk = Produk::orderBy('id_kue','desc')->get();
            $pelanggan = Pelanggan::orderBy('id_pelanggan','desc')->get();
            return view('transaksi.create',['produk' => $produk, 'pelanggan' => $pelanggan]);
        }

        public function insert(Request $request) {

        }

        public function delete($id){
            
        }
}
