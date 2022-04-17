<?php
namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;
use DB;

class ProdukController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

      public function index()
        {
            $produk = Produk::orderBy('id_kue','desc')->paginate(5);
            return view('produk.index', compact('produk'));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('produk.create');
        }
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(Request $request)
        {
            $request->validate([
                'nama_kue' => 'required',
                'detail_kue' => 'required',
                'harga_kue' => 'required',
                'status_kue' => 'required',
                'gambar_kue' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $path = $request->file('gambar_kue')->store('public/images');

            $produk = new Produk;
            $produk->nama_kue = $request->nama_kue;
            $produk->detail_kue = $request->detail_kue;
            $produk->status_kue = $request->status_kue;
            $produk->harga_kue = $request->harga_kue;
            $produk->gambar_kue = $path;

            $produk->save();
            return redirect()->route('produk.index')->with('success','Produk has been created successfully.');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\company  $company
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            $produk = Produk::where('id_kue',$id)->first();
            return view('produk.show', compact('produk'));
        } 
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            $produk = Produk::where('id_kue',$id)->first();
            return view('produk.edit', ['produk' => $produk]);
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\company  $company
        * @return \Illuminate\Http\Response
        */
        public function update_data(Request $request, $id)
        {
            $request->validate([
                'nama_kue' => 'required',
                'detail_kue' => 'required',
                'harga_kue' => 'required',
                'status_kue' => 'required',
            ]);
             if ($request->hasFile('gambar_kue')) {
                $produk = Produk::where('id_kue',$id)->first();
                $path = $request->gambar_kue->store('public/images');
                $produk->nama_kue = $request->nama_kue;
                $produk->detail_kue = $request->detail_kue;
                $produk->status_kue = $request->status_kue;
                $produk->harga_kue = $request->harga_kue;
                $produk->gambar_kue = $path;
                $produk->save();
            }
            
                return redirect()->route('produk.index')->with('success','Produk has been updated successfully.');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function delete_data($id)
        {
        $produk = Produk::where('id_kue',$id)->first();
        $produk->delete();
        
        DB::statement("SET @count = 0;");
        DB::statement("UPDATE produk SET produk.id_kue = @count:= @count + 1;");
        DB::statement("ALTER TABLE produk AUTO_INCREMENT = 1;");

        return redirect()->route('produk.index')->with('success','Produk has been deleted successfully');
        }
}
