@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top:50px">
    <div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position:fixed">
        <a class="nav-link" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
        <a class="nav-link active" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
        <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
        <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Dokumen Saya</a>
        <a class="nav-link" id="v-pills-messages-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Deleted Dokumen</a>
        @if(auth()->check() && auth()->user()->approved && (auth()->user()->jabatan === 'Admin' || auth()->user()->jabatan === 'Kaprodi'))
        <a class="nav-link" id="v-pills-messages-tab" href="{{ route('kategori-dokumen.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Kategori</a>
        <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List User</a>
    @endif
    </div>
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <h3 class="judul">FORM INPUT DOKUMEN</h3>
      <form action="{{ route('simpan-dokumen') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div>
        <img src="{{ asset('images/gambar2.png') }}" alt="gambar" style="position:absolute; top:7%; left:600px; opacity:0.2; max-width: 110%; height: 600px">
    </div>
    <div>
        <label class="form-label">Judul Dokumen:</label>
        <input class="form-control" name="judul_dokumen" style="margin-left:200px" required>
    </div>

    <div>
        <label class="form-label">Deskripsi Dokumen:</label>
        <input class="form-control" name="deskripsi_dokumen" style="margin-left:200px">
    </div>

    <div style="margin-left:200px; margin-top:10px">
        <label>Kategori Dokumen:</label>
        <select name="kategori_dokumen" id="kategoriDokumen" class="form-control" required>
            <!-- @if(auth()->user()->jabatan === 'Mahasiswa' || auth()->user()->jabatan === 'Adm')
                <option value="Dokumen Pendidikan">Dokumen Pendidikan</option>
            @elseif(auth()->user()->jabatan === 'Dosen')
                <option value="Dokumen Pendidikan">Dokumen Pendidikan</option>
                <option value="Dokumen Penelitian">Dokumen Penelitian</option>
                <option value="Dokumen Sumber Daya Manusia">Dokumen Sumber Daya Manusia</option>
            @else -->
            <option value="">Memuat...</option>
            <!-- @endif -->
        </select>
    </div>

    <div style="margin-left:200px; margin-top:10px">
        <label>Validasi Dokumen:</label>
        <select name="validasi_dokumen" class="form-control" required>
            <option value="Direktur">Direktur</option>
            <option value="Ketua Jurusan">Ketua Jurusan</option>
            <option value="Ketua Program Studi">Ketua Program Studi</option>
            <option value="Kelompok Bidang Keahlian">Kelompok Bidang Keahlian</option>
        </select>
    </div>

    <div>
        <label for="tahunDokumen" class="form-label">Tahun Dokumen:</label>
        <input type="number" class="form-control" name="tahun_dokumen" id="tahunDokumen" style="margin-left:200px; position:relative; z-index: 1;" min="1900" max="2100" required>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Input File Dokumen:</label>
        <input class="form-control" type="file" id="formFile" name="dokumen_file" style="margin-left:200px" required>
    </div>

    <div class="form-label">
        <div>
            <label for="tags">Tags:</label>
            <input type="text" id="tags" name="tags" data-role="tagsinput" class="form-control" placeholder="Add tags" required>
        </div>
    </div>

    <div class="form-label">
    <div>
        <label for="tags">Tags:</label>
        <input type="text" id="tags" name="tags" data-role="tagsinput" class="form-control" placeholder="Add tags" required>
    </div>
</div>

<div class="form-label">
    <div>
        <label for="permissions">Izinkan siapa saja yang melihat:</label>
    </div>
    <div>
    <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="all" name="permissions[]" value="all">
            <label class="form-check-label" for="all">All</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="kajur" name="permissions[]" value="kajur">
            <label class="form-check-label" for="kajur">Kajur</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="sekjur" name="permissions[]" value="sekjur">
            <label class="form-check-label" for="sekjur">Sekjur</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="kaprodi" name="permissions[]" value="kaprodi">
            <label class="form-check-label" for="kaprodi">Kaprodi</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="dosen" name="permissions[]" value="dosen">
            <label class="form-check-label" for="dosen">Dosen</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="adm" name="permissions[]" value="adm">
            <label class="form-check-label" for="adm">Adm</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="mahasiswa" name="permissions[]" value="mahasiswa">
            <label class="form-check-label" for="mahasiswa">Mahasiswa</label>
        </div>
    </div>
</div>



    <div class="form-label">
        <div>
            <label for="User">User:</label>
            <input type="text" id="User" name="Create_by" class="form-control" placeholder="User" required disabled>
        </div>
    </div>

    <button type="submit" class="btn btn-primary" style="margin-left:200px">Submit</button>
    <button type="button" id="cancelButton" class="btn btn-secondary" style="margin-left:10px">Cancel</button>
</form>

        </div>
    </div>
</div>

<script>
    // Ambil nama pengguna dari server dan simpan di localStorage
fetch('/get-user-name')
    .then(response => response.json())
    .then(data => {
        localStorage.setItem('user_active', data.name);

        // Ambil nama pengguna dari local storage
        var userName = localStorage.getItem('user_active');
        
        // Set nilai input dengan id 'Create_by' menjadi nilai nama pengguna dari local storage
        if (userName) {
            document.getElementById('User').value = userName; // Menggunakan 'User' sebagai id input
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const allCheckbox = document.getElementById('all');
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:not(#all)');

        allCheckbox.addEventListener('change', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (!this.checked) {
                    allCheckbox.checked = false;
                } else if (Array.from(checkboxes).every(cb => cb.checked)) {
                    allCheckbox.checked = true;
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
                        fetch('{{ route('kategori-dokumen') }}')
                            .then(response => response.json())
                            .then(data => {
                                const kategoriDokumenSelect = document.getElementById('kategoriDokumen');
                                kategoriDokumenSelect.innerHTML = '<option value="">Pilih Kategori Dokumen</option>'; // Reset options

                                data.forEach(item => {
                                    const option = document.createElement('option');
                                    option.value = item.nama_dokumen;
                                    option.textContent = item.nama_dokumen;
                                    kategoriDokumenSelect.appendChild(option);
                                });
                            })
                            .catch(error => {
                                console.error('Error fetching kategori dokumen:', error);
                                const kategoriDokumenSelect = document.getElementById('kategoriDokumen');
                                kategoriDokumenSelect.innerHTML = '<option value="">Error memuat data</option>';
                            });
                    });
</script>
@endsection
