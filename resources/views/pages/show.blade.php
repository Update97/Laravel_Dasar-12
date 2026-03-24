@extends('layout.master')

@section('content')
    <h1>Daftar Produk</h1>
    <hr>
    <a href="/product/create" type="button" class="btn btn-dark mb-3">Tambah Data</a>
    <div class="alert alert-info">
        <b>Nama Toko :</b> {{ $data_toko['nama_toko'] }}
        <br>
        <b>Alamat :</b> {{ $data_toko['alamat'] }}
        <br>
        <b>Tipe Toko :</b> {{ $data_toko['type'] }}
    </div>
    @if (@session('success'))
        <div class="alert alert-info">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Daftar Produk
            <div class="d-flex gap-2" style="margin-left: 50%">
                @if (Request()->keyword != '')
                    <a href="/product" class="btn btn-outline-success">Reset</a>
                @endif
                <form class="input-group" style="width: 350px">
                    <input type="text" class="form-control" name="keyword" placeholder="cari data produk"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">Cari</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-center" style="width: 5%">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col" style="width: 15%">Harga</th>
                            <th scope="col" style="width: 15%">Stok Barang</th>
                            <th scope="col">Deskripsi Produk</th>
                            <th scope="col" class="text-center" style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data_produk as $item)
                            <tr>
                                <th scope="row" class="text-center text-muted" style="width: 5%">{{ $loop->iteration }}</th>
                                <td class="fw-semibold">
                                    {{ $item->nama_produk }}
                                </td>
                                <td class="text-nowrap">
                                    <span class="badge bg-light text-dark border">
                                        Rp{{ number_format($item->harga) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        52
                                    </span>
                                </td>
                                <td> 
                                    <small class="text-secondary">
                                        {{ $item->deskripsi_produk }}
                                    </small> 
                                </td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="/product/{{ $item->id_produk }}" class="btn btn-sm btn-outline-info"
                                            title="Detail">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="/product/{{ $item->id_produk }}/edit"
                                            class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus{{ $item->id_produk }}">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data yang anda cari tidak ditemukan !!!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach ($data_produk as $item)
        <!-- Modal untuk hapus data  -->
        <div class="modal fade" id="hapus{{ $item->id_produk }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="/product/{{ $item->id_produk }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi !!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus produk {{ $item->nama_produk }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Lanjutkan</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
