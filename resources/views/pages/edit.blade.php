@extends('layout.master')

@section('content')
    <h1>Update Kami</h1>
    <hr>
    <div class="card">
        <dic class="card-header bg-info">Update Produk</dic>
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
           <form action="{{ url('product/'.$data->id_produk) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="{{ $data->nama_produk }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $data->harga }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi_produk" class="form-control">{{ $data->deskripsi_produk }}</textarea>
                </div>
                <div class="col-sm-12 mt-3">
                    <a href="/product" type="submit" class="btn btn-info" style="color :aliceblue">Kembali</a>
                    <button type="submit" class="btn btn-dark" style="color :aliceblue">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
