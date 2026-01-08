{{-- resources/views/news-events.blade.php --}}
@extends('layouts.app3')

@section('title', 'News & Events')

@section('content')
<div class="blog-area-two pb-70">
    <div class="container">
        <div class="section-title-two text-center">
            <span class="section-span-bg">News & Events</span>
            <h2 class="margin-auto">News & <b class="section-color">Events</b></h2>
        </div>

        {{-- ✅ GRID (no modal, only detail page links) --}}
        <div class="row pt-45 g-4">
            @forelse(($blogs ?? collect()) as $b)
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="blog-card rb-blog-card w-100">

                        {{-- Thumbnail --}}
                        <a href="{{ route('blog.detail', $b->slug) }}" class="rb-blog-thumb">
                            <img
                                src="{{ $b->thumbnail ? asset('storage/'.$b->thumbnail) : asset('assets/img/blog/1.jpg') }}"
                                alt="{{ $b->title }}">
                        </a>

                        {{-- Content --}}
                        <div class="content rb-blog-content">
                            <span class="rb-blog-meta">
                                {{ $b->published_at?->format('F d, Y') ?? '' }}
                                @if($b->category?->name)
                                    / <a href="javascript:void(0)">{{ $b->category->name }}</a>
                                @endif
                            </span>

                            <a href="{{ route('blog.detail', $b->slug) }}" class="rb-blog-title">
                                <h3>{{ $b->title }}</h3>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center pt-4">
                    <p class="text-muted mb-0">No news available right now.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if(($blogs ?? null) && $blogs->hasPages())
            <div class="mt-4 d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</div>

{{-- ✅ PAGE-ONLY CSS (alignment + professional card look) --}}
<style>
/* Make bootstrap columns equal height */
.rb-blog-card{
  display:flex;
  flex-direction:column;
  height:100%;
  border-radius:14px;
  overflow:hidden;
  background:#fff;
  border:1px solid rgba(15,23,42,.06);
  box-shadow:0 10px 30px rgba(15,23,42,.08);
  transition:transform .18s ease, box-shadow .18s ease;
}
.rb-blog-card:hover{
  transform: translateY(-4px);
  box-shadow:0 18px 40px rgba(15,23,42,.12);
}

/* Same image height for all cards */
.rb-blog-thumb{
  display:block;
  width:100%;
  aspect-ratio:16/10;      /* ✅ equal thumbnail box */
  background:#0b1220;
  overflow:hidden;
}
.rb-blog-thumb img{
  width:100%;
  height:100%;
  object-fit:cover;
  object-position:center;
  display:block;
}

/* Keep content aligned */
.rb-blog-content{
  flex:1;
  padding:18px 18px 20px;
  display:flex;
  flex-direction:column;
  gap:10px;
}
.rb-blog-meta{
  display:inline-flex;
  align-items:center;
  gap:6px;
  font-size:13px;
  color:#6b7280;
}
.rb-blog-title h3{
  margin:0;
  font-size:20px;
  font-weight:700;
  line-height:1.35;
  color:#0f172a;
  min-height:56px;         /* ✅ keeps titles aligned */
}
.rb-blog-title:hover h3{ text-decoration: underline; }

@media (max-width: 576px){
  .rb-blog-title h3{ font-size:18px; min-height:0; }
}
@media (prefers-reduced-motion: reduce){
  .rb-blog-card{ transition:none !important; }
}
</style>
@endsection
