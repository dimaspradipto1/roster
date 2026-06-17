<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Roster Diding Minimalis</title>
  <meta name="description" content="Portal login distributor roster dinding dan bata ventilasi dekoratif">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --terracotta:     #c1440e;
      --terracotta-dk:  #9a3309;
      --terracotta-lt:  #e8622a;
      --clay:           #d4845a;
      --sand:           #f5ede3;
      --concrete:       #8c7b6e;
      --concrete-lt:    #b5a090;
      --white:          #ffffff;
      --cream:          #fdf8f4;
      --charcoal:       #2c2118;
      --dark-brown:     #3d2b1f;
      --muted:          #7c6b5e;
      --border:         #e8d5c4;
      --shadow:         rgba(60, 30, 10, 0.12);
    }

    html, body { height: 100%; }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--sand);
      overflow: hidden;
    }

    /* ═══════════════════════════════════════════════
       LAYOUT — Full split screen
    ═══════════════════════════════════════════════ */
    .login-wrapper {
      display: flex;
      height: 100vh;
      width: 100vw;
    }

    /* ── LEFT PANEL — Foto Produk & Branding ─── */
    .panel-left {
      flex: 1.15;
      position: relative;
      overflow: hidden;
    }

    /* Foto produk sebagai background */
    .panel-left .bg-photo {
      position: absolute;
      inset: 0;
      background: url('{{ asset("assets/img/login-bg.png") }}') center/cover no-repeat;
      z-index: 0;
    }

    /* Overlay gradasi agar teks terbaca */
    .panel-left .overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        135deg,
        rgba(44, 22, 8, 0.82) 0%,
        rgba(60, 30, 10, 0.65) 50%,
        rgba(193, 68, 14, 0.45) 100%
      );
      z-index: 1;
    }

    /* Pattern roster dinding sebagai overlay dekoratif */
    .panel-left .pattern-overlay {
      position: absolute;
      inset: 0;
      z-index: 2;
      opacity: 0.06;
      background-image:
        repeating-linear-gradient(0deg, transparent, transparent 28px, rgba(255,255,255,0.4) 28px, rgba(255,255,255,0.4) 30px),
        repeating-linear-gradient(90deg, transparent, transparent 28px, rgba(255,255,255,0.4) 28px, rgba(255,255,255,0.4) 30px);
    }

    .panel-left-content {
      position: relative;
      z-index: 3;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 52px 56px;
    }

    /* Logo area atas */
    .brand-top {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    /* SVG Roster Dinding Icon — pola kisi geometris */
    .brand-icon-wrap {
      width: 54px; height: 54px;
      background: var(--terracotta);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 6px 20px rgba(193,68,14,0.5);
      flex-shrink: 0;
    }

    /* Roster pattern SVG inline */
    .roster-svg { width: 30px; height: 30px; }

    .brand-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .brand-title .name {
      font-size: 20px;
      font-weight: 800;
      color: var(--white);
      letter-spacing: -0.3px;
      line-height: 1;
    }
    .brand-title .sub {
      font-size: 11px;
      color: rgba(255,255,255,0.55);
      font-weight: 400;
      letter-spacing: 0.5px;
      margin-top: 3px;
    }

    /* Konten tengah */
    .brand-middle { max-width: 460px; }

    .badge-kategori {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: rgba(193,68,14,0.35);
      border: 1px solid rgba(255,160,100,0.3);
      border-radius: 50px;
      padding: 5px 14px;
      margin-bottom: 24px;
      backdrop-filter: blur(8px);
    }
    .badge-kategori span {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      color: #ffc4a0;
    }
    .badge-dot {
      width: 6px; height: 6px;
      background: var(--terracotta-lt);
      border-radius: 50%;
      animation: blink 2s infinite;
    }
    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.3; }
    }

    .brand-middle h1 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 44px;
      font-weight: 800;
      color: var(--white);
      line-height: 1.15;
      letter-spacing: -1.5px;
      margin-bottom: 18px;
    }
    .brand-middle h1 em {
      font-style: normal;
      color: var(--terracotta-lt);
    }

    .brand-middle p {
      font-size: 15px;
      color: rgba(255,255,255,0.6);
      line-height: 1.75;
      margin-bottom: 36px;
    }

    /* Produk chips */
    .product-chips {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 40px;
    }
    .chip {
      display: flex;
      align-items: center;
      gap: 7px;
      background: rgba(255,255,255,0.1);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 50px;
      padding: 7px 14px;
      backdrop-filter: blur(8px);
      transition: all 0.2s;
    }
    .chip:hover {
      background: rgba(193,68,14,0.3);
      border-color: rgba(255,160,100,0.3);
    }
    .chip i { font-size: 14px; color: var(--clay); }
    .chip span { font-size: 12px; color: rgba(255,255,255,0.8); font-weight: 500; }

    /* Stats baris bawah */
    .stats-row {
      display: flex;
      align-items: center;
      gap: 32px;
    }
    .stat { text-align: left; }
    .stat-num {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 26px;
      font-weight: 800;
      color: var(--white);
      line-height: 1;
    }
    .stat-num sup { font-size: 14px; color: var(--clay); vertical-align: super; }
    .stat-txt {
      font-size: 11px;
      color: rgba(255,255,255,0.4);
      letter-spacing: 0.3px;
      margin-top: 4px;
    }
    .stat-sep {
      width: 1px;
      height: 36px;
      background: rgba(255,255,255,0.15);
    }

    /* Divider kanan */
    .panel-divider {
      position: absolute;
      right: 0; top: 0; bottom: 0;
      width: 1px;
      background: linear-gradient(to bottom, transparent, rgba(193,68,14,0.4), transparent);
      z-index: 4;
    }

    /* ── RIGHT PANEL — Form Login ──────────────── */
    .panel-right {
      flex: 0.85;
      background: var(--cream);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px 44px;
      overflow-y: auto;
      position: relative;
    }

    /* Motif roster dinding di background form */
    .panel-right::before {
      content: '';
      position: absolute;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c1440e' fill-opacity='0.04'%3E%3Crect x='5' y='5' width='22' height='22' rx='2'/%3E%3Crect x='33' y='5' width='22' height='22' rx='2'/%3E%3Crect x='5' y='33' width='22' height='22' rx='2'/%3E%3Crect x='33' y='33' width='22' height='22' rx='2'/%3E%3Crect x='13' y='13' width='6' height='6' fill='%23c1440e' fill-opacity='0.08'/%3E%3Crect x='41' y='13' width='6' height='6' fill='%23c1440e' fill-opacity='0.08'/%3E%3Crect x='13' y='41' width='6' height='6' fill='%23c1440e' fill-opacity='0.08'/%3E%3Crect x='41' y='41' width='6' height='6' fill='%23c1440e' fill-opacity='0.08'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      pointer-events: none;
      z-index: 0;
    }

    .form-container {
      width: 100%;
      max-width: 400px;
      position: relative;
      z-index: 1;
      animation: slideIn 0.6s ease;
    }

    @keyframes slideIn {
      from { opacity: 0; transform: translateX(20px); }
      to   { opacity: 1; transform: translateX(0); }
    }

    /* Card form */
    .form-card {
      background: var(--white);
      border-radius: 24px;
      padding: 40px 36px;
      box-shadow:
        0 4px 6px rgba(60,30,10,0.04),
        0 20px 48px rgba(60,30,10,0.10),
        0 0 0 1px rgba(193,68,14,0.08);
    }

    .form-logo-sm {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 28px;
    }
    .form-logo-sm .icon-sm {
      width: 38px; height: 38px;
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .form-logo-sm .icon-sm svg { width: 20px; height: 20px; }
    .form-logo-sm .txt {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 15px;
      font-weight: 700;
      color: var(--charcoal);
    }

    .form-heading { margin-bottom: 28px; }
    .form-heading h2 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 24px;
      font-weight: 800;
      color: var(--charcoal);
      letter-spacing: -0.5px;
      margin-bottom: 6px;
    }
    .form-heading p {
      font-size: 13px;
      color: var(--muted);
      line-height: 1.5;
    }

    /* Alert */
    .alert-box {
      border-radius: 12px;
      padding: 12px 15px;
      font-size: 13px;
      font-weight: 500;
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-bottom: 20px;
    }
    .alert-box i { margin-top: 1px; flex-shrink: 0; }
    .alert-err {
      background: #fff5f5;
      border: 1px solid #fed7d7;
      color: #c53030;
    }
    .alert-ok {
      background: #f0fff4;
      border: 1px solid #c6f6d5;
      color: #276749;
    }

    /* Input fields */
    .field { margin-bottom: 18px; }

    .field-label {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 13px;
      font-weight: 600;
      color: var(--charcoal);
      margin-bottom: 8px;
    }

    .input-wrap { position: relative; }

    .input-icon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--concrete);
      font-size: 16px;
      pointer-events: none;
      transition: color 0.2s;
    }

    .form-input {
      width: 100%;
      background: var(--sand);
      border: 1.5px solid var(--border);
      border-radius: 12px;
      padding: 13px 44px 13px 42px;
      font-size: 14px;
      color: var(--charcoal);
      font-family: 'Inter', sans-serif;
      outline: none;
      transition: all 0.25s;
      -webkit-appearance: none;
    }
    .form-input::placeholder { color: var(--concrete-lt); }

    .form-input:focus {
      border-color: var(--terracotta);
      background: var(--white);
      box-shadow: 0 0 0 3px rgba(193,68,14,0.1);
    }
    .form-input:focus ~ .input-icon { color: var(--terracotta); }
    .form-input.err {
      border-color: #e53e3e;
      background: #fff5f5;
    }

    .field-err-msg {
      font-size: 12px;
      color: #c53030;
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .btn-show-pw {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      color: var(--concrete);
      font-size: 16px;
      padding: 4px 6px;
      border-radius: 6px;
      transition: all 0.2s;
    }
    .btn-show-pw:hover {
      color: var(--terracotta);
      background: rgba(193,68,14,0.08);
    }

    /* Remember row */
    .remember-row {
      display: flex;
      align-items: center;
      gap: 9px;
      margin-bottom: 24px;
    }
    .remember-row input[type=checkbox] {
      width: 16px;
      height: 16px;
      accent-color: var(--terracotta);
      cursor: pointer;
    }
    .remember-row label {
      font-size: 13px;
      color: var(--muted);
      cursor: pointer;
    }

    /* Tombol login */
    .btn-masuk {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, var(--terracotta) 0%, var(--terracotta-lt) 100%);
      border: none;
      border-radius: 12px;
      color: var(--white);
      font-size: 15px;
      font-weight: 700;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      transition: all 0.25s;
      box-shadow: 0 4px 16px rgba(193,68,14,0.35);
      position: relative;
      overflow: hidden;
      letter-spacing: 0.2px;
    }
    .btn-masuk::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(255,255,255,0.15) 0%, transparent 50%);
    }
    .btn-masuk:hover {
      background: linear-gradient(135deg, var(--terracotta-dk) 0%, var(--terracotta) 100%);
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(193,68,14,0.45);
    }
    .btn-masuk:active { transform: translateY(0); }
    .btn-masuk:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }

    .btn-inner-flex {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      position: relative;
      z-index: 1;
    }
    .spinner-ring {
      display: none;
      width: 18px; height: 18px;
      border: 2px solid rgba(255,255,255,0.3);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* Divider */
    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 20px 0;
    }
    .divider::before, .divider::after {
      content: ''; flex: 1;
      height: 1px;
      background: var(--border);
    }
    .divider span {
      font-size: 11px;
      color: var(--concrete-lt);
      white-space: nowrap;
      letter-spacing: 0.5px;
    }

    /* Footer info */
    .form-footer {
      text-align: center;
      padding-top: 20px;
    }
    .form-footer p {
      font-size: 12.5px;
      color: var(--muted);
    }
    .form-footer a {
      color: var(--terracotta);
      font-weight: 600;
      text-decoration: none;
    }
    .form-footer a:hover { text-decoration: underline; }
    .back-to-home-link {
      color: var(--muted) !important;
      font-weight: 500 !important;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-top: 6px;
      transition: color 0.2s;
    }
    .back-to-home-link:hover {
      color: var(--terracotta) !important;
      text-decoration: none !important;
    }

    /* Copyright bawah */
    .copyright {
      text-align: center;
      margin-top: 20px;
      font-size: 11px;
      color: var(--concrete-lt);
    }
    .copyright i { font-size: 10px; }

    /* ── Responsive ───────────────────────── */
    @media (max-width: 900px) {
      .panel-left { display: none; }
      .panel-right { flex: 1; }
    }
    @media (max-width: 480px) {
      .panel-right { padding: 24px 16px; }
      .form-card { padding: 28px 22px; }
    }
  </style>
</head>

<body>

<div class="login-wrapper">

  {{-- ══════════════════════════════════════════
       LEFT — Foto Produk + Branding
  ══════════════════════════════════════════ --}}
  <div class="panel-left">
    <div class="bg-photo"></div>
    <div class="overlay"></div>
    <div class="pattern-overlay"></div>
    <div class="panel-divider"></div>

    <div class="panel-left-content">

      {{-- Logo Atas --}}
      <div class="brand-top">
        <div class="brand-icon-wrap">
          {{-- Icon SVG pola roster dinding --}}
          <svg class="roster-svg" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="1" width="12" height="12" rx="2" fill="white" fill-opacity="0.9"/>
            <rect x="17" y="1" width="12" height="12" rx="2" fill="white" fill-opacity="0.9"/>
            <rect x="1" y="17" width="12" height="12" rx="2" fill="white" fill-opacity="0.9"/>
            <rect x="17" y="17" width="12" height="12" rx="2" fill="white" fill-opacity="0.9"/>
            <rect x="5" y="5" width="4" height="4" rx="1" fill="#c1440e"/>
            <rect x="21" y="5" width="4" height="4" rx="1" fill="#c1440e"/>
            <rect x="5" y="21" width="4" height="4" rx="1" fill="#c1440e"/>
            <rect x="21" y="21" width="4" height="4" rx="1" fill="#c1440e"/>
          </svg>
        </div>
        <div class="brand-title">
          <div class="name">Roster Diding Minimalis</div>
          <div class="sub">Portal Manajemen & Distribusi</div>
        </div>
      </div>

      {{-- Konten Tengah --}}
      <div class="brand-middle">
        <div class="badge-kategori">
          <div class="badge-dot"></div>
          <span>Produk Unggulan</span>
        </div>

        <h1>Roster Dinding<br><em>Berkualitas Tinggi</em></h1>

        <p>
          Distributor bata ventilasi & roster dinding dekoratif pilihan —
          dari pola minimalis hingga premium, cocok untuk hunian dan
          bangunan komersial modern.
        </p>

        {{-- Chips kategori produk --}}
        <div class="product-chips">
          <div class="chip">
            <i class="bi bi-grid-3x3"></i>
            <span>Roster Beton</span>
          </div>
          <div class="chip">
            <i class="bi bi-square-half"></i>
            <span>Roster Tanah Liat</span>
          </div>
          <div class="chip">
            <i class="bi bi-diamond"></i>
            <span>Roster Minimalis</span>
          </div>
          <div class="chip">
            <i class="bi bi-circle-square"></i>
            <span>Roster Motif</span>
          </div>
        </div>
      </div>

      {{-- Statistik Bawah --}}
      <div class="stats-row">
        <div class="stat">
          <div class="stat-num">50<sup>+</sup></div>
          <div class="stat-txt">Motif Tersedia</div>
        </div>
        <div class="stat-sep"></div>
        <div class="stat">
          <div class="stat-num">10<sup>rb+</sup></div>
          <div class="stat-txt">Produk Terjual</div>
        </div>
        <div class="stat-sep"></div>
        <div class="stat">
          <div class="stat-num">5<sup>★</sup></div>
          <div class="stat-txt">Rating Pelanggan</div>
        </div>
      </div>

    </div>
  </div>

  {{-- ══════════════════════════════════════════
       RIGHT — Form Login
  ══════════════════════════════════════════ --}}
  <div class="panel-right">
    <div class="form-container">

      <div class="form-card">

        {{-- Logo kecil di dalam card --}}
        <div class="form-logo-sm">
          <div class="icon-sm">
            <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="1" y="1" width="8" height="8" rx="1.5" fill="white" fill-opacity="0.9"/>
              <rect x="11" y="1" width="8" height="8" rx="1.5" fill="white" fill-opacity="0.9"/>
              <rect x="1" y="11" width="8" height="8" rx="1.5" fill="white" fill-opacity="0.9"/>
              <rect x="11" y="11" width="8" height="8" rx="1.5" fill="white" fill-opacity="0.9"/>
            </svg>
          </div>
          <div class="txt">Roster Diding Minimalis</div>
        </div>

        <div class="form-heading">
          <h2>Masuk ke Akun Anda</h2>
          <p>Kelola produk, stok, dan distribusi roster dinding Anda</p>
        </div>

        {{-- Alert sukses --}}
        @if (session('success'))
          <div class="alert-box alert-ok">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
          </div>
        @endif

        {{-- Alert error login --}}
        @if ($errors->has('email') && str_contains($errors->first('email'), 'salah'))
          <div class="alert-box alert-err">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span>{{ $errors->first('email') }}</span>
          </div>
        @endif

        {{-- ════════════════════════════════
             FORM LOGIN
             POST → route('loginproses')
             Validasi: UserRequest
        ════════════════════════════════ --}}
        <form id="formLogin"
              action="{{ route('loginproses') }}"
              method="POST"
              novalidate>
          @csrf

          {{-- Email --}}
          <div class="field">
            <label class="field-label" for="email">
              <span>Email</span>
            </label>
            <div class="input-wrap">
              <input type="email"
                     id="email"
                     name="email"
                     class="form-input {{ $errors->has('email') && !str_contains($errors->first('email'), 'salah') ? 'err' : '' }}"
                     placeholder="nama@perusahaan.com"
                     value="{{ old('email') }}"
                     autocomplete="email"
                     required>
              <i class="bi bi-envelope input-icon"></i>
            </div>
            @error('email')
              @if (!str_contains($message, 'salah'))
                <div class="field-err-msg">
                  <i class="bi bi-x-circle-fill" style="font-size:11px"></i>
                  {{ $message }}
                </div>
              @endif
            @enderror
          </div>

          {{-- Password --}}
          <div class="field">
            <label class="field-label" for="password">
              <span>Password</span>
            </label>
            <div class="input-wrap">
              <input type="password"
                     id="password"
                     name="password"
                     class="form-input {{ $errors->has('password') ? 'err' : '' }}"
                     placeholder="Masukkan password"
                     autocomplete="current-password"
                     required>
              <i class="bi bi-lock input-icon"></i>
              <button type="button" id="togglePw" class="btn-show-pw" title="Tampilkan password">
                <i class="bi bi-eye" id="eyeIcon"></i>
              </button>
            </div>
            @error('password')
              <div class="field-err-msg">
                <i class="bi bi-x-circle-fill" style="font-size:11px"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- Remember Me --}}
          <div class="remember-row">
            <input type="checkbox"
                   id="rememberMe"
                   name="remember"
                   value="1"
                   {{ old('remember') ? 'checked' : '' }}>
            <label for="rememberMe">Ingat saya di perangkat ini</label>
          </div>

          {{-- Tombol Masuk --}}
          <button type="submit" class="btn-masuk" id="btnMasuk">
            <div class="btn-inner-flex" id="btnText">
              <i class="bi bi-box-arrow-in-right"></i>
              Masuk
            </div>
            <div class="btn-inner-flex" id="btnLoading" style="display:none">
              <div class="spinner-ring" style="display:block"></div>
              Memverifikasi...
            </div>
          </button>

        </form>

        {{-- Divider --}}
        <div class="divider">
          <span>atau</span>
        </div>

        {{-- Footer --}}
        <div class="form-footer">
          <p style="margin-bottom: 10px;">Belum punya akses? <a href="#">Hubungi Admin</a></p>
          <p><a href="{{ route('homepage') }}" class="back-to-home-link"><i class="bi bi-arrow-left"></i> Kembali ke Halaman Utama</a></p>
        </div>

      </div>{{-- .form-card --}}

      <div class="copyright">
        <i class="bi bi-shield-check"></i>
        &copy; {{ date('Y') }} Roster Diding Minimalis — Semua Hak Dilindungi
      </div>

    </div>
  </div>

</div>

<script>
  // Toggle show/hide password
  document.getElementById('togglePw').addEventListener('click', function () {
    const inp  = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    const show = inp.type === 'password';
    inp.type       = show ? 'text' : 'password';
    icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
  });

  // Focus style on icon
  document.querySelectorAll('.form-input').forEach(function (inp) {
    const wrap = inp.closest('.input-wrap');
    inp.addEventListener('focus', function () {
      if (wrap) wrap.querySelector('.input-icon').style.color = '#c1440e';
    });
    inp.addEventListener('blur', function () {
      if (wrap) wrap.querySelector('.input-icon').style.color = '#8c7b6e';
    });
  });

  // Loading state
  document.getElementById('formLogin').addEventListener('submit', function () {
    const email = document.getElementById('email').value.trim();
    const pw    = document.getElementById('password').value;
    if (!email || !pw) return;
    document.getElementById('btnText').style.display    = 'none';
    document.getElementById('btnLoading').style.display = 'flex';
    document.getElementById('btnMasuk').disabled        = true;
  });
</script>

</body>
</html>
