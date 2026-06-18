@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Keunggulan Kami</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Keunggulan</li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-grid-3x3-gap-fill me-2 text-primary"></i>Daftar Keunggulan Kami
        </h5>
        <a href="{{ route('feature.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Keunggulan
        </a>
    </div>
    <div class="card-body pt-3">
        <div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            <strong>Info:</strong> Icon diisi menggunakan nama class icon Bootstrap (misal: <code>bi-grid-3x3-gap-fill</code>, <code>bi-award</code>, <code>bi-shield-check</code>).
            Daftar lengkap class icon bisa dilihat di <a href="https://icons.getbootstrap.com/" target="_blank" class="alert-link">Bootstrap Icons website</a>.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
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
