<!-- resources/views/edit_user.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit User</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('update-user', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
        </div>
   
        <div class="mb-3 row">
            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan:</label>
            <div class="col-sm-10">
                <select name="jabatan" id="jabatan" class="form-control" required>
                    <option value="Kajur" {{ $user->jabatan == 'Kajur' ? 'selected' : '' }}>Ketua Jurusan</option>
                    <option value="Sekjur" {{ $user->jabatan == 'Sekjur' ? 'selected' : '' }}>Sekretaris Jurusan</option>
                    <option value="Kaprodi" {{ $user->jabatan == 'Kaprodi' ? 'selected' : '' }}>Kaprodi</option>
                    <option value="Dosen" {{ $user->jabatan == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                    <option value="Adm" {{ $user->jabatan == 'Adm' ? 'selected' : '' }}>Adm</option>
                    <option value="Mahasiswa" {{ $user->jabatan == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    <option value="Admin" {{ $user->jabatan == 'Admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary me-2">Update</button>
            <a href="{{ route('list-user') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
