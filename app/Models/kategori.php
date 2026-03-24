<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //inisialisasi tabel kategori
    protected $table = 'kategori';

    //inisialisasi untuk primary key
    protected$primaryKey = 'id_kategori';

    //inisialisasi untuk yang tidak boleh diisi 
    protected $guarded = ['id_kategori'];
}
