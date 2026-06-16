@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Tambah Nomor Admin</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('nomoradmin.index') }}">Nomor Admin</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-person-plus-fill me-2 text-primary"></i>Form Tambah Nomor Admin
                </h5>
            </div>
            <div class="card-body pt-4">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Periksa kembali data Anda:</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('nomoradmin.store') }}" method="POST">
                    @csrf

                    {{-- Nama Admin --}}
                    <div class="mb-3">
                        <label for="nama_admin" class="form-label fw-semibold">
                            Nama Admin <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               id="nama_admin"
                               name="nama_admin"
                               class="form-control @error('nama_admin') is-invalid @enderror"
                               value="{{ old('nama_admin') }}"
                               placeholder="Masukkan nama admin"
                               required>
                        @error('nama_admin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nomor WhatsApp --}}
                    <div class="mb-3">
                        <label for="no_wa" class="form-label fw-semibold">
                            Nomor WhatsApp <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white">
                                <i class="bi bi-whatsapp"></i>
                            </span>
                            <input type="text"
                                   id="no_wa"
                                   name="no_wa"
                                   class="form-control @error('no_wa') is-invalid @enderror"
                                   value="{{ old('no_wa') }}"
                                   placeholder="Contoh: 08123456789 atau 628123456789"
                                   required>
                            <a id="btnTestWa" href="#" target="_blank" class="btn btn-outline-success" title="Test buka WhatsApp">
                                <i class="bi bi-box-arrow-up-right me-1"></i>Test WA
                            </a>
                        </div>
                        @error('no_wa')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <div class="form-text text-muted mt-1">
                            <i class="bi bi-info-circle me-1"></i>
                            Klik <strong>Test WA</strong> setelah mengetik nomor untuk memastikan nomor terdaftar di WhatsApp.
                        </div>
                        <div id="wa-preview" class="mt-2 d-none">
                            <span class="badge bg-light text-dark border">
                                <i class="bi bi-telephone me-1"></i>
                                Format: <span id="wa-formatted">-</span>
                            </span>
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('nomoradmin.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
(function () {
    const inputNoWa   = document.getElementById('no_wa');
    const btnTestWa   = document.getElementById('btnTestWa');
    const waPreview   = document.getElementById('wa-preview');
    const waFormatted = document.getElementById('wa-formatted');

    function formatPhone(raw) {
        let phone = raw.replace(/[^0-9]/g, '');
        if (phone.startsWith('62')) {
            // sudah benar
        } else if (phone.startsWith('0')) {
            phone = '62' + phone.slice(1);
        } else if (phone.length > 0) {
            phone = '62' + phone;
        }
        return phone;
    }

    function updateTestLink() {
        const raw   = inputNoWa.value.trim();
        const phone = formatPhone(raw);

        if (phone.length >= 10) {
            const waUrl = 'https://wa.me/' + phone;
            btnTestWa.href = waUrl;
            btnTestWa.classList.remove('disabled');
            waFormatted.textContent = '+' + phone;
            waPreview.classList.remove('d-none');
        } else {
            btnTestWa.href = '#';
            btnTestWa.classList.add('disabled');
            waPreview.classList.add('d-none');
        }
    }

    inputNoWa.addEventListener('input', updateTestLink);
    updateTestLink(); // init on load
})();
</script>
@endpush

