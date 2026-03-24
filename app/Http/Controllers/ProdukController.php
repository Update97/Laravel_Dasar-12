<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Mime\Message;

class ProdukController extends Controller
{
    public function index(Request $request){
        $toko = [
            'nama_toko'=>'INDOPOIPET',
            'alamat'=>'Poipet Kamboja',
            'type'=>'Ruko'
        ];

        $search =$request->keyword;

        $produk = produk::when($search,function($query,$search){
            return $query->where('nama_produk','like',"%{$search}%");
        })->get(); // query untuk mengambil semua data yang ada di db (tb_produk)
        // $queryBuilder = DB::table('produks')->get(); //query untuk menampilkan semua data yang ada di tabel db
        // dd($data);
        return view('pages.produk.show',[
            'data_toko'=>$toko,
            'data_produk'=>$produk,
    ]);
    }
    public function create(){
        return view('pages.produk.add');
    }

    public function store(Request $request){
    //validasi sebelum ke database
    $request->validate([
            'nama_produk'      => 'required|min:8',
            'harga'            => 'required|numeric',
            'deskripsi_produk' => 'required',
        ],[
            'nama_produk.min'            =>'nama produk minimal 8 karakter',
            'harga.required'             =>'masukan format harga yg benar',
            'deskripsi_produk.required'  =>'Deskripsi wajib diisi',
        ]);

        produk::create([
            'nama_produk'      => $request->nama_produk,
            'harga'            => $request->harga,
            'deskripsi_produk' => $request->deskripsi_produk,
            'kategori_id'      => '1',
        ]);
        return redirect('/product')->with('success', 'Data behasil ditambahkan!');
        // dd('$simpan');
    }

    public function show($id) {
           //query untuk meganmbil data yang ada di db
           //eloquent ORM 
          $data = produk::findOrFail($id);

          //query builder 
        //   DB::table('tb_produk')->where('id_produk', $id)->firstOrFail();

        return view('pages.produk.detail',[
            'produk'=>$data
        ] );
          
    }

//syntax untuk update data
    public function edit($id){
        $data = produk::findOrFail($id);
        
        return view('pages.produk.edit',[
            'data'=>$data,
        ]);
        
    }
//syntax untuk update data
    public function update(Request $request, $id) {
    $request->validate([ //validasi data terlebih dahulu sebelum eksekusi update data
        'nama_produk'      => 'required|min:8',
        'harga'            => 'required|numeric',
        'deskripsi_produk' => 'required',
    ], [
        'nama_produk.min'           => 'Nama produk minimal 8 karakter',
        'nama_produk.required'      => 'Nama produk wajib diisi',
        'harga.required'            => 'Masukan format harga yang benar',
        'deskripsi_produk.required' => 'Deskripsi produk wajib diisi',
    ]);

    //query untuk simpan data yang sudah kita update
    produk::where('id_produk', $id)->update([
        'nama_produk'      => $request->nama_produk,
        'harga'            => $request->harga,
        'deskripsi_produk' => $request->deskripsi_produk,
    ]);

    return redirect('product')->with('success', 'Data berhasil diupdate');
}

     //query untuk menghapus data
     public function destroy($id){
       produk::findOrfail($id)->delete();
       return redirect('/product')->with('success','data berhasil di hapus');
     }
    
}
