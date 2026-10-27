@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Edit Data Inspeksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item"><a href="{{ route('inspeksi.index') }}">Inspeksi</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-pencil-square me-2 text-primary"></i>Form Edit Data Inspeksi
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

                <form action="{{ route('inspeksi.update', $inspeksi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                                   value="{{ old('no_laporan', $inspeksi->no_laporan) }}"
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
                                   value="{{ old('unit', $inspeksi->unit) }}"
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
                                   value="{{ old('bidang_inspeksi', $inspeksi->bidang_inspeksi) }}"
                                   required>
                            <datalist id="bidangList">
                                <option value="PTP">Pesawat Tenaga dan Produksi (PTP)</option>
                                <option value="PAA">Pesawat Angkat dan Angkut (PAA)</option>
                                <option value="PUBT">Pesawat Uap dan Bejana Tekan (PUBT)</option>
                                <option value="EE">Instalasi Listrik & Penyalur Petir (EE)</option>
                                <option value="PKK">Proteksi Kebakaran (PKK)</option>
                                <option value="ELEVASOR">Elevator & Eskalator</option>
                            </datalist>
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
                                   value="{{ old('perusahaan_pemilik', $inspeksi->perusahaan_pemilik) }}"
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
                                  required>{{ old('alamat_perusahaan', $inspeksi->alamat_perusahaan) }}</textarea>
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
                                   value="{{ old('nama_alat', $inspeksi->nama_alat) }}"
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
                                   value="{{ old('nomor_seri', $inspeksi->nomor_seri) }}">
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
                                   value="{{ old('tanggal_inspeksi', $inspeksi->tanggal_inspeksi ? $inspeksi->tanggal_inspeksi->format('Y-m-d') : '') }}"
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
                                   value="{{ old('tanggal_expired', $inspeksi->tanggal_expired ? $inspeksi->tanggal_expired->format('Y-m-d') : '') }}"
                                   required>
                            @error('tanggal_expired')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Upload Dokumen / File Laporan --}}
                    <div class="mb-3">
                        <label for="file_laporan" class="form-label fw-semibold">
                            Ganti File / Dokumen Laporan
                            <span class="badge bg-secondary fw-normal ms-1" style="font-size:10px">Opsional</span>
                        </label>
                        @if ($inspeksi->file_laporan)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $inspeksi->file_laporan) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-file-earmark-pdf me-1"></i> Lihat Dokumen Saat Ini
                                </a>
                            </div>
                        @endif
                        <input type="file"
                               id="file_laporan"
                               name="file_laporan"
                               class="form-control @error('file_laporan') is-invalid @enderror"
                               accept=".pdf,image/jpeg,image/png">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah file laporan yang tersimpan.</div>
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
                                  class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $inspeksi->keterangan) }}</textarea>
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
                            <i class="bi bi-save me-1"></i> Perbarui Data Inspeksi
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
