<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
       public function index()
        {
            $transaksi = Transaksi::orderBy('id_transaksi','desc')->paginate(5);
            return view('transaksi.index', $transaksi);
        }

        public function detail($id) {
            $transaksi = Transaksi::where('id_transaksi',$id)->first();
            $detailtransaksi = DetailTransaksi::where('id_transaksi', $transaksi->id_transaksi)->get();
            return view('transaksi.index', ['transaksi' => $transaksi, 'detailtransaksi' => $detailtransaksi]);
        }

        public function create() {

        }

        public function insert(Request $request) {

        }

        public function delete($id){
            
        }
}
