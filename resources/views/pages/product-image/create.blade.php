@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Tambah Gambar Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product-image.index') }}">Gambar Produk</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-7 col-md-9">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-image-fill me-2 text-primary"></i>Form Tambah Gambar Produk
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

                <form action="{{ route('product-image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Produk --}}
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

                    {{-- Upload Foto --}}
                    <div class="mb-4">
                        <label for="foto" class="form-label fw-semibold">
                            Gambar Produk <span class="text-danger">*</span>
                        </label>
                        <input type="file"
                               id="foto"
                               name="foto[]"
                               class="form-control @error('foto') is-invalid @enderror"
                               accept="image/*"
                               onchange="previewImages(this)"
                               multiple
                               required>
                        <div class="form-text">Bisa pilih lebih dari satu gambar. Format: JPG, JPEG, PNG, GIF, SVG, WebP. Maks: 2 MB per berkas.</div>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Preview gambar --}}
                        <div id="previewWrap" class="mt-3 d-none">
                            <p class="small text-muted mb-1">Preview:</p>
                            <div id="previewContainer" class="d-flex flex-wrap gap-2"></div>
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2">
                        <a href="{{ route('product-image.index') }}" class="btn btn-secondary">
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
    function previewImages(input) {
        const wrap = document.getElementById('previewWrap');
        const container = document.getElementById('previewContainer');
        container.innerHTML = '';
        
        if (input.files && input.files.length > 0) {
            wrap.classList.remove('d-none');
            Array.from(input.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = '6px';
                    img.style.border = '1px solid #dee2e6';
                    container.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        } else {
            wrap.classList.add('d-none');
        }
    }
</script>
@endpush
