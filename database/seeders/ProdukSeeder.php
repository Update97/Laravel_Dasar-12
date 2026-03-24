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
                'nama_produk'=>'Smart TV Samsung 24 Inch',
                'harga'=>'15000000',
                'deskripsi_produk'=>'ini adalah sebuah deskripsi dummy',
                'kategori_id'=>'2',
                'created_at'=>now()
            ],[
                'nama_produk'=>'Smart TV LG 24 Inch',
                'harga'=>'10000000',
                'deskripsi_produk'=>'ini adalah sebuah deskripsi dummy',
                'kategori_id'=>'2',
                'created_at'=>now()
            ],[
                'nama_produk'=>'Smart TV Aqua 24 Inch',
                'harga'=>'25000000',
                'deskripsi_produk'=>'ini adalah sebuah deskripsi dummy',
                'kategori_id'=>'2',
                'created_at'=>now()
            ]
       ],);
    }
}
