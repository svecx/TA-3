@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top: 50px">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position:fixed">
            <a class="nav-link" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Dokumen Saya</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Deleted Dokumen</a>
            @if(auth()->check() && auth()->user()->approved && (auth()->user()->jabatan === 'Admin' || auth()->user()->jabatan === 'Kaprodi'))
                <a class="nav-link" id="v-pills-messages-tab" href="{{ route('kategori-dokumen.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Kategori</a>
                <a class="nav-link" id="v-pills-messages-tab" href="{{ route('jabatan.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Role</a>
                <a class="nav-link" id="v-pills-messages-tab" href="{{ route('validasi.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Validasi</a>
                <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List User</a>
                <a class="nav-link  active" id="v-pills-messages-tab" href="{{ route('validasi.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Validasi</a>
            @endif
        </div>
        <div class="tab-content" id="v-pills-tabContent" style="margin-left: 150px; width: calc(100% - 150px);">
            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <h3 class="judul">List Validasi</h3>
                <div class="container-fluid mt-5">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Validasi</button>

                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Validasi</th>
                                <th style="width: 10.5rem;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($validasiList as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_validasi }}</td>
                                    <td>
                                        <a href="{{ route('validasi.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('validasi.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal for Adding Validasi -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('validasi.store') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">Tambah Validasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama_validasi" class="form-label">Nama Validasi</label>
                                        <input type="text" class="form-control" id="nama_validasi" name="nama_validasi" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection