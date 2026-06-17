<!DOCTYPE html>
<html lang="id">
@php
  $cleanWa = '';
  if (!empty($contact->no_wa)) {
      $cleanWa = preg_replace('/[^0-9]/', '', $contact->no_wa);
      if (strpos($cleanWa, '08') === 0) {
          $cleanWa = '628' . substr($cleanWa, 2);
      }
  }
  $isHome = request()->routeIs('homepage') || request()->routeIs('homepage.galeri');
@endphp
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Roster Dinding Minimalis — Distributor Roster & Bata Ventilasi Berkualitas')</title>
  <meta name="description" content="@yield('meta_description', 'Distributor roster dinding dan bata ventilasi dekoratif berkualitas tinggi. Tersedia berbagai motif minimalis hingga premium untuk hunian dan bangunan komersial modern.')">
  <meta name="keywords" content="@yield('meta_keywords', 'roster dinding, bata ventilasi, roster minimalis, roster beton, roster tanah liat, roster motif')">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS Animation -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  @stack('styles')

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

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--cream);
      color: var(--charcoal);
      overflow-x: hidden;
    }

    /* ═══════════════════════════════════════════════
       ROSTER PATTERN — Ciri khas motif roster dinding
    ═══════════════════════════════════════════════ */
    .roster-pattern {
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c1440e' fill-opacity='0.06'%3E%3Crect x='5' y='5' width='22' height='22' rx='2'/%3E%3Crect x='33' y='5' width='22' height='22' rx='2'/%3E%3Crect x='5' y='33' width='22' height='22' rx='2'/%3E%3Crect x='33' y='33' width='22' height='22' rx='2'/%3E%3Crect x='13' y='13' width='6' height='6' fill='%23c1440e' fill-opacity='0.10'/%3E%3Crect x='41' y='13' width='6' height='6' fill='%23c1440e' fill-opacity='0.10'/%3E%3Crect x='13' y='41' width='6' height='6' fill='%23c1440e' fill-opacity='0.10'/%3E%3Crect x='41' y='41' width='6' height='6' fill='%23c1440e' fill-opacity='0.10'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    /* ═══════════════════════════════════════════════
       TOPBAR
    ═══════════════════════════════════════════════ */
    .topbar {
      background: var(--charcoal);
      padding: 9px 0;
      font-size: 12.5px;
      color: rgba(255,255,255,0.55);
    }
    .topbar a { color: rgba(255,255,255,0.55); text-decoration: none; transition: color 0.2s; }
    .topbar a:hover { color: var(--clay); }
    .topbar .sep { color: rgba(255,255,255,0.15); margin: 0 12px; }
    .topbar .social-link {
      display: inline-flex; align-items: center; justify-content: center;
      width: 26px; height: 26px;
      border-radius: 50%;
      background: rgba(255,255,255,0.08);
      color: rgba(255,255,255,0.55);
      font-size: 11px;
      text-decoration: none;
      transition: all 0.2s;
      margin-left: 5px;
    }
    .topbar .social-link:hover { background: var(--terracotta); color: white; }

    /* ═══════════════════════════════════════════════
       NAVBAR
    ═══════════════════════════════════════════════ */
    .navbar-main {
      background: var(--white);
      border-bottom: 1px solid var(--border);
      padding: 0;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 20px rgba(60,30,10,0.08);
    }
    .navbar-main .container { padding: 0 20px; }
    .navbar-main .navbar { padding: 14px 0; }

    .brand-wrap {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
    }
    .brand-icon {
      width: 44px; height: 44px;
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      box-shadow: 0 4px 12px rgba(193,68,14,0.35);
      flex-shrink: 0;
    }
    .brand-icon svg { width: 24px; height: 24px; }
    .brand-text .name {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 17px;
      font-weight: 800;
      color: var(--charcoal);
      letter-spacing: -0.3px;
      line-height: 1;
    }
    .brand-text .sub {
      font-size: 10px;
      color: var(--muted);
      font-weight: 400;
      letter-spacing: 0.5px;
      margin-top: 2px;
    }

    .nav-link-custom {
      font-size: 13.5px;
      font-weight: 600;
      color: var(--muted) !important;
      padding: 8px 14px !important;
      border-radius: 8px;
      transition: all 0.2s;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .nav-link-custom:hover, .nav-link-custom.active {
      color: var(--terracotta) !important;
      background: rgba(193,68,14,0.07);
    }

    .btn-login-nav {
      display: inline-flex; align-items: center; gap: 7px;
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      color: white;
      font-size: 13.5px;
      font-weight: 700;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 10px 22px;
      border-radius: 10px;
      text-decoration: none;
      transition: all 0.25s;
      box-shadow: 0 3px 12px rgba(193,68,14,0.35);
    }
    .btn-login-nav:hover {
      background: linear-gradient(135deg, var(--terracotta-dk), var(--terracotta));
      color: white;
      transform: translateY(-1px);
      box-shadow: 0 6px 18px rgba(193,68,14,0.45);
    }

    /* ═══════════════════════════════════════════════
       HERO & SUBPAGE BANNERS
    ═══════════════════════════════════════════════ */
    .hero {
      position: relative;
      min-height: 92vh;
      background: var(--charcoal);
      overflow: hidden;
      display: flex;
      align-items: center;
    }
    .hero-bg {
      position: absolute;
      inset: 0;
      background: url('{{ asset("assets/img/login-bg.png") }}') center/cover no-repeat;
      z-index: 0;
      filter: brightness(0.4);
    }
    .hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        120deg,
        rgba(44, 22, 8, 0.92) 0%,
        rgba(60, 30, 10, 0.75) 50%,
        rgba(193, 68, 14, 0.35) 100%
      );
      z-index: 1;
    }
    .hero-pattern {
      position: absolute;
      inset: 0;
      z-index: 2;
      opacity: 0.04;
      background-image:
        repeating-linear-gradient(0deg, transparent, transparent 40px, rgba(255,255,255,0.5) 40px, rgba(255,255,255,0.5) 42px),
        repeating-linear-gradient(90deg, transparent, transparent 40px, rgba(255,255,255,0.5) 40px, rgba(255,255,255,0.5) 42px);
    }
    .hero-roster-visual {
      position: absolute;
      right: -60px;
      top: 50%;
      transform: translateY(-50%);
      z-index: 2;
      opacity: 0.12;
      display: grid;
      grid-template-columns: repeat(8, 60px);
      grid-template-rows: repeat(8, 60px);
      gap: 8px;
      animation: floatGrid 8s ease-in-out infinite;
    }
    .hero-roster-visual .cell {
      background: rgba(255,255,255,0.6);
      border-radius: 6px;
    }
    .hero-roster-visual .cell.hole {
      background: transparent;
    }
    @keyframes floatGrid {
      0%, 100% { transform: translateY(-50%) translateX(0); }
      50% { transform: translateY(-52%) translateX(-8px); }
    }
    .hero-content {
      position: relative;
      z-index: 3;
      padding: 100px 0;
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(193,68,14,0.3);
      border: 1px solid rgba(255,160,100,0.3);
      border-radius: 50px;
      padding: 6px 16px;
      margin-bottom: 28px;
      backdrop-filter: blur(8px);
    }
    .hero-badge-dot {
      width: 7px; height: 7px;
      background: var(--terracotta-lt);
      border-radius: 50%;
      animation: blink 2s infinite;
    }
    @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0.2; } }
    .hero-badge span {
      font-size: 11.5px;
      font-weight: 600;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      color: #ffc4a0;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .hero-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(38px, 5.5vw, 68px);
      font-weight: 800;
      color: var(--white);
      line-height: 1.1;
      letter-spacing: -2px;
      margin-bottom: 22px;
    }
    .hero-title em {
      font-style: normal;
      color: var(--terracotta-lt);
      position: relative;
    }
    .hero-title em::after {
      content: '';
      position: absolute;
      bottom: -4px; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--terracotta-lt), transparent);
      border-radius: 2px;
    }
    .hero-desc {
      font-size: 17px;
      color: rgba(255,255,255,0.65);
      line-height: 1.8;
      margin-bottom: 38px;
      max-width: 560px;
    }
    .hero-cta {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      margin-bottom: 60px;
    }
    .btn-primary-hero {
      display: inline-flex; align-items: center; gap: 9px;
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      color: white;
      font-size: 15px;
      font-weight: 700;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 15px 32px;
      border-radius: 12px;
      text-decoration: none;
      transition: all 0.25s;
      box-shadow: 0 6px 24px rgba(193,68,14,0.45);
      position: relative; overflow: hidden;
    }
    .btn-primary-hero::after {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(180deg, rgba(255,255,255,0.15) 0%, transparent 60%);
    }
    .btn-primary-hero:hover {
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 10px 32px rgba(193,68,14,0.55);
    }
    .btn-outline-hero {
      display: inline-flex; align-items: center; gap: 9px;
      background: rgba(255,255,255,0.1);
      border: 1.5px solid rgba(255,255,255,0.25);
      color: white;
      font-size: 15px;
      font-weight: 600;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 15px 32px;
      border-radius: 12px;
      text-decoration: none;
      transition: all 0.25s;
      backdrop-filter: blur(8px);
    }
    .btn-outline-hero:hover {
      background: rgba(255,255,255,0.18);
      border-color: rgba(255,255,255,0.4);
      color: white;
      transform: translateY(-2px);
    }

    /* Subpages Hero Banner */
    .about-hero, .testi-hero, .faq-hero, .contact-hero, .product-hero {
      position: relative;
      background: var(--charcoal);
      padding: 90px 0 70px;
      overflow: hidden;
    }
    .about-hero-bg, .testi-hero-bg, .faq-hero-bg, .contact-hero-bg, .product-hero-bg {
      position: absolute;
      inset: 0;
      background: url('{{ asset("assets/img/login-bg.png") }}') center/cover no-repeat;
      z-index: 0;
      filter: brightness(0.35);
    }
    .about-hero-overlay, .testi-hero-overlay, .faq-hero-overlay, .contact-hero-overlay, .product-hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(120deg, rgba(44, 22, 8, 0.94) 0%, rgba(60, 30, 10, 0.8) 100%);
      z-index: 1;
    }
    .about-hero-pattern, .testi-hero-pattern, .faq-hero-pattern, .contact-hero-pattern, .product-hero-pattern {
      position: absolute;
      inset: 0;
      z-index: 2;
      opacity: 0.05;
      background-image:
        repeating-linear-gradient(0deg, transparent, transparent 40px, rgba(255,255,255,0.5) 40px, rgba(255,255,255,0.5) 42px),
        repeating-linear-gradient(90deg, transparent, transparent 40px, rgba(255,255,255,0.5) 40px, rgba(255,255,255,0.5) 42px);
    }
    .about-hero-content, .testi-hero-content, .faq-hero-content, .contact-hero-content, .product-hero-content {
      position: relative;
      z-index: 3;
      text-align: center;
    }
    .about-hero-title, .testi-hero-title, .faq-hero-title, .contact-hero-title, .product-hero-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(32px, 4.5vw, 52px);
      font-weight: 800;
      color: var(--white);
      letter-spacing: -1.5px;
      margin-bottom: 15px;
    }
    .about-hero-title em, .testi-hero-title em, .faq-hero-title em, .contact-hero-title em, .product-hero-title em {
      font-style: normal;
      color: var(--terracotta-lt);
    }

    /* ── About Hero V2 (Premium) ────────────────────── */
    .about-hero-v2 {
      position: relative;
      min-height: 620px;
      overflow: hidden;
      background: #1a0d04;
    }
    .ahv2-photo {
      position: absolute;
      inset: 0;
      background-size: cover;
      background-position: center 30%;
      background-repeat: no-repeat;
      z-index: 0;
      transform: scale(1.04);
      transition: transform 8s ease;
      filter: brightness(0.55) saturate(0.9);
    }
    .about-hero-v2:hover .ahv2-photo { transform: scale(1.0); }
    .ahv2-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        110deg,
        rgba(20, 8, 2, 0.92) 0%,
        rgba(40, 18, 6, 0.80) 55%,
        rgba(60, 30, 10, 0.40) 100%
      );
      z-index: 1;
    }
    .ahv2-pattern {
      position: absolute;
      inset: 0;
      z-index: 2;
      opacity: 0.04;
      background-image:
        repeating-linear-gradient(0deg, transparent, transparent 40px, rgba(255,255,255,0.6) 40px, rgba(255,255,255,0.6) 41px),
        repeating-linear-gradient(90deg, transparent, transparent 40px, rgba(255,255,255,0.6) 40px, rgba(255,255,255,0.6) 41px);
    }

    /* Badge */
    .ahv2-badge {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: rgba(193,68,14,0.15);
      border: 1px solid rgba(193,68,14,0.4);
      color: #f0b090;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.8px;
      text-transform: uppercase;
      padding: 7px 18px;
      border-radius: 50px;
      backdrop-filter: blur(12px);
      margin-bottom: 22px;
    }
    .ahv2-badge-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--clay);
      animation: pulse-dot 2s ease-in-out infinite;
      flex-shrink: 0;
    }
    @keyframes pulse-dot {
      0%,100% { box-shadow: 0 0 0 0 rgba(193,68,14,0.6); }
      50%      { box-shadow: 0 0 0 6px rgba(193,68,14,0); }
    }

    /* Title */
    .ahv2-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(38px, 5.5vw, 68px);
      font-weight: 900;
      color: #ffffff;
      line-height: 1.05;
      letter-spacing: -2px;
      margin-bottom: 20px;
    }
    .ahv2-title em {
      font-style: normal;
      background: linear-gradient(135deg, var(--clay) 0%, #e8844a 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Subtext */
    .ahv2-sub {
      font-size: 16px;
      line-height: 1.75;
      color: rgba(255,255,255,0.65);
      max-width: 520px;
      margin-bottom: 30px;
    }

    /* RIGHT side floating card */
    .ahv2-card-wrap {
      position: relative;
      width: 320px;
      height: 320px;
    }
    .ahv2-img-card {
      width: 100%;
      height: 100%;
      background: rgba(255,255,255,0.04);
      border: 1px solid rgba(193,68,14,0.3);
      border-radius: 24px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 0;
      backdrop-filter: blur(20px);
      box-shadow:
        0 0 0 1px rgba(193,68,14,0.15),
        0 20px 60px rgba(0,0,0,0.5),
        inset 0 1px 0 rgba(255,255,255,0.08);
      animation: float-card 5s ease-in-out infinite;
    }
    @keyframes float-card {
      0%,100% { transform: translateY(0); }
      50%      { transform: translateY(-12px); }
    }
    .ahv2-roster-grid {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      gap: 6px;
      padding: 24px;
      width: 100%;
    }
    .ahv2-roster-grid .r {
      aspect-ratio: 1;
      border-radius: 6px;
      background: rgba(193,68,14,0.12);
      border: 1px solid rgba(193,68,14,0.2);
    }
    .ahv2-roster-grid .r.filled {
      background: linear-gradient(135deg, rgba(193,68,14,0.6), rgba(120,40,8,0.8));
      border-color: rgba(193,68,14,0.5);
      box-shadow: 0 2px 8px rgba(193,68,14,0.3);
    }
    .ahv2-roster-grid .r.hole {
      background: transparent;
      border: 1.5px solid rgba(193,68,14,0.35);
      box-shadow: inset 0 0 10px rgba(193,68,14,0.15);
    }
    .ahv2-img-label {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: rgba(193,68,14,0.7);
      padding-bottom: 20px;
    }

    /* Floating pills */
    .ahv2-pill {
      position: absolute;
      display: flex;
      align-items: center;
      gap: 10px;
      background: rgba(255,255,255,0.08);
      border: 1px solid rgba(255,255,255,0.15);
      backdrop-filter: blur(16px);
      border-radius: 50px;
      padding: 10px 18px 10px 14px;
      color: white;
      font-family: 'Plus Jakarta Sans', sans-serif;
      box-shadow: 0 8px 32px rgba(0,0,0,0.4);
      white-space: nowrap;
    }
    .ahv2-pill i {
      font-size: 22px;
      color: var(--clay);
    }
    .ahv2-pill strong {
      display: block;
      font-size: 15px;
      font-weight: 800;
      line-height: 1.1;
      color: #fff;
    }
    .ahv2-pill span {
      font-size: 11px;
      color: rgba(255,255,255,0.55);
    }
    .ahv2-pill-1 { top: -18px; left: -60px; animation: float-card 4s ease-in-out infinite; }
    .ahv2-pill-2 { bottom: -18px; right: -60px; animation: float-card 5.5s ease-in-out infinite reverse; }

    /* Bottom stats bar */
    .ahv2-stats-row {
      display: flex;
      align-items: center;
      gap: 0;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.10);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      padding: 22px 40px;
      margin-bottom: 30px;
      flex-wrap: wrap;
      row-gap: 20px;
    }
    .ahv2-stat {
      flex: 1;
      text-align: center;
      min-width: 120px;
    }
    .ahv2-stat-num {
      display: block;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 32px;
      font-weight: 900;
      color: #ffffff;
      line-height: 1;
      letter-spacing: -1px;
    }
    .ahv2-stat-num sup {
      font-size: 14px;
      font-weight: 700;
      color: var(--clay);
      vertical-align: super;
    }
    .ahv2-stat-label {
      display: block;
      font-size: 12px;
      color: rgba(255,255,255,0.5);
      font-weight: 500;
      margin-top: 4px;
      letter-spacing: 0.4px;
    }
    .ahv2-stat-divider {
      width: 1px;
      height: 40px;
      background: rgba(255,255,255,0.12);
      margin: 0 10px;
      flex-shrink: 0;
    }
    @media (max-width: 768px) {
      .ahv2-stats-row { padding: 18px 20px; }
      .ahv2-stat-divider { display: none; }
      .ahv2-stat { min-width: 45%; }
      .ahv2-title { letter-spacing: -1px; }
    }

    .breadcrumb-custom {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.12);
      padding: 6px 18px;
      border-radius: 50px;
      font-size: 13px;
      backdrop-filter: blur(8px);
    }
    .breadcrumb-custom a { color: rgba(255,255,255,0.6); text-decoration: none; transition: color 0.2s; }
    .breadcrumb-custom a:hover { color: var(--clay); }
    .breadcrumb-custom span.sep { color: rgba(255,255,255,0.3); }
    .breadcrumb-custom span.active { color: white; font-weight: 500; }

    /* Stats & Chips */
    .hero-stats {
      display: flex;
      align-items: center;
      gap: 0;
      flex-wrap: wrap;
    }
    .hero-stat {
      padding-right: 32px;
      margin-right: 32px;
      border-right: 1px solid rgba(255,255,255,0.15);
    }
    .hero-stat:last-child { border-right: none; padding-right: 0; margin-right: 0; }
    .hero-stat-num {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 30px;
      font-weight: 800;
      color: var(--white);
      line-height: 1;
    }
    .hero-stat-num sup { font-size: 16px; color: var(--clay); }
    .hero-stat-txt {
      font-size: 12px;
      color: rgba(255,255,255,0.4);
      margin-top: 5px;
      letter-spacing: 0.3px;
    }

    .hero-chips {
      display: flex; flex-wrap: wrap; gap: 10px;
      margin-bottom: 40px;
    }
    .hero-chip {
      display: inline-flex; align-items: center; gap: 7px;
      background: rgba(255,255,255,0.09);
      border: 1px solid rgba(255,255,255,0.14);
      border-radius: 50px;
      padding: 7px 14px;
      backdrop-filter: blur(8px);
      transition: all 0.2s;
      cursor: default;
    }
    .hero-chip:hover {
      background: rgba(193,68,14,0.28);
      border-color: rgba(255,160,100,0.3);
    }
    .hero-chip i { font-size: 13px; color: var(--clay); }
    .hero-chip span { font-size: 12.5px; color: rgba(255,255,255,0.8); font-weight: 500; }

    .hero-product-strip {
      background: var(--white);
      border-top: 3px solid var(--terracotta);
      box-shadow: 0 -4px 30px rgba(60,30,10,0.1);
    }
    .product-strip-item {
      display: flex; align-items: center; gap: 14px;
      padding: 24px 0;
      border-right: 1px solid var(--border);
    }
    .product-strip-item:last-child { border-right: none; }
    .strip-icon {
      width: 48px; height: 48px;
      background: linear-gradient(135deg, rgba(193,68,14,0.12), rgba(232,98,42,0.1));
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }
    .strip-icon i { font-size: 22px; color: var(--terracotta); }
    .strip-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 14px;
      font-weight: 700;
      color: var(--charcoal);
      margin-bottom: 2px;
    }
    .strip-sub { font-size: 12px; color: var(--muted); }

    /* ═══════════════════════════════════════════════
       SECTION COMMON
    ═══════════════════════════════════════════════ */
    section { padding: 90px 0; }
    .section-bg-cream { background: var(--cream); }
    .section-bg-sand { background: var(--sand); }
    .section-bg-white { background: var(--white); }
    .section-bg-dark {
      background: var(--charcoal);
      color: white;
      position: relative;
    }
    .section-bg-dark.roster-pattern {
      background-image:
        url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.025'%3E%3Crect x='5' y='5' width='22' height='22' rx='2'/%3E%3Crect x='33' y='5' width='22' height='22' rx='2'/%3E%3Crect x='5' y='33' width='22' height='22' rx='2'/%3E%3Crect x='33' y='33' width='22' height='22' rx='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"),
        linear-gradient(135deg, #2c2118, #3d2b1f);
    }

    .section-label {
      display: inline-flex; align-items: center; gap: 8px;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--terracotta);
      font-family: 'Plus Jakarta Sans', sans-serif;
      margin-bottom: 14px;
    }
    .section-label::before {
      content: '';
      width: 24px; height: 3px;
      background: var(--terracotta);
      border-radius: 2px;
    }

    .section-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(28px, 3.5vw, 42px);
      font-weight: 800;
      color: var(--charcoal);
      line-height: 1.15;
      letter-spacing: -1px;
      margin-bottom: 16px;
    }
    .section-title.light { color: var(--white); }
    .section-title em { font-style: normal; color: var(--terracotta-lt); }

    .section-desc {
      font-size: 16px;
      color: var(--muted);
      line-height: 1.8;
      max-width: 580px;
    }
    .section-desc.light { color: rgba(255,255,255,0.55); }

    .divider-line {
      width: 60px; height: 4px;
      background: linear-gradient(90deg, var(--terracotta), var(--terracotta-lt));
      border-radius: 2px;
      margin: 18px 0 28px;
    }
    .divider-line.centered { margin-left: auto; margin-right: auto; }

    /* Roster decorators */
    .roster-icon {
      display: inline-grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 3px;
      padding: 4px;
    }
    .roster-icon .r-cell {
      width: 10px; height: 10px;
      background: var(--terracotta);
      border-radius: 2px;
      opacity: 0.8;
    }
    .roster-icon .r-cell.empty { background: transparent; }

    .roster-decor {
      display: grid;
      grid-template-columns: repeat(4, 32px);
      grid-template-rows: repeat(4, 32px);
      gap: 5px;
      opacity: 0.15;
    }
    .roster-decor .rd { background: var(--terracotta); border-radius: 4px; }
    .roster-decor .rd.empty { background: transparent; }

    /* ═══════════════════════════════════════════════
       FEATURE CARDS
    ═══════════════════════════════════════════════ */
    .feature-card {
      background: var(--white);
      border-radius: 20px;
      padding: 36px 30px;
      border: 1px solid var(--border);
      transition: all 0.3s;
      position: relative;
      overflow: hidden;
      height: 100%;
    }
    .feature-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--terracotta), var(--terracotta-lt));
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.35s;
    }
    .feature-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 50px rgba(60,30,10,0.12);
      border-color: rgba(193,68,14,0.2);
    }
    .feature-card:hover::before { transform: scaleX(1); }

    .feature-icon-wrap {
      width: 64px; height: 64px;
      background: linear-gradient(135deg, rgba(193,68,14,0.1), rgba(232,98,42,0.08));
      border-radius: 16px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 22px;
      transition: all 0.3s;
    }
    .feature-card:hover .feature-icon-wrap {
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
    }
    .feature-icon-wrap i {
      font-size: 26px;
      color: var(--terracotta);
      transition: color 0.3s;
    }
    .feature-card:hover .feature-icon-wrap i { color: white; }

    .feature-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 18px;
      font-weight: 700;
      color: var(--charcoal);
      margin-bottom: 12px;
    }
    .feature-desc {
      font-size: 14px;
      color: var(--muted);
      line-height: 1.75;
    }

    /* ═══════════════════════════════════════════════
       PRODUCT CARDS (Katalog)
    ═══════════════════════════════════════════════ */
    .product-card {
      background: var(--white);
      border-radius: 20px;
      overflow: hidden;
      border: 1px solid var(--border);
      transition: all 0.3s;
      height: 100%;
    }
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 50px rgba(60,30,10,0.14);
    }
    .product-card-img {
      height: 200px;
      background: linear-gradient(135deg, var(--sand), rgba(193,68,14,0.15));
      display: flex; align-items: center; justify-content: center;
      position: relative;
      overflow: hidden;
    }
    .product-card-img .pattern-bg {
      position: absolute; inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23c1440e' fill-opacity='0.1'%3E%3Crect x='3' y='3' width='15' height='15' rx='2'/%3E%3Crect x='22' y='3' width='15' height='15' rx='2'/%3E%3Crect x='3' y='22' width='15' height='15' rx='2'/%3E%3Crect x='22' y='22' width='15' height='15' rx='2'/%3E%3C/g%3E%3C/svg%3E");
    }
    .product-card-img .product-icon {
      width: 80px; height: 80px;
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      border-radius: 20px;
      display: flex; align-items: center; justify-content: center;
      box-shadow: 0 8px 24px rgba(193,68,14,0.4);
      position: relative; z-index: 1;
      transition: all 0.3s;
    }
    .product-card:hover .product-icon {
      transform: scale(1.08) rotate(3deg);
      box-shadow: 0 12px 32px rgba(193,68,14,0.5);
    }
    .product-card-img .product-icon i { font-size: 34px; color: white; }
    .product-badge {
      position: absolute; top: 14px; right: 14px;
      background: var(--charcoal);
      color: white;
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.5px;
      padding: 4px 10px;
      border-radius: 6px;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .product-card-body { padding: 24px; }
    .product-card-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 17px;
      font-weight: 700;
      color: var(--charcoal);
      margin-bottom: 8px;
    }
    .product-card-desc { font-size: 13.5px; color: var(--muted); line-height: 1.7; margin-bottom: 18px; }
    .product-card-footer {
      display: flex; align-items: center; justify-content: space-between;
      padding-top: 16px;
      border-top: 1px solid var(--border);
    }
    .product-tag {
      display: inline-flex; align-items: center; gap: 5px;
      font-size: 12px; color: var(--terracotta);
      font-weight: 600;
    }
    .btn-card {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--terracotta);
      color: white;
      font-size: 12.5px;
      font-weight: 700;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 8px 16px;
      border-radius: 8px;
      text-decoration: none;
      transition: all 0.2s;
    }
    .btn-card:hover { background: var(--terracotta-dk); color: white; transform: translateX(2px); }

    /* ═══════════════════════════════════════════════
       ABOUT VISUALS & STATS
    ═══════════════════════════════════════════════ */
    .about-visual {
      position: relative;
    }
    .about-img-main {
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(60,30,10,0.2);
      background: linear-gradient(135deg, var(--sand), rgba(193,68,14,0.2));
      height: 420px;
      display: flex; align-items: center; justify-content: center;
      position: relative;
    }
    .about-roster-grid {
      display: grid;
      grid-template-columns: repeat(6, 56px);
      grid-template-rows: repeat(5, 56px);
      gap: 8px;
    }
    .about-roster-grid .r {
      background: rgba(193,68,14,0.12);
      border: 2px solid rgba(193,68,14,0.2);
      border-radius: 8px;
      transition: all 0.5s;
    }
    .about-roster-grid .r.filled {
      background: linear-gradient(135deg, rgba(193,68,14,0.35), rgba(232,98,42,0.2));
      border-color: rgba(193,68,14,0.4);
    }
    .about-roster-grid .r.hole {
      background: var(--charcoal);
      border-color: rgba(193,68,14,0.1);
    }

    .about-stat-card {
      position: absolute;
      background: var(--white);
      border-radius: 16px;
      padding: 20px 24px;
      box-shadow: 0 10px 40px rgba(60,30,10,0.15);
      border: 1px solid var(--border);
    }
    .about-stat-card.card-1 {
      bottom: -20px; left: -24px;
    }
    .about-stat-card.card-2 {
      top: -20px; right: -24px;
    }
    .stat-num-big {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 32px;
      font-weight: 800;
      color: var(--terracotta);
      line-height: 1;
    }
    .stat-num-big sup { font-size: 16px; }
    .stat-label-sm { font-size: 12px; color: var(--muted); margin-top: 4px; }

    .check-list { list-style: none; padding: 0; margin: 0; }
    .check-list li {
      display: flex; align-items: flex-start; gap: 12px;
      font-size: 15px;
      color: var(--charcoal);
      padding: 10px 0;
      border-bottom: 1px solid var(--border);
    }
    .check-list li:last-child { border-bottom: none; }
    .check-list li .check-icon {
      width: 24px; height: 24px;
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      border-radius: 6px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      margin-top: 1px;
    }
    .check-list li .check-icon i { font-size: 12px; color: white; }

    /* Visi Misi Values (About specific) */
    .value-card {
      background: var(--white);
      border-radius: 20px;
      padding: 36px 30px;
      border: 1px solid var(--border);
      transition: all 0.3s;
      position: relative;
      overflow: hidden;
      height: 100%;
    }
    .value-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--terracotta), var(--terracotta-lt));
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.35s;
    }
    .value-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 50px rgba(60,30,10,0.12);
      border-color: rgba(193,68,14,0.2);
    }
    .value-card:hover::before { transform: scaleX(1); }
    .value-icon-wrap {
      width: 60px; height: 60px;
      background: linear-gradient(135deg, rgba(193,68,14,0.1), rgba(232,98,42,0.08));
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 22px;
      transition: all 0.3s;
    }
    .value-card:hover .value-icon-wrap {
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
    }
    .value-icon-wrap i {
      font-size: 24px;
      color: var(--terracotta);
      transition: color 0.3s;
    }
    .value-card:hover .value-icon-wrap i { color: white; }
    .value-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 18px;
      font-weight: 700;
      color: var(--charcoal);
      margin-bottom: 12px;
    }
    .value-desc {
      font-size: 14px;
      color: var(--muted);
      line-height: 1.75;
    }

    /* Timeline (About specific) */
    .timeline {
      position: relative;
      max-width: 900px;
      margin: 0 auto;
    }
    .timeline::after {
      content: '';
      position: absolute;
      width: 4px;
      background-color: var(--border);
      top: 0;
      bottom: 0;
      left: 50%;
      margin-left: -2px;
    }
    .timeline-container {
      padding: 10px 40px;
      position: relative;
      background-color: inherit;
      width: 50%;
    }
    .timeline-container::after {
      content: '';
      position: absolute;
      width: 20px;
      height: 20px;
      right: -10px;
      background-color: var(--white);
      border: 4px solid var(--terracotta);
      top: 25px;
      border-radius: 50%;
      z-index: 1;
      transition: all 0.3s;
    }
    .left { left: 0; }
    .right { left: 50%; }
    .right::after { left: -10px; }

    .timeline-content {
      padding: 24px;
      background-color: var(--white);
      position: relative;
      border-radius: 16px;
      border: 1px solid var(--border);
      box-shadow: 0 4px 20px rgba(60,30,10,0.05);
      transition: all 0.3s;
    }
    .timeline-container:hover .timeline-content {
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(60,30,10,0.1);
      border-color: rgba(193,68,14,0.2);
    }
    .timeline-container:hover::after {
      background-color: var(--terracotta);
      transform: scale(1.2);
    }
    .timeline-year {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 19px;
      font-weight: 800;
      color: var(--terracotta);
      margin-bottom: 6px;
    }
    .timeline-title {
      font-size: 15px;
      font-weight: 700;
      color: var(--charcoal);
      margin-bottom: 8px;
    }
    .timeline-text {
      font-size: 13.5px;
      color: var(--muted);
      line-height: 1.6;
    }

    /* ═══════════════════════════════════════════════
       COUNTER SECTION
    ═══════════════════════════════════════════════ */
    .counter-section {
      background: linear-gradient(135deg, var(--terracotta-dk) 0%, var(--terracotta) 60%, var(--terracotta-lt) 100%);
      padding: 70px 0;
      position: relative;
      overflow: hidden;
    }
    .counter-section::before {
      content: '';
      position: absolute; inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.06'%3E%3Crect x='5' y='5' width='22' height='22' rx='2'/%3E%3Crect x='33' y='5' width='22' height='22' rx='2'/%3E%3Crect x='5' y='33' width='22' height='22' rx='2'/%3E%3Crect x='33' y='33' width='22' height='22' rx='2'/%3E%3C/g%3E%3C/svg%3E");
    }
    .counter-item { text-align: center; position: relative; }
    .counter-item::after {
      content: '';
      position: absolute;
      right: 0; top: 50%;
      transform: translateY(-50%);
      width: 1px; height: 60px;
      background: rgba(255,255,255,0.2);
    }
    .counter-item:last-child::after { display: none; }
    .counter-num {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 48px;
      font-weight: 800;
      color: white;
      line-height: 1;
    }
    .counter-num sup { font-size: 22px; }
    .counter-label {
      font-size: 13px;
      color: rgba(255,255,255,0.65);
      font-weight: 500;
      margin-top: 8px;
      letter-spacing: 0.3px;
    }
    .counter-icon {
      font-size: 28px;
      color: rgba(255,255,255,0.3);
      margin-bottom: 10px;
    }

    /* ═══════════════════════════════════════════════
       TESTIMONIALS & FILTERS
    ═══════════════════════════════════════════════ */
    .filter-tags {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 45px;
    }
    .filter-tag {
      background: var(--white);
      border: 1px solid var(--border);
      padding: 8px 20px;
      border-radius: 50px;
      font-size: 13.5px;
      font-weight: 600;
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: var(--muted);
      cursor: pointer;
      transition: all 0.25s;
    }
    .filter-tag:hover, .filter-tag.active {
      background: var(--terracotta);
      border-color: var(--terracotta);
      color: white;
      box-shadow: 0 4px 12px rgba(193,68,14,0.25);
    }

    .testimonial-card {
      background: var(--white);
      border-radius: 20px;
      padding: 32px;
      border: 1px solid var(--border);
      height: 100%;
      position: relative;
      transition: all 0.3s;
    }
    .testimonial-card:hover {
      box-shadow: 0 16px 40px rgba(60,30,10,0.1);
      transform: translateY(-4px);
      border-color: rgba(193,68,14,0.15);
    }
    .testimonial-card::before {
      content: '\201C';
      font-size: 80px;
      color: rgba(193,68,14,0.08);
      font-family: Georgia, serif;
      line-height: 0.8;
      position: absolute;
      top: 22px; right: 24px;
    }
    .stars { display: flex; gap: 3px; margin-bottom: 16px; }
    .stars i { font-size: 13px; color: #f59e0b; }
    .testimonial-text { font-size: 14.5px; color: var(--muted); line-height: 1.8; margin-bottom: 22px; font-style: italic; }
    .testimonial-author { display: flex; align-items: center; gap: 12px; }
    .author-avatar {
      width: 44px; height: 44px;
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 800; font-size: 16px;
      color: white; flex-shrink: 0;
    }
    .author-name { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 700; color: var(--charcoal); }
    .author-role { font-size: 12px; color: var(--muted); }
    .author-badge {
      display: inline-block;
      font-size: 10px;
      font-weight: 700;
      background: var(--sand);
      color: var(--terracotta);
      padding: 2px 8px;
      border-radius: 4px;
      margin-top: 3px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }

    /* ═══════════════════════════════════════════════
       FAQ & SEARCH
    ═══════════════════════════════════════════════ */
    .search-box-wrap {
      max-width: 600px;
      margin: 0 auto 50px;
      position: relative;
    }
    .search-input-custom {
      width: 100%;
      background: var(--white);
      border: 1.5px solid var(--border);
      padding: 16px 24px 16px 54px;
      border-radius: 16px;
      font-size: 15px;
      color: var(--charcoal);
      outline: none;
      transition: all 0.3s;
      box-shadow: 0 4px 15px rgba(60,30,10,0.04);
    }
    .search-input-custom:focus {
      border-color: var(--terracotta);
      box-shadow: 0 10px 30px rgba(193,68,14,0.12);
    }
    .search-box-wrap i {
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
      color: var(--muted);
      pointer-events: none;
    }

    .faq-cat-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 20px;
      font-weight: 700;
      color: var(--charcoal);
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 10px;
      border-left: 4px solid var(--terracotta);
      padding-left: 12px;
    }

    .faq-item {
      background: var(--white);
      border-radius: 14px;
      border: 1px solid var(--border);
      margin-bottom: 12px;
      overflow: hidden;
      transition: all 0.3s;
    }
    .faq-item:hover { border-color: rgba(193,68,14,0.25); }
    .faq-question {
      padding: 20px 24px;
      cursor: pointer;
      display: flex; align-items: center; justify-content: space-between; gap: 16px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 15.5px;
      font-weight: 600;
      color: var(--charcoal);
      user-select: none;
    }
    .faq-icon {
      width: 32px; height: 32px;
      background: var(--sand);
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      transition: all 0.3s;
    }
    .faq-icon i { font-size: 14px; color: var(--terracotta); transition: transform 0.3s; }
    .faq-item.open .faq-icon { background: var(--terracotta); }
    .faq-item.open .faq-icon i { color: white; transform: rotate(45deg); }
    .faq-answer {
      padding: 0 24px 20px;
      font-size: 14px;
      color: var(--muted);
      line-height: 1.8;
      display: none;
      border-top: 1px solid rgba(232,213,196,0.3);
      padding-top: 16px;
    }
    .faq-item.open .faq-answer { display: block; }

    /* ═══════════════════════════════════════════════
       CONTACT & FORM SPECIFIC
    ═══════════════════════════════════════════════ */
    .contact-card-custom {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 30px;
      height: 100%;
      transition: all 0.3s;
    }
    .contact-card-custom:hover {
      box-shadow: 0 12px 30px rgba(60,30,10,0.08);
      transform: translateY(-3px);
      border-color: rgba(193,68,14,0.15);
    }
    .contact-card-icon {
      width: 56px; height: 56px;
      background: linear-gradient(135deg, rgba(193,68,14,0.1), rgba(232,98,42,0.08));
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 20px;
      color: var(--terracotta);
      font-size: 24px;
      transition: all 0.3s;
    }
    .contact-card-custom:hover .contact-card-icon {
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      color: white;
    }
    .contact-card-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 16px;
      font-weight: 700;
      color: var(--charcoal);
      margin-bottom: 8px;
    }
    .contact-card-text {
      font-size: 14px;
      color: var(--muted);
      line-height: 1.6;
    }
    .contact-card-text a {
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }
    .contact-card-text a:hover {
      color: var(--terracotta);
    }

    .form-wrap-custom {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 40px;
      box-shadow: 0 10px 40px rgba(60,30,10,0.05);
    }
    .form-label-custom {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 13.5px;
      font-weight: 700;
      color: var(--charcoal);
      margin-bottom: 8px;
    }
    .form-control-custom {
      width: 100%;
      background: var(--cream);
      border: 1.5px solid transparent;
      border-radius: 12px;
      padding: 12px 18px;
      font-size: 14.5px;
      color: var(--charcoal);
      outline: none;
      transition: all 0.25s;
    }
    .form-control-custom:focus {
      background: var(--white);
      border-color: var(--terracotta);
      box-shadow: 0 4px 15px rgba(193,68,14,0.08);
    }
    .btn-submit-form {
      display: inline-flex; align-items: center; justify-content: center; gap: 8px;
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      color: white;
      border: none;
      width: 100%;
      font-size: 15px;
      font-weight: 700;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 14px;
      border-radius: 12px;
      transition: all 0.25s;
      box-shadow: 0 4px 15px rgba(193,68,14,0.3);
    }
    .btn-submit-form:hover {
      background: linear-gradient(135deg, var(--terracotta-dk), var(--terracotta));
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(193,68,14,0.4);
    }

    .map-section {
      padding: 0 0 80px;
    }
    .map-container-custom {
      position: relative;
      border-radius: 24px;
      overflow: hidden;
      border: 1.5px solid var(--border);
      box-shadow: 0 15px 50px rgba(60,30,10,0.08);
      height: 480px;
      width: 100%;
      background: var(--sand);
    }
    .map-container-custom iframe {
      width: 100%;
      height: 100%;
      border: none;
    }

    /* ═══════════════════════════════════════════════
       CTA SECTION
    ═══════════════════════════════════════════════ */
    .cta-section {
      background: linear-gradient(135deg, var(--charcoal) 0%, var(--dark-brown) 100%);
      padding: 90px 0;
      position: relative;
      overflow: hidden;
    }
    .cta-section::before {
      content: '';
      position: absolute; inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23c1440e' fill-opacity='0.06'%3E%3Crect x='6' y='6' width='30' height='30' rx='3'/%3E%3Crect x='44' y='6' width='30' height='30' rx='3'/%3E%3Crect x='6' y='44' width='30' height='30' rx='3'/%3E%3Crect x='44' y='44' width='30' height='30' rx='3'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .cta-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(30px, 4vw, 50px);
      font-weight: 800;
      color: white;
      letter-spacing: -1px;
      line-height: 1.15;
      margin-bottom: 18px;
    }
    .cta-title em { font-style: normal; color: var(--terracotta-lt); }
    .cta-desc { font-size: 16px; color: rgba(255,255,255,0.55); line-height: 1.8; margin-bottom: 36px; }

    /* ═══════════════════════════════════════════════
       FOOTER
    ═══════════════════════════════════════════════ */
    .footer-main {
      background: var(--charcoal);
      padding: 70px 0 40px;
      color: rgba(255,255,255,0.55);
    }
    .footer-logo { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; text-decoration: none; }
    .footer-logo-icon {
      width: 40px; height: 40px;
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
    }
    .footer-logo-icon svg { width: 22px; height: 22px; }
    .footer-brand-name {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 16px; font-weight: 800;
      color: white; letter-spacing: -0.3px; line-height: 1;
    }
    .footer-brand-sub { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 2px; }
    .footer-desc { font-size: 13.5px; line-height: 1.75; color: rgba(255,255,255,0.4); margin-bottom: 22px; }

    .footer-social { display: flex; gap: 8px; }
    .footer-social a {
      width: 34px; height: 34px;
      border-radius: 8px;
      background: rgba(255,255,255,0.08);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.45);
      font-size: 14px;
      text-decoration: none;
      transition: all 0.2s;
    }
    .footer-social a:hover { background: var(--terracotta); color: white; }

    .footer-heading { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; font-weight: 700; color: white; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 18px; }
    .footer-links { list-style: none; padding: 0; margin: 0; }
    .footer-links li { margin-bottom: 10px; }
    .footer-links a {
      font-size: 13.5px;
      color: rgba(255,255,255,0.4);
      text-decoration: none;
      transition: color 0.2s;
      display: flex; align-items: center; gap: 8px;
    }
    .footer-links a:hover { color: var(--clay); }
    .footer-links a i { font-size: 11px; }

    .footer-contact-item { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 14px; }
    .footer-contact-icon {
      width: 32px; height: 32px;
      background: rgba(193,68,14,0.2);
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }
    .footer-contact-icon i { font-size: 13px; color: var(--clay); }
    .footer-contact-text { font-size: 13px; color: rgba(255,255,255,0.4); line-height: 1.5; }
    .footer-contact-text strong { display: block; color: rgba(255,255,255,0.65); font-weight: 600; margin-bottom: 2px; }

    .footer-divider {
      border-top: 1px solid rgba(255,255,255,0.08);
      margin: 36px 0 24px;
    }
    .footer-bottom { font-size: 12px; color: rgba(255,255,255,0.3); }
    .footer-bottom a { color: rgba(255,255,255,0.45); text-decoration: none; }
    .footer-bottom a:hover { color: var(--clay); }

    /* ═══════════════════════════════════════════════
       BACK TO TOP & TOGGLER
    ═══════════════════════════════════════════════ */
    .back-to-top {
      position: fixed;
      bottom: 28px; right: 28px;
      width: 44px; height: 44px;
      background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      color: white;
      font-size: 16px;
      text-decoration: none;
      box-shadow: 0 6px 20px rgba(193,68,14,0.4);
      opacity: 0;
      transform: translateY(10px);
      transition: all 0.3s;
      z-index: 999;
    }
    .back-to-top.show { opacity: 1; transform: translateY(0); }
    .back-to-top:hover { color: white; transform: translateY(-3px); box-shadow: 0 10px 28px rgba(193,68,14,0.55); }

    .navbar-toggler { border: 1.5px solid var(--border); border-radius: 8px; padding: 6px 10px; }
    .navbar-toggler:focus { box-shadow: none; outline: 2px solid rgba(193,68,14,0.3); }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23c1440e' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* ═══════════════════════════════════════════════
       RESPONSIVENESS
    ═══════════════════════════════════════════════ */
    @media (max-width: 768px) {
      .hero-title { letter-spacing: -1px; }
      .hero-stats { gap: 24px; }
      .hero-stat { padding-right: 24px; margin-right: 24px; }
      .product-strip-item { border-right: none; border-bottom: 1px solid var(--border); padding: 16px 0; }
      .about-stat-card { display: none; }
      section { padding: 60px 0; }
      .timeline::after { left: 31px; }
      .timeline-container { width: 100%; padding-left: 70px; padding-right: 25px; }
      .timeline-container::after { left: 21px; top: 25px; }
      .right { left: 0%; }
      .left::after { left: 21px; }
    }
  </style>
</head>

<body>

<!-- ═══════════════════════════════════════════════
     TOPBAR
═══════════════════════════════════════════════ -->
<div class="topbar d-none d-lg-block">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center gap-2 flex-wrap">
        <a href="mailto:{{ $contact->email ?? 'info@rosterdinding.com' }}"><i class="bi bi-envelope me-1"></i> {{ $contact->email ?? 'info@rosterdinding.com' }}</a>
        <span class="sep">|</span>
        <a href="https://wa.me/{{ $cleanWa ?? '6281234567890' }}" target="_blank"><i class="bi bi-telephone me-1"></i> {{ $contact->no_wa ?? '+62 812 3456 7890' }}</a>
        <span class="sep">|</span>
        <span><i class="bi bi-geo-alt me-1"></i> {{ $contact->alamat ? Str::limit($contact->alamat, 60) : 'Distributor Roster Dinding & Bata Ventilasi' }}</span>
      </div>
      <div class="d-flex align-items-center">
        <span class="me-2" style="font-size:11px; letter-spacing:.5px;">Ikuti Kami:</span>
        <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
        <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
        <a href="#" class="social-link"><i class="bi bi-whatsapp"></i></a>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     NAVBAR
═══════════════════════════════════════════════ -->
<nav class="navbar-main">
  <div class="container">
    <nav class="navbar navbar-expand-lg w-100">
      <a href="{{ route('homepage') }}" class="brand-wrap me-4">
        <div class="brand-icon">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="1" width="10" height="10" rx="2" fill="white" fill-opacity="0.95"/>
            <rect x="13" y="1" width="10" height="10" rx="2" fill="white" fill-opacity="0.95"/>
            <rect x="1" y="13" width="10" height="10" rx="2" fill="white" fill-opacity="0.95"/>
            <rect x="13" y="13" width="10" height="10" rx="2" fill="white" fill-opacity="0.95"/>
            <rect x="4" y="4" width="4" height="4" rx="1" fill="#c1440e"/>
            <rect x="16" y="4" width="4" height="4" rx="1" fill="#c1440e"/>
            <rect x="4" y="16" width="4" height="4" rx="1" fill="#c1440e"/>
            <rect x="16" y="16" width="4" height="4" rx="1" fill="#c1440e"/>
          </svg>
        </div>
        <div class="brand-text">
          <div class="name">Roster Dinding</div>
          <div class="sub">Minimalis · Distributor Resmi</div>
        </div>
      </a>

      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav mx-auto gap-1">
          <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link nav-link-custom">Beranda</a></li>
          <li class="nav-item"><a href="{{ route('homepage.produk') }}" class="nav-link nav-link-custom">Produk</a></li>
          <li class="nav-item"><a href="{{ route('homepage.tentang') }}" class="nav-link nav-link-custom">Tentang</a></li>
          <li class="nav-item"><a href="{{ route('homepage.testimoni') }}" class="nav-link nav-link-custom">Testimoni</a></li>
          <li class="nav-item"><a href="{{ route('homepage.faq') }}" class="nav-link nav-link-custom">FAQ</a></li>
          <li class="nav-item"><a href="{{ route('homepage.kontak') }}" class="nav-link nav-link-custom">Kontak</a></li>
        </ul>
        <div class="mt-3 mt-lg-0">
          <a href="{{ route('login') }}" class="btn-login-nav">
            <i class="bi bi-box-arrow-in-right"></i>
            Masuk Portal
          </a>
        </div>
      </div>
    </nav>
  </div>
</nav>

<!-- ═══════════════════════════════════════════════
     MAIN CONTENT
═══════════════════════════════════════════════ -->
@yield('content')

<!-- ═══════════════════════════════════════════════
     FOOTER
═══════════════════════════════════════════════ -->
<footer class="footer-main">
  <div class="container">
    <div class="row g-5">
      <!-- Brand -->
      <div class="col-lg-4">
        <a href="{{ route('homepage') }}" class="footer-logo">
          <div class="footer-logo-icon">
            <svg viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="1" y="1" width="9" height="9" rx="2" fill="white" fill-opacity="0.95"/>
              <rect x="12" y="1" width="9" height="9" rx="2" fill="white" fill-opacity="0.95"/>
              <rect x="1" y="12" width="9" height="9" rx="2" fill="white" fill-opacity="0.95"/>
              <rect x="12" y="12" width="9" height="9" rx="2" fill="white" fill-opacity="0.95"/>
              <rect x="4" y="4" width="3" height="3" rx="1" fill="white" fill-opacity="0.95"/>
              <rect x="15" y="4" width="3" height="3" rx="1" fill="white" fill-opacity="0.95"/>
              <rect x="4" y="15" width="3" height="3" rx="1" fill="white" fill-opacity="0.95"/>
              <rect x="15" y="15" width="3" height="3" rx="1" fill="white" fill-opacity="0.95"/>
            </svg>
          </div>
          <div>
            <div class="footer-brand-name">Roster Dinding Minimalis</div>
            <div class="footer-brand-sub">Distributor Resmi · Bata Ventilasi</div>
          </div>
        </a>
        <p class="footer-desc">
          Distributor terpercaya roster dinding dan bata ventilasi dekoratif berkualitas tinggi sejak 2016. Melayani seluruh Indonesia.
        </p>
        <div class="footer-social">
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-whatsapp"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <!-- Links -->
      <div class="col-6 col-lg-2">
        <div class="footer-heading">Navigasi</div>
        <ul class="footer-links">
          <li><a href="{{ route('homepage') }}"><i class="bi bi-chevron-right"></i> Beranda</a></li>
          <li><a href="{{ route('homepage') }}#produk"><i class="bi bi-chevron-right"></i> Produk</a></li>
          <li><a href="{{ route('homepage.tentang') }}"><i class="bi bi-chevron-right"></i> Tentang Kami</a></li>
          <li><a href="{{ route('homepage.testimoni') }}"><i class="bi bi-chevron-right"></i> Testimoni</a></li>
          <li><a href="{{ route('homepage.faq') }}"><i class="bi bi-chevron-right"></i> FAQ</a></li>
          <li><a href="{{ route('homepage.kontak') }}"><i class="bi bi-chevron-right"></i> Kontak</a></li>
        </ul>
      </div>

      <!-- Products -->
      <div class="col-6 col-lg-2">
        <div class="footer-heading">Produk</div>
        <ul class="footer-links">
          <li><a href="{{ route('homepage') }}#produk"><i class="bi bi-chevron-right"></i> Roster Beton</a></li>
          <li><a href="{{ route('homepage') }}#produk"><i class="bi bi-chevron-right"></i> Roster Tanah Liat</a></li>
          <li><a href="{{ route('homepage') }}#produk"><i class="bi bi-chevron-right"></i> Roster Minimalis</a></li>
          <li><a href="{{ route('homepage') }}#produk"><i class="bi bi-chevron-right"></i> Roster Motif</a></li>
          <li><a href="{{ route('homepage') }}#produk"><i class="bi bi-chevron-right"></i> Bata Ventilasi</a></li>
          <li><a href="{{ route('homepage.kontak') }}"><i class="bi bi-chevron-right"></i> Custom Order</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-4">
        <div class="footer-heading">Hubungi Kami</div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-geo-alt"></i></div>
          <div class="footer-contact-text">
            <strong>Alamat</strong>
            {{ $contact->alamat ?? 'Jl. Industri No. 123, Kota, Indonesia' }}
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-telephone"></i></div>
          <div class="footer-contact-text">
            <strong>Telepon / WhatsApp</strong>
            {{ $contact->no_wa ?? '+62 812 3456 7890' }}
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-envelope"></i></div>
          <div class="footer-contact-text">
            <strong>Email</strong>
            {{ $contact->email ?? 'info@rosterdinding.com' }}
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-clock"></i></div>
          <div class="footer-contact-text">
            <strong>Jam Operasional</strong>
            Senin – Sabtu: 08.00 – 17.00 WIB
          </div>
        </div>
      </div>
    </div>

    <div class="footer-divider"></div>

    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 footer-bottom">
      <span>© 2026 Roster Dinding Minimalis. Hak cipta dilindungi.</span>
      <div class="d-flex gap-3">
        <a href="#">Kebijakan Privasi</a>
        <a href="#">Syarat & Ketentuan</a>
        <a href="{{ route('login') }}" style="color:var(--clay);">Portal Admin</a>
      </div>
    </div>
  </div>
</footer>

<!-- Back to Top -->
<a href="#" class="back-to-top" id="backToTop">
  <i class="bi bi-chevron-up"></i>
</a>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
  // AOS Init
  AOS.init({ once: true, offset: 60 });

  // Back to top
  const btn = document.getElementById('backToTop');
  window.addEventListener('scroll', () => {
    btn.classList.toggle('show', window.scrollY > 400);
  });
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // FAQ Toggle
  function toggleFaq(id) {
    const item = document.getElementById(id);
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(f => f.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
  }

  // Smooth scroll for nav links
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  @if($isHome)
  // Active nav on scroll (Only run on homepage context)
  const sections = document.querySelectorAll('section[id], div[id]');
  const navLinks = document.querySelectorAll('.nav-link-custom');
  window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
      if (window.scrollY >= s.offsetTop - 120) current = s.getAttribute('id');
    });
    navLinks.forEach(l => {
      l.classList.remove('active');
      if (l.getAttribute('href') === '#' + current) l.classList.add('active');
    });
  });
  @endif

  // Navbar scroll shadow
  const navbar = document.querySelector('.navbar-main');
  window.addEventListener('scroll', () => {
    navbar.style.boxShadow = window.scrollY > 20
      ? '0 4px 30px rgba(60,30,10,0.15)'
      : '0 2px 20px rgba(60,30,10,0.08)';
  });
</script>

@stack('scripts')

</body>
</html>
