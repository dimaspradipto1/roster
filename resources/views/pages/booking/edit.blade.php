@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Edit Booking</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Booking</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-pencil-square me-2 text-warning"></i>Form Edit Booking
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

                <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')

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
                                <option value="{{ $product->id }}" {{ old('product_id', $booking->product_id) == $product->id ? 'selected' : '' }}>
                                    {{ $product->nama_produk }} ({{ $product->kode_produk }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
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
                               value="{{ old('nama', $booking->nama) }}"
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
                        <input type="text"
                               id="no_wa"
                               name="no_wa"
                               class="form-control @error('no_wa') is-invalid @enderror"
                               value="{{ old('no_wa', $booking->no_wa) }}"
                               placeholder="Masukkan nomor WhatsApp (contoh: 08123456789)"
                               required>
                        @error('no_wa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2">
                        <a href="{{ route('booking.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-warning text-white">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
