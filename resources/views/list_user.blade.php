@extends('layouts.app')

@section('content')
@if(auth()->check() && (auth()->user()->jabatan === 'Kaprodi' || auth()->user()->jabatan === 'Admin'))
    <div class="navigasi" style="margin-top:50px">
        <div class="row">
            <!-- Navigasi Vertikal -->
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position: fixed;">
                    <a class="nav-link" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                    <a class="nav-link" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
                    <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
                    <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Dokumen Saya</a>
                    <a class="nav-link" id="v-pills-messages-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Deleted Dokumen</a>
                    @if(auth()->check() && auth()->user()->approved && (auth()->user()->jabatan === 'Admin' || auth()->user()->jabatan === 'Kaprodi'))
                    <a class="nav-link" id="v-pills-messages-tab" href="{{ route('kategori-dokumen.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Kategori</a>
                    <a class="nav-link" id="v-pills-messages-tab" href="{{ route('jabatan.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Role</a>
                    <a class="nav-link active" id="v-pills-messages-tab" href="{{ route('list-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List User</a>
                    <a class="nav-link" id="v-pills-messages-tab" href="{{ route('validasi.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Validasi</a>
                    @endif
                </div>

            <!-- Konten Utama -->
            <div class="col-md-9 offset-md-3">
                <h1 class="mb-4">List of Users</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Approve</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach($users as $user)
        @if(auth()->user()->jabatan !== 'Kaprodi' || $user->jabatan === 'Mahasiswa')
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->jabatan }}</td>
                <td>{{ $user->approved ? 'Diizinkan' : 'Tidak Diizinkan' }}</td>
                <td>
                    <a href="{{ route('edit-user', $user->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('approve-user', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('PUT')
                        @if ($user->approved)
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        @else
                            <button type="submit" class="btn btn-success">Approve</button>
                        @endif
                    </form>
                </td>
            </tr>
        @endif
    @endforeach
</tbody>

                </table>
                @if(auth()->user()->jabatan === 'Kaprodi')
                        @php
                            $allApproved = $users->where('jabatan', 'Mahasiswa')->where('approved', false)->isEmpty();
                        @endphp
                        <form action="{{ $allApproved ? route('cancel-all') : route('approve-all') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">{{ $allApproved ? 'Cancel All' : 'Approve All' }}</button>
                        </form>
                    @endif
            </div>
        </div>
    </div>
@else
    <div class="alert alert-danger mt-5">
        You do not have permission to view this page.
    </div>
@endif
@endsection
