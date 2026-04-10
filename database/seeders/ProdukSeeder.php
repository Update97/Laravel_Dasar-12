<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        //Query untuk menambahkan data pada tabel
       DB::table('produks')->insert([
            [
                'kode_produk'     => 'A001',
                'nama_produk'     =>'Smart TV Samsung 24 Inch',
                'harga'           =>15000000,
                'deskripsi_produk'=>'ini adalah sebuah deskripsi dummy',
                'stok'            =>100,
                'kategori_id'     =>'1',
                'created_at'      =>now()
            ],[
                'kode_produk'     => 'A002',
                'nama_produk'     =>'Smart TV Samsung 32 Inch',
                'harga'           =>25000000,
                'deskripsi_produk'=>'ini adalah sebuah deskripsi dummy',
                'stok'            =>50,
                'kategori_id'     =>'1',
                'created_at'      =>now()
            ],[
                'kode_produk'     => 'A003',
                'nama_produk'     =>'Kompor Listrik',
                'harga'           =>5000000,
                'deskripsi_produk'=>'ini adalah sebuah deskripsi dummy',
                'stok'            =>50,
                'kategori_id'     =>'2',
                'created_at'      =>now()
            ]
       ]);
    }
}
