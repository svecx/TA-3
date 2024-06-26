@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top:50px">
    <div class="d-flex align-items-start">
            <!-- Navigasi -->
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position:fixed">
            <a class="nav-link" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Dokumen Saya</a>
            <a class="nav-link active" id="v-pills-messages-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Deleted Dokumen</a>
            @if(auth()->check() && auth()->user()->approved && (auth()->user()->jabatan === 'Admin' || auth()->user()->jabatan === 'Kaprodi'))
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('kategori-dokumen.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Kategori</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List User</a>
    @endif
            </div>
        </div>
        <div class="col-md-9">
            <!-- Konten Draft Dokumen -->
            <h3 class="judul">Deleted Dokumen</h3>
            @if (session('status'))
                <div class="alert alert-success" style="margin-left:200px">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
          
            <table class="table table-striped table-bordered" style="margin-left:200px">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Dokumen</th>
                        <th scope="col">Kategori Dokumen</th>
                        <th scope="col">Pembuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
    @foreach ($draftDokumens as $index => $dokumen)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $dokumen->judul_dokumen }}</td>
            <td>{{ $dokumen->kategori_dokumen }}</td>
            <td>{{ $dokumen->created_by }}</td>
            <td>
                <!-- Icon untuk delete -->
                <div style="display: flex; align-items: center;">
                    <form action="{{ route('draft.delete', $dokumen->id) }}" method="POST" style="margin-right: 5px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; background-color: transparent;" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini dari draft?')">
                            <i class="fa fa-trash" aria-hidden="true" style="color: red;"></i>
                        </button>
                    </form>
                    <form action="{{ route('draft-dokumen.unarchive', $dokumen->id) }}" method="POST">
                        @csrf
                        <button type="submit" style="border: none; background-color: transparent;">
                            <i class="fa fa-arrow-left" aria-hidden="true" style="color: blue;"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>


            </table>
        </div>
    </div>
</div>
@endsection