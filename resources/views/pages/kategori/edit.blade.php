@extends('layout.master')

@section('content')
    <h1>Kategori Produk</h1>
    <hr>
    <div class="card">
        <dic class="card-header bg-info">Update Kategori</dic>
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
           <form action="{{ url('kategori/'.$data->id_kategori) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" value="{{ $data->nama_kategori }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi_kategori" class="form-control">{{ $data->deskripsi}}</textarea>
                </div>
                <a href="/kategori" type="submit" class="btn btn-info" style="color :aliceblue">kembali</a>
                <button type="submit" class="btn btn-dark" style="color :aliceblue">Submit</button>
            </form>
        </div>
    </div>
@endsection
