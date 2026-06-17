@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Manajemen Milestone</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Milestone</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-clock-history me-2 text-primary"></i>Daftar Milestone
                </h5>
                <a href="{{ route('milestone.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Milestone
                </a>
            </div>
            <div class="card-body pt-4">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{ $dataTable->table(['class' => 'table table-hover table-bordered align-middle']) }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
