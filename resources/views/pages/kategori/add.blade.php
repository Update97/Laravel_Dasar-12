@extends('layout.master')

@section('content')
    <h2>Halaman tambah kategori</h2>
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
            <Form action="/kategori" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control">
                            @error('nama_kategori')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <label>Deskripsi Kategori</label>
                        <textarea class="form-control" name="deskripsi_kategori" placeholder="Deskripsi sesuai data produk"style="height: 100px"></textarea>                       
                        @error('deskripsi')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <a href="/kategori" type="submit" class="btn btn-info mb-3">kembali</a>
                    <button type="submit" class="btn btn-dark mb-3">Simpan</button>
                </div>
            </Form>
        </div>
    </div>
@endsection
