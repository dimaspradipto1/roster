@extends('layouts.frontend.template')

@section('title', 'Roster Dinding Minimalis — Distributor Roster & Bata Ventilasi Berkualitas')
@section('meta_description', 'Distributor roster dinding dan bata ventilasi dekoratif berkualitas tinggi. Tersedia berbagai motif minimalis hingga premium untuk hunian dan bangunan komersial modern.')
@section('meta_keywords', 'roster dinding, bata ventilasi, roster minimalis, roster beton, roster tanah liat, roster motif')

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
     HERO SECTION
═══════════════════════════════════════════════ -->
<section class="hero" id="hero">
  <div class="hero-bg"></div>
  <div class="hero-overlay"></div>
  <div class="hero-pattern"></div>

  <!-- Dekorasi grid roster kanan -->
  <div class="hero-roster-visual d-none d-xl-grid">
    @php
      $holePositions = [1, 4, 9, 12, 17, 20, 25, 28, 33, 36, 41, 44, 49, 52, 57, 60];
    @endphp
    @for($i = 1; $i <= 64; $i++)
      <div class="cell {{ in_array($i % 13, [0, 3, 7]) ? 'hole' : '' }}"></div>
    @endfor
  </div>

  <div class="container">
    <div class="hero-content" data-aos="fade-right" data-aos-duration="800">
      <div class="hero-badge">
        <div class="hero-badge-dot"></div>
        <span>Distributor Resmi Roster Dinding</span>
      </div>

      <h1 class="hero-title">
        Roster Dinding<br>
        <em>Berkualitas Tinggi</em><br>
        untuk Hunian Modern
      </h1>

      <p class="hero-desc">
        Distributor terpercaya bata ventilasi & roster dinding dekoratif —
        dari pola minimalis hingga premium. Cocok untuk hunian, ruko,
        dan bangunan komersial modern Anda.
      </p>

      <!-- Produk Chips -->
      <div class="hero-chips">
        <div class="hero-chip">
          <i class="bi bi-grid-3x3"></i>
          <span>Roster Beton</span>
        </div>
        <div class="hero-chip">
          <i class="bi bi-square-half"></i>
          <span>Roster Tanah Liat</span>
        </div>
        <div class="hero-chip">
          <i class="bi bi-diamond"></i>
          <span>Roster Minimalis</span>
        </div>
        <div class="hero-chip">
          <i class="bi bi-circle-square"></i>
          <span>Roster Motif</span>
        </div>
        <div class="hero-chip">
          <i class="bi bi-stack"></i>
          <span>Roster Premium</span>
        </div>
      </div>

      <div class="hero-cta">
        <a href="{{ route('homepage.produk') }}" class="btn-primary-hero">
          <i class="bi bi-grid-3x3-gap-fill"></i>
          Lihat Katalog Produk
        </a>
        <a href="#kontak" class="btn-outline-hero">
          <i class="bi bi-telephone"></i>
          Hubungi Kami
        </a>
      </div>

      <!-- Stats -->
      <div class="hero-stats">
        <div class="hero-stat">
          <div class="hero-stat-num">50<sup>+</sup></div>
          <div class="hero-stat-txt">Motif Tersedia</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-num">10<sup>rb+</sup></div>
          <div class="hero-stat-txt">Produk Terjual</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-num">500<sup>+</sup></div>
          <div class="hero-stat-txt">Pelanggan Puas</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-num">5<sup>★</sup></div>
          <div class="hero-stat-txt">Rating Rata-rata</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     PRODUCT STRIP
═══════════════════════════════════════════════ -->
<div class="hero-product-strip">
  <div class="container">
    <div class="row g-0">
      <div class="col-sm-6 col-lg-3">
        <div class="product-strip-item" data-aos="fade-up" data-aos-delay="100">
          <div class="strip-icon"><i class="bi bi-shield-check"></i></div>
          <div>
            <div class="strip-title">Kualitas Terjamin</div>
            <div class="strip-sub">SNI bersertifikat</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="product-strip-item" data-aos="fade-up" data-aos-delay="200">
          <div class="strip-icon"><i class="bi bi-truck"></i></div>
          <div>
            <div class="strip-title">Pengiriman Cepat</div>
            <div class="strip-sub">Seluruh Indonesia</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="product-strip-item" data-aos="fade-up" data-aos-delay="300">
          <div class="strip-icon"><i class="bi bi-grid-3x3-gap"></i></div>
          <div>
            <div class="strip-title">50+ Motif Pilihan</div>
            <div class="strip-sub">Minimalis & premium</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="product-strip-item" data-aos="fade-up" data-aos-delay="400">
          <div class="strip-icon"><i class="bi bi-headset"></i></div>
          <div>
            <div class="strip-title">Support 24/7</div>
            <div class="strip-sub">Konsultasi gratis</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     FITUR UNGGULAN
═══════════════════════════════════════════════ -->
<section class="section-bg-cream roster-pattern" id="fitur">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Keunggulan Kami</div>
      <h2 class="section-title">Mengapa Memilih <em>Roster Dinding</em> Kami?</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Kami menyediakan roster dinding dan bata ventilasi terbaik dengan kualitas premium,
        pilihan motif terlengkap, dan layanan yang memuaskan.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-card">
          <div class="feature-icon-wrap">
            <i class="bi bi-grid-3x3-gap-fill"></i>
          </div>
          <div class="feature-title">Motif Terlengkap</div>
          <p class="feature-desc">Tersedia 50+ pilihan motif roster dari minimalis modern hingga premium klasik, cocok untuk berbagai konsep arsitektur.</p>
        </div>
      </div>
      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
        <div class="feature-card">
          <div class="feature-icon-wrap">
            <i class="bi bi-award"></i>
          </div>
          <div class="feature-title">Bersertifikat SNI</div>
          <p class="feature-desc">Seluruh produk kami telah memenuhi standar SNI dan teruji kekuatan serta ketahanan materialnya untuk jangka panjang.</p>
        </div>
      </div>
      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">
        <div class="feature-card">
          <div class="feature-icon-wrap">
            <i class="bi bi-currency-dollar"></i>
          </div>
          <div class="feature-title">Harga Kompetitif</div>
          <p class="feature-desc">Harga grosir langsung dari distributor resmi. Dapatkan penawaran terbaik untuk pembelian partai besar dengan diskon menarik.</p>
        </div>
      </div>
      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="400">
        <div class="feature-card">
          <div class="feature-icon-wrap">
            <i class="bi bi-headset"></i>
          </div>
          <div class="feature-title">Konsultasi Gratis</div>
          <p class="feature-desc">Tim ahli kami siap membantu Anda memilih jenis dan motif roster yang tepat sesuai desain dan kebutuhan bangunan Anda.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     COUNTER SECTION
═══════════════════════════════════════════════ -->
<div class="counter-section">
  <div class="container position-relative" style="z-index:1;">
    <div class="row g-4">
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="counter-item">
          <div class="counter-icon"><i class="bi bi-grid-3x3-gap"></i></div>
          <div class="counter-num">50<sup>+</sup></div>
          <div class="counter-label">Motif Roster Tersedia</div>
        </div>
      </div>
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="counter-item">
          <div class="counter-icon"><i class="bi bi-people"></i></div>
          <div class="counter-num">500<sup>+</sup></div>
          <div class="counter-label">Pelanggan Puas</div>
        </div>
      </div>
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="counter-item">
          <div class="counter-icon"><i class="bi bi-box-seam"></i></div>
          <div class="counter-num">10<sup>rb+</sup></div>
          <div class="counter-label">Produk Terkirim</div>
        </div>
      </div>
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="counter-item">
          <div class="counter-icon"><i class="bi bi-calendar-check"></i></div>
          <div class="counter-num">8<sup>th+</sup></div>
          <div class="counter-label">Tahun Pengalaman</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     PRODUK KATEGORI
═══════════════════════════════════════════════ -->
<section class="section-bg-white" id="produk">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Katalog Produk</div>
      <h2 class="section-title">Pilih <em>Roster</em> Sesuai Kebutuhan Anda</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Berbagai jenis roster dinding dengan material, ukuran, dan motif beragam
        untuk memperindah fasad and ventilasi bangunan Anda.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
        <div class="product-card">
          <div class="product-card-img">
            <div class="pattern-bg"></div>
            <div class="product-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
            <span class="product-badge">TERLARIS</span>
          </div>
          <div class="product-card-body">
            <div class="product-card-title">Roster Beton</div>
            <p class="product-card-desc">Roster berbahan beton kuat dan tahan lama. Ideal untuk pagar, dinding luar, dan ventilasi bangunan komersial.</p>
            <div class="product-card-footer">
              <span class="product-tag"><i class="bi bi-check-circle-fill"></i> Stok Tersedia</span>
              <a href="#kontak" class="btn-card">Tanya Harga <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
        <div class="product-card">
          <div class="product-card-img">
            <div class="pattern-bg"></div>
            <div class="product-icon"><i class="bi bi-square-half"></i></div>
            <span class="product-badge">NATURAL</span>
          </div>
          <div class="product-card-body">
            <div class="product-card-title">Roster Tanah Liat</div>
            <p class="product-card-desc">Warna alami dari tanah liat yang estetik. Memberikan sirkulasi udara optimal dengan tampilan artistik yang hangat.</p>
            <div class="product-card-footer">
              <span class="product-tag"><i class="bi bi-check-circle-fill"></i> Stok Tersedia</span>
              <a href="#kontak" class="btn-card">Tanya Harga <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">
        <div class="product-card">
          <div class="product-card-img">
            <div class="pattern-bg"></div>
            <div class="product-icon"><i class="bi bi-diamond-fill"></i></div>
            <span class="product-badge">PREMIUM</span>
          </div>
          <div class="product-card-body">
            <div class="product-card-title">Roster Minimalis</div>
            <p class="product-card-desc">Desain clean dan modern dengan garis bersih. Cocok untuk hunian bergaya minimalis Skandinavia dan industrial.</p>
            <div class="product-card-footer">
              <span class="product-tag"><i class="bi bi-check-circle-fill"></i> Stok Tersedia</span>
              <a href="#kontak" class="btn-card">Tanya Harga <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="400">
        <div class="product-card">
          <div class="product-card-img">
            <div class="pattern-bg"></div>
            <div class="product-icon"><i class="bi bi-circle-square"></i></div>
            <span class="product-badge">EKSKLUSIF</span>
          </div>
          <div class="product-card-body">
            <div class="product-card-title">Roster Motif Custom</div>
            <p class="product-card-desc">Tersedia berbagai motif dekoratif seperti bunga, geometrik, dan etnik. Dapat dipesan custom sesuai desain Anda.</p>
            <div class="product-card-footer">
              <span class="product-tag"><i class="bi bi-check-circle-fill"></i> Pre-order</span>
              <a href="#kontak" class="btn-card">Tanya Harga <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-5" data-aos="fade-up">
      <a href="{{ route('homepage.produk') }}" class="btn-primary-hero" style="display:inline-flex;">
        <i class="bi bi-collection"></i>
        Lihat Semua Katalog
      </a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     TENTANG KAMI
═══════════════════════════════════════════════ -->
<section class="section-bg-sand" id="tentang">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-xl-6" data-aos="fade-right" data-aos-duration="800">
        <div class="about-visual">
          <div class="about-img-main">
            <!-- Roster Grid Visual -->
            <div class="about-roster-grid">
              @php
                $filledCells = [1,2,4,5,7,8,9,11,13,14,16,17,19,20,22,23,25,26,28,29];
                $holeCells = [3,6,10,12,15,18,21,24,27,30];
              @endphp
              @for($i = 1; $i <= 30; $i++)
                @if(in_array($i, $holeCells))
                  <div class="r hole"></div>
                @elseif(in_array($i, $filledCells))
                  <div class="r filled"></div>
                @else
                  <div class="r"></div>
                @endif
              @endfor
            </div>
            <!-- Label overlay -->
            <div style="position:absolute; bottom:24px; left:50%; transform:translateX(-50%); text-align:center;">
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:600; color:rgba(193,68,14,0.7); letter-spacing:1px; text-transform:uppercase;">Pola Roster Dinding</div>
            </div>
          </div>

          <!-- Stat Card 1 -->
          <div class="about-stat-card card-1" data-aos="fade-up" data-aos-delay="300">
            <div class="stat-num-big">8<sup>th+</sup></div>
            <div class="stat-label-sm">Tahun Berpengalaman</div>
          </div>

          <!-- Stat Card 2 -->
          <div class="about-stat-card card-2" data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex align-items-center gap-3">
              <div style="font-size:28px; color:#f59e0b;">★★★★★</div>
              <div>
                <div class="stat-num-big" style="font-size:24px;">4.9</div>
                <div class="stat-label-sm">Rating Pelanggan</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6" data-aos="fade-left" data-aos-duration="800">
        <div class="section-label">Tentang Kami</div>
        <h2 class="section-title">Distributor Roster Dinding <em>Terpercaya</em> Sejak 2016</h2>
        <div class="divider-line"></div>
        <p class="section-desc mb-4">
          Kami adalah distributor resmi roster dinding dan bata ventilasi dekoratif yang telah melayani pelanggan dari berbagai penjuru Indonesia selama lebih dari 8 tahun. Komitmen kami adalah menghadirkan produk berkualitas tinggi dengan harga yang bersaing.
        </p>

        <ul class="check-list mb-4">
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Material premium bersertifikat SNI dengan ketahanan optimal</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>50+ pilihan motif dari minimalis hingga eksklusif custom</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Pengiriman ke seluruh Indonesia dengan armada sendiri</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Tim konsultan siap membantu perencanaan dan estimasi kebutuhan</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Harga distributor langsung, tanpa perantara, lebih hemat</span>
          </li>
        </ul>

        <a href="#kontak" class="btn-primary-hero" style="display:inline-flex;">
          <i class="bi bi-chat-dots"></i>
          Konsultasi Gratis Sekarang
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     TESTIMONIAL
═══════════════════════════════════════════════ -->
<section class="section-bg-white" id="testimoni">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Testimoni</div>
      <h2 class="section-title">Apa Kata <em>Pelanggan</em> Kami</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Kepercayaan dan kepuasan pelanggan adalah prioritas utama kami dalam setiap transaksi.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="100">
        <div class="testimonial-card">
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p class="testimonial-text">"Kualitas roster betonnya sangat bagus, sesuai dengan foto katalog. Pengiriman juga cepat dan pengemasannya aman. Pasti akan beli lagi untuk proyek berikutnya!"</p>
          <div class="testimonial-author">
            <div class="author-avatar">BN</div>
            <div>
              <div class="author-name">Budi Nugraha</div>
              <div class="author-role">Kontraktor, Bandung</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="200">
        <div class="testimonial-card">
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p class="testimonial-text">"Pilihan motifnya banyak banget! Kami pakai roster minimalis untuk fasad toko dan hasilnya luar biasa. Customer jadi lebih tertarik masuk karena tampilannya estetik."</p>
          <div class="testimonial-author">
            <div class="author-avatar">SR</div>
            <div>
              <div class="author-name">Sari Rahayu</div>
              <div class="author-role">Pemilik Usaha, Surabaya</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="300">
        <div class="testimonial-card">
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
          </div>
          <p class="testimonial-text">"Harga sangat terjangkau untuk kualitas segitu. Saya sudah langganan 3 tahun dan tidak pernah kecewa. Pelayanannya ramah dan responsif, recommended!"</p>
          <div class="testimonial-author">
            <div class="author-avatar">DH</div>
            <div>
              <div class="author-name">Dimas Harianto</div>
              <div class="author-role">Arsitek, Jakarta</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     FAQ
═══════════════════════════════════════════════ -->
<section class="section-bg-sand roster-pattern" id="faq">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-xl-5" data-aos="fade-right">
        <div class="section-label">FAQ</div>
        <h2 class="section-title">Pertanyaan yang <em>Sering Ditanyakan</em></h2>
        <div class="divider-line"></div>
        <p class="section-desc mb-4">
          Tidak menemukan jawaban yang Anda cari? Tim kami siap membantu.
        </p>
        <a href="#kontak" class="btn-primary-hero" style="display:inline-flex;">
          <i class="bi bi-chat-right-dots"></i>
          Tanya Langsung
        </a>

        <!-- Roster Decor -->
        <div class="mt-5 d-none d-xl-block">
          <div class="roster-decor">
            @for($i=0; $i<16; $i++)
              <div class="rd {{ in_array($i, [3, 6, 9, 12]) ? 'empty' : '' }}"></div>
            @endfor
          </div>
        </div>
      </div>

      <div class="col-xl-7" data-aos="fade-left">
        <div class="faq-item open" id="faq1">
          <div class="faq-question" onclick="toggleFaq('faq1')">
            <span>Apa saja jenis roster dinding yang tersedia?</span>
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
          </div>
          <div class="faq-answer">
            Kami menyediakan berbagai jenis roster dinding, meliputi: Roster Beton, Roster Tanah Liat (Clay), Roster GRC (Glassfibre Reinforced Concrete), Roster Minimalis, Roster Motif Custom, dan Bata Ventilasi berbagai ukuran. Tersedia lebih dari 50 motif pilihan.
          </div>
        </div>

        <div class="faq-item" id="faq2">
          <div class="faq-question" onclick="toggleFaq('faq2')">
            <span>Berapa minimum pembelian untuk mendapatkan harga grosir?</span>
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
          </div>
          <div class="faq-answer">
            Harga grosir berlaku mulai dari pembelian 100 pcs per jenis produk. Semakin banyak kuantitas yang dibeli, semakin besar diskon yang bisa Anda dapatkan. Hubungi tim kami untuk negosiasi harga proyek besar.
          </div>
        </div>

        <div class="faq-item" id="faq3">
          <div class="faq-question" onclick="toggleFaq('faq3')">
            <span>Apakah bisa memesan roster dengan motif custom?</span>
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
          </div>
          <div class="faq-answer">
            Ya, kami menerima pesanan custom untuk motif tertentu dengan minimum order yang lebih tinggi. Proses produksi custom memerlukan waktu 2-4 minggu. Silakan hubungi kami dengan menyertakan sketsa atau referensi desain yang Anda inginkan.
          </div>
        </div>

        <div class="faq-item" id="faq4">
          <div class="faq-question" onclick="toggleFaq('faq4')">
            <span>Apakah tersedia layanan pengiriman ke luar kota?</span>
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
          </div>
          <div class="faq-answer">
            Ya, kami melayani pengiriman ke seluruh wilayah Indonesia. Untuk Jawa, pengiriman menggunakan armada sendiri. Untuk luar Jawa, kami bekerja sama dengan mitra ekspedisi terpercaya. Biaya pengiriman dihitung berdasarkan berat dan jarak.
          </div>
        </div>

        <div class="faq-item" id="faq5">
          <div class="faq-question" onclick="toggleFaq('faq5')">
            <span>Apakah ada garansi produk yang rusak saat pengiriman?</span>
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
          </div>
          <div class="faq-answer">
            Kami menjamin penggantian produk yang rusak akibat proses pengiriman. Syaratnya, kerusakan harus didokumentasikan saat penerimaan barang dan dilaporkan dalam 1x24 jam. Kami akan memproses penggantian dalam 3-5 hari kerja.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA SECTION
═══════════════════════════════════════════════ -->
<div class="cta-section" id="kontak">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-5">
      <div class="col-xl-7" data-aos="fade-right">
        <div class="section-label" style="color: var(--clay);">Mulai Sekarang</div>
        <h2 class="cta-title">Siap Memperindah<br><em>Bangunan Anda</em> dengan Roster?</h2>
        <p class="cta-desc">
          Konsultasikan kebutuhan roster dinding Anda dengan tim ahli kami.
          Gratis konsultasi, estimasi kebutuhan, dan penawaran harga terbaik!
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="https://wa.me/{{ $cleanWa ?? '6281234567890' }}" class="btn-primary-hero" target="_blank">
            <i class="bi bi-whatsapp"></i>
            Chat WhatsApp Sekarang
          </a>
          <a href="https://wa.me/{{ $cleanWa ?? '6281234567890' }}" class="btn-outline-hero" target="_blank">
            <i class="bi bi-telephone"></i>
            {{ $contact->no_wa ?? '+62 812 3456 7890' }}
          </a>
        </div>
      </div>
      <div class="col-xl-5" data-aos="fade-left">
        <!-- Contact Info Cards -->
        <div class="d-flex flex-column gap-3">
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(193,68,14,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-geo-alt-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Alamat</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">{{ $contact->alamat ?? 'Jl. Industri No. 123, Kota, Indonesia' }}</div>
            </div>
          </div>
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(193,68,14,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-envelope-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Email</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">{{ $contact->email ?? 'info@rosterdinding.com' }}</div>
            </div>
          </div>
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(193,68,14,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-clock-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Jam Operasional</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">Senin – Sabtu: 08.00 – 17.00 WIB</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
