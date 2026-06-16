@extends('layouts.dashboard.template')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Stats Columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Total Produk Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">Total Produk</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-primary-light text-primary" style="width: 50px; height: 50px; background: rgba(13, 110, 253, 0.1);">
                                        <i class="bi bi-box-seam" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-4 fw-bold mb-0">{{ $totalProducts }}</h6>
                                        <span class="text-muted small">Produk Roster</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Booking Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">Total Booking</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-success" style="width: 50px; height: 50px; background: rgba(25, 135, 84, 0.1);">
                                        <i class="bi bi-calendar-check" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-4 fw-bold mb-0">{{ $totalBookings }}</h6>
                                        <span class="text-muted small">Pemesanan WA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Kategori Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card customers-card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">Kategori</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 50px; height: 50px; background: rgba(255, 193, 7, 0.1);">
                                        <i class="bi bi-bookmark" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-4 fw-bold mb-0">{{ $totalCategories }}</h6>
                                        <span class="text-muted small">Kategori Produk</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Post Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">Artikel / Post</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 50px; height: 50px; background: rgba(13, 202, 240, 0.1);">
                                        <i class="bi bi-newspaper" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-4 fw-bold mb-0">{{ $totalNews }}</h6>
                                        <span class="text-muted small">Kabar & Berita</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Charts Section -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Tren Booking Roster</h5>
                        <div id="bookingTrendChart"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Kategori Produk</h5>
                        <div id="categoryRatioChart" style="min-height: 290px;"></div>
                    </div>
                </div>
            </div>

            <!-- Latest Bookings Table -->
            <div class="col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3 bg-transparent border-0 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-semibold text-dark">Booking Terbaru</h5>
                        <a href="{{ route('booking.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama Pelanggan</th>
                                        <th>Produk</th>
                                        <th>No. WhatsApp</th>
                                        <th>Waktu</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestBookings as $booking)
                                        <tr>
                                            <td class="fw-semibold">{{ $booking->nama }}</td>
                                            <td>
                                                @if($booking->product)
                                                    {{ $booking->product->nama_produk }}
                                                    <span class="badge bg-secondary ms-1">{{ $booking->product->kode_produk }}</span>
                                                @else
                                                    <span class="text-muted fst-italic">Tanpa Produk</span>
                                                @endif
                                            </td>
                                            <td>{{ $booking->no_wa }}</td>
                                            <td>{{ $booking->created_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                @php
                                                    $phone = preg_replace('/[^0-9]/', '', $booking->no_wa);
                                                    if (strpos($phone, '0') === 0) {
                                                        $phone = '62' . substr($phone, 1);
                                                    }
                                                    $prodName = $booking->product ? $booking->product->nama_produk : 'Produk Roster';
                                                    $prodCode = $booking->product ? $booking->product->kode_produk : '-';
                                                    $message = urlencode("Halo Kak " . $booking->nama . ", kami dari admin Roster. Terkait booking Anda untuk produk *" . $prodName . "* (Kode: " . $prodCode . "), ada yang bisa kami bantu?");
                                                    $waUrl = "https://wa.me/" . $phone . "?text=" . $message;
                                                @endphp
                                                <a href="{{ $waUrl }}" target="_blank" class="btn btn-sm btn-success px-3">
                                                    <i class="bi bi-whatsapp me-1"></i> Hubungi WA
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-3">Belum ada data booking masuk.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Data Tren Booking dari DB
        const bookingsData = {!! json_encode($bookingsChart) !!};
        const dates = bookingsData.map(item => item.date);
        const totals = bookingsData.map(item => item.total);

        // Tren Booking Chart (Area Chart)
        new ApexCharts(document.querySelector("#bookingTrendChart"), {
            series: [{
                name: 'Total Booking',
                data: totals.length ? totals : [0]
            }],
            chart: {
                height: 350,
                type: 'area',
                toolbar: { show: false }
            },
            colors: ['#2eca6a'],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.4,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 2 },
            xaxis: {
                categories: dates.length ? dates : ['Tidak Ada Data'],
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            tooltip: { x: { format: 'yyyy-MM-dd' } }
        }).render();

        // Data Kategori dari DB
        const categoriesData = {!! json_encode($categoriesChart) !!};
        const catLabels = categoriesData.map(item => item.nama_kategori);
        const catCounts = categoriesData.map(item => item.products_count);

        // Kategori Ratio Chart (Donut Chart)
        new ApexCharts(document.querySelector("#categoryRatioChart"), {
            series: catCounts.length ? catCounts : [0],
            chart: {
                height: 290,
                type: 'donut',
            },
            labels: catLabels.length ? catLabels : ['Kosong'],
            colors: ['#4154f1', '#2eca6a', '#ff771d', '#13caf0', '#ffc107'],
            legend: {
                position: 'bottom'
            },
            dataLabels: { enabled: true }
        }).render();
    });
</script>
@endpush
