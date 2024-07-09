@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top:50px">
    <div class="align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position:fixed">
            <a class="nav-link mb-2" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link active mb-2" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
            <a class="nav-link mb-2" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
            <a class="nav-link mb-2" id="v-pills-messages-tab" href="{{ route('list-dokumen-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Dokumen Saya</a>
            <a class="nav-link mb-2" id="v-pills-messages-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Deleted Dokumen</a>
            @if(auth()->check() && auth()->user()->approved && (auth()->user()->jabatan === 'Admin' || auth()->user()->jabatan === 'Kaprodi'))
            <a class="nav-link mb-2" id="v-pills-messages-tab" href="{{ route('kategori-dokumen.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Kategori</a>
            <a class="nav-link mb-2" id="v-pills-messages-tab" href="{{ route('jabatan.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Role</a>
            <a class="nav-link mb-2" id="v-pills-messages-tab" href="{{ route('list-user') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List User</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('validasi.index') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Validasi</a>
            @endif
        </div>
        <div class="tab-content ms-md-5 ms-sm-0" id="v-pills-tabContent" style="margin-left: 200px;">
            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <h3 class="judul">Kategori Dokumen</h3>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Pilih Tipe Dokumen') }}</div>
                            <div class="card-body">
                                <form id="inputTypeForm">
                                    <div class="mb-3">
                                        <label for="inputType" class="form-label">Tipe Dokumen:</label>
                                        <select id="inputType" class="form-select" name="inputType" required>
                                            <option value="" disabled selected>Pilih tipe dokumen...</option>
                                            <option value="file">File</option>
                                            <option value="link">Link</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="submitInputType">Lanjutkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('submitInputType').addEventListener('click', function() {
        var inputType = document.getElementById('inputType').value;
        if (inputType === 'file') {
            window.location.href = '{{ route("input-dokumen-file") }}';
        } else if (inputType === 'link') {
            window.location.href = '{{ route("input-dokumen-link") }}';
        } else {
            alert('Pilih tipe dokumen terlebih dahulu.');
        }
    });
</script>
@endsection
