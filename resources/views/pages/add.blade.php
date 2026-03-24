@extends('layout.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Produk</title>
    </head>

    <body>
        <div class="card">
            <div class="card-header bg-dark" style="color :aliceblue">Tambah Data</div>
            <div class="card-body">
                @if ($errors->any())
                    <div style="color: red;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <Form action="/product" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control">
                                @error('nama_produk')
                                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Harga Produk</label>
                                <input type="number" name="harga" class="form-control">
                                @error('harga')
                                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Stok Produk</label>
                                <input type="number" name="harga" class="form-control">
                                @error('harga')
                                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <label>Detail Produk</label>
                            <textarea class="form-control" name="deskripsi_produk" placeholder="Deskripsi produk wajib di isi"style="height: 100px"></textarea>
                            @error('Deskripsi')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <a href="/product" type="submit" class="btn btn-info mb-3">kembali</a>
                        <button type="submit" class="btn btn-dark mb-3">Simpan</button>
                    </div>
                </Form>

            </div>
        </div>
    </body>

    </html>
@endsection
