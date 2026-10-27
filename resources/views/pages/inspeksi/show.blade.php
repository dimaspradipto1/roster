@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Detail Data Inspeksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item"><a href="{{ route('inspeksi.index') }}">Inspeksi</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-file-text-fill me-2 text-primary"></i>Laporan: {{ $inspeksi->no_laporan }}
                </h5>
                <div>
                    @if ($inspeksi->status_masa_berlaku === 'active')
                        <span class="badge bg-success px-3 py-2"><i class="bi bi-check-circle me-1"></i>Sertifikat Aktif</span>
                    @elseif ($inspeksi->status_masa_berlaku === 'warning')
                        <span class="badge bg-warning text-dark px-3 py-2"><i class="bi bi-exclamation-triangle me-1"></i>Segera Berakhir</span>
                    @else
                        <span class="badge bg-danger px-3 py-2"><i class="bi bi-x-circle me-1"></i>Expired / Kedaluwarsa</span>
                    @endif
                </div>
            </div>
            <div class="card-body pt-4">

                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped align-middle">
                        <tbody>
                            <tr>
                                <th style="width: 30%">No. Laporan</th>
                                <td class="fw-bold text-primary">{{ $inspeksi->no_laporan }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Unit</th>
                                <td><span class="badge bg-secondary fs-6">{{ $inspeksi->unit }} Unit</span></td>
                            </tr>
                            <tr>
                                <th>Bidang Inspeksi</th>
                                <td>
                                    <span class="badge bg-primary px-3 py-1 fs-6">{{ $inspeksi->bidang_inspeksi }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Perusahaan Pemilik</th>
                                <td class="fw-semibold">{{ $inspeksi->perusahaan_pemilik }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Perusahaan</th>
                                <td>{{ $inspeksi->alamat_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Nama Alat / Merk</th>
                                <td class="fw-semibold">{{ $inspeksi->nama_alat }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Seri</th>
                                <td>{{ $inspeksi->nomor_seri ?: '—' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Inspeksi (Inpek)</th>
                                <td>{{ $inspeksi->tanggal_inspeksi ? $inspeksi->tanggal_inspeksi->translatedFormat('d F Y') : '—' }}</td>
                            </tr>
                            <tr>
                                <th>Expired (Kedaluwarsa)</th>
                                <td>
                                    <span class="fw-bold">{{ $inspeksi->tanggal_expired ? $inspeksi->tanggal_expired->translatedFormat('d F Y') : '—' }}</span>
                                </td>
                            </tr>
                            @if ($inspeksi->file_laporan)
                            <tr>
                                <th>Dokumen Laporan</th>
                                <td>
                                    <a href="{{ asset('storage/' . $inspeksi->file_laporan) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-file-earmark-arrow-down me-1"></i> Buka / Download Dokumen
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @if ($inspeksi->keterangan)
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $inspeksi->keterangan }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('inspeksi.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                    </a>
                    <div style="gap: 5px;" class="d-flex">
                        <a href="{{ route('inspeksi.edit', $inspeksi->id) }}" class="btn btn-warning text-white">
                            <i class="bi bi-pencil-fill me-1"></i> Edit Data
                        </a>
                        <form action="{{ route('inspeksi.destroy', $inspeksi->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data inspeksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash-fill me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
