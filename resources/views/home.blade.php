@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top: 50px;">
    <div class="d-flex">
        <!-- Navigasi -->
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position: fixed;">
        <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
<a class="nav-link {{ Route::currentRouteName() == 'input-dokumen' ? 'active' : '' }}" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
<a class="nav-link {{ Route::currentRouteName() == 'list-dokumen' ? 'active' : '' }}" id="v-pills-list-dokumen-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-list-dokumen" aria-selected="false">List Dokumen</a>
<a class="nav-link {{ Route::currentRouteName() == 'list-dokumen-user' ? 'active' : '' }}" id="v-pills-list-dokumen-user-tab" href="{{ route('list-dokumen-user') }}" role="tab" aria-controls="v-pills-list-dokumen-user" aria-selected="false">Dokumen Saya</a>
<a class="nav-link {{ Route::currentRouteName() == 'draft-dokumen' ? 'active' : '' }}" id="v-pills-draft-dokumen-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-draft-dokumen" aria-selected="false">Deleted Dokumen</a>
@if(auth()->check() && auth()->user()->approved && (auth()->user()->jabatan === 'Admin'))
<a class="nav-link {{ Route::currentRouteName() == 'kategori-dokumen.index' ? 'active' : '' }}" id="v-pills-kategori-tab" href="{{ route('kategori-dokumen.index') }}" role="tab" aria-controls="v-pills-kategori" aria-selected="false">List Kategori</a>
<a class="nav-link {{ Route::currentRouteName() == 'jabatan.index' ? 'active' : '' }}" id="v-pills-role-tab" href="{{ route('jabatan.index') }}" role="tab" aria-controls="v-pills-role" aria-selected="false">List Role</a>
<a class="nav-link {{ Route::currentRouteName() == 'list-user' ? 'active' : '' }}" id="v-pills-user-tab" href="{{ route('list-user') }}" role="tab" aria-controls="v-pills-user" aria-selected="false">List User</a>
<a class="nav-link {{ Route::currentRouteName() == 'validasi.index' ? 'active' : '' }}" id="v-pills-validasi-tab" href="{{ route('validasi.index') }}" role="tab" aria-controls="v-pills-validasi" aria-selected="false">List Validasi</a>
@endif
@if(auth()->check() &&  auth()->user()->jabatan === 'Kaprodi')
<a class="nav-link {{ Route::currentRouteName() == 'list-user' ? 'active' : '' }}" id="v-pills-user-tab" href="{{ route('list-user') }}" role="tab" aria-controls="v-pills-user" aria-selected="false">List User</a>
@endif
        </div>

        <!-- Konten -->
        <div class="container-fluid" style="margin-left: 220px;">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="flex: 1; padding-right: 20px;">
                    <h1 class="welcome-text">SELAMAT DATANG <br> DI SISTEM MANAJEMEN <br> DOKUMEN ELEKTRONIK</h1>

                    <!-- Chart Section -->
                    <div style="margin-top: 30px;">
                        <div style="width: 300px; height: 150px;">
                            <canvas id="documentChart"></canvas>
                        </div>
                    </div>

                    <!-- Notifikasi Pengguna Belum Disetujui -->
                    @if(!auth()->user()->approved)
                    <div class="alert alert-warning mt-4" role="alert">
                        Pengguna Anda belum disetujui untuk mengakses fitur tertentu. Mohon tunggu persetujuan administrator.
                    </div>
                    @endif
                </div>
                <div style="flex: 1; display: flex; justify-content: center;">
                    <img src="{{ asset('images/gambar.png') }}" alt="Deskripsi Gambar" style="width: auto; max-width: 90%; height: 400px;">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Unapproved Users -->
@if(auth()->check() && auth()->user()->approved && (auth()->user()->jabatan === 'Admin' || auth()->user()->jabatan === 'Kaprodi'))
    <div class="modal fade" id="unapprovedUsersModal" tabindex="-1" aria-labelledby="unapprovedUsersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="unapprovedUsersModalLabel">Pengguna Belum Disetujui</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody id="unapprovedUsersTableBody">
                            <!-- Data pengguna belum di-approve akan ditampilkan di sini -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    var ctx = document.getElementById('documentChart').getContext('2d');
    var documentChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jumlah Dokumen Yang Sudah Di Inputkan'],
            datasets: [{
                label: 'Dokumen',
                data: [{{ $documentCount }}],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            maintainAspectRatio: false,
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
    fetch('{{ route('unapproved-users') }}')
        .then(response => response.json())
        .then(data => {
            console.log(data); // Untuk debugging, pastikan data diterima dengan benar

            const unapprovedUsersTableBody = document.getElementById('unapprovedUsersTableBody');
            unapprovedUsersTableBody.innerHTML = ''; // Clear existing rows

            let hasUnapprovedUsers = false;

            data.forEach(user => {
                let shouldDisplay = true;

                // Kondisi untuk Kaprodi: hanya tampilkan Mahasiswa
                @if(auth()->user()->jabatan === 'Kaprodi')
                    if (user.jabatan !== 'Mahasiswa') {
                        shouldDisplay = false; // Skip users who are not "Mahasiswa"
                    }
                @endif

                // Kondisi untuk Admin: tampilkan semua
                @if(auth()->user()->jabatan === 'Admin')
                    // No additional conditions needed for Admin
                @endif

                if (shouldDisplay) {
                    hasUnapprovedUsers = true;
                    const row = document.createElement('tr');
                    const nameCell = document.createElement('td');
                    nameCell.textContent = user.name;
                    const jabatanCell = document.createElement('td');
                    jabatanCell.textContent = user.jabatan;
                    const messageCell = document.createElement('td');
                    messageCell.textContent = "Mohon untuk approval user";

                    row.appendChild(nameCell);
                    row.appendChild(jabatanCell);
                    row.appendChild(messageCell);
                    unapprovedUsersTableBody.appendChild(row);
                }
            });

            // Show the modal automatically if there are unapproved users
            if (hasUnapprovedUsers) {
                $('#unapprovedUsersModal').modal('show');
            }
        })
        .catch(error => {
            console.error('Error fetching unapproved users:', error);
        });
});

    </script>
@endif

<style>
    .welcome-text {
        font-size: 36px;
        font-family: "Lora", serif;
        font-optical-sizing: auto;
        font-weight: normal; /* Sesuaikan dengan pengaturan font-weight yang diinginkan */
        font-style: normal;
    }
</style>
@endsection
