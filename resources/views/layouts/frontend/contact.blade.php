@extends('layouts.frontend.template')

@section('title', 'Hubungi Kami — Roster Dinding Minimalis')
@section('meta_description', 'Hubungi kami untuk pemesanan roster dinding, bata ventilasi, konsultasi desain gratis, dan penawaran harga terbaik. Kunjungi lokasi workshop/kantor kami.')
@section('meta_keywords', 'kontak roster, alamat roster minimalis, nomor whatsapp roster, maps roster dinding')

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
<div class="contact-hero">
  <div class="contact-hero-bg"></div>
  <div class="contact-hero-overlay"></div>
  <div class="contact-hero-pattern"></div>

  <div class="container">
    <div class="contact-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 class="contact-hero-title">
        Hubungi <em>Kami</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}">Beranda</a>
        <span class="sep">/</span>
        <span class="active">Kontak</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     CONTACT INFO CARDS & FORM
═══════════════════════════════════════════════ -->
<section class="section-bg-white roster-pattern">
  <div class="container">
    
    <!-- Info Cards Grid -->
    <div class="row g-4 mb-5">
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="contact-card-custom">
          <div class="contact-card-icon"><i class="bi bi-geo-alt-fill"></i></div>
          <h4 class="contact-card-title">Lokasi Workshop</h4>
          <p class="contact-card-text">
            {{ $contact->alamat ?? 'Jl. Industri No. 123, Kel. Utama, Kota Bandung, Jawa Barat 40123' }}
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="contact-card-custom">
          <div class="contact-card-icon"><i class="bi bi-envelope-open-fill"></i></div>
          <h4 class="contact-card-title">Email Resmi</h4>
          <p class="contact-card-text">
            <a href="mailto:{{ $contact->email ?? 'info@rosterdinding.com' }}">{{ $contact->email ?? 'info@rosterdinding.com' }}</a>
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="contact-card-custom">
          <div class="contact-card-icon"><i class="bi bi-whatsapp"></i></div>
          <h4 class="contact-card-title">WhatsApp Hub</h4>
          <p class="contact-card-text">
            <a href="https://wa.me/{{ $cleanWa ?? '6281234567890' }}" target="_blank">{{ $contact->no_wa ?? '+62 812 3456 7890' }}</a>
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="contact-card-custom">
          <div class="contact-card-icon"><i class="bi bi-clock-fill"></i></div>
          <h4 class="contact-card-title">Jam Operasional</h4>
          <p class="contact-card-text">
            Senin – Jumat: 08:00 – 17:00 WIB<br>
            Sabtu: 08:00 – 15:00 WIB
          </p>
        </div>
      </div>
    </div>

    <!-- Contact Form Grid -->
    <div class="row justify-content-center">
      <div class="col-lg-10" data-aos="fade-up">
        <div class="form-wrap-custom">
          <div class="text-center mb-4">
            <h3 style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:800; color:var(--charcoal);">Kirim Pesan Ke Kami</h3>
            <p style="font-size:14.5px; color:var(--muted);">Silakan isi formulir di bawah ini untuk konsultasi, estimasi kebutuhan semen/roster, atau meminta penawaran.</p>
          </div>

          <form action="#" method="POST">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="nama" class="form-label-custom">Nama Lengkap</label>
                <input type="text" id="nama" class="form-control-custom" placeholder="Ketik nama lengkap Anda" required>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label-custom">Alamat Email</label>
                <input type="email" id="email" class="form-control-custom" placeholder="Ketik alamat email Anda" required>
              </div>
              <div class="col-md-6">
                <label for="whatsapp" class="form-label-custom">Nomor WhatsApp</label>
                <input type="tel" id="whatsapp" class="form-control-custom" placeholder="Ketik nomor WhatsApp aktif" required>
              </div>
              <div class="col-md-6">
                <label for="subjek" class="form-label-custom">Subjek Pesan</label>
                <select id="subjek" class="form-control-custom" style="appearance:none;" required>
                  <option value="" disabled selected>Pilih subjek keperluan</option>
                  <option value="tanya-harga">Permintaan Daftar Harga</option>
                  <option value="konsultasi">Konsultasi Desain & Pemasangan</option>
                  <option value="kemitraan">Kerja Sama / Kemitraan Proyek</option>
                  <option value="lainnya">Lainnya</option>
                </select>
              </div>
              <div class="col-12">
                <label for="pesan" class="form-label-custom">Pesan Lengkap</label>
                <textarea id="pesan" rows="5" class="form-control-custom" placeholder="Ketik rincian pesan atau kebutuhan proyek Anda..." required></textarea>
              </div>
              <div class="col-12 mt-4 text-center">
                <button type="submit" class="btn-submit-form">
                  <i class="bi bi-send-fill"></i>
                  Kirim Pesan Sekarang
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════
     MAP SECTION
═══════════════════════════════════════════════ -->
<section class="section-bg-cream map-section">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Peta Lokasi</div>
      <h2 class="section-title">Kunjungi <em>Showroom & Workshop</em> Kami</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Akses rute mudah langsung ke lokasi gudang penyimpanan serta galeri motif roster dinding kami menggunakan Google Maps di bawah.
      </p>
    </div>

    <div class="map-container-custom" data-aos="zoom-in">
      @if(!empty($contact->map))
        {!! $contact->map !!}
      @else
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.24961817743!2d107.57311654303494!3d-6.903444341680517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a50b0efdd48a5!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      @endif
    </div>
  </div>
</section>
@endsection
