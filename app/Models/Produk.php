<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    //inisialisasi tabel produk
    protected $table ='produks';

    //inisialisasi primary key dalam tabel
    protected $primaryKey = 'id_produk';
    
    //inisialisasi data yang tidak boleh di isi dalam tabel
    protected $guarded = ['id_produk'];
    // public $timestamps = false;
}
