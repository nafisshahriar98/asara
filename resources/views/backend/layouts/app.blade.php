<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Admin Panel')</title>

  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* =========================
       ASARA Admin Theme Tokens
       ========================= */
    :root{
      --asara-green:#0E4F27;
      --asara-green-2:#0A3F1F;
      --asara-gold:#F4B400;
      --asara-cream:#F7F3EA;
      --asara-white:#ffffff;
      --asara-ink:#0f172a;
      --asara-muted:#64748b;

      --asara-border: rgba(14,79,39,.14);
      --asara-shadow: 0 12px 30px rgba(14,79,39,.14);
      --asara-shadow-strong: 0 18px 45px rgba(14,79,39,.20);
    }

    body{
      background: var(--asara-cream);
      color: var(--asara-ink);
    }

    /* ===== NAVBAR ===== */
    .rb-navbar{
      background: linear-gradient(90deg, var(--asara-green) 0%, #0d5a2c 100%);
      border-bottom: 3px solid rgba(244,180,0,.70);
      box-shadow: 0 12px 28px rgba(14,79,39,.25);
    }

    .rb-navbar .navbar-brand{
      color:#fff !important;
      font-weight: 900;
      letter-spacing: .2px;
      display:flex;
      align-items:center;
      gap:10px;
    }

    /* Brand badge like your theme */
    .rb-brand-badge{
      width:40px;
      height:40px;
      border-radius: 12px;
      background: rgba(255,255,255,.12);
      border: 1px solid rgba(255,255,255,.18);
      display:grid;
      place-items:center;
      font-weight: 900;
      color:#fff;
      line-height: 1;
    }

    .rb-navbar .nav-link{
      color: rgba(255,255,255,.92) !important;
      font-weight: 800;
      border-radius: 12px;
      padding: 10px 12px;
      transition: background .15s ease, transform .15s ease;
    }

    .rb-navbar .nav-link:hover{
      background: rgba(255,255,255,.10);
      transform: translateY(-1px);
    }

    .rb-navbar .nav-link.active{
      background: rgba(255,255,255,.16);
      border: 1px solid rgba(255,255,255,.14);
    }

    /* right side buttons */
    .rb-btn-ghost{
      border-radius: 12px;
      font-weight: 900;
      border: 1px solid rgba(255,255,255,.55);
      color:#fff;
      background: rgba(255,255,255,.10);
    }
    .rb-btn-ghost:hover{
      background: rgba(255,255,255,.16);
      color:#fff;
    }

    .rb-btn-danger{
      border-radius: 12px;
      font-weight: 900;
    }

    /* ===== PAGE WRAP ===== */
    .rb-wrap{
      padding: 26px 0;
    }

    /* ===== FLASH ALERTS (match theme) ===== */
    .alert{
      border-radius: 14px;
      border: 1px solid rgba(15,23,42,.08);
      box-shadow: 0 10px 22px rgba(15,23,42,.06);
      padding: 12px 14px;
    }

    /* ===== COMMON CARD ===== */
    .rb-card{
      border: 1px solid var(--asara-border);
      border-radius: 16px;
      box-shadow: var(--asara-shadow);
      background: var(--asara-white);
      overflow: hidden;
    }

    /* ===== PAGE TITLE ===== */
    .rb-page-title{
      font-weight: 900;
      letter-spacing: .2px;
      color: var(--asara-ink);
    }
    .rb-page-sub{
      margin: 0;
      color: rgba(15,23,42,.65);
      font-weight: 700;
      font-size: 14px;
    }

    /* ===== UTILITY BUTTONS ===== */
    .btn{
      border-radius: 12px;
      font-weight: 800;
    }

    .btn-asara{
      background: var(--asara-green);
      border-color: var(--asara-green);
      color: #fff;
      box-shadow: 0 10px 22px rgba(14,79,39,.18);
    }
    .btn-asara:hover{
      background: var(--asara-green-2);
      border-color: var(--asara-green-2);
      color:#fff;
    }

    .btn-asara-soft{
      background: rgba(14,79,39,.08);
      border: 1px solid rgba(14,79,39,.18);
      color: var(--asara-green);
    }
    .btn-asara-soft:hover{
      background: rgba(14,79,39,.12);
      color: var(--asara-green);
    }

    /* optional: nicer tables globally */
    .table{
      background: #fff;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 10px 22px rgba(15,23,42,.06);
    }
    .table thead th{
      background: rgba(14,79,39,.06);
      color: var(--asara-ink);
      font-weight: 900;
      border-bottom: 1px solid rgba(14,79,39,.12);
    }

    /* Navbar toggler icon white */
    .navbar-toggler{ border:0; }
    .navbar-toggler-icon{ filter: invert(1); }

    @media (max-width: 576px){
      .rb-navbar .nav-link{ padding: 9px 10px; }
    }
  </style>

  @stack('styles')
</head>

<body>

{{-- TOP NAVBAR --}}
<nav class="navbar navbar-expand-lg rb-navbar">
  <div class="container">

    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
      <span class="rb-brand-badge">A</span>
      <span>ASARA Admin</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#rbNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="rbNav">
      <ul class="navbar-nav me-auto gap-1 mt-3 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
             href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2 me-1"></i> Dashboard
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}"
             href="{{ route('admin.projects.index') }}">
            <i class="bi bi-building me-1"></i> Projects
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}"
             href="{{ route('admin.blog.index') }}">
            <i class="bi bi-newspaper me-1"></i> News & Events
          </a>
        </li>
      </ul>

      <div class="d-flex gap-2 align-items-center mt-3 mt-lg-0">
        <a href="{{ route('home') }}" class="btn btn-sm rb-btn-ghost">
          <i class="bi bi-box-arrow-up-right me-1"></i> Visit Site
        </a>

        <form action="{{ route('logout') }}" method="POST" class="d-inline m-0">
          @csrf
          <button type="submit" class="btn btn-sm btn-danger rb-btn-danger">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
        </form>
      </div>
    </div>
  </div>
</nav>

<div class="container rb-wrap">

  {{-- Flash --}}
  @if(session('success'))
    <div class="alert alert-success d-flex align-items-center gap-2">
      <i class="bi bi-check-circle-fill"></i>
      <div>{{ session('success') }}</div>
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger d-flex align-items-center gap-2">
      <i class="bi bi-exclamation-triangle-fill"></i>
      <div>{{ session('error') }}</div>
    </div>
  @endif

  {{-- Optional: per-page header slot --}}
  @hasSection('page_header')
    <div class="mb-4">
      @yield('page_header')
    </div>
  @endif

  @yield('content')
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
