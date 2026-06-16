@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Tambah Post / Berita</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Post</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-9 col-md-11">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-newspaper me-2 text-primary"></i>Form Tambah Post
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

                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">
                            Judul Post <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               id="title"
                               name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}"
                               placeholder="Masukkan judul artikel/berita"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi Singkat --}}
                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">
                            Deskripsi Singkat <span class="text-danger">*</span>
                        </label>
                        <textarea id="description"
                                  name="description"
                                  class="form-control @error('description') is-invalid @enderror"
                                  rows="2"
                                  placeholder="Deskripsi singkat atau kutipan artikel"
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Isi Konten (TinyMCE) --}}
                    <div class="mb-3">
                        <label for="content" class="form-label fw-semibold">
                            Konten Lengkap <span class="text-danger">*</span>
                        </label>
                        <textarea id="content"
                                  name="content"
                                  class="form-control @error('content') is-invalid @enderror"
                                  rows="10">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        {{-- Status --}}
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="status" class="form-label fw-semibold">
                                Status <span class="text-danger">*</span>
                            </label>
                            <select id="status"
                                    name="status"
                                    class="form-select @error('status') is-invalid @enderror"
                                    required>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Thumbnail --}}
                        <div class="col-md-6">
                            <label for="thumbnail" class="form-label fw-semibold">
                                Gambar Thumbnail <span class="text-danger">*</span>
                            </label>
                            <input type="file"
                                   id="thumbnail"
                                   name="thumbnail"
                                   class="form-control @error('thumbnail') is-invalid @enderror"
                                   accept="image/*"
                                   onchange="previewThumbnail(this)"
                                   required>
                            <div class="form-text">Format: JPG, JPEG, PNG, WebP. Maks: 2 MB.</div>
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            {{-- Preview --}}
                            <div id="previewWrap" class="mt-3 d-none">
                                <p class="small text-muted mb-1">Preview:</p>
                                <img id="previewImg"
                                     src=""
                                     alt="Preview"
                                     style="max-width:200px;max-height:120px;object-fit:cover;border-radius:6px;border:1px solid #dee2e6">
                            </div>
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2">
                        <a href="{{ route('news.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Terbitkan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Load TinyMCE dari CDN --}}
<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    // Inisialisasi TinyMCE
    tinymce.init({
        selector: 'textarea#content',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
        toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        height: 400,
        branding: false,
        promotion: false
    });

    // Preview Thumbnail
    function previewThumbnail(input) {
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
