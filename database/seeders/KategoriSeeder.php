<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('kategori')->insert([
        [
            'nama_kategori' => 'Asus',
            'deskripsi'     => 'Barang Elektronik original ASUS'
       ],[
            'nama_kategori' => 'Samsung',
            'deskripsi'     => 'Barang Elektronik original Samsung'   
        ]
            ],); 
    }
}
