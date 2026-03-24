<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = kategori::get();
        return view('pages.kategori.show',compact(('kategori')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //validasi sebelum ke db
        $request->validate([
            'nama_kategori' => 'required|min:5',
            'deskripsi_kategori'     => 'required',
        ],[
            'nama_kategori.min'           =>'nama kategori minimal 5 karakter',
            'nama_kategori.required'      =>'masukan nama kategori yang sesuai',
            'deskripsi.required' =>'Deskripsi wajib di isi',
        ]);

        //simpan data ke db
        kategori::Create([
            'nama_kategori'     =>$request->nama_kategori,
            'deskripsi'         =>$request->deskripsi_kategori,
            'id_kategori'       =>'1',
        ]);

        //untuk pindah halaman
        return redirect('/kategori')->with('success',"Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = kategori::findOrFail($id);
        return view('pages.kategori.edit',[
            'data'=>$data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required|min:5',
            'deskripsi_kategori'     => 'required',
        ],[
            'nama_kategori.min'      =>'nama kategori minimal 5 karakter',
            'nama_kategori.required' =>'masukan nama kategori yang sesuai',
            'deskripsi_kategori.required'     =>'Deskripsi wajib di isi',
        ]);

        // $kategori = KategoriController::findOrFail($id);
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori'     =>$request->nama_kategori,
            'deskripsi'         =>$request->deskripsi_kategori,
        ]);

        return redirect('/kategori')->with('success', "Data berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = kategori::findOrFail($id)->delete();

        return redirect('/kategori')->with('success', "Data berhasil dihapus");
    }
}
