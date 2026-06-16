@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Edit Gambar Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product-image.index') }}">Gambar Produk</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-7 col-md-9">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-pencil-square me-2 text-warning"></i>Form Edit Gambar Produk
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

                <form action="{{ route('product-image.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                                <option value="{{ $product->id }}" {{ old('product_id', $image->product_id) == $product->id ? 'selected' : '' }}>
                                    {{ $product->nama_produk }} ({{ $product->kode_produk }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar Saat Ini --}}
                    @if ($image->url)
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar Saat Ini</label>
                            <div>
                                <img src="{{ asset('storage/' . $image->url) }}"
                                     alt="Gambar Produk"
                                     style="max-width:200px;max-height:200px;object-fit:cover;border-radius:8px;border:1px solid #dee2e6">
                            </div>
                        </div>
                    @endif

                    {{-- Ganti Gambar --}}
                    <div class="mb-4">
                        <label for="foto" class="form-label fw-semibold">
                            Ganti Gambar
                            <span class="badge bg-secondary fw-normal ms-1" style="font-size:10px">Opsional</span>
                        </label>
                        <input type="file"
                               id="foto"
                               name="foto"
                               class="form-control @error('foto') is-invalid @enderror"
                               accept="image/*"
                               onchange="previewImage(this)">
                        <div class="form-text">
                            <i class="bi bi-info-circle me-1"></i>
                            Kosongkan jika tidak ingin mengganti gambar. Format: JPG, JPEG, PNG, GIF, SVG, WebP. Maks: 2 MB.
                        </div>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Preview gambar baru --}}
                        <div id="previewWrap" class="mt-3 d-none">
                            <p class="small text-muted mb-1">Preview Gambar Baru:</p>
                            <img id="previewImg"
                                 src=""
                                 alt="Preview"
                                 style="max-width:200px;max-height:200px;object-fit:cover;border-radius:8px;border:2px solid #0d6efd">
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2">
                        <a href="{{ route('product-image.index') }}" class="btn btn-secondary">
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

@push('scripts')
<script>
    function previewImage(input) {
        const wrap = document.getElementById('previewWrap');
        const img  = document.getElementById('previewImg');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                img.src = e.target.result;
                wrap.classList.remove('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            wrap.classList.add('d-none');
        }
    }
</script>
@endpush
