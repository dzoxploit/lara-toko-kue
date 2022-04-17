<?php
namespace App\Http\Controllers;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use DB;
class PelangganController  extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
    public function __construct()
    {
        $this->middleware('auth');
    }

        public function index()
        {
            $pelanggan = Pelanggan::orderBy('id_pelanggan','desc')->paginate(5);
            return view('pelanggan.index', ['pelanggan' => $pelanggan]);
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('pelanggan.create');
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
                'nama_pelanggan' => 'required',
                'alamat_lengkap' => 'required',
                'no_telepon' => 'required'
            ]);
            $pelanggan = new Pelanggan;
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
            $pelanggan->alamat_lengkap = $request->alamat_lengkap;
            $pelanggan->no_telepon = $request->no_telepon;
            $pelanggan->save();
        return redirect()->route('pelanggan.index')->with('success','Company has been created successfully.');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\company  $company
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            $pelanggan = Pelanggan::where('id_pelanggan',$id)->first();
            return view('pelanggan.show',  ['pelanggan' => $pelanggan]);
        } 
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            $pelanggan = Pelanggan::where('id_pelanggan',$id)->first();
            return view('pelanggan.edit',  ['pelanggan' => $pelanggan]);
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\company  $company
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
            $request->validate([
                'nama_pelanggan' => 'required',
                'alamat_lengkap' => 'required',
                'no_telepon' => 'required'
            ]);
            $pelanggan = Pelanggan::where('id_pelanggan',$id)->first();;
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
            $pelanggan->alamat_lengkap = $request->alamat_lengkap;
            $pelanggan->no_telepon = $request->no_telepon;
            $pelanggan->save();

            return redirect()->route('pelanggan.index')->with('success','Company has been updated successfully.');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy(Pelanggan $pelanggan)
        {
        $pelanggan->delete();

    
        DB::statement("SET @count = 0;");
        DB::statement("UPDATE pelanggan SET pelanggan.id_pelanggan = @count:= @count + 1;");
        DB::statement("ALTER TABLE pelanggan AUTO_INCREMENT = 1;");

        return redirect()->route('pelanggan.index')->with('success','Pelanggan has been deleted successfully');
        }

    }