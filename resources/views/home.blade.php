@extends('layouts.app2')

@section('title', 'Home — ASHARA')

@section('content')


    {{--
    <!-- Home Slider Two -->
    <div class="home-slider-two owl-carousel owl-theme">
        <div class="home-slider-item item-bg1" style="background-image:url('{{ asset('assets/img/home2/1.jpg') }}'); 
                                                                                            background-size:cover; 
                                                                                            background-position:center; 
                                                                                            background-repeat:no-repeat; 
                                                                                            min-height:70vh;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container-fluid">
                        <div class="container-max">
                            <div class="slider-content">
                                <h1>Find Your Perfect Home,<b style="font-size: 65px;"> Built for Modern Living</b></h1>
                                <p>Experience comfort, quality, and convenience — designed to make every moment feel like
                                    home. </p>
                                <div class="slider-btn-area">
                                    <a href="about.html" class="discover-btn">
                                        Discover ASARA
                                        <i class='bx bx-right-arrow-alt'></i>
                                    </a>
                                    <a href="tel:+1(778)453221" class="slider-cell-btn">
                                        <i class='flaticon-phone'></i>
                                        +88 01711966255
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-slider-item item-bg2" style="background-image:url('{{ asset('assets/img/home2/2.jpg') }}'); 
                                                                                            background-size:cover; 
                                                                                            background-position:center; 
                                                                                            background-repeat:no-repeat; 
                                                                                            min-height:70vh;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container-fluid">
                        <div class="container-max">
                            <div class="slider-content">
                                <h1>Building Homes,<b style="font-size: 65px;"> Creating Happiness</b></h1>
                                <p>ASARA Properties blends architecture, trust, and lifestyle to deliver homes that inspire
                                    life. </p>
                                <div class="slider-btn-area">
                                    <a href="about.html" class="discover-btn">
                                        Discover ASARA
                                        <i class='bx bx-right-arrow-alt'></i>
                                    </a>
                                    <a href="tel:+1(778)453221" class="slider-cell-btn">
                                        <i class='flaticon-phone'></i>
                                        +88 01711966255
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-slider-item item-bg3" style="background-image:url('{{ asset('assets/img/home2/1.jpg') }}'); 
                                                                                            background-size:cover; 
                                                                                            background-position:center; 
                                                                                            background-repeat:no-repeat; 
                                                                                            min-height:70vh;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container-fluid">
                        <div class="container-max">
                            <div class="slider-content">
                                <h1>Your Dream <b style="font-size: 65px;"><br>Home Awaits</b></h1>
                                <p>Discover modern apartments crafted with care, security, and sophistication. </p>
                                <div class="slider-btn-area">
                                    <a href="about.html" class="discover-btn">
                                        Discover ASARA
                                        <i class='bx bx-right-arrow-alt'></i>
                                    </a>
                                    <a href="tel:+1(778)453221" class="slider-cell-btn">
                                        <i class='flaticon-phone'></i>
                                        +88 01711966255
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Slider Two End -->
    --}}


    <!-- =======================
                                     Hero Slider (Drop-in)
                                ======================== -->
    <!-- Owl CSS (keep if already included) -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl/owl.theme.default.min.css') }}">

    <section class="hero-wrap">
        <div class="home-slider-two owl-carousel owl-theme">

            <!-- Slide 1 -->
            <div class="home-slider-item" style="background-image:url('{{ asset('assets/img/home2/1.jpg') }}');">
                <div class="container">
                    <div class="slider-content modern-style">
                        <!-- <h1 class="main-heading">
                                            <span>Find Your Perfect Home,</span>
                                            <b>Built for Modern Living</b>
                                          </h1> -->
                        <h1 class="main-heading">
                            <span class="line line-1">Your Perfect Home</span>
                            <span class="line line-2">Built for Modern Living</span>
                        </h1>

                        <p class="subtitle">
                            Experience comfort, quality, and convenience — designed to make every moment feel like home.
                        </p>
                        <div class="cta-group">
                            <a href="{{ route('about') }}" class="cta-btn primary">Discover ASARA <i
                                    class='bx bx-right-arrow-alt'></i></a>
                            <a href="tel:+8801711966255" class="cta-btn secondary"><i class='bx bx-phone-call'></i> +88
                                01911845500</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="home-slider-item" style="background-image:url('{{ asset('assets/img/home2/2.jpg') }}');">
                <div class="container">
                    <div class="slider-content modern-style">
                        <h1 class="main-heading">
                            <span>Building Homes</span>
                            <b>Creating Happiness</b>
                        </h1>
                        <p class="subtitle">
                            ASARA Properties blends architecture, trust, and lifestyle to deliver homes that inspire life.
                        </p>
                        <div class="cta-group">
                            <a href="{{ route('about') }}" class="cta-btn primary">Discover ASARA <i
                                    class='bx bx-right-arrow-alt'></i></a>
                            <a href="tel:+8801711966255" class="cta-btn secondary"><i class='bx bx-phone-call'></i> +88
                                01711966255</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="home-slider-item" style="background-image:url('{{ asset('assets/img/home2/4.jpg') }}');">
                <div class="container">
                    <div class="slider-content modern-style">
                        <h1 class="main-heading">
                            <span>Your Dream</span>
                            <b>Home Awaits</b>
                        </h1>
                        <p class="subtitle">
                            Discover modern apartments crafted with care, security, and sophistication.
                        </p>
                        <div class="cta-group">
                            <a href="{{ route('about') }}" class="cta-btn primary">Discover ASARA <i
                                    class='bx bx-right-arrow-alt'></i></a>
                            <a href="tel:+8801711966255" class="cta-btn secondary"><i class='bx bx-phone-call'></i> +88
                                01711966255</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ====== Slider Styles (height locked, no jumping) ====== -->
    <style>
        .main-heading .line-1 {
            display: block;
            white-space: nowrap;
            font-weight: 800;
        }

        .main-heading .line-2 {
            display: block;
            white-space: nowrap;
            color: #FFB400;
            font-weight: 400;
            margin-top: 6px;
        }

        @media (max-width: 992px) {

            .main-heading .line-1,
            .main-heading .line-2 {
                white-space: normal;
            }
        }

        /* lock a consistent height for the whole carousel */
        .home-slider-two,
        .home-slider-two .owl-stage-outer,
        .home-slider-two .owl-stage,
        .home-slider-two .owl-item,
        .home-slider-two .home-slider-item {
            height: clamp(560px, 80vh, 920px);
        }

        /* slide background + center content with flex */
        .home-slider-item {
            display: flex;
            align-items: center;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* prevent layout shift during text animation */
        }

        .slider-content.modern-style {
            max-width: 750px;
            color: #fff;
            animation: fadeInUp 1s ease forwards;
            /* reserve vertical space so typing/line-wrap doesn’t change slide height */
            min-height: 260px;
            /* tweak if your tallest slide needs more */
        }

        .main-heading {
            font-size: 62px;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .main-heading span {
            display: block;
            color: #fff;
            margin-bottom: 5px;
        }

        .main-heading b {
            color: #FFB400;
            font-weight: 700;
            font-size: 0.9em;
            display: inline-block;
            animation: floatText 5s ease-in-out infinite;
        }

        .subtitle {
            font-size: 18px;
            line-height: 1.6;
            color: rgba(255, 255, 255, .9);
            margin-bottom: 40px;
            max-width: 90%;
        }

        .cta-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }

        .cta-btn {
            padding: 12px 26px;
            border-radius: 4px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            transition: .3s;
        }

        .cta-btn.primary {
            /* background: #FFB400;
                                    color: #0E4F27;
                                    border: 2px solid #FFB400; */
            background: #0E4F27;
            color: #fff;
            border: 2px solid #0E4F27;
        }

        /*
                                .cta-btn.primary:hover {
                                    background: #0E4F27;
                                    color: #fff;
                                    border-color: #0E4F27;
                                }
                                */
        .cta-btn.secondary {
            background: transparent;
            border: 2px solid #FFB400;
            color: #fff;
        }

        .cta-btn.secondary:hover {
            background: #FFB400;
            color: #0E4F27;
        }

        /* Owl UI spacing */
        .home-slider-two .owl-dots,
        .home-slider-two .owl-nav {
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .main-heading {
                font-size: 46px;
            }

            .main-heading b {
                font-size: .92em;
            }

            .subtitle {
                font-size: 16px;
            }
        }

        @media (max-width: 768px) {
            .main-heading {
                font-size: 36px;
                line-height: 1.3;
            }

            .main-heading b {
                font-size: .95em;
            }

            .cta-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .cta-btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .main-heading {
                font-size: 30px;
            }

            .main-heading b {
                font-size: 1em;
            }

            .subtitle {
                font-size: 15px;
                margin-bottom: 25px;
            }
        }

        /* simple animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes floatText {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-6px)
            }
        }
        /* Fix hero slider horizontal overflow */
.hero-wrap,
.home-slider-two{
  position: relative;
  overflow: hidden;            /* clip sideways overflow */
  overscroll-behavior-x: none; /* stop iOS rubber-band */
}

.home-slider-two .owl-stage-outer{ overflow:hidden; }
.home-slider-two .owl-stage{ display:block; }
.home-slider-two .owl-item{ display:block; float:left; }

/* Keep Owl nav arrows inside the slider bounds */
.home-slider-two.owl-theme .owl-nav{
  position: absolute; inset: 0;
  pointer-events: none;
}
.home-slider-two.owl-theme .owl-nav .owl-prev,
.home-slider-two.owl-theme .owl-nav .owl-next{
  pointer-events: auto;
  position: absolute; top: 50%;
  transform: translateY(-50%);
  margin: 0;
}
.home-slider-two.owl-theme .owl-nav .owl-prev{ left: 10px; }
.home-slider-two.owl-theme .owl-nav .owl-next{ right: 10px; }

/* Optional last-resort guard if anything else still causes scrolling */
/* body{ overflow-x:hidden; } */

    </style>

    <!-- ====== JS (Owl + init) ====== -->
    <script src="{{ asset('assets/plugins/owl/owl.carousel.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Typewriter effect (optional, keep yours if you like)
            document.querySelectorAll('.main-heading span').forEach((el, i) => {
                const text = el.textContent.trim();
                el.textContent = '';
                let j = 0;
                (function type() { if (j < text.length) { el.textContent += text.charAt(j++); setTimeout(type, 60); } })();
            });

            // Owl init — lock height and prevent jumps
            $('.home-slider-two').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                smartSpeed: 700,
                dots: true,
                nav: true,
                autoHeight: false,    // <-- important
                // optional: make nav arrows overlay nicely
                navText: ['<span class="owl-prev-icon">‹</span>', '<span class="owl-next-icon">›</span>'],
            });
        });
    </script>







    <!-- Service Area Two -->

    <div class="service-area-two pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-two section-bg">
                        <i class='flaticon-bankrupt'></i>
                        <a href="service-details.html">
                            <h3>Property Managment</h3>
                        </a>
                        <p class="text-break">Expertly managing properties to maximize value, efficiency, and tenant
                            satisfaction</p>
                        <!-- <a href="service-details.html" class="learn-more-btn">
                                                                                                            Learn More
                                                                                                            <i class='bx bx-right-arrow-alt'></i>
                                                                                                        </a> -->
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-two active">
                        <i class='flaticon-value'></i>
                        <a href="service-details.html">
                            <h3>Commercial Development</h3>
                        </a>
                        <p class="text-break">Developing quality commercial spaces designed for growth and long-term
                            investment</p>
                        <!-- <a href="service-details.html" class="learn-more-btn">
                                                                                                            Learn More
                                                                                                            <i class='bx bx-right-arrow-alt'></i>
                                                                                                        </a> -->
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-two section-bg">
                        <i class='flaticon-time-management'></i>
                        <a href="service-details.html">
                            <h3>Construction Management</h3>
                        </a>
                        <p class="text-break">Overseeing projects with precision, ensuring timely delivery, quality, and
                            cost efficiency</p>
                        <!-- <a href="service-details.html" class="learn-more-btn">
                                                                                                            Learn More
                                                                                                            <i class='bx bx-right-arrow-alt'></i>
                                                                                                        </a> -->
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-two section-bg">
                        <i class='flaticon-house'></i>
                        <a href="service-details.html">
                            <h3>Residentital Development</h3>
                        </a>
                        <p class="text-break">Building modern, comfortable homes with thoughtful design and superior
                            craftsmanship</p>
                        <!-- <a href="service-details.html" class="learn-more-btn">
                                                                                                            Learn More
                                                                                                            <i class='bx bx-right-arrow-alt'></i>
                                                                                                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Service Area Two End -->
    {{--
    <!-- Property Area Two -->
    <div class="property-area-two pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="property-item">
                        <div class="section-title-two">
                            <span class="section-span-bg">INHABITATION house</span>
                            <a href="property-details.html">
                                <h2>
                                    Minimalism In Style
                                    <b class="section-color">Your Property</b>
                                </h2>
                            </a>
                            <p>
                                Experience a perfect blend of simplicity and sophistication. Each ASARA residence is
                                thoughtfully
                                designed to offer modern comfort, open spaces, and timeless beauty — creating a peaceful
                                urban
                                lifestyle you’ll love.
                            </p>
                        </div>
                        <div class="property-btn">
                            <!-- <a href="#" class="default-btn default-sante-fe">
                                                                                                                View Details
                                                                                                                <i class='bx bx-right-arrow-alt'></i>
                                                                                                            </a> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="property-img-two">
                        <a href="#">
                            <img src="{{ asset('assets/img/ASARA IMG/cover/Page-01.jpg') }}" alt="Images">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property Area End Two -->
    --}}
    <!-- =======================
                             Property Area Two (DROP-IN)
                        ======================= -->
    <div class="property-area-two pb-70">
        <div class="container">
            <!-- remove horizontal gap between the two columns -->
            <div class="row g-0 align-items-center justify-content-center">

                <!-- Left content -->
                <div class="col-lg-5 ps-lg-0">
                    <div class="property-item me-lg-4">
                        <div class="section-title-two">
                            <span class="section-span-bg">INHABITATION HOUSE</span>
                            <a href="property-details.html">
                                <h2>
                                    Minimalism In Style
                                    <b class="section-color">Your Property</b>
                                </h2>
                            </a>
                            <p>
                                Experience a perfect blend of simplicity and sophistication. Each ASARA residence is
                                thoughtfully
                                designed to offer modern comfort, open spaces, and timeless beauty — creating a peaceful
                                urban lifestyle you’ll love.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right image (fills full width of its column) -->
                <div class="col-lg-7 pe-lg-0">
                    <div class="property-img-two no-gap">
                        <a href="#" class="d-block w-100">
                            <img src="{{ asset('assets/img/ASARA IMG/cover/Page-01.jpg') }}" alt="ASARA – Razzak Square"
                                class="img-fluid w-100 d-block">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        /* --- Drop-in overrides to remove the right white space --- */
        .property-area-two .property-img-two.no-gap {
            margin: 0 !important;
            /* kill theme margins if any */
            width: 100% !important;
        }

        .property-area-two .property-img-two.no-gap a {
            display: block;
            width: 100% !important;
            max-width: 100% !important;
        }

        .property-area-two .property-img-two.no-gap img {
            display: block;
            /* remove inline-image baseline gap */
            width: 100% !important;
            /* stretch to container width */
            max-width: 100% !important;
            /* defeat theme caps */
            height: auto;
            /* keep natural ratio */
        }

        /* Optional: if you want a fixed, nicely cropped banner look, uncomment:
                          .property-area-two .property-img-two.no-gap{
                            aspect-ratio: 16/9;               // choose your ratio
                            overflow: hidden;
                          }
                          .property-area-two .property-img-two.no-gap img{
                            height: 100%;
                            object-fit: cover;                // fills & crops
                          }
                          */

        /* Tighten the two columns visually on lg+ screens */
        @media (min-width: 992px) {
            .property-area-two .col-lg-5 {
                padding-left: 0;
            }

            /* flush left block */
            .property-area-two .col-lg-7 {
                padding-right: 0;
            }

            /* flush image edge */
        }
    </style>

    <!-- Project Area -->
    {{--
    <div class="project-area project-bg2">
        <div class="container">
            <div class="project-card project-card-two">
                <span>NEW PROJECT IN PROGRESS</span>
                <h2>751 Vilkoma Street View Luxury Project</h2>
                <ul>
                    <li>
                        <b>PROPERTY SIZE:</b>
                        700sq ft
                    </li>
                    <li>
                        <b>START DATE:</b>
                        July 12th 2024
                    </li>
                    <li>
                        <b>FINISH DATE:</b>
                        July 12th 2024
                    </li>
                    <li>
                        <b>LOCATION:</b>
                        Gulshan, Dhaka
                    </li>
                </ul>
                <!-- 
                                                                                                <div class="project-card-btn">
                                                                                                    <a href="#" class="default-btn default-sante-fe">View Details <i

                                                                                                            class='bx bx-right-arrow-alt'></i></a>
                                                                                                    <a href={{ route('contact') }} class="default-btn default-dark-blue active">Download Brochure <i
                                                                                                            class='bx bx-right-arrow-alt'></i></a>
                                                                                                </div> -->
            </div>
        </div>
    </div>
    --}}
    <!-- Project Area End -->
    <!-- Include CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" />

    <style>
        .apartment-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .apartment-list li {
            font-size: 18px;
            padding: 8px 0;
            cursor: pointer;
            transition: 0.3s;
        }

        .apartment-list li.active {
            color: #c89b3c;
            font-weight: bold;
            border-left: 3px solid #c89b3c;
            padding-left: 10px;
        }

        .apartment-item img {
            width: 100%;
            border-radius: 10px;
        }
    </style>

    <div class="apartment-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title-two">
                        <span class="section-span-bg">TYPE OF APARTMENT</span>
                        <h2>Numerous Type OF <b class="section-color">Property You Like!</b></h2>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="apartment-btn">
                        <a href={{"about"}} class="default-btn default-sante-fe">
                            Discover More
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row pt-45">
                <!-- Left Info -->
                <div class="col-lg-4">
                    <div class="apartment-list apartment-slider owl-carousel owl-theme" id="apartment-info">
                        <!-- Default (first slide) -->
                        <ul>
                            <li>STUDIO <span>01</span></li>
                            <li>DUPLEX <span>02</span></li>
                            <li>BATHROOM <span>03</span></li>
                            <li>BEDROOM <span>04</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Right Slider -->
                <div class="col-lg-8">
                    <div class="apartment-slider owl-carousel owl-theme">
                        <div class="apartment-item" data-index="0">
                            <img src="{{ asset('assets/img/ASARA IMG/page-08.jpg') }}" alt="STUDIO">

                            <ul>
                                <li>
                                    <a href="#">DUPLEX Home</a>
                                </li>
                                <li>/February 2024</li>
                            </ul>
                            <a href="property-details">
                                <h3>30 sq / East Northan</h3>
                            </a>

                            <p>
                                Lorem ipsum dolor sit ame consectetur adipisicing eli sed usmod tempor incididunt ut
                                labore et dolore magnaenim minim veniaquis nostrud exercitation
                            </p>
                        </div>

                        <div class="apartment-item" data-index="1">
                            <img src="{{ asset('assets/img/ASARA IMG/page-09.jpg') }}" alt="DUPLEX">

                            <h3>Duplex Apartment</h3>
                        </div>

                        <div class="apartment-item" data-index="2">
                            <img src="{{ asset('assets/img/ASARA IMG/page-10.jpg') }}" alt="BATHROOM">
                            <ul>
                                <li>
                                    <a href="#">STUDIO Home</a>
                                </li>
                                <li>/July 2024</li>
                            </ul>
                            <a href="property-details">
                                <h3>50 sq / East Northan</h3>
                            </a>
                            <p>
                                Lorem ipsum dolor sit ame consectetur adipisicing eli sed usmod tempor incididunt ut
                                labore et dolore magnaenim minim veniaquis nostrud exercitation
                            </p>
                        </div>

                        <div class="apartment-item" data-index="3">
                            <img src="{{ asset('assets/img/ASARA IMG/page-11.jpg') }}" alt="BEDROOM">
                            <ul>
                                <li>
                                    <a href="#">Pent Home</a>
                                </li>
                                <li>/August 2024</li>
                            </ul>
                            <a href="property-details">
                                <h3>70 sq / South Northan</h3>
                            </a>
                            <p>
                                Lorem ipsum dolor sit ame consectetur adipisicing eli sed usmod tempor incididunt ut
                                labore et dolore magnaenim minim veniaquis nostrud exercitation
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function () {
            var $slider = $(".apartment-slider");

            // Define the data for each slide (your dynamic left info)
            var apartmentInfo = [
                `<ul>
                                                <li>STUDIO <span>01</span></li>
                                                <li>DUPLEX <span>02</span></li>
                                                <li>BATHROOM <span>03</span></li>
                                                <li>BEDROOM <span>04</span></li>
                                             </ul>`,
                `<ul>
                                                <li>STUDIO <span>02</span></li>
                                                <li>DUPLEX <span>03</span></li>
                                                <li>BATHROOM <span>04</span></li>
                                                <li>BEDROOM <span>05</span></li>
                                             </ul>`,
                `<ul>
                                                <li>STUDIO <span>03</span></li>
                                                <li>DUPLEX <span>04</span></li>
                                                <li>BATHROOM <span>05</span></li>
                                                <li>BEDROOM <span>06</span></li>
                                             </ul>`,
                `<ul>
                                                <li>STUDIO <span>04</span></li>
                                                <li>DUPLEX <span>05</span></li>
                                                <li>BATHROOM <span>06</span></li>
                                                <li>BEDROOM <span>07</span></li>
                                             </ul>`
            ];

            // Initialize Owl Carousel
            $slider.owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                nav: true,
                dots: false
            });

            // When the slider changes, swap left info
            $slider.on('changed.owl.carousel', function (event) {
                var index = event.item.index - event.relatedTarget._clones.length / 2;
                index = (index + event.item.count) % event.item.count;

                // Update left info content
                $("#apartment-info").html(apartmentInfo[index]);
            });
        });
    </script>



    <!-- Counter Area -->
    <div class="counter-area counter-bg1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6 col-md-4">
                    <div class="single-counter">
                        <i class="flaticon-bed"></i>
                        <div class="content">
                            <h3>04</h3>
                            <span style="font-size: clamp(10px, 2.5vw, 14px); letter-spacing: .08em;">BEDROOMS</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-4">
                    <div class="single-counter">
                        <i class="flaticon-carpet"></i>
                        <div class="content">
                            <h3>02</h3>
                            <span style="font-size: clamp(10px, 2.5vw, 14px); letter-spacing: .08em;">FLOORS</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-4">
                    <div class="single-counter">
                        <i class="flaticon-set-square"></i>
                        <div class="content">
                            <h3>240</h3>
                            <span style="font-size: clamp(10px, 2.5vw, 14px); letter-spacing: .08em;">SQUARE METERS</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-4  ">
                    <div class="single-counter ps-5">
                        <i class="flaticon-power"></i>
                        <div class="content">
                            <h3>03</h3>
                            <span style="font-size: clamp(10px, 2.5vw, 14px); letter-spacing: .08em;">GARAGE SPOTS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter Area End -->

    <!-- Apartment Offer Area -->
    <div class="apartment-offer-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="offer-content">
                        <div class="section-title-two">
                            <span class="section-span-bg">TYPE OF APARTMENT</span>
                            <h2>Amenities We Offer <b class="section-color">ASARA Is Special!</b></h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg active">
                        <h3>Comfortable Flat</h3>
                        <p>Spacious, well-designed apartments ensuring modern comfort and a relaxing living experience</p>

                        <i class="flaticon-bankrupt"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg">
                        <h3>Sophisticated Door</h3>
                        <p>Stylish, secure main doors crafted with premium materials for elegance and safety</p><br>
                        <i class="flaticon-key"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg active">
                        <h3>Private Security</h3>
                        <p>24/7 professional security ensuring peace of mind and complete safety for every resident</p><br>
                        <i class="flaticon-padlock"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg">
                        <h3>Parking Space</h3>
                        <p> Dedicated, well-organized parking area with easy access and full vehicle safety</p><br>
                        <i class="flaticon-garage"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg active">
                        <h3>Fitness Center</h3>
                        <p>Fully equipped gym promoting health, wellness, and an active lifestyle within your community</p>
                        <br>
                        <i class="flaticon-exercise"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="offer-item offer-item-bg ">
                        <h3>Good Location</h3>
                        <p>Prime location offering easy access to schools, shopping centers, and transport facilities</p>
                        <br>
                        <i class="flaticon-route"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .apartment-offer-two {
            position: relative;
            background-image: url(../img/apartment/apartment-bg.jpg);
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            z-index: 1;
        }

        .apartment-offer-two::before {
            content: "";
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-color: #000000;
            opacity: 0.5;
        }

        .offer-content {
            margin-bottom: 30px;
        }

        .offer-item {
            padding: 30px 20px 60px 20px;
            border: 5px solid #f0f0f0;
            position: relative;
            transition: 0.7s;
            margin-bottom: 30px;
        }

        .offer-item h3 {
            font-size: 24px;
            color: #0E4F27;
            transform: 0.7s;
        }

        .offer-item i {
            font-size: 60px;
            color: #b5b5b5;
            position: absolute;
            right: 15px;
            bottom: 0;
            transform: 0.7s;
        }

        .offer-item:hover h3 {
            color: #ffffff;
            position: relative;
            z-index: 1;
        }

        .offer-item:hover p {
            color: #ffffff;
            position: relative;
            z-index: 1;
        }

        .offer-item-bg {
            position: relative;
        }

        .offer-item-bg::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            width: 0;
            height: 100%;
            background-color: #0E4F27;
            z-index: -1;
            opacity: 0;
            transition: 0.7s;
        }

        .offer-item-bg:hover {
            border-color: #0E4F27;
        }

        .offer-item-bg:hover::before {
            opacity: 1;
            width: 100%;
        }

        /* .offer-item-bg:hover i {
                        color: #0E4F27;
                    } */

        .offer-item-bg.active {
            border-color: #0E4F27;
        }

        .offer-item-bg.active::before {
            opacity: 1;
            width: 100%;
        }

        .offer-item-bg.active h3 {
            color: #ffffff;
        }

        .offer-item-bg.active p {
            color: #ffffff;
        }

        .offer-item-bg.active i {
            color: #ffffff;
        }

        .offer-item-bg.active:hover {
            background-color: #ffffff;
            border-color: #f0f0f0;
        }

        .offer-item-bg.active:hover h3 {
            color: #0E4F27;
        }

        .offer-item-bg.active:hover p {
            color: #777777;
        }

        .offer-item-bg.active:hover i {
            color: #b5b5b5;
        }

        .offer-item-bg2 {
            border: none !important;
            background-color: #ffffff;
            position: relative;
        }

        .offer-item-bg2::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            width: 0;
            height: 100%;
            background-color: #FFC20E !important;
            opacity: 0;
            transition: 0.7s;
        }

        .offer-item-bg2:hover::before {
            opacity: 1;
            width: 100%;
        }

        .offer-item-bg2:hover i {
            color: #dcbe77;
        }

        .offer-item-bg2.active::before {
            opacity: 1;
            width: 100%;
            background-color: #FFC20E;
            transition: 0.7s;
        }

        .offer-item-bg2.active h3 {
            color: #ffffff;
            position: relative;
            z-index: 1;
        }

        .offer-item-bg2.active p {
            color: #ffffff;
            position: relative;
            z-index: 1;
        }

        .offer-item-bg2.active i {
            color: #dcbe77;
        }

        .offer-item-bg2.active:hover::before {
            background-color: #ffffff !important;
            border: none;
            position: relative;
            z-index: 1;
        }

        .offer-item-bg2.active:hover h3 {
            color: #0E4F27;
        }

        .offer-item-bg2.active:hover p {
            color: #777777;
        }

        .offer-item-bg2.active:hover i {
            color: #b5b5b5;
        }
    </style>
    <!-- Apartment Offer Area End -->


    <!-- Blog Area -->
    <!-- <div class="blog-area-two pb-70">
                                                                            <div class="container">
                                                                                <div class="section-title-two text-center">
                                                                                    <span class="section-span-bg">BLOG & NEWS</span>
                                                                                    <h2 class="margin-auto">News & <b class="section-color">Updates</b></h2>
                                                                                </div>
                                                                                <div class="row pt-45">
                                                                                    <div class="col-lg-4 col-md-6">
                                                                                        <div class="blog-card">
                                                                                            <a href="blog-details.html">
                                                                                                <img src="assets/img/blog/1.jpg" alt="Blog Images">
                                                                                            </a>
                                                                                            <div class="content">
                                                                                                <span>April 19, 2024 / <a href="#">Interior</a> </span>
                                                                                                <a href="blog-details.html">
                                                                                                    <h3>Real Estate Is Being Came In The Place Of Expectation</h3>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-4 col-md-6">
                                                                                        <div class="blog-card">
                                                                                            <a href="blog-details.html">
                                                                                                <img src="assets/img/blog/2.jpg" alt="Blog Images">
                                                                                            </a>
                                                                                            <div class="content">
                                                                                                <span>March 19, 2024 / <a href="#">Home</a> </span>
                                                                                                <a href="blog-details.html">
                                                                                                    <h3>Luxury Property Is Might Be First Choose?</h3>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-4 col-md-6  ">
                                                                                        <div class="blog-card">
                                                                                            <a href="blog-details.html">
                                                                                                <img src="assets/img/blog/3.jpg" alt="Blog Images">
                                                                                            </a>
                                                                                            <div class="content">
                                                                                                <span>January 15, 2024 / <a href="#">kitchen</a></span>
                                                                                                <a href="blog-details.html">
                                                                                                    <h3>How It Would Be In My List If I Don’t Know!</h3>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> -->
    <!-- Blog Area End -->

    {{--
    <!-- House Details Area -->
    <div class="house-details-area">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="house-content margin-left">
                        <span>HOUSES</span>
                        <h2>Roof Houses Details You Need To Know?</h2>
                        <ul class="house-list">
                            <li>PARKING <b>01</b></li>
                            <li>BATHROOM <b>02</b></li>
                            <li>BEDROOM <b>03</b></li>
                            <li>SUNNY SIDE <b>Available</b></li>
                        </ul>
                        <!-- <a href="#" class="default-btn default-sante-fe">
                                                                                                            Visit Details
                                                                                                            <i class='bx bx-right-arrow-alt'></i>
                                                                                                        </a> -->
                    </div>
                </div>

                <div class="col-lg-6 p-0 m-0">
                    <div class="house-slider owl-carousel owl-theme">
                        <div class="house-item">
                            <img src="assets/img/house-details/1.jpg" alt="Images">
                        </div>
                        <div class="house-item">
                            <img src="assets/img/house-details/2.jpg" alt="Images">
                        </div>
                        <div class="house-item">
                            <img src="assets/img/house-details/3.jpg" alt="Images">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 p-0 m-0">
                    <div class="house-slider-two owl-carousel owl-theme">
                        <div class="house-details-item">
                            <img src="assets/img/house-details/h-1.jpg" alt="Images">
                        </div>
                        <div class="house-details-item">
                            <img src="assets/img/house-details/h-2.jpg" alt="Images">
                        </div>
                        <div class="house-details-item">
                            <img src="assets/img/house-details/h-3.jpg" alt="Images">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="house-content house-margin">
                        <span>HOUSES</span>
                        <h2>Roof Houses Details You Need To Know?</h2>
                        <ul class="house-list">
                            <li>SUNNY SIDE <b>Available</b></li>
                            <li>BEDROOM <b>03</b></li>
                            <li>BATHROOM <b>02</b></li>
                            <li>PARKING <b>01</b></li>
                        </ul>
                        <!-- <a href="#" class="default-btn default-sante-fe">
                                                                                                            Visit Details
                                                                                                            <i class='bx bx-right-arrow-alt'></i>
                                                                                                        </a> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- House Details Area End -->
    --}}


    <!-- Innovation Area -->
    <div class="innovation-area pt-100 pb-70" style="background-color: #fbf3e9;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 col-xxl-6">
                    <div class="innovation-content">
                        <div class="section-title">
                            <span>DELIVERING INNOVATION</span>
                            <h2>Sustainability Property <b>Goals As Expected</b></h2>
                            <p>
                                ASARA is committed to building eco-friendly, energy-efficient homes using sustainable
                                materials. Our
                                designs promote harmony between nature and architecture, ensuring comfort today and a
                                greener
                                tomorrow for future generations
                            </p>
                        </div>
                        <!-- <div class="innovation-btn">
                                                                                                            <a href="#" class="default-btn default-bg-buttercup">View Details <i
                                                                                                                    class='bx bx-right-arrow-alt'></i></a>
                                                                                                        </div> -->
                    </div>
                </div>

                <div class="col-lg-5 col-xxl-6">
                    <div class="innovation-bg">
                        <div class="innovation-slider owl-carousel owl-theme">
                            <div class="innovation-item">
                                <i class='flaticon-smartphone'></i>
                                <h3>Quality Management</h3>
                                <p>
                                    Ensuring superior construction standards through precision, care, and a commitment to
                                    lasting excellence
                                </p>
                            </div>

                            <div class="innovation-item">
                                <i class='flaticon-growth'></i>
                                <h3>Designed Marvel</h3>
                                <p>
                                    Architectural brilliance meets functionality, creating elegant living spaces that
                                    inspire modern lifestyles.
                                </p>
                            </div>

                            <!-- <div class="innovation-item">
                                                                                                <i class='flaticon-smartphone'></i>
                                                                                                <h3>Quality Management</h3>
                                                                                                <p>
                                                                                                    Ensuring superior construction standards through precision, care, and a commitment to
                                                                                                    lasting
                                                                                                    excellence.

                                                                                                </p>
                                                                                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Innovation Area End -->

    <!-- Our Clients Area -->
    <section class="clients-section py-100" style="margin-top: 20px; margin-down: 20px; ">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side: Client Images -->

                <div class="col-lg-6">
                    <div class="clients-carousel owl-carousel">
                        <div class="client-logo text-center">
                            <img src="{{ asset('assets/img/home2/3.jpg') }}" alt="Client 1">
                        </div>
                        <div class="client-logo text-center">
                            <img src="{{ asset('assets/img/home2/2.jpg') }}" alt="Client 2">
                        </div>
                        <div class="client-logo text-center">
                            <img src="{{ asset('assets/img/home2/3.jpg') }}" alt="Client 3">
                        </div>
                        <div class="client-logo text-center">
                            <img src="{{ asset('assets/img/home2/1.jpg') }}" alt="Client 4">
                        </div>
                    </div>
                </div>

                <!-- Right Side: Text Content -->
                <div class="col-lg-6">
                    <div class="clients-content ps-lg-4">
                        <div class="section-title mb-4">
                            <span class="sub-heading">OUR CLIENTS</span>
                            <h2 class="fw-bold">Building <span
                                    style="color:#f7b500; font-size: 30px; font-weight: 600;">Trust</span> with Every
                                Project</h2>
                            <p class="mt-3">
                                Over the years, we’ve partnered with some of the most recognized names in the construction
                                industry. From infrastructure to commercial and industrial development, our commitment to
                                quality and precision has made us a trusted name among industry leaders worldwide.
                            </p>
                        </div>

                        <ul class="list-unstyled mb-4">
                            <li><i class="bx bx-check-circle text-success me-2"></i> Government & Infrastructure Projects
                            </li>
                            <li><i class="bx bx-check-circle text-success me-2"></i> Real Estate & Commercial Builders</li>
                            <li><i class="bx bx-check-circle text-success me-2"></i> International Construction Firms</li>
                        </ul>

                        <a href="#" class="default-btn default-bg-buttercup">
                            View All Clients <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Owl CSS/JS (use your local assets if you already include them ONCE) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<style>
/* Center the carousel block in its column */
.clients-section .row > .col-lg-6:first-child{ display:flex; justify-content:center; }

/* Carousel width cap for nicer alignment on wide screens */
.clients-carousel{ width:100%; max-width:520px; margin:0 auto; }

/* Let Owl manage widths (no flex on stage/items) */
.clients-carousel.owl-carousel{ width:100%; }
.clients-carousel .owl-stage-outer{ overflow:hidden; }
.clients-carousel .owl-stage{ display:block; }
.clients-carousel .owl-item{ display:block; float:left; }
.clients-carousel .owl-item > *{ width:100%; }

/* Slide box with stable height */
.clients-carousel .client-logo{
  height:110px; display:flex; align-items:center; justify-content:center; padding:6px 10px;
}
@media (max-width:575.98px){ .clients-carousel .client-logo{ height:100px; } }

/* Images — ignore any inline width/height */
.clients-carousel .client-logo img{
  max-height:100%; max-width:100%; width:auto; height:auto; display:block;
  filter:grayscale(100%); opacity:.85; transition:transform .3s, filter .3s, opacity .3s;
}
.clients-carousel .client-logo img[style]{
  width:auto !important; height:auto !important; max-width:100% !important; max-height:100% !important;
}
.clients-carousel .client-logo img:hover{ filter:none; opacity:1; transform:scale(1.05); }

/* Dots */
.clients-carousel .owl-dots{ display:flex; justify-content:center; gap:8px; margin-top:10px; }
.clients-carousel .owl-dot span{ width:8px; height:8px; display:inline-block; border-radius:50%; background:#e2e8f0; }
.clients-carousel .owl-dot.active span{ background:#0E4F27; }

</style>

<script>
(function() {
  // Ensure jQuery is present
  if (!window.jQuery) return console.warn('jQuery not loaded');
  var $ = jQuery, $c = $('.clients-carousel');

  // Destroy if already initialized somewhere else
  if ($c.hasClass('owl-loaded')) {
    $c.trigger('destroy.owl.carousel');
    $c.removeClass('owl-loaded');
    $c.find('.owl-stage-outer').children().unwrap();
  }

  // Wait for images to load to avoid tiny height "film strip"
  function whenImagesReady($imgs, done){
    var left = $imgs.length;
    if (!left) return done();
    $imgs.each(function(){
      if (this.complete) { if (--left===0) done(); }
      else $(this).one('load error', function(){ if (--left===0) done(); });
    });
  }

  function initCarousel(){
    if (typeof $.fn.owlCarousel !== 'function') {
      console.warn('OwlCarousel not loaded');
      return;
    }
    $c.owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 2500,
      autoplayHoverPause: true,
      smartSpeed: 600,
      dots: true,
      nav: false,
      margin: 24,
      autoWidth: false,
      autoHeight: true,
      responsive: {
        0:   { items: 1, margin: 12, center: true  }, // phone
        576: { items: 2, margin: 16, center: false }, // tablet
        992: { items: 3, margin: 24, center: false }  // desktop
      },
      onInitialized: function(){ setTimeout(function(){ $c.trigger('refresh.owl.carousel'); }, 50); }
    });
  }

  // Start after page + images are ready
  if (document.readyState === 'complete') {
    whenImagesReady($c.find('img'), initCarousel);
  } else {
    $(window).on('load', function(){ whenImagesReady($c.find('img'), initCarousel); });
  }
})();
</script>



    <!-- End Our Clients Area -->




    <!-- Room Details Area-->
    <div class="room-details-area pb-70" style="margin: top 20px;">
        <div class="container-fluid m-0 p-0">
            <div class="section-title-two text-center">
                <span class="section-span-bg">ROOM DETAILS</span>
                <h2 class="margin-auto">Real Value is<b class="section-color"> Inside</b></h2>
            </div>

            <div class="tab room-details-tab tab-color">
                <ul class="tabs">
                    <li>
                        <a href="service-details.html">01. FLOORS</a>
                    </li>

                    <li>
                        <a href="service-details.html">02. WINDOWS</a>
                    </li>

                    <li>
                        <a href="service-details.html">03. WALLS</a>
                    </li>

                    <li>
                        <a href="service-details.html">04. KITCHEN FAUCET</a>
                    </li>

                    <li>
                        <a href="service-details.html">05. KITCHEN APPLIANCES</a>
                    </li>
                </ul>

                <div class="tab_content current active pt-45">
                    <div class="tabs_item current">
                        <div class="room-details-item">
                            <img src="assets/img/room-details/r-1.jpg" alt="Images" style="max-width: 100%;">
                            <div class="room-item item1">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>FLOORS</h3>
                                </div>
                            </div>
                            <div class="room-item item2">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>KITCHEN</h3>
                                </div>
                            </div>
                            <div class="room-item item3">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>WALLS</h3>
                                </div>
                            </div>
                            <div class="room-item item4">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>WINDOWS</h3>
                                </div>
                            </div>
                            <div class="room-item item5">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>BADROOM</h3>
                                </div>
                            </div>

                            <div class="room-details-slider owl-carousel owl-theme">
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>01.FLOORS DETAILS</h3>
                                    </a>
                                    <p>
                                        Premium-grade flooring designed for durability, comfort, and timeless elegance in
                                        every corner of your home.
                                    </p>
                                </div>

                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>02. WINDOWS DETAILS</h3>
                                    </a>
                                    <p>
                                        Spacious, energy-efficient windows offering natural light, ventilation, and stunning
                                        panoramic views of your surroundings.
                                    </p>
                                </div>
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>03. WALLS DETAILS</h3>
                                    </a>
                                    <p>
                                        Expertly finished walls built with quality materials ensuring strength, insulation,
                                        and lasting visual appeal.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tabs_item">
                        <div class="room-details-item">
                            <img src="assets/img/room-details/r-2.jpg" alt="Images" style="max-width: 100%;">
                            <div class="room-item item1">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>FLOORS</h3>
                                </div>
                            </div>
                            <div class="room-item item2">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>KITCHEN</h3>
                                </div>
                            </div>
                            <div class="room-item item3">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>WALLS</h3>
                                </div>
                            </div>
                            <div class="room-item item4">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>WINDOWS</h3>
                                </div>
                            </div>
                            <div class="room-item item5">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>BADROOM</h3>
                                </div>
                            </div>

                            <div class="room-details-slider owl-carousel owl-theme">
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3> 02.WINDOWS DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>03. WALLS DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>04. KITCHEN FAUCET DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tabs_item">
                        <div class="room-details-item">
                            <img src="assets/img/room-details/r-3.jpg" alt="Images" style="max-width: 100%;">
                            <div class="room-item item1">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>FLOORS</h3>
                                </div>
                            </div>
                            <div class="room-item item2">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>KITCHEN</h3>
                                </div>
                            </div>
                            <div class="room-item item3">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>WALLS</h3>
                                </div>
                            </div>
                            <div class="room-item item4">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>WINDOWS</h3>
                                </div>
                            </div>
                            <div class="room-item item5">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>BADROOM</h3>
                                </div>
                            </div>
                            <div class="room-details-slider owl-carousel owl-theme">
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>03. WALLS DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>04. KITCHEN FAUCET DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>05. KITCHEN APPLIANCES DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tabs_item">
                        <div class="room-details-item">
                            <img src="assets/img/room-details/r-1.jpg" alt="Images" style="max-width: 100%;">
                            <div class="room-item item1">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>FLOORS</h3>
                                </div>
                            </div>
                            <div class="room-item item2">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>KITCHEN</h3>
                                </div>
                            </div>
                            <div class="room-item item3">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>WALLS</h3>
                                </div>
                            </div>
                            <div class="room-item item4">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>WINDOWS</h3>
                                </div>
                            </div>
                            <div class="room-item item5">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>BADROOM</h3>
                                </div>
                            </div>

                            <div class="room-details-slider owl-carousel owl-theme">
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>04. KITCHEN FAUCET DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>05. KITCHEN APPLIANCES DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>01. FLOORS DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tabs_item">
                        <div class="room-details-item">
                            <img src="assets/img/room-details/r-2.jpg" alt="Images" style="max-width: 100%;">
                            <div class="room-item item1">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>FLOORS</h3>
                                </div>
                            </div>
                            <div class="room-item item2">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>KITCHEN</h3>
                                </div>
                            </div>
                            <div class="room-item item3">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>WALLS</h3>
                                </div>
                            </div>
                            <div class="room-item item4">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>WINDOWS</h3>
                                </div>
                            </div>
                            <div class="room-item item5">
                                <i class='bx bx-plus'></i>
                                <div class="room-item-content">
                                    <h3>BADROOM</h3>
                                </div>
                            </div>

                            <div class="room-details-slider owl-carousel owl-theme">
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>05. KITCHEN APPLIANCES DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>01. FLOORS DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                                <div class="room-details-content">
                                    <a href="project-details.html">
                                        <h3>02. WALLS DETAILS</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit ame consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliquaUt enim ad minim veniaquis
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
/* Base (desktop) size set somewhere above) */
/* ... */

/* ≤ 992px */
@media (max-width: 992px) {
  .room-details-tab .tabs > li > a {
    font-size: 16px !important;
  }
}

/* ≤ 576px */
@media (max-width: 576px) {
  .room-details-tab .tabs > li > a {
    font-size: 14px !important;
  }
}
@media (max-width: 320px) {
  .room-details-tab .tabs > li > a {
    font-size: 10px !important;
  }
}


    </style>
    <!-- Room Details Area End -->




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
                            <input type="email" class="form-control" placeholder="Your Email*" name="EMAIL" required
                                autocomplete="off">
                            <button class="default-btn default-sante-fe" type="submit">
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