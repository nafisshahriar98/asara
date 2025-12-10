@extends('layouts.app3')
@section('title', 'Home — ASHARA')

@section('content')

    {{-- Quick, page-scoped styles to make all cards uniform. Move to app.css later if you wish --}}
    <style>
        /* ---------- Card layout ---------- */
        .property-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            border-radius: 14px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 6px 18px rgba(12, 20, 33, .08);
            transition: transform .18s ease, box-shadow .18s ease;
        }
        .property-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(12, 20, 33, .12);
        }

        /* ---------- Taller thumbnail for buildings ---------- */
        .property-thumb {
            width: 100%;
            aspect-ratio: 3 / 4; /* taller look for buildings */
            background: #f2f4f8;
            overflow: hidden;
            position: relative; /* needed for overlay positioning */
        }
        /* Subtle gradient at bottom for stage label readability */
        .property-thumb::after {
            content: "";
            position: absolute;
            inset: auto 0 0 0;
            height: 72px;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, .28) 100%);
            pointer-events: none;
        }
        .property-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            transform: scale(1.001); /* prevent hairline gaps in some browsers */
        }

        /* Stage badge on image */
        .property-stage {
            position: absolute;
            left: 12px;
            bottom: 12px;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .35rem .6rem;
            font-size: .72rem;
            letter-spacing: .04em;
            text-transform: uppercase;
            border-radius: 999px;
            color: #0d1b2a;
            background: rgba(255, 255, 255, .92);
            backdrop-filter: saturate(1.2) blur(4px);
        }
        .property-stage[data-status="FINISHED"] { color: #0d1b2a; }
        .property-stage[data-status="IN PROGRESS"] { color: #103a1f; }

        /* ---------- Content area ---------- */
        .property-card .content {
            display: flex;
            flex-direction: column;
            gap: .6rem;
            padding: 18px 18px 16px;
            flex: 1 1 auto;
        }
        .property-card .content h3 {
            font-size: clamp(1rem, .8rem + .5vw, 1.25rem);
            line-height: 1.2;
            margin: 0;
        }
        .property-card .learn-more-btn {
            margin-top: auto;
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-weight: 600;
        }
        .property-card .learn-more-btn i {
            transform: translateX(0);
            transition: transform .18s ease;
        }
        .property-card .learn-more-btn:hover i {
            transform: translateX(3px);
        }

        /* ---------- Equal height columns ---------- */
        .property-section-two .row > [class*="col-"] { display: flex; }
        .property-section-two .row > [class*="col-"] .property-card { width: 100%; }

        /* ---------- Responsive tweaks ---------- */
        @media (max-width: 575.98px) {
            .property-thumb { aspect-ratio: 4 / 5; } /* slightly less tall on very small screens */
        }

        /* ---------- Fallback for browsers without aspect-ratio ---------- */
        @supports not (aspect-ratio: 1 / 1) {
            .property-thumb { position: relative; padding-top: 133.333%; } /* 3:4 => 133.33% */
            .property-thumb img {
                position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
            }
        }
    </style>

    @php
        use Illuminate\Support\Facades\Storage;
        // Use a 3:4 placeholder to match the card aspect ratio
        $placeholder = asset('assets/img/property/placeholder-3x4.jpg');
    @endphp

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg8">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>PROJECTS</span>
                    <h2>Our All Projects</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Property Section Two -->
    <section class="property-section-two pt-100 pb-70">
        <div class="container-fluid">
            <div class="container-max">
                <div class="property-section-title-two">
                    <div class="section-title-two text-center">
                        <span class="section-span-bg2">OUR PROJECT</span>
                        <h2>
                            Our Some Ongoing and <b class="section-color2">Completed Project</b>
                        </h2>
                    </div>
                </div>

                <div class="row pt-45">
                    @forelse($projects as $p)
                        @php
                            $stageLabel = $p->project_stage === 'completed' ? 'FINISHED' : 'IN PROGRESS';
                            // Prefer overview image; fallback to banner; else placeholder
                            $imgUrl = $p->overview_image
                                ? Storage::url($p->overview_image)
                                : ($p->banner_image ? Storage::url($p->banner_image) : $placeholder);
                        @endphp

                        <div class="col-lg-4 col-md-6">
                            <div class="property-card">
                                <a href="{{ route('project.details', $p->slug) }}">
                                    <div class="property-thumb">
                                        <img
                                            src="{{ $imgUrl }}"
                                            alt="{{ $p->title }}"
                                            @if($loop->first) fetchpriority="high" loading="eager" @else loading="lazy" @endif
                                            decoding="async"
                                            sizes="(min-width:1200px) 33vw, (min-width:768px) 50vw, 100vw"
                                            onerror="this.src='{{ $placeholder }}'">
                                        <span class="property-stage" data-status="{{ $stageLabel }}">{{ $stageLabel }}</span>
                                    </div>
                                </a>

                                <div class="content">
                                    <a href="{{ route('project.details', $p->slug) }}">
                                        <h3>{{ $p->title }}</h3>
                                    </a>
                                    {{-- Optional short description:
                                    <p>{{ \Illuminate\Support\Str::limit($p->description, 120) }}</p>
                                    --}}
                                    <a href="{{ route('project.details', $p->slug) }}" class="learn-more-btn">
                                        <i class='bx bx-right-arrow-alt'></i>
                                        Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center text-muted py-5">
                                No projects found.
                            </div>
                        </div>
                    @endforelse

                    {{-- Pagination --}}
                    @if($projects->hasPages())
                        <div class="col-12">
                            <div class="pagination-area text-center">
                                {{-- Previous --}}
                                @if ($projects->onFirstPage())
                                    <span class="prev page-numbers disabled"><i class="bx bx-chevron-left"></i></span>
                                @else
                                    <a href="{{ $projects->previousPageUrl() }}" class="prev page-numbers">
                                        <i class="bx bx-chevron-left"></i>
                                    </a>
                                @endif

                                {{-- Numbers (preserve query params if any) --}}
                                @foreach ($projects->appends(request()->query())->getUrlRange(1, $projects->lastPage()) as $page => $url)
                                    @if ($page == $projects->currentPage())
                                        <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                                    @endif
                                @endforeach

                                {{-- Next --}}
                                @if ($projects->hasMorePages())
                                    <a href="{{ $projects->nextPageUrl() }}" class="next page-numbers">
                                        <i class="bx bx-chevron-right"></i>
                                    </a>
                                @else
                                    <span class="next page-numbers disabled"><i class="bx bx-chevron-right"></i></span>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Property Section Two End -->

    <!-- newsletter Area -->
    <div class="newsletter-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="newsletter-content">
                        <i class='flaticon-email'></i>
                        <h2>Join our weekly <b class="section-color">Newsletter</b></h2>
                    </div>
                </div>

        <div class="col-lg-5">
            <div class="newsletter-form-area">
                <form class="newsletter-form" data-toggle="validator" method="POST">
                    <input type="email" class="form-control" placeholder="Your Email*" name="EMAIL" required autocomplete="off">
                    <button class="default-btn default-hot-toddy" type="submit">
                        Subscribe
                        <i class='bx bx-right-arrow-alt'></i>
                    </button>
                    <div id="validator-newsletter" class="form-result"></div>
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>
    <!-- newsletter Area End -->

@endsection
