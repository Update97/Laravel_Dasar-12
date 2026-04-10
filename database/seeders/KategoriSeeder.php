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
                'nama_kategori'=>'Elektronik',
                'deskripsi'    =>'Barang elektronik dengan kualitas terbaik'
            ],[
                'nama_kategori'=>'Rumah tangga',
                'deskripsi'    =>'Barang Rumah tangga dengan kualitas terbaik'
            ],
        ]);
    }
}
