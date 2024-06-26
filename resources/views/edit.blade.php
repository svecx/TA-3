@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top:50px">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position:fixed">
            <a class="nav-link" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
            <a class="nav-link active" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Dokumen Saya</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Kategori</a>
            @if(auth()->check() && auth()->user()->approved && (auth()->user()->jabatan === 'Admin' || auth()->user()->jabatan === 'Kaprodi'))
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('kategori-dokumen-view') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Deleted Dokumen</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List User</a>
    @endif
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <h3 class="judul">EDIT DOKUMEN</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('dokumen.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div>
                        <label class="form-label">Judul Dokumen:</label>
                        <input class="form-control" name="judul_dokumen" value="{{ $document->judul_dokumen }}" style="margin-left:200px">
                    </div>
                    <div>
                        <label class="form-label">Deskripsi Dokumen:</label>
                        <input class="form-control" name="deskripsi_dokumen" value="{{ $document->deskripsi_dokumen }}" style="margin-left:200px">
                    </div>
                    <div style="margin-left:200px; margin-top:10px">
                        <label>Kategori Dokumen:</label>
                        <select name="kategori_dokumen" class="form-control" required>
                            <option value="Dokumen Visi Misi" {{ $document->kategori_dokumen == 'Dokumen Visi Misi' ? 'selected' : '' }}>Dokumen Visi Misi</option>
                            <option value="Dokumen Tujuan" {{ $document->kategori_dokumen == 'Dokumen Tujuan' ? 'selected' : '' }}>Dokumen Tujuan</option>
                            <option value="Dokumen Strategi" {{ $document->kategori_dokumen == 'Dokumen Strategi' ? 'selected' : '' }}>Dokumen Strategi</option>
                            <option value="Dokumen Tata Pamong" {{ $document->kategori_dokumen == 'Dokumen Tata Pamong' ? 'selected' : '' }}>Dokumen Tata Pamong</option>
                            <option value="Dokumen Tata Kelola" {{ $document->kategori_dokumen == 'Dokumen Tata Kelola' ? 'selected' : '' }}>Dokumen Tata Kelola</option>
                            <option value="Dokumen Kerjasama" {{ $document->kategori_dokumen == 'Dokumen Kerjasama' ? 'selected' : '' }}>Dokumen Kerjasama</option>
                            <option value="Dokumen Mahasiswa" {{ $document->kategori_dokumen == 'Dokumen Mahasiswa' ? 'selected' : '' }}>Dokumen Mahasiswa</option>
                            <option value="Dokumen Sumber Daya Manusia" {{ $document->kategori_dokumen == 'Dokumen Sumber Daya Manusia' ? 'selected' : '' }}>Dokumen Sumber Daya Manusia</option>
                            <option value="Dokumen Keuangan" {{ $document->kategori_dokumen == 'Dokumen Keuangan' ? 'selected' : '' }}>Dokumen Keuangan</option>
                            <option value="Dokumen Sarana Prasarana" {{ $document->kategori_dokumen == 'Dokumen Sarana Prasarana' ? 'selected' : '' }}>Dokumen Sarana Prasarana</option>
                            <option value="Dokumen Pendidikan" {{ $document->kategori_dokumen == 'Dokumen Pendidikan' ? 'selected' : '' }}>Dokumen Pendidikan</option>
                            <option value="Dokumen Penelitian" {{ $document->kategori_dokumen == 'Dokumen Penelitian' ? 'selected' : '' }}>Dokumen Penelitian</option>
                            <option value="Dokumen Pengabdian Kepada Masyarakat" {{ $document->kategori_dokumen == 'Dokumen Pengabdian Kepada Masyarakat' ? 'selected' : '' }}>Dokumen Pengabdian Kepada Masyarakat</option>
                            <option value="Dokumen Iuran" {{ $document->kategori_dokumen == 'Dokumen Iuran' ? 'selected' : '' }}>Dokumen Iuran</option>
                            <option value="Dokumen Capaian Tridarma" {{ $document->kategori_dokumen == 'Dokumen Capaian Tridarma' ? 'selected' : '' }}>Dokumen Capaian Tridarma</option>
                        </select>
                    </div>
                    <!-- validasi dokumen -->
                    <div style="margin-left:200px; margin-top:10px">
                        <label>Validasi Dokumen:</label>
                        <select name="validasi_dokumen" class="form-control" required>
                            <option value="Direktur" {{ $document->validasi_dokumen == 'Direktur' ? 'selected' : '' }}>Direktur</option>
                            <option value="Ketua Jurusan" {{ $document->validasi_dokumen == 'Ketua Jurusan' ? 'selected' : '' }}>Ketua Jurusan</option>
                            <option value="Ketua Program Studi" {{ $document->validasi_dokumen == 'Ketua Program Studi' ? 'selected' : '' }}>Ketua Program Studi</option>
                            <option value="Kelompok Bidang Keahlian" {{ $document->validasi_dokumen == 'Kelompok Bidang Keahlian' ? 'selected' : '' }}>Kelompok Bidang Keahlian</option>
                        </select>
                    </div>
                    <div>
                        <label for="tahunDokumen" class="form-label">Tahun Dokumen:</label>
                        <input type="number" class="form-control" name="tahun_dokumen" value="{{ $document->tahun_dokumen }}" id="tahunDokumen" style="margin-left:200px; position:relative; z-index: 1;" min="1900" max="2100" required>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">File Dokumen:</label>
                        <input class="form-control" type="file" id="editFile" name="edit_dokumen_file" style="margin-left:200px">
                        <div>
                            <small style="margin-left:200px">File yang sudah diunggah: {{ $document->dokumen_file}}</small>
                        </div>
                    </div>


                    <div class="form-label">
                        <div>
                            <label for="tags">Tags:</label>
                            <input type="text" id="tags" name="tags" data-role="tagsinput" class="form-control" value="{{ $document->tags }}" placeholder="Add tags">
                        </div>
                    </div>

                    <div class="form-label">
                        <div>
                            <label for="permissions">Izinkan siapa saja yang melihat:</label>
                        </div>
                        <div>
                            @foreach(['all' => 'All', 'kajur' => 'Kajur', 'sekjur' => 'Sekjur', 'kaprodi' => 'Kaprodi', 'dosen' => 'Dosen', 'adm' => 'Adm', 'mahasiswa' => 'Mahasiswa'] as $key => $label)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="{{ $key }}" name="permissions[]" value="{{ $key }}"
                                        {{ in_array($key, explode(',', $document->view ?? '')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-left:200px">Update</button>
                    <button href="{{ route('list-dokumen') }}" class="btn btn-secondary" style="margin-left:10px">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
