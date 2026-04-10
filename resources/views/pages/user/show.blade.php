@extends('layout.master')

@section('content')
    <h2>Control Data Staff</h2>
    <div class="card">
        <div class="table-responsive">
            <div class="card-header bg-info">Data Staff</div>
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>no</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td scope="row" class="text-center text-muted" style="width: 5%">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                <a href="/kategori/{{ $user->id}}/edit" class="btn btn-sm btn-outline-warning">Update</a>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                    data-target="#hapus{{ $user->id }}">Hapus</button>
                            </td>
                            </tr>
                        @empty
                        <p>Data tidak ada</p>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
