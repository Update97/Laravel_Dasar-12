@extends('layout.master')

@section('content')
 <h1>Produk Kami</h1>
 <hr>
 <div class="card">
  <dic class="card-header bg-info">Detail Produk</dic>
  <div class="card-body">
        <img src="https://placehold.co/600x400" class="img-fluid" alt="...">
        <p>Nama Produk  : {{$produk->nama_produk}}</p>
        <p>Harga produk : Rp{{number_format($produk->harga)}}</p>
        <p>Deskripsi    : {{$produk->deskripsi_produk}}</p>
        <p>Kategori     : Barang Elektronik</p>
        <p>Stok         : Tersedia Banyak bosku</p>
    <a href="/product" class="btn btn-info" style="color :aliceblue">Kembali</a>
  </div>
</div>
@endsection

  
