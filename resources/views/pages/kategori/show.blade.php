@extends('layout.master')

@section('content')
    <h5>Kategori Produk</h5>

    <a href="/kategori/create" class="btn btn-dark mb-2">Tambah Data</a>
    @if (@session('success'))
        <div class="alert alert-info mb-2">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="table-responsive">
        <div class="card-header bg-info">Daftar Kategori</div>
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-center" style="width: 5%">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Deskripsi Kategori</th>
                        <th scope="col" class="text-center" style="width: 20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                        <tr>
                            <th scope="row" class="text-center text-muted" style="width: 5%">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="/kategori/{{ $item->id_kategori}}/edit" class="btn btn-sm btn-outline-warning">Update</a>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                    data-target="#hapus{{ $item->id_kategori }}">Hapus</button>
                            </td>
                        </tr>
                @empty
                        <tr>
                            <td colspan="4">Data yang anda cari tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </tbody>
        </table>
    </div>
    </div>
        @foreach ($kategori as $item)
        <!-- Modal untuk hapus data  -->
        <div class="modal fade" id="hapus{{ $item->id_kategori }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="/kategori/{{ $item->id_kategori }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi !!!</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus kategori {{ $item->nama_kategori }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Lanjutkan</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
