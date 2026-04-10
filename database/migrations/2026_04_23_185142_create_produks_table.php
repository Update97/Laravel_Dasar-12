<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //sintaks dibawah untuk membuat tabel produk atau menyesuaikan kebutuhan
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('kode_produk')->unique();
            $table->string('nama_produk',150);
            $table->bigInteger('harga');
            $table->unsignedBigInteger('kategori_id');
            $table->integer('stok');
            $table->text('deskripsi_produk');
            $table->string('gambar')->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id_kategori')->on('kategori')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
