<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* =========================
       ASARA Admin Theme
       ========================= */
    :root{
      --asara-green:#0E4F27;
      --asara-green-2:#0A3F1F;
      --asara-gold:#F4B400;
      --asara-cream:#F7F3EA;
      --asara-ink:#0f172a;
      --asara-muted:#64748b;
      --asara-border:rgba(14,79,39,.14);
      --asara-shadow:0 14px 35px rgba(14,79,39,.14);
      --asara-shadow-strong:0 18px 45px rgba(14,79,39,.20);
    }

    body{
      background: var(--asara-cream);
      color: var(--asara-ink);
    }
    .panel-wrap{max-width:1100px;margin:0 auto;}

    /* Topbar */
    .topbar{
      background: linear-gradient(90deg, var(--asara-green) 0%, #0d5a2c 100%);
      color:#fff;
      padding:14px 0;
      box-shadow:0 12px 28px rgba(14,79,39,.25);
      border-bottom:3px solid rgba(244,180,0,.65);
    }
    .topbar .brand{
      display:flex;align-items:center;gap:10px;
      font-weight:900;letter-spacing:.2px;
    }
    .topbar .brand-badge{
      width:38px;height:38px;border-radius:12px;
      background:rgba(255,255,255,.12);
      border:1px solid rgba(255,255,255,.18);
      display:grid;place-items:center;
      font-weight:900;
    }

    /* Page title */
    .page-title{
      font-weight:900;
      letter-spacing:.2px;
      margin:0;
    }
    .page-sub{
      margin:0;
      color:rgba(15,23,42,.65);
      font-weight:600;
      font-size:14px;
    }

    /* Cards */
    .admin-card{
      background:#fff;
      border:1px solid var(--asara-border);
      border-radius:18px;
      box-shadow: var(--asara-shadow);
      overflow:hidden;
      transition: transform .16s ease, box-shadow .16s ease;
    }
    .admin-card:hover{
      transform: translateY(-2px);
      box-shadow: var(--asara-shadow-strong);
    }
    .admin-card .card-head{
      padding:16px 18px;
      border-bottom:1px solid rgba(14,79,39,.10);
      background: linear-gradient(180deg, #ffffff 0%, #fbfbfb 100%);
      display:flex;align-items:center;justify-content:space-between;gap:12px;
    }
    .admin-card .card-body{
      padding:18px;
    }
    .admin-card h5{
      margin:0;
      font-weight:900;
      color:var(--asara-ink);
    }
    .admin-card p{
      margin:0;
      line-height:1.7;
      color:var(--asara-muted);
    }

    /* Small icon bubble */
    .icon-bubble{
      width:44px;height:44px;border-radius:14px;
      background: rgba(14,79,39,.08);
      border:1px solid rgba(14,79,39,.14);
      display:grid;place-items:center;
      color: var(--asara-green);
      flex:0 0 auto;
    }

    /* Buttons */
    .btn-theme{
      background: var(--asara-green);
      border:1px solid var(--asara-green);
      color:#fff;
      font-weight:900;
      border-radius:12px;
      padding:10px 14px;
      box-shadow:0 10px 22px rgba(14,79,39,.18);
      transition: transform .15s ease, background .15s ease, box-shadow .15s ease;
    }
    .btn-theme:hover{
      background: var(--asara-green-2);
      border-color: var(--asara-green-2);
      transform: translateY(-1px);
    }

    .btn-soft{
      background: rgba(14,79,39,.08);
      border:1px solid rgba(14,79,39,.18);
      color: var(--asara-green);
      font-weight:900;
      border-radius:12px;
      padding:10px 14px;
    }
    .btn-soft:hover{ background: rgba(14,79,39,.12); }

    .btn-outline-light{
      border-radius:12px;
      font-weight:900;
    }
    .btn-light{
      border-radius:12px;
      font-weight:900;
    }

    /* Tiny gold accent underline */
    .gold-underline{
      position:relative;
      display:inline-block;
    }
    .gold-underline:after{
      content:"";
      display:block;
      height:3px;
      width:46px;
      background: var(--asara-gold);
      border-radius:999px;
      margin-top:6px;
      opacity:.95;
    }

    /* Responsive spacing */
    @media (max-width: 576px){
      .topbar{ padding:12px 0; }
      .admin-card .card-head{ padding:14px 14px; }
      .admin-card .card-body{ padding:14px; }
    }
  </style>
</head>

<body>

{{-- TOP BAR --}}
<div class="topbar">
  <div class="container-fluid panel-wrap px-3 d-flex justify-content-between align-items-center">
    <div class="brand">
      <div class="brand-badge">A</div>
      <div>
        <div class="fw-bold" style="line-height:1;">ASARA Admin</div>
        <div style="font-size:12px;opacity:.85;line-height:1.2;">Control Panel</div>
      </div>
    </div>

    <div class="d-flex gap-2">
      <a href="{{ route('home') }}" class="btn btn-sm btn-light">Visit Site</a>

      <form action="{{ route('logout') }}" method="POST" class="m-0">
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
      </form>
    </div>
  </div>
</div>

{{-- CONTENT --}}
<div class="container-fluid panel-wrap px-3 py-4">

  <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
    <div>
      <h3 class="page-title gold-underline">Dashboard</h3>
      <p class="page-sub">Manage projects and news content from one place.</p>
    </div>
  </div>

  <div class="row g-3">
    {{-- Projects --}}
    <div class="col-md-6">
      <div class="admin-card">
        <div class="card-head">
          <div class="d-flex align-items-center gap-3">
            <div class="icon-bubble">
              <!-- simple icon -->
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                <path d="M4 19V9a2 2 0 0 1 2-2h3V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2Z" stroke="currentColor" stroke-width="2"/>
              </svg>
            </div>
            <div>
              <h5>Projects</h5>
              <p class="small mb-0">Create, edit, delete and manage your projects.</p>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-theme">Manage Projects</a>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-soft">+ Add Project</a>
          </div>
        </div>
      </div>
    </div>

    {{-- News & Events --}}
    <div class="col-md-6">
      <div class="admin-card">
        <div class="card-head">
          <div class="d-flex align-items-center gap-3">
            <div class="icon-bubble">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                <path d="M7 3h10a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2"/>
                <path d="M8 8h8M8 12h8M8 16h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </div>
            <div>
              <h5>News & Events</h5>
              <p class="small mb-0">Create, edit, delete and manage your news posts.</p>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('admin.blog.index') }}" class="btn btn-theme">Manage News</a>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-soft">+ Add News</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
