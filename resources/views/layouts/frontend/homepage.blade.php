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
     HERO SLIDER — PURE IMAGE BANNER
═══════════════════════════════════════════════ -->
<div class="banner-slider" id="bannerSlider">

  <!-- Slides -->
  @if(isset($banners) && $banners->count() > 0)
    @foreach($banners as $index => $banner)
      <div class="bs-slide {{ $index === 0 ? 'bs-active' : '' }}">
        <img src="{{ asset('storage/' . $banner->url) }}" alt="{{ $banner->judul ?? 'Roster Dinding Minimalis — Distributor Resmi' }}" class="bs-img">
      </div>
    @endforeach
  @else
    <div class="bs-slide bs-active">
      <img src="{{ asset('frontend/img/banner-1.png') }}" alt="Roster Dinding Minimalis — Distributor Resmi" class="bs-img">
    </div>
    <div class="bs-slide">
      <img src="{{ asset('frontend/img/banner-2.png') }}" alt="Promo Harga Grosir Roster Dinding" class="bs-img">
    </div>
    <div class="bs-slide">
      <img src="{{ asset('frontend/img/banner-3.png') }}" alt="Produk Bersertifikat SNI" class="bs-img">
    </div>
  @endif

  <!-- Arrow Prev -->
  <button class="bs-arrow bs-prev" id="bsPrev" aria-label="Sebelumnya">
    <i class="bi bi-chevron-left"></i>
  </button>

  <!-- Arrow Next -->
  <button class="bs-arrow bs-next" id="bsNext" aria-label="Berikutnya">
    <i class="bi bi-chevron-right"></i>
  </button>

  <!-- Dots -->
  <div class="bs-dots">
    @if(isset($banners) && $banners->count() > 0)
      @foreach($banners as $index => $banner)
        <button class="bs-dot {{ $index === 0 ? 'bs-dot-active' : '' }}" data-idx="{{ $index }}" aria-label="Slide {{ $index + 1 }}"></button>
      @endforeach
    @else
      <button class="bs-dot bs-dot-active" data-idx="0" aria-label="Slide 1"></button>
      <button class="bs-dot" data-idx="1" aria-label="Slide 2"></button>
      <button class="bs-dot" data-idx="2" aria-label="Slide 3"></button>
    @endif
  </div>

  <!-- Progress bar -->
  <div class="bs-progress"><div class="bs-progress-fill" id="bsProgress"></div></div>

</div>

@push('styles')
<style>
/* ═══════════════════════════════════════════
   PURE IMAGE BANNER SLIDER
═══════════════════════════════════════════ */
.banner-slider {
  position: relative;
  width: 100%;
  overflow: hidden;
  background: #111;
  user-select: none;
}

/* Each slide */
.bs-slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 0.9s cubic-bezier(0.4, 0, 0.2, 1);
  pointer-events: none;
  z-index: 1;
}
.bs-slide.bs-active {
  position: relative;
  opacity: 1;
  pointer-events: auto;
  z-index: 2;
  height: auto;
}

/* The banner image — natural scale, no crop */
.bs-img {
  width: 100%;
  height: auto;
  display: block;
  transform: none;
}

/* Arrows */
.bs-arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 20;
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: rgba(0,0,0,0.35);
  border: 1.5px solid rgba(255,255,255,0.22);
  color: #fff;
  font-size: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  backdrop-filter: blur(10px);
  transition: background 0.2s, transform 0.2s;
  outline: none;
}
.bs-arrow:hover {
  background: rgba(193,68,14,0.7);
  border-color: rgba(193,68,14,0.8);
  transform: translateY(-50%) scale(1.1);
}
.bs-prev { left: 24px; }
.bs-next { right: 24px; }

/* Dots */
.bs-dots {
  position: absolute;
  bottom: 22px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 20;
  display: flex;
  gap: 8px;
  align-items: center;
}
.bs-dot {
  width: 9px;
  height: 9px;
  border-radius: 50%;
  background: rgba(255,255,255,0.35);
  border: none;
  cursor: pointer;
  transition: all 0.3s;
  padding: 0;
  outline: none;
}
.bs-dot.bs-dot-active {
  width: 28px;
  border-radius: 5px;
  background: #e8622a;
}

/* Progress bar */
.bs-progress {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: rgba(255,255,255,0.12);
  z-index: 20;
}
.bs-progress-fill {
  height: 100%;
  width: 0%;
  background: linear-gradient(90deg, #c1440e, #e8622a);
  border-radius: 2px;
  transition: width 0.08s linear;
}

/* Responsive */
@media (max-width: 767px) {
  .bs-arrow { width: 38px; height: 38px; font-size: 15px; }
  .bs-prev { left: 10px; }
  .bs-next { right: 10px; }
}
</style>
@endpush

@push('scripts')
<script>
(function () {
  var DELAY = 5000;
  var slides = document.querySelectorAll('.bs-slide');
  var dots   = document.querySelectorAll('.bs-dot');
  var fill   = document.getElementById('bsProgress');
  var prev   = document.getElementById('bsPrev');
  var next   = document.getElementById('bsNext');

  if (slides.length <= 1) {
    if (prev) prev.style.display = 'none';
    if (next) next.style.display = 'none';
    if (fill) fill.parentNode.style.display = 'none';
    var dotsContainer = document.querySelector('.bs-dots');
    if (dotsContainer) dotsContainer.style.display = 'none';
    return;
  }

  var cur    = 0;
  var raf    = null;
  var start  = null;
  var paused = false;

  function show(idx) {
    slides[cur].classList.remove('bs-active');
    dots[cur].classList.remove('bs-dot-active');
    cur = (idx + slides.length) % slides.length;
    slides[cur].classList.add('bs-active');
    dots[cur].classList.add('bs-dot-active');
    resetProgress();
  }

  function resetProgress() {
    cancelAnimationFrame(raf);
    if (fill) fill.style.width = '0%';
    if (!paused) runProgress();
  }

  function runProgress() {
    start = performance.now();
    function tick(now) {
      var pct = Math.min(((now - start) / DELAY) * 100, 100);
      if (fill) fill.style.width = pct + '%';
      if (pct >= 100) { show(cur + 1); }
      else { raf = requestAnimationFrame(tick); }
    }
    raf = requestAnimationFrame(tick);
  }

  if (prev) prev.addEventListener('click', function () { show(cur - 1); });
  if (next) next.addEventListener('click', function () { show(cur + 1); });

  dots.forEach(function (d) {
    d.addEventListener('click', function () { show(parseInt(d.dataset.idx)); });
  });

  // Pause on hover
  var slider = document.getElementById('bannerSlider');
  if (slider) {
    slider.addEventListener('mouseenter', function () {
      paused = true;
      cancelAnimationFrame(raf);
    });
    slider.addEventListener('mouseleave', function () {
      paused = false;
      start = performance.now() - ((parseFloat(fill ? fill.style.width : 0) / 100) * DELAY);
      runProgress();
    });
  }

  // Touch swipe
  var tx = 0;
  if (slider) {
    slider.addEventListener('touchstart', function (e) { tx = e.touches[0].clientX; }, { passive: true });
    slider.addEventListener('touchend', function (e) {
      var diff = tx - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 40) { diff > 0 ? show(cur + 1) : show(cur - 1); }
    }, { passive: true });
  }

  // Keyboard
  document.addEventListener('keydown', function (e) {
    if (e.key === 'ArrowRight') show(cur + 1);
    if (e.key === 'ArrowLeft')  show(cur - 1);
  });

  runProgress();
})();
</script>
@endpush

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
      @if(isset($features) && $features->count() > 0)
        @foreach($features as $index => $feature)
          <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <div class="feature-card">
              <div class="feature-icon-wrap">
                <i class="bi {{ $feature->icon }}"></i>
              </div>
              <div class="feature-title">{{ $feature->judul }}</div>
              <p class="feature-desc">{{ $feature->deskripsi }}</p>
            </div>
          </div>
        @endforeach
      @else
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
            <p class="feature-desc">Seluruh produk kami telah memenuhi standar SNI and teruji kekuatan serta ketahanan materialnya untuk jangka panjang.</p>
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
            <p class="feature-desc">Tim ahli kami siap membantu Anda memilih jenis dan motif roster yang tepat sesuai desain and kebutuhan bangunan Anda.</p>
          </div>
        </div>
      @endif
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

        <!-- Stats mini bar -->
        <div class="d-flex flex-wrap gap-3 mb-4">
          <div style="background:rgba(193,68,14,0.08); border:1px solid rgba(193,68,14,0.2); border-radius:12px; padding:12px 20px; text-align:center; min-width:100px;">
            <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:22px; font-weight:900; color:var(--terracotta); line-height:1;">500<sup style="font-size:12px;">+</sup></div>
            <div style="font-size:11px; color:var(--muted); margin-top:2px; font-weight:500;">Proyek Selesai</div>
          </div>
          <div style="background:rgba(193,68,14,0.08); border:1px solid rgba(193,68,14,0.2); border-radius:12px; padding:12px 20px; text-align:center; min-width:100px;">
            <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:22px; font-weight:900; color:var(--terracotta); line-height:1;">50<sup style="font-size:12px;">+</sup></div>
            <div style="font-size:11px; color:var(--muted); margin-top:2px; font-weight:500;">Motif Tersedia</div>
          </div>
          <div style="background:rgba(193,68,14,0.08); border:1px solid rgba(193,68,14,0.2); border-radius:12px; padding:12px 20px; text-align:center; min-width:100px;">
            <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:22px; font-weight:900; color:var(--terracotta); line-height:1;">SNI</div>
            <div style="font-size:11px; color:var(--muted); margin-top:2px; font-weight:500;">Bersertifikat</div>
          </div>
        </div>

        <div class="d-flex flex-wrap gap-3">
          <a href="#kontak" class="btn-primary-hero" style="display:inline-flex;">
            <i class="bi bi-chat-dots"></i>
            Konsultasi Gratis Sekarang
          </a>
          <a href="{{ route('homepage.tentang') }}" class="btn-outline-hero" style="display:inline-flex; background:rgba(193,68,14,0.1); border-color:rgba(193,68,14,0.3); color:var(--terracotta);">
            <i class="bi bi-arrow-right-circle"></i>
            Profil Perusahaan
          </a>
        </div>
      </div>
    </div>
  </div>
</section><!-- ═══════════════════════════════════════════════
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
      @if(isset($testimonials) && $testimonials->count() > 0)
        @foreach($testimonials as $index => $testi)
          <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <div class="testimonial-card">
              <div class="stars">
                @for($i = 1; $i <= 5; $i++)
                  @if($i <= $testi->bintang)
                    <i class="bi bi-star-fill"></i>
                  @else
                    <i class="bi bi-star"></i>
                  @endif
                @endfor
              </div>
              <p class="testimonial-text">"{{ $testi->pesan }}"</p>
              <div class="testimonial-author">
                <div class="author-avatar">
                  {{ strtoupper(substr($testi->nama, 0, 2)) }}
                </div>
                <div>
                  <div class="author-name">{{ $testi->nama }}</div>
                  <div class="author-role">{{ $testi->pekerjaan }}</div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
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
      @endif
    </div>

    {{-- CTA Button to Testimonial Form Page --}}
    <div class="text-center mt-5" data-aos="fade-up">
      <a href="{{ route('homepage.testimoni') }}#form-testimoni" class="btn-primary-hero" style="display:inline-flex;">
        <i class="bi bi-chat-left-heart-fill"></i>
        Tulis Testimoni Anda
      </a>
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
