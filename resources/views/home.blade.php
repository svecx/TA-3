
@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top: 50px;">
    <div class="d-flex">
        <!-- Navigasi -->
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position: fixed;">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position: fixed;">
    <a class="nav-link active" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
    <a class="nav-link" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
    <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
    <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Dokumen Saya</a>
    <a class="nav-link" id="v-pills-messages-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Deleted Dokumen</a>
    @if(auth()->check() && auth()->user()->approved && (auth()->user()->jabatan === 'Admin' || auth()->user()->jabatan === 'Kaprodi'))
    <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List User</a>
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
                </div>
                <div style="flex: 1; display: flex; justify-content: center;">
                    <img src="{{ asset('images/gambar.png') }}" alt="Deskripsi Gambar" style="width: auto; max-width: 90%; height: 400px;">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
</script>
@endsection

<!-- Add the link to Google Fonts for Poppins -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

<style>
    .welcome-text {
        font-size: 36px;
        font-family: "Lora", serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
      
    }
</style>