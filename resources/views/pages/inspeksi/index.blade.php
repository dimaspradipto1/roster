@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Data Inspeksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Inspeksi</li>
        </ol>
    </nav>
</div>

{{-- Stat Cards --}}
<div class="row mb-3">
    <div class="col-xxl-3 col-md-6 mb-3">
        <div class="card info-card shadow-sm mb-0">
            <div class="card-body">
                <h5 class="card-title pb-1">Total Inspeksi</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-primary-subtle text-primary">
                        <i class="bi bi-clipboard-data fs-4"></i>
                    </div>
                    <div class="ps-3">
                        <h4 class="mb-0 fw-bold">{{ $stats['total'] }}</h4>
                        <span class="text-muted small">Semua Laporan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-md-6 mb-3">
        <div class="card info-card shadow-sm mb-0">
            <div class="card-body">
                <h5 class="card-title pb-1">Sertifikat Aktif</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success-subtle text-success">
                        <i class="bi bi-check-circle fs-4"></i>
                    </div>
                    <div class="ps-3">
                        <h4 class="mb-0 fw-bold text-success">{{ $stats['aktif'] }}</h4>
                        <span class="text-muted small">> 30 hari tersisa</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-md-6 mb-3">
        <div class="card info-card shadow-sm mb-0">
            <div class="card-body">
                <h5 class="card-title pb-1">Segera Berakhir</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-warning-subtle text-warning">
                        <i class="bi bi-exclamation-triangle fs-4"></i>
                    </div>
                    <div class="ps-3">
                        <h4 class="mb-0 fw-bold text-warning">{{ $stats['segera_expired'] }}</h4>
                        <span class="text-muted small">&le; 30 hari lagi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-md-6 mb-3">
        <div class="card info-card shadow-sm mb-0">
            <div class="card-body">
                <h5 class="card-title pb-1">Expired / Kedaluwarsa</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-danger-subtle text-danger">
                        <i class="bi bi-x-octagon fs-4"></i>
                    </div>
                    <div class="ps-3">
                        <h4 class="mb-0 fw-bold text-danger">{{ $stats['expired'] }}</h4>
                        <span class="text-muted small">Perlu perpanjangan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-clipboard-check me-2 text-primary"></i>Daftar Laporan Hasil Inspeksi
        </h5>
        <a href="{{ route('inspeksi.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Data Inspeksi
        </a>
    </div>
    <div class="card-body pt-3">
        <div class="table-responsive">
            {{ $dataTable->table([
                'class' => 'table table-striped table-bordered align-middle',
                'style' => 'width:100%',
            ]) }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @if(app()->environment('production'))
        {!! str_replace('http:', 'https:', $dataTable->scripts()) !!}
    @else
        {!! $dataTable->scripts() !!}
    @endif
@endpush
