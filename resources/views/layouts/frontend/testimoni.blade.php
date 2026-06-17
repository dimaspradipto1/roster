@extends('layouts.frontend.template')

@section('title', 'Testimoni Pelanggan — Roster Dinding Minimalis')
@section('meta_description', 'Baca ulasan dan testimoni langsung dari kontraktor, arsitek, dan pemilik rumah yang telah mempercayakan kebutuhan roster dinding mereka kepada kami.')
@section('meta_keywords', 'testimoni roster, ulasan roster minimalis, review bata ventilasi, distributor roster terpercaya')

@section('content')
@php
  $cleanWa = '';
  if (!empty($contact->no_wa)) {
      $cleanWa = preg_replace('/[^0-9]/', '', $contact->no_wa);
      if (strpos($cleanWa, '08') === 0) {
          $cleanWa = '628' . substr($cleanWa, 2);
      }
  }
@endphp

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="testi-hero">
  <div class="testi-hero-bg"></div>
  <div class="testi-hero-overlay"></div>
  <div class="testi-hero-pattern"></div>

  <div class="container">
    <div class="testi-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 class="testi-hero-title">
        Testimoni <em>Pelanggan</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}">Beranda</a>
        <span class="sep">/</span>
        <span class="active">Testimoni</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     TESTIMONIAL SECTION
═══════════════════════════════════════════════ -->
<section class="section-bg-white roster-pattern">
  <div class="container">
    <div class="text-center mb-4" data-aos="fade-up">
      <div class="section-label mx-auto">Ulasan Pengguna</div>
      <h2 class="section-title">Apa Kata <em>Mitra & Pelanggan</em> Kami?</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto mb-4">
        Kepuasan pelanggan adalah tolok ukur kesuksesan kami. Berikut adalah pengalaman mereka yang telah menggunakan produk roster kami.
      </p>
    </div>

    <!-- Filter Buttons (Dynamic via JS toggles) -->
    <div class="filter-tags" data-aos="fade-up" data-aos-delay="100">
      <span class="filter-tag active" onclick="filterReviews('all')">Semua</span>
      <span class="filter-tag" onclick="filterReviews('kontraktor')">Kontraktor</span>
      <span class="filter-tag" onclick="filterReviews('arsitek')">Arsitek</span>
      <span class="filter-tag" onclick="filterReviews('pemilik')">Pemilik Rumah</span>
    </div>

    <!-- Review Grid -->
    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-md-6 col-lg-4 review-item" data-category="kontraktor" data-aos="fade-up" data-aos-delay="100">
        <div class="testimonial-card">
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p class="testimonial-text">"Kualitas roster betonnya sangat bagus, presisi, dan sesuai dengan foto katalog. Pengiriman juga cepat serta pengemasan sangat aman untuk proyek perumahan kami di Bandung."</p>
          <div class="testimonial-author">
            <div class="author-avatar">BN</div>
            <div>
              <div class="author-name">Budi Nugraha</div>
              <div class="author-role">Kontraktor, Bandung</div>
              <span class="author-badge">Kontraktor</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-6 col-lg-4 review-item" data-category="pemilik" data-aos="fade-up" data-aos-delay="200">
        <div class="testimonial-card">
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p class="testimonial-text">"Pilihan motifnya banyak sekali! Kami pakai roster minimalis terracotta untuk fasad toko kopi dan hasilnya sangat memuaskan. Pengunjung banyak memuji estetikanya."</p>
          <div class="testimonial-author">
            <div class="author-avatar">SR</div>
            <div>
              <div class="author-name">Sari Rahayu</div>
              <div class="author-role">Pemilik Usaha, Surabaya</div>
              <span class="author-badge">Pemilik Rumah</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-6 col-lg-4 review-item" data-category="arsitek" data-aos="fade-up" data-aos-delay="300">
        <div class="testimonial-card">
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
          </div>
          <p class="testimonial-text">"Harga sangat kompetitif untuk standar kualitas SNI yang diberikan. Respons sales sangat cepat saat saya meminta katalog digital dan perhitungan estimasi kebutuhan semen."</p>
          <div class="testimonial-author">
            <div class="author-avatar">DH</div>
            <div>
              <div class="author-name">Dimas Harianto</div>
              <div class="author-role">Arsitek Utama, Jakarta</div>
              <span class="author-badge">Arsitek</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-6 col-lg-4 review-item" data-category="kontraktor" data-aos="fade-up" data-aos-delay="100">
        <div class="testimonial-card">
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p class="testimonial-text">"Sudah langganan lebih dari 2 tahun untuk penyediaan roster proyek komersial. Tidak pernah ada masalah keterlambatan kiriman, dan garansi klaim barang pecah diproses tanpa ribet."</p>
          <div class="testimonial-author">
            <div class="author-avatar">YP</div>
            <div>
              <div class="author-name">Yusuf Pratama</div>
              <div class="author-role">Pimpinan Proyek, Semarang</div>
              <span class="author-badge">Kontraktor</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-md-6 col-lg-4 review-item" data-category="arsitek" data-aos="fade-up" data-aos-delay="200">
        <div class="testimonial-card">
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p class="testimonial-text">"Sebagai desainer interior, saya sangat pemilih soal presisi material. Roster beton abu-abu dari sini memiliki finishing halus dan ukuran presisi, memudahkan pemasangan rapi."</p>
          <div class="testimonial-author">
            <div class="author-avatar">AM</div>
            <div>
              <div class="author-name">Amelia Mahendra</div>
              <div class="author-role">Interior Designer, Bali</div>
              <span class="author-badge">Arsitek</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-md-6 col-lg-4 review-item" data-category="pemilik" data-aos="fade-up" data-aos-delay="300">
        <div class="testimonial-card">
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p class="testimonial-text">"Rumah kami sekarang terasa sejuk sepanjang hari sejak memasang dinding roster di area belakang. Sirkulasi udara jadi jauh lebih lancar tanpa AC berlebih. Sangat puas!"</p>
          <div class="testimonial-author">
            <div class="author-avatar">HW</div>
            <div>
              <div class="author-name">Hendra Wijaya</div>
              <div class="author-role">Pemilik Rumah, Tangerang</div>
              <span class="author-badge">Pemilik Rumah</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA SECTION & FORM
═══════════════════════════════════════════════ -->
<div class="cta-section">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-5">
      <div class="col-xl-7" data-aos="fade-right">
        <div class="section-label" style="color: var(--clay);">Kirim Masukan</div>
        <h2 class="cta-title">Punya Pengalaman Baik<br><em>Bekerja Sama</em> dengan Kami?</h2>
        <p class="cta-desc">
          Bagikan pengalaman Anda dalam membeli atau memasang produk Roster Dinding Minimalis kami. Ulasan Anda sangat berharga bagi peningkatan layanan kami.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="https://wa.me/{{ $cleanWa ?? '6281234567890' }}" class="btn-primary-hero" target="_blank">
            <i class="bi bi-chat-left-heart-fill"></i>
            Kirim Testimoni via WhatsApp
          </a>
          <a href="{{ route('homepage.kontak') }}" class="btn-outline-hero">
            Hubungi Customer Care
          </a>
        </div>
      </div>
      <div class="col-xl-5" data-aos="fade-left">
        <!-- Google Review Badge Mockup -->
        <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:24px; padding:32px; text-align:center;">
          <div style="font-size: 48px; color: #f59e0b; margin-bottom: 12px;">
            <i class="bi bi-google"></i>
          </div>
          <h4 style="font-family:'Plus Jakarta Sans',sans-serif; color:white; font-size:20px; font-weight:700; margin-bottom:8px;">Rating Google Ulasan</h4>
          <div style="font-size: 26px; color: #f59e0b; font-weight: 800; margin-bottom: 8px;">
            4.9 <span style="font-size:16px; color:rgba(255,255,255,0.5); font-weight:400;">/ 5.0</span>
          </div>
          <div style="font-size:13px; color:rgba(255,255,255,0.6); margin-bottom:20px;">
            Berdasarkan 320+ ulasan terverifikasi pelanggan kami.
          </div>
          <a href="#" class="btn-primary-hero" style="font-size:13.5px; padding:12px 24px;">Tulis Ulasan di Google</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  // Testimonial Category Filter
  function filterReviews(category) {
    // Toggle active class on buttons
    document.querySelectorAll('.filter-tag').forEach(tag => {
      tag.classList.remove('active');
    });
    event.currentTarget.classList.add('active');

    // Show/Hide items
    const items = document.querySelectorAll('.review-item');
    items.forEach(item => {
      if (category === 'all' || item.getAttribute('data-category') === category) {
        item.style.display = 'block';
        item.style.opacity = '1';
        item.style.transform = 'scale(1)';
      } else {
        item.style.display = 'none';
      }
    });
  }
</script>
@endpush
