@extends('layouts.app2')

@section('title')
    ($project->title ?? 'Project') . ' — ASHARA'
@endsection
@section('css_custom')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('content')
    {{-- HERO --}}
    <section class="hero"
        style="background-image:url('{{ $project->banner_image ? asset('storage/' . $project->banner_image) : asset('assets/placeholder-wide.jpg') }}')">
        <div class="hero-inner container">
            <div class="hero-card">
                <div>
                    <div class="hero-title">{{ strtoupper($project->title) }}</div>
                    @if($project->banner_subtitle)
                        <div class="hero-sub">{{ $project->banner_subtitle }}</div>
                    @endif
                </div>
                <div style="opacity:.85;font-size:13px">
                    {{ $project->project_stage ? ucfirst($project->project_stage) : '—' }}
                </div>
            </div>
        </div>
    </section>

    {{-- INTRO / DESCRIPTION --}}
    @if($project->description)
        <section class="section">
            <div class="container">
                <h2 class="title">There’s no place like home</h2>
                <div class="lead">{!! nl2br(e($project->description)) !!}</div>
            </div>
        </section>
    @endif

    {{-- FEATURES --}}
    @php
        $features = $project->features->pluck('feature_text')->filter()->values();
        $chunked = $features->count() ? $features->chunk(ceil($features->count() / 3)) : collect([[], [], []]);
      @endphp
    @if($features->count())
        <section class="section" style="background:#f7f9fc">
            <div class="container">
                <h2 class="title">FEATURES</h2>
                <div class="features">
                    @foreach($chunked as $col)
                        <ul class="feature-col">
                            @foreach($col as $text)
                                <li>{{ $text }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- OVERVIEW --}}
    @php
        $hasRows = $project->overviews->count() > 0;
        $hasImage = !empty($project->overview_image) || !empty($project->banner_image);
        $ovImgUrl = $project->overview_image
            ? asset('storage/' . ltrim($project->overview_image, '/'))
            : ($project->banner_image
                ? asset('storage/' . ltrim($project->banner_image, '/'))
                : asset('assets/placeholder-tall.jpg'));
    @endphp

    @if($hasRows || $hasImage)
        <section class="section">
            <div class="container">
                <h2 class="title title-left">OVERVIEW</h2>

                <div class="overview">
                    {{-- Table only if you actually have rows --}}
                    @if($hasRows)
                        <table class="ov-table">
                            <tbody>
                                @foreach($project->overviews as $row)
                                    <tr>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->detail }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    {{-- Image shows whenever present (or placeholder) --}}
                    <figure class="ov-figure">
                        <img src="{{ $ovImgUrl }}" alt="{{ $project->title }} overview image">
                    </figure>
                </div>
            </div>
        </section>
    @endif



    {{-- GALLERY --}}
    @if($project->galleries->count())
        <section class="section" style="background:#2b2f36;color:#fff">
            <div class="container">
                <h2 class="title" style="color:#fff;letter-spacing:.05em">GALLERY</h2>

                <div class="gallery-grid" id="gallery">
                    @foreach($project->galleries as $i => $g)
                        <a class="g-item" href="{{ asset('storage/' . $g->image_path) }}" data-idx="{{ $i }}">
                            <img src="{{ asset('storage/' . $g->image_path) }}" alt="Gallery image {{ $i + 1 }}">
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- LIGHTBOX (vanilla) --}}
    <div class="lightbox" id="lightbox">
        <button class="lb-btn lb-close" id="lbClose" aria-label="Close">✕</button>
        <div class="lb-count" id="lbCount"></div>
        <img class="lb-img" id="lbImg" src="" alt="">
        <div class="lb-nav">
            <button class="lb-btn" id="lbPrev" aria-label="Previous">‹</button>
            <button class="lb-btn" id="lbNext" aria-label="Next">›</button>
        </div>
    </div>

    {{-- WhatsApp floating --}}
    <a class="wa" href="https://wa.me/8801711000000" target="_blank" aria-label="WhatsApp">🟢</a>

    <script>
        (function () {
            const items = [...document.querySelectorAll('#gallery .g-item')];
            if (!items.length) return;

            const lb = document.getElementById('lightbox');
            const count = document.getElementById('lbCount');
            const prev = document.getElementById('lbPrev');
            const next = document.getElementById('lbNext');
            const closeBtn = document.getElementById('lbClose');

            const DUR = 340; // must match CSS .34s
            let idx = 0, busy = false;
            let currentImg = document.getElementById('lbImg');

            function setCount(i) { count.textContent = (i + 1) + ' / ' + items.length; }
            function makeImg(url) {
                const el = new Image();
                el.className = 'lb-img';
                el.src = url;
                return el;
            }

            function showSlide(nextIndex, dir) {
                if (busy) return;
                busy = true;

                idx = (nextIndex + items.length) % items.length;
                setCount(idx);

                const url = items[idx].getAttribute('href');
                const incoming = makeImg(url);

                // start off-screen based on direction
                incoming.classList.add(dir > 0 ? 'enter-from-right' : 'enter-from-left');
                lb.appendChild(incoming);

                // force reflow so the starting transform is committed
                // (prevents the "first click doesn't animate" issue)
                // eslint-disable-next-line no-unused-expressions
                incoming.getBoundingClientRect();

                // trigger enter animation
                requestAnimationFrame(() => {
                    incoming.classList.remove('enter-from-right', 'enter-from-left');
                });

                // animate current image out
                if (currentImg && currentImg.src) {
                    currentImg.classList.add(dir > 0 ? 'leave-to-left' : 'leave-to-right');
                }

                let doneCalled = false;
                const done = () => {
                    if (doneCalled) return;
                    doneCalled = true;
                    if (currentImg && currentImg !== incoming && currentImg.parentNode === lb) {
                        lb.removeChild(currentImg);
                    }
                    currentImg = incoming;
                    busy = false;
                };

                // prefer transitionend on transform, but also set a fallback timer
                incoming.addEventListener('transitionend', (e) => {
                    if (e.propertyName === 'transform') done();
                }, { once: true });

                // safety: ensure we never get stuck busy
                setTimeout(done, DUR + 80);
            }

            function open(i) {
                idx = (i + items.length) % items.length;
                const url = items[idx].getAttribute('href');
                setCount(idx);

                currentImg.src = url;
                currentImg.className = 'lb-img'; // reset any old classes
                document.body.style.overflow = 'hidden';
                lb.classList.add('open');
            }

            function close() {
                lb.classList.remove('open');
                document.body.style.overflow = '';
            }

            function go(d) { showSlide(idx + d, d); }

            // Bindings
            items.forEach(a => a.addEventListener('click', e => { e.preventDefault(); open(+a.dataset.idx); }));
            prev.addEventListener('click', () => go(-1));
            next.addEventListener('click', () => go(1));
            closeBtn.addEventListener('click', close);
            lb.addEventListener('click', e => { if (e.target === lb) close(); });
            window.addEventListener('keydown', e => {
                if (!lb.classList.contains('open')) return;
                if (e.key === 'Escape') close();
                if (e.key === 'ArrowLeft') go(-1);
                if (e.key === 'ArrowRight') go(1);
            });
        })();
    </script>
    <style>
        :root {
            --bg: #0f1115;
            --muted: #7a8499;
            --ink: #151823;
            --card: #ffffff;
            --accent: #0ea5e9;
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            margin: 0;
            padding: 0;
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
            color: #1b2430;
            background: #fff;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin-inline: auto;
            padding: 0 20px
        }

        .section {
            padding: 68px 0
        }

        .title {
            font-size: 34px;
            letter-spacing: .02em;
            font-weight: 700;
            text-align: center;
            margin: 0 0 24px
        }

        .lead {
            max-width: 900px;
            margin: 0 auto 36px;
            color: #5a6376;
            text-align: center
        }

        /* HERO */
        .hero {
            position: relative;
            min-height: 72vh;
            display: grid;
            place-items: end center;
            color: #fff;
            background: #111 center/cover no-repeat;
            isolation: isolate;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, .15) 0%, rgba(0, 0, 0, .35) 55%, rgba(0, 0, 0, .65) 100%);
            z-index: 0;
        }

        .hero-inner {
            position: relative;
            z-index: 1;
            width: 100%;
            padding: 28px 20px 34px
        }

        .hero-card {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 16px;
            color: #fff
        }

        .hero-title {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: .08em;
            opacity: .95
        }

        .hero-sub {
            font-size: 14px;
            opacity: .85
        }

        /* FEATURES */
        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px
        }

        .feature-col {
            list-style: none;
            margin: 0;
            padding: 0
        }

        .feature-col li {
            display: flex;
            gap: 12px;
            margin: 10px 0;
            color: #2b3340
        }

        .feature-col li:before {
            content: "—";
            opacity: .35
        }

        /* OVERVIEW */
        .overview {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 40px;
            align-items: start
        }

        /* Overview heading style */
        .title-left {
            text-align: left;
            letter-spacing: .06em;
            color: #6b7280;
            /* subtle gray like the table labels */
            margin-bottom: 18px;
        }


        .ov-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 20px rgba(15, 23, 42, .06);
        }

        .ov-table tr {
            border-bottom: 1px solid #eef1f6
        }

        .ov-table tr:last-child {
            border-bottom: none
        }

        .ov-table td {
            padding: 14px 18px
        }

        .ov-table td:first-child {
            color: #6b7280;
            width: 38%;
            font-weight: 500
        }

        .ov-figure {
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .12)
        }

        .ov-figure img {
            display: block;
            width: 100%;
            height: auto
        }

        /* GALLERY — uniform, perfectly aligned tiles */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 14px;
        }

        .g-item {
            position: relative;
            aspect-ratio: 1/1;
            border-radius: 10px;
            overflow: hidden;
            display: block;
            box-shadow: 0 6px 18px rgba(15, 23, 42, .12);
        }

        .g-item img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .35s ease;
        }

        .g-item:hover img {
            transform: scale(1.03)
        }

        @media (min-width:1280px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            }
        }

        /* LIGHTBOX */
        .lightbox {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .92);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 60;
        }

        .lightbox.open {
            display: flex
        }

        /* Controls & stacking */
        .lb-nav {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 18px;
            z-index: 1;
        }

        .lb-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(6px);
            color: #fff;
            cursor: pointer;
        }

        .lb-close {
            position: absolute;
            top: 16px;
            right: 16px;
            z-index: 2;
        }

        .lb-count {
            position: absolute;
            left: 16px;
            top: 16px;
            color: #cbd5e1;
            font-size: 13px;
            z-index: 2;
        }

        .lb-close,
        .lb-count,
        .lb-btn {
            pointer-events: auto;
        }

        /* Slide animation image */
        .lb-img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* centered */
            max-width: 92vw;
            max-height: 86vh;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .5);
            transition: transform .34s cubic-bezier(.22, .61, .36, 1), opacity .34s cubic-bezier(.22, .61, .36, 1);
            will-change: transform, opacity;
            opacity: 1;
        }

        /* entering (start offset, then slide to center) */
        .lb-img.enter-from-right {
            transform: translate(calc(-50% + 40px), -50%);
            opacity: .05;
        }

        .lb-img.enter-from-left {
            transform: translate(calc(-50% - 40px), -50%);
            opacity: .05;
        }

        /* leaving (move out + fade) */
        .lb-img.leave-to-left {
            transform: translate(calc(-50% - 40px), -50%);
            opacity: .05;
        }

        .lb-img.leave-to-right {
            transform: translate(calc(-50% + 40px), -50%);
            opacity: .05;
        }

        /* FLOAT WHATSAPP */
        .wa {
            position: fixed;
            right: 18px;
            bottom: 18px;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #25D366;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 10px 22px rgba(37, 211, 102, .35);
            z-index: 50;
        }

        /* small */
        @media (max-width:900px) {
            .features {
                grid-template-columns: 1fr
            }

            .overview {
                grid-template-columns: 1fr;
                gap: 22px
            }

            .hero {
                min-height: 58vh
            }
        }

        /* Accessibility: reduce motion if requested */
        @media (prefers-reduced-motion: reduce) {
            .lb-img {
                transition: none
            }
        }
    </style>

@endsection

<!-- </body>

</html> -->