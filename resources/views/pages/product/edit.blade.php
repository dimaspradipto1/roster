@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Edit Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Produk</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-7 col-md-9">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-pencil-square me-2 text-warning"></i>Form Edit Produk
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

                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Kode Produk --}}
                    <div class="mb-3">
                        <label for="kode_produk" class="form-label fw-semibold">
                            Kode Produk <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               id="kode_produk"
                               name="kode_produk"
                               class="form-control @error('kode_produk') is-invalid @enderror"
                               value="{{ old('kode_produk', $product->kode_produk) }}"
                               placeholder="Masukkan kode produk"
                               required>
                        @error('kode_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="mb-3">
                        <label for="category_id" class="form-label fw-semibold">
                            Kategori Produk <span class="text-danger">*</span>
                        </label>
                        <select id="category_id"
                                name="category_id"
                                class="form-select @error('category_id') is-invalid @enderror"
                                required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nama Produk --}}
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label fw-semibold">
                            Nama Produk <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               id="nama_produk"
                               name="nama_produk"
                               class="form-control @error('nama_produk') is-invalid @enderror"
                               value="{{ old('nama_produk', $product->nama_produk) }}"
                               placeholder="Masukkan nama produk"
                               required>
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Dimensi (P x L x T) --}}
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <label for="panjang" class="form-label fw-semibold">
                                Panjang (cm) <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                   id="panjang"
                                   name="panjang"
                                   class="form-control @error('panjang') is-invalid @enderror"
                                   value="{{ old('panjang', $product->panjang) }}"
                                   placeholder="Panjang"
                                   min="0"
                                   required>
                            @error('panjang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <label for="lebar" class="form-label fw-semibold">
                                Lebar (cm) <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                   id="lebar"
                                   name="lebar"
                                   class="form-control @error('lebar') is-invalid @enderror"
                                   value="{{ old('lebar', $product->lebar) }}"
                                   placeholder="Lebar"
                                   min="0"
                                   required>
                            @error('lebar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="tebal" class="form-label fw-semibold">
                                Tebal (cm) <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                   id="tebal"
                                   name="tebal"
                                   class="form-control @error('tebal') is-invalid @enderror"
                                   value="{{ old('tebal', $product->tebal) }}"
                                   placeholder="Tebal"
                                   min="0"
                                   required>
                            @error('tebal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Harga & Stok --}}
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="harga" class="form-label fw-semibold">
                                Harga (Rp) <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                   id="harga"
                                   name="harga"
                                   class="form-control @error('harga') is-invalid @enderror"
                                   value="{{ old('harga', $product->harga) }}"
                                   placeholder="Masukkan harga"
                                   min="0"
                                   step="0.01"
                                   required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="stok" class="form-label fw-semibold">
                                Stok <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                   id="stok"
                                   name="stok"
                                   class="form-control @error('stok') is-invalid @enderror"
                                   value="{{ old('stok', $product->stok) }}"
                                   placeholder="Masukkan jumlah stok"
                                   min="0"
                                   required>
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2">
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">
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
