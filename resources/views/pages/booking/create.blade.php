@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Tambah Booking</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Booking</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-calendar-plus-fill me-2 text-primary"></i>Form Tambah Booking
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

                {{-- Data admin tersembunyi untuk JS --}}
                <div id="admins-data" style="display:none;">
                    @foreach($admins as $admin)
                        <span
                            data-id="{{ $admin->id }}"
                            data-no-wa="{{ $admin->no_wa }}"
                            data-nama="{{ $admin->nama_admin }}">
                        </span>
                    @endforeach
                </div>

                {{-- Data produk tersembunyi untuk JS --}}
                <div id="products-data" style="display:none;">
                    @foreach($products as $product)
                        <span
                            data-id="{{ $product->id }}"
                            data-nama="{{ $product->nama_produk }}"
                            data-kode="{{ $product->kode_produk }}">
                        </span>
                    @endforeach
                </div>

                <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
                    @csrf

                    {{-- Pilih Produk --}}
                    <div class="mb-3">
                        <label for="product_id" class="form-label fw-semibold">
                            Pilih Produk <span class="text-danger">*</span>
                        </label>
                        <select id="product_id"
                                name="product_id"
                                class="form-select @error('product_id') is-invalid @enderror"
                                required>
                            <option value="">-- Pilih Produk --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->nama_produk }} ({{ $product->kode_produk }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Pilih Admin --}}
                    <div class="mb-3">
                        <label for="nomor_admin_id" class="form-label fw-semibold">
                            Pilih Admin <span class="text-danger">*</span>
                        </label>
                        <select id="nomor_admin_id"
                                name="nomor_admin_id"
                                class="form-select @error('nomor_admin_id') is-invalid @enderror"
                                required>
                            <option value="">-- Pilih Admin --</option>
                            @foreach($admins as $admin)
                                <option value="{{ $admin->id }}" {{ old('nomor_admin_id') == $admin->id ? 'selected' : '' }}>
                                    {{ $admin->nama_admin }} ({{ $admin->no_wa }})
                                </option>
                            @endforeach
                        </select>
                        @error('nomor_admin_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">
                            Nama Pelanggan <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               id="nama"
                               name="nama"
                               class="form-control @error('nama') is-invalid @enderror"
                               value="{{ old('nama') }}"
                               placeholder="Masukkan nama pelanggan"
                               required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nomor WhatsApp --}}
                    <div class="mb-4">
                        <label for="no_wa" class="form-label fw-semibold">
                            Nomor WhatsApp <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-whatsapp text-success"></i></span>
                            <input type="text"
                                   id="no_wa"
                                   name="no_wa"
                                   class="form-control @error('no_wa') is-invalid @enderror"
                                   value="{{ old('no_wa') }}"
                                   placeholder="Contoh: 08123456789"
                                   required>
                        </div>
                        @error('no_wa')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-text text-muted">
                            <i class="bi bi-info-circle me-1"></i>Setelah Simpan, Anda akan langsung diarahkan ke WhatsApp Admin.
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2">
                        <a href="{{ route('booking.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Batal
                        </a>
                        <button type="button" id="btnSubmit" class="btn btn-success">
                            <i class="bi bi-whatsapp me-1"></i> Simpan & Kirim ke WhatsApp
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
document.getElementById('btnSubmit').addEventListener('click', function () {
    const form = document.getElementById('bookingForm');

    // Validasi HTML5
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }

    const productId     = document.getElementById('product_id').value;
    const adminId       = document.getElementById('nomor_admin_id').value;
    const nama          = document.getElementById('nama').value.trim();
    const noWa          = document.getElementById('no_wa').value.trim();

    // Ambil data produk
    let prodNama = 'Produk Roster', prodKode = '-';
    document.querySelectorAll('#products-data span').forEach(function (el) {
        if (el.dataset.id === productId) {
            prodNama = el.dataset.nama;
            prodKode = el.dataset.kode;
        }
    });

    // Ambil nomor WA admin
    let adminPhone = '628123456789';
    document.querySelectorAll('#admins-data span').forEach(function (el) {
        if (el.dataset.id === adminId) {
            adminPhone = el.dataset.noWa;
        }
    });

    // Format nomor admin ke 62xxx
    adminPhone = adminPhone.replace(/[^0-9]/g, '');
    if (adminPhone.startsWith('62')) {
        // sudah benar
    } else if (adminPhone.startsWith('0')) {
        adminPhone = '62' + adminPhone.slice(1);
    } else {
        adminPhone = '62' + adminPhone;
    }

    // Susun pesan WhatsApp
    const message = encodeURIComponent(
        'Halo Admin Roster, saya ingin melakukan booking untuk produk *' + prodNama +
        '* (Kode: ' + prodKode + ') atas nama *' + nama + '*. Nomor WhatsApp saya: ' + noWa
    );

    const waUrl = 'https://wa.me/' + adminPhone + '?text=' + message;

    // Buka WhatsApp di tab baru terlebih dahulu
    window.open(waUrl, '_blank');

    // Kemudian submit form untuk simpan ke database (tanpa redirect ke WA dari server)
    form.submit();
});
</script>
@endpush

