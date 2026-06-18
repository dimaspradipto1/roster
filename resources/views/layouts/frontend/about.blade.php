@extends('layouts.frontend.template')

@section('title', 'Tentang Kami — Roster Dinding Minimalis')
@section('meta_description', 'Ketahui lebih dalam tentang Roster Dinding Minimalis, distributor resmi bata ventilasi dan roster beton dekoratif berkualitas tinggi sejak 2016.')
@section('meta_keywords', 'roster dinding, tentang roster dinding, profil roster, bata ventilasi, sejarah roster minimalis')

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
     ABOUT HERO BANNER — SIMPLE VERSION
═══════════════════════════════════════════════ -->
<div class="about-hero">
  <div class="about-hero-bg"></div>
  <div class="about-hero-overlay"></div>
  <div class="about-hero-pattern"></div>

  <div class="container">
    <div class="about-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 class="about-hero-title">
        Tentang <em>Kami</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span class="sep">/</span>
        <span class="active">Tentang Kami</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     PROFIL & KISAH PERJALANAN
═══════════════════════════════════════════════ -->
<section class="section-bg-white">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">
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
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:600; color:rgba(193,68,14,0.7); letter-spacing:1px; text-transform:uppercase;">Pola Estetis Roster</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800">
        <div class="section-label">Profil Perusahaan</div>
        <h2 class="section-title">{{ $about->judul_profil ?? 'Dedikasi Terhadap' }} <em>Keindahan & Sirkulasi Udara Alami</em></h2>
        <div class="divider-line"></div>
        <p class="section-desc mb-4" style="text-align: justify;">
          {{ $about->deskripsi_profil_1 ?? 'Roster Dinding Minimalis didirikan pada tahun 2016 berawal dari sebuah keyakinan sederhana: bahwa sirkulasi udara alami dan pencahayaan matahari dapat dipadukan secara harmonis dengan nilai estetika arsitektur modern. Kami memahami bahwa rumah bukan sekadar tempat berlindung, melainkan mahakarya visual yang hidup.' }}
        </p>
        @if($about?->deskripsi_profil_2)
        <p class="section-desc mb-4" style="text-align: justify;">
          {{ $about->deskripsi_profil_2 }}
        </p>
        @endif
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     VISI & MISI
═══════════════════════════════════════════════ -->
<section class="section-bg-sand roster-pattern">
  <div class="container">
    <div class="row g-4 justify-content-center">
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="value-card" style="height: 100%;">
          <div class="value-icon-wrap">
            <i class="bi {{ $about->visi_icon ?? 'bi-eye' }}"></i>
          </div>
          <div class="value-title" style="font-size:22px;">{{ $about->visi_judul ?? 'Visi Kami' }}</div>
          <p class="value-desc" style="font-size:15px; line-height:1.8; text-align: justify;">
            {{ $about->visi ?? 'Menjadi distributor roster dinding dan bata ventilasi terdepan di Indonesia yang dikenal karena keunggulan kualitas material, keragaman motif arsitektural, dan integritas pelayanan yang menginspirasi keindahan setiap ruang tinggal.' }}
          </p>
        </div>
      </div>

      <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="value-card" style="height: 100%;">
          <div class="value-icon-wrap">
            <i class="bi {{ $about->misi_icon ?? 'bi-rocket-takeoff' }}"></i>
          </div>
          <div class="value-title" style="font-size:22px;">{{ $about->misi_judul ?? 'Misi Kami' }}</div>
          @php
            $misiPoin = $about?->misi
              ? array_filter(array_map('trim', explode("\n", $about->misi)))
              : [
                  'Menyediakan produk roster dekoratif kualitas premium bersertifikat SNI dengan daya tahan optimal terhadap cuaca tropis.',
                  'Menawarkan ragam motif roster inovatif yang mengikuti perkembangan tren arsitektur dunia.',
                  'Memberikan konsultasi gratis dan estimasi kebutuhan yang akurat demi efisiensi biaya proyek konsumen.',
                  'Mengirimkan pesanan tepat waktu dan aman menggunakan armada khusus untuk menjaga kualitas fisik barang hingga lokasi tujuan.',
                ];
          @endphp
          <ul class="value-desc" style="font-size:14.5px; line-height:1.75; padding-left: 20px; text-align: justify; margin: 0;">
            @foreach($misiPoin as $poin)
              <li class="mb-2">{{ $poin }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     NILAI-NILAI UTAMA
═══════════════════════════════════════════════ -->
<section class="section-bg-white">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Nilai Utama Kami</div>
      <h2 class="section-title">{{ $about->judul_nilai ?? 'Prinsip Kerja yang Kami' }} <em>Pegang Teguh</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        {{ $about->deskripsi_nilai ?? 'Kualitas dan kepercayaan bukanlah sebuah kebetulan, melainkan hasil dari komitmen terhadap nilai-nilai yang kami terapkan setiap hari.' }}
      </p>
    </div>

<div class="row g-4">
      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
        <div class="value-card">
          <div class="value-icon-wrap">
            <i class="bi {{ $about->nilai_1_icon ?? 'bi-shield-fill-check' }}"></i>
          </div>
          <div class="value-title">{{ $about->nilai_1_judul ?? 'Kualitas Bersertifikasi' }}</div>
          <p class="value-desc">{{ $about->nilai_1_deskripsi ?? 'Produk kami melalui proses kontrol kualitas ketat untuk memastikan kekuatan beton prima dan sudut presisi standar SNI.' }}</p>
        </div>
      </div>

      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
        <div class="value-card">
          <div class="value-icon-wrap">
            <i class="bi {{ $about->nilai_2_icon ?? 'bi-palette-fill' }}"></i>
          </div>
          <div class="value-title">{{ $about->nilai_2_judul ?? 'Keanekaragaman Motif' }}</div>
          <p class="value-desc">{{ $about->nilai_2_deskripsi ?? 'Kami menghadirkan lebih dari 50+ pilihan motif eksklusif mulai dari gaya klasik, minimalis geometric, hingga motif etnik modern.' }}</p>
        </div>
      </div>

      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">
        <div class="value-card">
          <div class="value-icon-wrap">
            <i class="bi {{ $about->nilai_3_icon ?? 'bi-people-fill' }}"></i>
          </div>
          <div class="value-title">{{ $about->nilai_3_judul ?? 'Fokus pada Pelanggan' }}</div>
          <p class="value-desc">{{ $about->nilai_3_deskripsi ?? 'Tim kami berorientasi pada kepuasan pelanggan dengan merespons cepat setiap pertanyaan dan membantu kalkulasi kebutuhan.' }}</p>
        </div>
      </div>

      <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="400">
        <div class="value-card">
          <div class="value-icon-wrap">
            <i class="bi {{ $about->nilai_4_icon ?? 'bi-truck-flatbed' }}"></i>
          </div>
          <div class="value-title">{{ $about->nilai_4_judul ?? 'Distribusi Aman' }}</div>
          <p class="value-desc">{{ $about->nilai_4_deskripsi ?? 'Didukung logistik profesional, pengiriman dijamin aman dan minim risiko pecah di jalan. Kami garansi 100% jika ada kerusakan.' }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     TIMELINE PERJALANAN
═══════════════════════════════════════════════ -->
<section class="section-bg-cream roster-pattern">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Milestone</div>
      <h2 class="section-title">Perjalanan & <em>Perkembangan</em> Kami</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Jejak langkah kami dalam menghadirkan estetika dinding roster terbaik untuk jutaan bangunan di Indonesia.
      </p>
    </div>

    <div class="timeline">
      @forelse($milestones as $ms)
        @php $side = $loop->iteration % 2 === 1 ? 'left' : 'right'; @endphp
        <div class="timeline-container {{ $side }}" data-aos="{{ $side === 'left' ? 'fade-right' : 'fade-left' }}">
          <div class="timeline-content">
            <div class="timeline-year">{{ $ms->tahun }}</div>
            <div class="timeline-title">{{ $ms->judul }}</div>
            <p class="timeline-text">{{ $ms->deskripsi }}</p>
          </div>
        </div>
      @empty
        <p class="text-center text-muted">Belum ada data milestone.</p>
      @endforelse
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA SECTION
═══════════════════════════════════════════════ -->
<div class="cta-section">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-5">
      <div class="col-xl-7" data-aos="fade-right">
        <div class="section-label" style="color: var(--clay);">Hubungi Kami</div>
        <h2 class="cta-title">Tertarik Menggunakan<br><em>Roster Dinding</em> untuk Hunian Anda?</h2>
        <p class="cta-desc">
          Konsultasikan kebutuhan motif, warna, dan kuantitas roster dinding Anda dengan tim ahli kami.
          Dapatkan gratis penawaran harga terbaik serta panduan instalasi!
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="https://wa.me/{{ $cleanWa ?? '6281234567890' }}" class="btn-primary-hero" target="_blank">
            <i class="bi bi-whatsapp"></i>
            Konsultasi WhatsApp
          </a>
          <a href="https://wa.me/{{ $cleanWa ?? '6281234567890' }}" class="btn-outline-hero" target="_blank">
            <i class="bi bi-telephone"></i>
            {{ $contact->no_wa ?? '+62 812 3456 7890' }}
          </a>
        </div>
      </div>
      <div class="col-xl-5" data-aos="fade-left">
        <div class="d-flex flex-column gap-3">
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(193,68,14,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-geo-alt-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Kantor Utama</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">{{ $contact->alamat ?? 'Jl. Industri No. 123, Kota, Indonesia' }}</div>
            </div>
          </div>
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(193,68,14,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-envelope-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Email Resmi</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">{{ $contact->email ?? 'info@rosterdinding.com' }}</div>
            </div>
          </div>
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(193,68,14,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-clock-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Jam Kerja</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">Senin – Sabtu: 08.00 – 17.00 WIB</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
