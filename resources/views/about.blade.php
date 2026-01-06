@extends('layouts.app3')
@section('title', 'Home — ASHARA')

@section('content')



    <!-- Inner Banner -->
    <div class="inner-banner inner-bg6">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>ABOUT US</span>
                    <h2>We Have A Goal To Achieve you <br> To Your Dream Home</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->
    <!-- Leadership Messages Slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @php
        /**
         * Keep client text SAME, but fix formatting:
         * - convert \r\n to \n
         * - collapse many newlines to max 2
         * - convert single newline to space
         * - keep paragraph breaks (double newline)
         */
        function normalizeMessage($text)
        {
            $text = str_replace(["\r\n", "\r"], "\n", $text);
            $text = preg_replace("/\n{3,}/", "\n\n", $text);
            $text = preg_replace("/(?<!\n)\n(?!\n)/", " ", $text); // single \n => space
            $text = trim($text);
            return $text;
        }

        $msg1 = normalizeMessage(<<<'TEXT'
                Dear Patrons:
                As-Salamu-Alaikum-Wa-Rahmatullah!
                By the grace of Almighty Allah, ASARA Properties had been established in January of the year 2018 with a view of “Comfort & Safety” in the construction of “Luxurious & Quality” residential apartments and Commercial spaces in various prime location of Dhaka city. In today’s day and age, a number of companies have engaged themselves in the real estate sector for the mitigation of housing accommodation.
                ASARA Properties consists of a highly qualified, experienced, dynamic and inspired management team of Engineers, Architects, Marketing and other professionals.
                We hope that you will continue to support us in all our future Endeavor with your inputs. We value your views immensely for the successful building of our country’s real sector.
                We wish all of success to our clients and well-wishers.
                TEXT);

        $msg2 = normalizeMessage(<<<'TEXT'
                Dear Well-Wishers.
                As-Salamu-Alaikum-Wa-Rahmatullah!
                By the grace of Almighty Allah, ASARA Properties had been established in January of the year 2018 with a view of “Comfort & Safety” in the construction of “Luxurious & Quality” residential apartments and Commercial spaces in various prime location of Dhaka city. In today’s day and age, a number of companies have engaged themselves in the real estate sector for the mitigation of housing accommodation.
                ASARA Properties has a royal plan to introduce innovative ideas to represent building, comprising of all modern facilities for the comfort of clients.
                Our aim is to develop quality housing & commercial properties with high standards at reasonable prices, to achieve customer contentment to respect and comply with Safety, Environmental and legal requirements.
                We plan to build a “Smart Town” in the near future for the “Middle class earning Citizens” of Bangladesh.
                We at O.K. Properties are loyal to endow the the best real estate investment opportunities, which convene customer expectation through creativity, continual development, professionalism, sincerity and reliability.
                TEXT);

        $msg3 = normalizeMessage(<<<'TEXT'
                Dear Concern:
                As-Salamu-Alaikum-Wa-Rahmatullah!
                By the grace of Almighty Allah, Asara Properties. had been established in the year of 2018. It is our great pleasure to inform you that Asara Properties. is a remarkable Real Estate and construction developer company in Bangladesh. The company has promised to deliver a high standard of construction and services for its valued customers with better business norms and ethics.
                We have own architectural and engineering design team who are competent to make flexible and readily adjustable to any design as per demand of our clients. Our technical team comprises of highly qualified architects, engineers and skilled workers who are create comprehensive experience in design, Fabrication, Erection of any construction works.
                We are committed to provide world class quality services as well as best quality and making. We can assure that our services will be attractive, durable and energy-efficient.
                TEXT);

        $msg4 = normalizeMessage(<<<'TEXT'
                Dear Concern:
                As-Salamu-Alaikum-Wa-Rahmatullah!
                By the grace of Almighty Allah, Asara Properties. had been established in the year of 2018. It is our great pleasure to inform you that Asara Properties. is a remarkable Real Estate and construction developer company in Bangladesh. The company has promised to deliver a high standard of construction and services for its valued customers with better business norms and ethics.
                Asara Properties is committed to build long-term relationships based on integrity, performance, value, and client satisfaction. We will continue to meet the changing needs of the government's various organizations with our quality services delivered by the most qualified people.

                Quality in all our work is the key. We work in close relation with clients, service providers and architects to obtain optimal team work and efficiency by which to become a legend construction company.
                TEXT);
    @endphp

    <section class="forward-area forward-area-mt leadership-area">
        <div class="container">
            <div class="section-title text-center mb-4">
                <span>MESSAGE FROM COMPANY</span>
                <h2>Go Forward With <b>Us</b></h2>
            </div>

            <div class="swiper leadershipSwiper">
                <div class="swiper-wrapper">

                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="leadership-card">
                            <div class="leadership-img">
                                <img src="{{ asset('assets/img/team/4.jpeg') }}" alt="Syed Akbar Kabir">
                            </div>

                            <div class="leadership-content">
                                <div class="section-title">

                                    <h3>Syed Akbar Kabir</h3>
                                    <small>Chairman, ASARA Properties</small>

                                    <p class="leadership-message">{!! nl2br(e($msg1)) !!}</p>
                                </div>

                                <!-- <a href="{{ route('contact') }}" class="default-btn default-bg-buttercup">
                                        Finalize Meeting <i class='bx bx-right-arrow-alt'></i>
                                    </a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="leadership-card">
                            <div class="leadership-img">
                                <img src="{{ asset('assets/img/team/2.jpeg') }}" alt="KM Zahirul Ameen">
                            </div>

                            <div class="leadership-content">
                                <div class="section-title">

                                    <h3>KM Zahirul Ameen</h3>
                                    <small>Managing Partner & CEO, ASARA Properties</small>

                                    <p class="leadership-message">{!! nl2br(e($msg2)) !!}</p>
                                </div>

                                <!-- <a href="{{ route('contact') }}" class="default-btn default-bg-buttercup">
                                        Finalize Meeting <i class='bx bx-right-arrow-alt'></i>
                                    </a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="leadership-card">
                            <div class="leadership-img">
                                <img src="{{ asset('assets/img/team/3.jpeg') }}" alt="Md Soebul Islam Roman">
                            </div>

                            <div class="leadership-content">
                                <div class="section-title">

                                    <h3>Md Soebul Islam Roman</h3>
                                    <small>Director- Finance & Administration, ASARA Properties</small>

                                    <p class="leadership-message">{!! nl2br(e($msg3)) !!}</p>
                                </div>

                                <!-- <a href="{{ route('contact') }}" class="default-btn default-bg-buttercup">
                                        Finalize Meeting <i class='bx bx-right-arrow-alt'></i>
                                    </a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="leadership-card">
                            <div class="leadership-img">
                                <img src="{{ asset('assets/img/team/1.jpeg') }}" alt="Md Aminul Islam">
                            </div>

                            <div class="leadership-content">
                                <div class="section-title">

                                    <h3>Md Aminul Islam</h3>
                                    <small>Director- Sales, ASARA Properties</small>

                                    <p class="leadership-message">{!! nl2br(e($msg4)) !!}</p>
                                </div>

                                <!-- <a href="{{ route('contact') }}" class="default-btn default-bg-buttercup">
                                        Finalize Meeting <i class='bx bx-right-arrow-alt'></i>
                                    </a> -->
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Controls -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev leadership-prev"></div>
                <div class="swiper-button-next leadership-next"></div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.leadershipSwiper', {
                loop: true,
                speed: 500,
                // keep height stable by NOT using autoHeight
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.leadership-next',
                    prevEl: '.leadership-prev',
                },
            });
        });
    </script>

    <style>
        /* ====== Leadership section: remove theme decorative shapes/lines ====== */
        .leadership-area {
            position: relative;
            overflow: hidden;
            background: transparent !important;
        }

        .leadership-area::before,
        .leadership-area::after,
        .leadership-area .container::before,
        .leadership-area .container::after,
        .leadership-area .row::before,
        .leadership-area .row::after,
        .leadership-area .forward-img::before,
        .leadership-area .forward-img::after,
        .leadership-area .forward-content::before,
        .leadership-area .forward-content::after {
            content: none !important;
            display: none !important;
            background: none !important;
        }

        .leadership-area .swiper,
        .leadership-area .swiper-wrapper,
        .leadership-area .swiper-slide {
            background: transparent !important;
        }

        /* ====== Card layout ====== */
        .leadership-area .leadership-card {
            display: grid;
            grid-template-columns: 1fr 1.25fr;
            gap: 36px;
            align-items: center;

            background: #fbf4e7;
            border-radius: 14px;
            padding: 36px;

            overflow: hidden;
        }

        /* ====== Image box (NO CROP, standard look) ====== */
        .leadership-area .leadership-img {
            border-radius: 12px;
            overflow: hidden;
            background: #ffffff;
            padding: 14px;
            /* clean white frame */
        }

        .leadership-area .leadership-img img {
            width: 100%;
            height: 420px;

            object-fit: contain;
            /* ✅ prevents cropping */
            object-position: center;

            display: block;
            background: #ffffff;
            border-radius: 10px;
        }

        /* ====== Content column (push button lower) ====== */
        .leadership-area .leadership-content {
            display: flex;
            flex-direction: column;
        }

        .leadership-area .leadership-content small {
            display: inline-block;
            margin-top: 6px;
            opacity: .8;
        }

        /* Make the label look standard */
        .leadership-area .leadership-content .section-title span {
            letter-spacing: .06em;
            text-transform: uppercase;
            font-size: 12px;
            opacity: .75;
        }

        /* ====== Message box (stable height so beige doesn't jump) ====== */
        .leadership-message {
            margin-top: 16px;
            white-space: normal;
            line-height: 1.9;
            font-size: 15px;
            color: #555;

            max-height: 320px;
            overflow-y: auto;
            padding-right: 10px;
        }

        /* nicer scrollbar (optional but looks premium) */
        .leadership-message::-webkit-scrollbar {
            width: 6px;
        }

        .leadership-message::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, .18);
            border-radius: 10px;
        }

        /* Button slightly lower + aligned */
        .leadership-area .default-btn {
            margin-top: 18px;
            /* ✅ lowers button */
            align-self: flex-start;
        }

        /* ====== Swiper spacing + controls ====== */
        .leadership-area .swiper {
            padding: 10px 10px 45px;
        }

        .leadership-area .swiper-button-prev,
        .leadership-area .swiper-button-next {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #0c3b2e;
            color: #fff;
        }

        .leadership-area .swiper-button-prev:after,
        .leadership-area .swiper-button-next:after {
            font-size: 16px;
            font-weight: 700;
        }

        /* Pagination dots spacing */
        .leadership-area .swiper-pagination {
            bottom: 8px !important;
        }

        /* ====== Responsive ====== */
        @media (max-width: 991px) {
            .leadership-area .leadership-card {
                grid-template-columns: 1fr;
                gap: 22px;
                padding: 24px;
            }

            .leadership-area .leadership-img img {
                height: 280px;
            }

            .leadership-message {
                max-height: 320px;
            }
        }
    </style>
    <!-- Leadership Messages Slider End -->








    <!-- Forward Area -->
    <!-- <div class="forward-area forward-area-mt ">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6">
                        <div class="forward-img">
                            <img src="assets/img/2.jpg" alt="Images">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="forward-content">
                            <div class="section-title">
                                <span>Message FRom Company</span>
                                <h2>Go Forward With <b>Us</b></h2>
                                <p>
                                    At ASARA Properties, we believe in shaping not just buildings but better lifestyles. Our
                                    journey is defined
                                    by integrity, innovation, and dedication to excellence. Every project we undertake is built
                                    on the
                                    foundation of trust, quality, and value — ensuring your investment is secure and your living
                                    experience
                                    truly rewarding.
                                    We move forward with a vision to redefine modern housing through design, comfort, and
                                    sustainability
                                    — creating homes where memories thrive and futures begin.

                                </p>
                            </div>

                            <div class="signature">
                                <ul>
                                    <li>
                                        <img src="assets/img/signature.png" class="signature-img1" alt="Images">
                                        <img src="assets/img/signature2.png" class="signature-img2" alt="Images">
                                    </li>
                                    <li>
                                        <h3>ABC</h3>
                                        <span>Company Owner</span>
                                    </li>
                                </ul>
                            </div>

                            <a href={{ route(name: 'contact') }} class="default-btn default-bg-buttercup">
                                Finalize Meeting
                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- Forward Area End -->

    <!-- About Area -->
    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title-two">
                            <span class="section-span-bg2">Our mission & vission</span>
                            <h2>Working For You</h2>
                            <p>
                                ASARA Properties is driven by the mission to serve people with reliable, quality real estate
                                solutions. We
                                listen, understand, and deliver — turning your dream of owning a perfect home into reality.
                                From
                                concept to completion, our focus remains on comfort, quality, and community.
                                We work passionately to provide residential and commercial spaces that enrich lifestyles and
                                strengthen
                                trust through every brick we lay.
                            </p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="about-card">
                                    <h3>Our Vision</h3>
                                    <p>To become the leading real estate company in Africa providing world class real estate
                                        services that meet our clients needs at all times.</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="about-card">
                                    <h3>Our Mission</h3>
                                    <p>We exist to provide world- class services in the area of our core competences that
                                        leave our clients happy and thoroughly satisfied.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="assets/img/about-img.jpg" alt="Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->
    <!-- Core Values Area -->
    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-lg-12">
                    <div class="about-content">
                        <div class="section-title-two">
                            <span class="section-span-bg2">Our Core Values</span>
                            <h2>We Exist To Serve With Excellence</h2>
                            <p>
                                We exist to: keep our clients satisfied; our colleagues/collaborators happy; our staff
                                fulfilled
                                and motivated; our management proud and celebrated; and our brand competitive and
                                progressive.
                                To achieve the above, we pride ourselves on these values:
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Left column -->
                <div class="col-lg-6">
                    <div class="about-card mb-30">
                        <h3><i class='bx bx-shield-quarter me-1'></i> Integrity</h3>
                        <ul class="value-list">
                            <li>We keep our promises – we walk the talk.</li>
                            <li>We are honest, trustworthy, and ethical in all our actions.</li>
                        </ul>
                    </div>

                    <div class="about-card mb-30">
                        <h3><i class='bx bx-brain me-1'></i> Competence</h3>
                        <ul class="value-list">
                            <li>We are research-driven.</li>
                            <li>We give reliable information that helps our clients make the right decisions.</li>
                        </ul>
                    </div>

                    <div class="about-card mb-30">
                        <h3><i class='bx bx-group me-1'></i> Team Work</h3>
                        <ul class="value-list">
                            <li>We work together to achieve more.</li>
                            <li>We commit to achieving common goals and support one another.</li>
                        </ul>
                    </div>
                </div>

                <!-- Right column -->
                <div class="col-lg-6">
                    <div class="about-card mb-30">
                        <h3><i class='bx bx-happy-heart-eyes me-1'></i> Quality Client/Customer Service</h3>
                        <ul class="value-list">
                            <li>Our clients are the driving force of our existence.</li>
                            <li>We focus on opportunities where we can establish competitive advantage and deliver
                                outstanding results.</li>
                        </ul>
                    </div>

                    <div class="about-card mb-30">
                        <h3><i class='bx bx-timer me-1'></i> Prompt Delivery</h3>
                        <ul class="value-list">
                            <li>We are quick to act and respond to clients’ needs.</li>
                            <li>We perform our duties without delay.</li>
                        </ul>
                    </div>

                    <div class="about-card mb-30">
                        <h3><i class='bx bx-refresh me-1'></i> Versatility</h3>
                        <ul class="value-list">
                            <li>We are professional and adaptable to the varied needs of our clients.</li>
                            <li>We leverage our collective strength to provide exceptional services.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Core Values Area End -->









    <!-- Team Area -->
    <!-- Team Area -->
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left content -->
                <div class="col-lg-4 col-md-12">
                    <div class="team-content">
                        <div class="section-title-two">
                            <span class="section-span-bg2">TEAM MEMBERS</span>
                            <h2>We Are Pleased To <b class="section-color2">Meet You</b></h2>
                            <a href="#" class="team-btn">
                                Meet Our Team <i class='bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slider -->
                <div class="col-lg-8 col-md-12">
                    <div class="swiper teamSwiper">
                        <div class="swiper-wrapper">

                            <!-- Slide 1 -->
                            <div class="swiper-slide">
                                <div class="team-card active">
                                    <a href="team.html"><img src="assets/img/team/1.jpg" alt="Images"></a>
                                    <div class="content">
                                        <a href="team.html">
                                            <h3>JORDHAN LEON</h3>
                                            <span>Company Owner</span>
                                        </a>
                                        <ul class="social-link">
                                            <li><a href="https://www.facebook.com/login/" target="_blank"><i
                                                        class='bx bxl-facebook'></i></a></li>
                                            <li><a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                        class='bx bxl-twitter'></i></a></li>
                                            <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                        class='bx bxl-instagram'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 -->
                            <div class="swiper-slide">
                                <div class="team-card">
                                    <a href="team.html"><img src="assets/img/team/2.jpg" alt="Images"></a>
                                    <div class="content">
                                        <a href="team.html">
                                            <h3>DEVIT KILLER</h3>
                                            <span>Sales Manager</span>
                                        </a>
                                        <ul class="social-link">
                                            <li><a href="https://www.facebook.com/login/" target="_blank"><i
                                                        class='bx bxl-facebook'></i></a></li>
                                            <li><a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                        class='bx bxl-twitter'></i></a></li>
                                            <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                        class='bx bxl-instagram'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 -->
                            <div class="swiper-slide">
                                <div class="team-card">
                                    <a href="team.html"><img src="assets/img/team/3.jpg" alt="Images"></a>
                                    <div class="content">
                                        <a href="team.html">
                                            <h3>MORAH JEIN</h3>
                                            <span>Manager</span>
                                        </a>
                                        <ul class="social-link">
                                            <li><a href="https://www.facebook.com/login/" target="_blank"><i
                                                        class='bx bxl-facebook'></i></a></li>
                                            <li><a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                        class='bx bxl-twitter'></i></a></li>
                                            <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                        class='bx bxl-instagram'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 4 -->
                            <div class="swiper-slide">
                                <div class="team-card active">
                                    <a href="team.html"><img src="assets/img/team/4.jpg" alt="Images"></a>
                                    <div class="content">
                                        <a href="team.html">
                                            <h3>KILIN WARD</h3>
                                            <span>Head of Optop</span>
                                        </a>
                                        <ul class="social-link">
                                            <li><a href="https://www.facebook.com/login/" target="_blank"><i
                                                        class='bx bxl-facebook'></i></a></li>
                                            <li><a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                        class='bx bxl-twitter'></i></a></li>
                                            <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                        class='bx bxl-instagram'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 5 -->
                            <div class="swiper-slide">
                                <div class="team-card">
                                    <a href="team.html"><img src="assets/img/team/5.jpg" alt="Images"></a>
                                    <div class="content">
                                        <a href="team.html">
                                            <h3>ENDON JEMS</h3>
                                            <span>Special Support</span>
                                        </a>
                                        <ul class="social-link">
                                            <li><a href="https://www.facebook.com/login/" target="_blank"><i
                                                        class='bx bxl-facebook'></i></a></li>
                                            <li><a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                        class='bx bxl-twitter'></i></a></li>
                                            <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                        class='bx bxl-instagram'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 6 -->
                            <div class="swiper-slide">
                                <div class="team-card">
                                    <a href="team.html"><img src="assets/img/team/6.jpg" alt="Images"></a>
                                    <div class="content">
                                        <a href="team.html">
                                            <h3>LIAM WARD</h3>
                                            <span>Product Manager</span>
                                        </a>
                                        <ul class="social-link">
                                            <li><a href="https://www.facebook.com/login/" target="_blank"><i
                                                        class='bx bxl-facebook'></i></a></li>
                                            <li><a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                        class='bx bxl-twitter'></i></a></li>
                                            <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                        class='bx bxl-instagram'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Controls -->
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team Area End -->
<style>
    .teamSwiper { width: 100%; padding: 10px 0 45px; }
.teamSwiper .swiper-slide { height: auto; }
.teamSwiper .team-card { height: 100%; }

.teamSwiper .swiper-button-prev,
.teamSwiper .swiper-button-next {
  width: 42px;
  height: 42px;
}

.teamSwiper .swiper-button-prev:after,
.teamSwiper .swiper-button-next:after {
  font-size: 16px;
}

</style>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  new Swiper(".teamSwiper", {
    loop: true,
    spaceBetween: 25,
    grabCursor: true,
    autoplay: { delay: 2500, disableOnInteraction: false },
    pagination: { el: ".teamSwiper .swiper-pagination", clickable: true },
    navigation: { nextEl: ".teamSwiper .swiper-button-next", prevEl: ".teamSwiper .swiper-button-prev" },
    breakpoints: {
      0: { slidesPerView: 1 },
      576: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      992: { slidesPerView: 3 } /* desktop shows 3 */
    }
  });
</script>









    <!-- Team Area -->
    <!-- <div class="team-area pt-100 pb-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-sm-12 col-md-12">
                        <div class="team-content">
                            <div class="section-title-two">
                                <span class="section-span-bg2">TEAM MEMBERS</span>
                                <h2>We Are Pleased To <b class="section-color2">Meet You</b></h2>
                                <a href="#" class="team-btn">
                                    Meet Our Team
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="team-card active">
                            <a href="team.html">
                                <img src="assets/img/team/1.jpg" alt="Images">
                            </a>
                            <div class="content">
                                <a href="team.html">
                                    <h3>JORDHAN LEON</h3>
                                    <span>Company Owner</span>
                                    <ul class="social-link">
                                        <li>
                                            <a href="https://www.facebook.com/login/" target="_blank"><i
                                                    class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                    class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                    class='bx bxl-instagram'></i></a>
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="team-card">
                            <a href="team.html">
                                <img src="assets/img/team/2.jpg" alt="Images">
                            </a>
                            <div class="content">
                                <a href="team.html">
                                    <h3>DEVIT KILLER</h3>
                                    <span>Sales Manager</span>
                                    <ul class="social-link">
                                        <li>
                                            <a href="https://www.facebook.com/login/" target="_blank"><i
                                                    class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                    class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                    class='bx bxl-instagram'></i></a>
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="team-card">
                            <a href="team.html">
                                <img src="assets/img/team/3.jpg" alt="Images">
                            </a>
                            <div class="content">
                                <a href="team.html">
                                    <h3>MORAH JEIN</h3>
                                    <span>Manager</span>
                                    <ul class="social-link">
                                        <li>
                                            <a href="https://www.facebook.com/login/" target="_blank"><i
                                                    class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                    class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                    class='bx bxl-instagram'></i></a>
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="team-card active">
                            <a href="team.html">
                                <img src="assets/img/team/4.jpg" alt="Images">
                            </a>
                            <div class="content">
                                <a href="team.html">
                                    <h3>KILIN WARD</h3>
                                    <span>Head of Optop</span>
                                    <ul class="social-link">
                                        <li>
                                            <a href="https://www.facebook.com/login/" target="_blank"><i
                                                    class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                    class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                    class='bx bxl-instagram'></i></a>
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="team-card">
                            <a href="team.html">
                                <img src="assets/img/team/5.jpg" alt="Images">
                            </a>
                            <div class="content">
                                <a href="team.html">
                                    <h3>ENDON JEMS</h3>
                                    <span>Special Support</span>
                                    <ul class="social-link">
                                        <li>
                                            <a href="https://www.facebook.com/login/" target="_blank"><i
                                                    class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                    class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                    class='bx bxl-instagram'></i></a>
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="team-card">
                            <a href="team.html">
                                <img src="assets/img/team/6.jpg" alt="Images">
                            </a>
                            <div class="content">
                                <a href="team.html">
                                    <h3>LIAM WARD</h3>
                                    <span>Product Manager</span>
                                    <ul class="social-link">
                                        <li>
                                            <a href="https://www.facebook.com/login/" target="_blank"><i
                                                    class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/i/flow/login" target="_blank"><i
                                                    class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                                    class='bx bxl-instagram'></i></a>
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- Team Area End -->

    <!-- Innovation Area -->
    <div class="innovation-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 col-xxl-6">
                    <div class="innovation-content-two">
                        <div class="section-title-two">
                            <span class="section-span-bg2">DELIVERING INNOVATION</span>
                            <h2 class="color-innovation">Sustainability Property <b class="section-color2">Goals As
                                    Expected</b></h2>
                            <p>
                                ASARA is committed to building eco-friendly, energy-efficient homes using sustainable
                                materials. Our
                                designs promote harmony between nature and architecture, ensuring comfort today and a
                                greener
                                tomorrow for future generations.
                            </p>
                        </div>
                        <!-- <div class="innovation-btn">
                                                                                    <a href="property-details.html" class="default-btn default-hot-toddy">View Details <i class='bx bx-right-arrow-alt'></i></a>
                                                                                </div> -->
                    </div>
                </div>

                <div class="col-lg-5 col-xxl-6">
                    <div class="innovation-bg">
                        <div class="innovation-slider owl-carousel owl-theme">
                            <div class="innovation-item">
                                <i class='flaticon-growth'></i>
                                <h3>Designed Marvel</h3>
                                <p>
                                    Architectural brilliance meets functionality, creating elegant living spaces that
                                    inspire modern lifestyles.
                                </p>
                            </div>

                            <div class="innovation-item">
                                <i class='flaticon-smartphone'></i>
                                <h3>Quality Management</h3>
                                <p>
                                    Ensuring superior construction standards through precision, care, and a commitment to
                                    lasting excellence
                                </p>
                            </div>

                            <!-- <div class="innovation-item">
                                                                        <i class='flaticon-growth'></i>
                                                                        <h3>Designed Marvel</h3>
                                                                        <p>
                                                                            Lorem ipsum doconsectetur adipisicing elit sed do eiusmod tempor
                                                                            incididunt ut labore et dolore magna aliqua.Ut eveniam
                                                                        </p>
                                                                    </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Innovation Area End -->

    <!-- Map Area -->
    <div class="map-area">
        <div class="container-fluid m-0 p-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1887.3734131639715!2d-96.95588917878352!3d18.89830951964275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c4e51eb45eacad%3A0x465ac54aa2735573!2zUmluY29uIGRlbCBCb3NxdWUsIOCmleCmsOCnjeCmoeCni-CmrOCmviwg4Kat4KeH4Kaw4Ka-4KaV4KeN4Kaw4KeB4KacLCDgpq7gp4fgppXgp43gprjgpr_gppXgp4s!5e0!3m2!1sbn!2sbd!4v1594641366896!5m2!1sbn!2sbd"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
            <div class="map-content">
                <span>CONTACT FOR PROJECT</span>
                <h2>Do You Have A Project In <b>Mind?</b></h2>
                <div class="map-content-left">
                    <span style="font-size:16px;letter-spacing:.08em;text-transform:uppercase;font-weight:700;">
                        CALL US NOW
                    </span>
                    <h2 style="font-size:clamp(16px,1.6vw,20px);line-height:0.6;margin:0;">
                        <a href="tel:+5678555178" style="color:#fff;text-decoration:none;font-weight:700;">
                            +88 01911845500
                        </a>
                    </h2>
                </div>
                <div class="map-content-right">
                    <span style="font-size:16px;letter-spacing:.08em;text-transform:uppercase;font-weight:700;">
                        GET IN TOUCH
                    </span>
                    <h2 style="font-size:clamp(18px,2.6vw,22px);line-height:0.6;margin:0;">
                        <a href="asarapropertiesbd@gmail.com" style="color:#fff;text-decoration:none;font-weight:300;">
                            asaraproperties.com
                        </a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Area End -->

    <!-- css for core values -->
    <style>
        .about-card ul.value-list {
            margin: 12px 0 0;
            padding-left: 0;
            list-style: none;
        }

        .about-card ul.value-list li {
            position: relative;
            padding-left: 26px;
            margin-bottom: 8px;
        }

        .about-card ul.value-list li:before {
            content: "\e9a1";
            /* bx-check-circle */
            font-family: 'boxicons' !important;
            position: absolute;
            left: 0;
            top: 0;
            line-height: 1.2;
            font-size: 18px;
            color: #2bb673;
            /* theme accent – adjust if needed */
        }

        .me-1 {
            margin-right: .4rem;
        }

        /* ===== Core Values: force full-width title + paragraph ===== */
        .about-area .section-title-two,
        .about-area .section-title-two h2,
        .about-area .section-title-two p {
            max-width: none !important;
            width: 100% !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        /* One-line heading on desktop */
        .about-area .section-title-two h2 {
            white-space: nowrap !important;
            overflow: hidden;
            /* avoid layout shift if too long */
            text-overflow: ellipsis;
            /* show … only if it still doesn't fit */
            line-height: 1.1 !important;
            /* shrink a bit if needed but keep it elegant */
            font-size: clamp(28px, 5vw, 56px) !important;
        }

        /* Let the title wrap naturally on small screens */
        @media (max-width: 991.98px) {
            .about-area .section-title-two h2 {
                white-space: normal !important;
                text-overflow: clip !important;
            }
        }
    </style>



@endsection