@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Tambah Data Inspeksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item"><a href="{{ route('inspeksi.index') }}">Inspeksi</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-plus-circle-fill me-2 text-primary"></i>Form Tambah Data Inspeksi
                </h5>
            </div>
            <div class="card-body pt-4">

                {{-- Alert Error --}}
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

                <form action="{{ route('inspeksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3 mb-3">
                        {{-- No Laporan --}}
                        <div class="col-md-8">
                            <label for="no_laporan" class="form-label fw-semibold">
                                No. Laporan <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   id="no_laporan"
                                   name="no_laporan"
                                   class="form-control @error('no_laporan') is-invalid @enderror"
                                   value="{{ old('no_laporan') }}"
                                   placeholder="Contoh: 001-003/BJI-PTP03/I/2025"
                                   required>
                            @error('no_laporan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Unit --}}
                        <div class="col-md-4">
                            <label for="unit" class="form-label fw-semibold">
                                Unit (Jumlah) <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                   id="unit"
                                   name="unit"
                                   min="1"
                                   class="form-control @error('unit') is-invalid @enderror"
                                   value="{{ old('unit', 1) }}"
                                   placeholder="1"
                                   required>
                            @error('unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        {{-- Bidang Inspeksi --}}
                        <div class="col-md-6">
                            <label for="bidang_inspeksi" class="form-label fw-semibold">
                                Bidang Inspeksi <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   id="bidang_inspeksi"
                                   name="bidang_inspeksi"
                                   list="bidangList"
                                   class="form-control @error('bidang_inspeksi') is-invalid @enderror"
                                   value="{{ old('bidang_inspeksi') }}"
                                   placeholder="Contoh: PTP, PAA, PUBT, EE"
                                   required>
                            <datalist id="bidangList">
                                <option value="PTP">Pesawat Tenaga dan Produksi (PTP)</option>
                                <option value="PAA">Pesawat Angkat dan Angkut (PAA)</option>
                                <option value="PUBT">Pesawat Uap dan Bejana Tekan (PUBT)</option>
                                <option value="EE">Instalasi Listrik & Penyalur Petir (EE)</option>
                                <option value="PKK">Proteksi Kebakaran (PKK)</option>
                                <option value="ELEVASOR">Elevator & Eskalator</option>
                            </datalist>
                            <div class="form-text">Pilih atau ketik bidang inspeksi.</div>
                            @error('bidang_inspeksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Perusahaan Pemilik --}}
                        <div class="col-md-6">
                            <label for="perusahaan_pemilik" class="form-label fw-semibold">
                                Perusahaan Pemilik <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   id="perusahaan_pemilik"
                                   name="perusahaan_pemilik"
                                   class="form-control @error('perusahaan_pemilik') is-invalid @enderror"
                                   value="{{ old('perusahaan_pemilik') }}"
                                   placeholder="Contoh: PT. AMBER KARYA"
                                   required>
                            @error('perusahaan_pemilik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Alamat Perusahaan --}}
                    <div class="mb-3">
                        <label for="alamat_perusahaan" class="form-label fw-semibold">
                            Alamat Perusahaan <span class="text-danger">*</span>
                        </label>
                        <textarea id="alamat_perusahaan"
                                  name="alamat_perusahaan"
                                  rows="2"
                                  class="form-control @error('alamat_perusahaan') is-invalid @enderror"
                                  placeholder="Contoh: Tunas Industrial Estate Blok 8C Jl. Engku Putri-Batam Centre"
                                  required>{{ old('alamat_perusahaan') }}</textarea>
                        @error('alamat_perusahaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        {{-- Nama Alat / Nama Merk --}}
                        <div class="col-md-8">
                            <label for="nama_alat" class="form-label fw-semibold">
                                Nama Alat / Nama Merk <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   id="nama_alat"
                                   name="nama_alat"
                                   class="form-control @error('nama_alat') is-invalid @enderror"
                                   value="{{ old('nama_alat') }}"
                                   placeholder="Contoh: MESIN MOLDING / BULLDOZER / GENERATOR SET"
                                   required>
                            @error('nama_alat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nomor Seri --}}
                        <div class="col-md-4">
                            <label for="nomor_seri" class="form-label fw-semibold">
                                Nomor Seri
                                <span class="badge bg-secondary fw-normal ms-1" style="font-size:10px">Opsional</span>
                            </label>
                            <input type="text"
                                   id="nomor_seri"
                                   name="nomor_seri"
                                   class="form-control @error('nomor_seri') is-invalid @enderror"
                                   value="{{ old('nomor_seri') }}"
                                   placeholder="Contoh: 4482">
                            @error('nomor_seri')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        {{-- Tanggal Inpek / Inspeksi --}}
                        <div class="col-md-6">
                            <label for="tanggal_inspeksi" class="form-label fw-semibold">
                                Tanggal Inpek (Inspeksi) <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                                   id="tanggal_inspeksi"
                                   name="tanggal_inspeksi"
                                   class="form-control @error('tanggal_inspeksi') is-invalid @enderror"
                                   value="{{ old('tanggal_inspeksi', date('Y-m-d')) }}"
                                   required>
                            @error('tanggal_inspeksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Expired --}}
                        <div class="col-md-6">
                            <label for="tanggal_expired" class="form-label fw-semibold">
                                Expired (Kedaluwarsa) <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                                   id="tanggal_expired"
                                   name="tanggal_expired"
                                   class="form-control @error('tanggal_expired') is-invalid @enderror"
                                   value="{{ old('tanggal_expired', date('Y-m-d', strtotime('+1 year'))) }}"
                                   required>
                            <div class="form-text">Masa berlaku sertifikat inspeksi (umumnya 1 tahun dari inspeksi).</div>
                            @error('tanggal_expired')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Upload Dokumen / File Laporan (Opsional) --}}
                    <div class="mb-3">
                        <label for="file_laporan" class="form-label fw-semibold">
                            Upload File / Dokumen Laporan
                            <span class="badge bg-secondary fw-normal ms-1" style="font-size:10px">Opsional</span>
                        </label>
                        <input type="file"
                               id="file_laporan"
                               name="file_laporan"
                               class="form-control @error('file_laporan') is-invalid @enderror"
                               accept=".pdf,image/jpeg,image/png">
                        <div class="form-text">Format: PDF, JPG, PNG (Maks 10 MB).</div>
                        @error('file_laporan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Keterangan / Catatan --}}
                    <div class="mb-4">
                        <label for="keterangan" class="form-label fw-semibold">
                            Keterangan Tambahan
                            <span class="badge bg-secondary fw-normal ms-1" style="font-size:10px">Opsional</span>
                        </label>
                        <textarea id="keterangan"
                                  name="keterangan"
                                  rows="2"
                                  class="form-control @error('keterangan') is-invalid @enderror"
                                  placeholder="Catatan hasil inspeksi, kondisi alat, atau rekomendasi...">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Action buttons --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('inspeksi.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Data Inspeksi
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
