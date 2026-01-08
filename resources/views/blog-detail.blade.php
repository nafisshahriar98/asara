@extends('layouts.app2')

@section('title', $blog->title . ' — News & Events')

@section('content')
<section class="rb-news-detail">
    <div class="container">

        {{-- Breadcrumb --}}
        <div class="rb-topbar">
            <nav aria-label="breadcrumb" class="rb-breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News & Events</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ \Illuminate\Support\Str::limit($blog->title, 48) }}
                    </li>
                </ol>
            </nav>

            <a href="{{ route('news.index') }}" class="btn btn-outline-secondary rb-btn-back">
                ← Back to News
            </a>
        </div>

        {{-- Hero header --}}
        <header class="rb-hero">
            <h1 class="rb-title">{{ $blog->title }}</h1>

            <div class="rb-meta">
                @if($blog->published_at)
                    <span class="rb-meta-item">
                        <span class="rb-dot"></span>
                        <span>{{ $blog->published_at->format('F d, Y') }}</span>
                    </span>
                @endif

                @if($blog->category?->name)
                    <span class="rb-meta-item">
                        <span class="rb-dot"></span>
                        <span>{{ $blog->category->name }}</span>
                    </span>
                @endif
            </div>
        </header>

        <div class="row g-4 rb-grid">
            {{-- Main --}}
            <div class="col-lg-8">

                {{-- Thumbnail / Cover --}}
                @if($blog->thumbnail)
                    <figure class="rb-cover">
                        <img src="{{ asset('storage/'.$blog->thumbnail) }}" alt="{{ $blog->title }}">
                    </figure>
                @endif

                {{-- Content --}}
                <article class="rb-article">
                    @php $content = trim($blog->content ?? ''); @endphp

                    @if($content)
                        <div class="rb-prose">
                            {!! nl2br(e($content)) !!}
                        </div>
                    @else
                        <p class="text-muted mb-0">No details available.</p>
                    @endif

                    {{-- Share --}}
                    <div class="rb-share">
                        <span class="rb-share-label">Share:</span>
                        <a class="rb-share-btn" target="_blank"
                           href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}">
                            Facebook
                        </a>
                        <a class="rb-share-btn" target="_blank"
                           href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}">
                            X
                        </a>
                        <a class="rb-share-btn" target="_blank"
                           href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}">
                            LinkedIn
                        </a>
                    </div>
                </article>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                <aside class="rb-sidebar">
                    <div class="rb-sidebar-head">
                        <h5 class="rb-sidebar-title mb-0">Latest News</h5>
                        <a class="rb-viewall" href="{{ route('news.index') }}">View all</a>
                    </div>

                    <div class="rb-latest">
                        @forelse(($latest ?? collect()) as $l)
                            <a class="rb-latest-item" href="{{ route('blog.detail', $l->slug) }}">
                                <div class="rb-thumb">
                                    <img
                                        src="{{ $l->thumbnail ? asset('storage/'.$l->thumbnail) : asset('assets/img/blog/1.jpg') }}"
                                        alt="{{ $l->title }}">
                                </div>

                                <div class="rb-latest-info">
                                    <div class="rb-latest-date">
                                        {{ $l->published_at?->format('M d, Y') ?? '' }}
                                    </div>
                                    <div class="rb-latest-title">
                                        {{ \Illuminate\Support\Str::limit($l->title, 62) }}
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-muted mb-0">No other news found.</p>
                        @endforelse
                    </div>
                </aside>
            </div>
        </div>

    </div>
</section>

<style>
/* ===== Page Wrapper ===== */
.rb-news-detail{
    padding: 44px 0;
    background: #f6f8fb;
}

/* ===== Topbar ===== */
.rb-topbar{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:12px;
    margin-bottom: 18px;
    flex-wrap: wrap;
}
.rb-btn-back{
    border-radius: 12px;
    font-weight: 700;
}

/* ===== Breadcrumb ===== */
.rb-breadcrumb .breadcrumb{
    background: transparent;
    padding: 0;
    margin: 0;
}
.rb-breadcrumb .breadcrumb-item a{
    text-decoration:none;
    color:#475569;
    font-weight: 600;
}
.rb-breadcrumb .breadcrumb-item.active{
    color:#0f172a;
    font-weight: 700;
}

/* ===== Hero ===== */
.rb-hero{
    background: #ffffff;
    border: 1px solid rgba(15,23,42,.08);
    border-radius: 16px;
    padding: 22px 22px 18px;
    box-shadow: 0 10px 30px rgba(15,23,42,.06);
    margin-bottom: 18px;
}
.rb-title{
    margin: 0 0 10px;
    font-weight: 900;
    color: #0f172a;
    line-height: 1.12;
    font-size: clamp(24px, 2.6vw, 38px);
}
.rb-meta{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
    color:#64748b;
    font-size: 14px;
}
.rb-meta-item{
    display:inline-flex;
    align-items:center;
    gap:8px;
}
.rb-dot{
    width:8px; height:8px;
    border-radius:999px;
    background:#cbd5e1;
    display:inline-block;
}

/* ===== Cover Image ===== */
.rb-cover{
    margin: 0 0 18px;
    border-radius: 16px;
    overflow:hidden;
    background:#0b1220;
    box-shadow: 0 18px 46px rgba(15,23,42,.12);
}
.rb-cover img{
    width:100%;
    height:auto;
    display:block;
    object-fit: cover;
}

/* ===== Article Card ===== */
.rb-article{
    background:#ffffff;
    border: 1px solid rgba(15,23,42,.08);
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 10px 30px rgba(15,23,42,.06);
}
.rb-prose{
    color:#0f172a;
    font-size: 16px;
    line-height: 1.95;
    overflow-wrap:anywhere;
}
.rb-prose p{ margin: 0 0 14px; }
.rb-prose p:last-child{ margin-bottom: 0; }

/* ===== Share ===== */
.rb-share{
    margin-top: 18px;
    padding-top: 16px;
    border-top: 1px solid #eef2f7;
    display:flex;
    align-items:center;
    gap:10px;
    flex-wrap: wrap;
}
.rb-share-label{
    font-weight: 800;
    color:#0f172a;
    margin-right: 2px;
}
.rb-share-btn{
    text-decoration:none;
    font-weight: 700;
    font-size: 13px;
    color:#0f172a;
    background:#f1f5f9;
    border: 1px solid #e6edf6;
    padding: 8px 10px;
    border-radius: 999px;
    transition: transform .15s ease, background .15s ease;
}
.rb-share-btn:hover{
    background:#eaf0f7;
    transform: translateY(-1px);
}

/* ===== Sidebar ===== */
.rb-sidebar{
    position: sticky;
    top: 18px;
    background:#ffffff;
    border: 1px solid rgba(15,23,42,.08);
    border-radius: 16px;
    padding: 18px;
    box-shadow: 0 10px 30px rgba(15,23,42,.06);
}
.rb-sidebar-head{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:10px;
    margin-bottom: 12px;
}
.rb-sidebar-title{
    font-weight: 900;
    color:#0f172a;
}
.rb-viewall{
    text-decoration:none;
    font-weight: 800;
    font-size: 13px;
    color:#2563eb;
}
.rb-viewall:hover{ text-decoration: underline; }

.rb-latest{
    display:flex;
    flex-direction:column;
    gap: 12px;
}
.rb-latest-item{
    display:flex;
    gap: 12px;
    text-decoration:none;
    padding: 10px;
    border-radius: 14px;
    transition: background .15s ease, transform .15s ease;
}
.rb-latest-item:hover{
    background:#f1f5f9;
    transform: translateY(-1px);
}
.rb-thumb{
    width: 92px;
    aspect-ratio: 16/11;
    border-radius: 12px;
    overflow:hidden;
    background:#0b1220;
    flex: 0 0 auto;
}
.rb-thumb img{
    width:100%;
    height:100%;
    object-fit: cover;
    display:block;
}
.rb-latest-date{
    font-size: 12px;
    color:#64748b;
    margin-bottom: 4px;
}
.rb-latest-title{
    font-size: 14px;
    font-weight: 900;
    color:#0f172a;
    line-height: 1.35;
}

/* Mobile */
@media (max-width: 576px){
    .rb-news-detail{ padding: 28px 0; }
    .rb-hero{ padding: 18px 16px 14px; }
    .rb-article{ padding: 18px 16px; }
    .rb-thumb{ width: 80px; }
    .rb-sidebar{ position: static; }
}
</style>
@endsection
