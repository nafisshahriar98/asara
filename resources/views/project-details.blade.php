




@extends('layouts.app2')

@section('title', ($project->title ?? 'Project') . ' — ASHARA')

@section('content')

@php
    // Build a quick lookup of overview items by slugged title, e.g. "Property Size" => "property-size"
    $facts = ($project->overviews ?? collect())->mapWithKeys(function($o){
        return [ \Illuminate\Support\Str::slug($o->title ?? '') => ($o->detail ?? '') ];
    });

    // Helper getters for common Concord-like fields (optional in DB)
    $propertySize = $facts['property-size'] ?? $facts['size'] ?? null;
    $startDate    = $facts['start-date'] ?? $facts['start'] ?? null;
    $finishDate   = $facts['finish-date'] ?? $facts['end-date'] ?? null;
    $investor     = $facts['investor'] ?? $facts['developer'] ?? null;

    // Optional map embed URL if you store it as an overview with title 'map' or 'map-iframe'
    $mapEmbed = $facts['map'] ?? $facts['map-iframe'] ?? null;
@endphp

{{-- ================== Inner Banner (dynamic) ================== --}}
<div class="inner-banner {{ $project->banner_image ? 'inner-bg7' : '' }}"
     @if(!empty($project->banner_image))
        style="background-image:url('{{ asset('storage/'.$project->banner_image) }}'); background-size:cover; background-position:center;"
     @endif>
    <div class="container-fluid">
        <div class="container-max">
            <div class="inner-title">
                <span>PROJECT DETAILS</span>
                <h2>{{ $project->title ?? 'Project' }}</h2>
            </div>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

{{-- ================== “Service” / Feature Cards ================== --}}
@if($project->features && $project->features->count())
<div class="service-area-four pt-100 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($project->features->take(4) as $i => $feature)
                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-three {{ $i==1 ? 'active' : 'section-bg' }}">
                        {{-- You can swap icons as you like; keeping generic ones --}}
                        <i class='flaticon-bankrupt'></i>
                        <h3 class="mt-2">{{ $feature->feature_text }}</h3>
                        {{-- Trimmed preview of description if you ever store one; else hide --}}
                        {{-- <p class="text-break">{{ \Illuminate\Support\Str::limit($feature->feature_text, 120) }}</p> --}}
                        <a href="{{ route('project.details', $project->slug) }}" class="learn-more-btn">
                            Learn More
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Service Area Four End -->

{{-- ================== Project “Hero Card” (facts) ================== --}}
<div class="project-area project-bg1">
    <div class="container">
        <div class="project-card">
            <span>
                {{ $project->project_stage ? strtoupper($project->project_stage) : 'PROJECT' }}
            </span>
            <h2>{{ $project->banner_title ?? $project->title }}</h2>

            <ul>
                @if($propertySize)
                    <li><b>PROPERTY SIZE:</b> {{ $propertySize }}</li>
                @endif
                @if($startDate)
                    <li><b>START DATE:</b> {{ $startDate }}</li>
                @endif
                @if($finishDate)
                    <li><b>FINISH DATE:</b> {{ $finishDate }}</li>
                @endif
                @if($investor)
                    <li><b>INVESTOR:</b> {{ $investor }}</li>
                @endif
            </ul>

            <div class="project-card-btn">
                <a href="{{ route('project.details', $project->slug) }}" class="default-btn default-hot-toddy">
                    View Details <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Project Area End -->

{{-- ================== Development / Description Blocks ================== --}}
<div class="development-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            {{-- Left --}}
            <div class="col-lg-6 col-md-6">
                <div class="development-card">
                    <h3>PROJECT OVERVIEW</h3>
                    @if(!empty($project->description))
                        <p>{!! nl2br(e($project->description)) !!}</p>
                    @else
                        <p>Details coming soon.</p>
                    @endif
                </div>
            </div>
            {{-- Right: Overview image if available --}}
            <div class="col-lg-6 col-md-6">
                <div class="development-card">
                    @if(!empty($project->overview_image))
                        <img src="{{ asset('storage/'.$project->overview_image) }}" alt="{{ $project->title }}" class="img-fluid rounded-3">
                    @else
                        <p>Image will be updated.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Development Area End -->

{{-- ================== Development Timeline (use Gallery as phases) ================== --}}
@if($project->galleries && $project->galleries->count())
<section class="development-section pt-100 pb-70">
    <div class="container">
        <div class="development-content">
            <div class="section-title-two text-center">
                <span class="section-span-bg2">INHABITATION HOUSE</span>
                <h2>Development <b class="section-color2">Timeline</b></h2>
            </div>
        </div>

        <div class="row pt-45">
            @foreach($project->galleries->take(4) as $g)
                <div class="col-lg-6 col-md-6">
                    <div class="development-item">
                        <img src="{{ asset('storage/'.$g->image_path) }}" alt="Phase {{ $loop->iteration }}">
                        <div class="content">
                            <h3>Phase {{ $loop->iteration }}</h3>
                            <p>{{ $project->title }} — construction highlight.</p>
                            <span>{{ optional($g->created_at)->format('Y') ?? now()->format('Y') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- Development Section End -->

{{-- ================== House Details / Quick Stats (pull from facts if you store them) ================== --}}
<div class="house-details-two pt-100 pb-70">
    <div class="container-fluid">
        <div class="container-max">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="house-content-two margin-left">
                        <span>HOUSES</span>
                        <h2>Comfortable Living <b>You’ll Appreciate</b></h2>
                        <ul class="house-list">
                            @if(!empty($facts['parking']))  <li>PARKING <b>{{ $facts['parking'] }}</b></li>@endif
                            @if(!empty($facts['bathroom'])) <li>BATHROOM <b>{{ $facts['bathroom'] }}</b></li>@endif
                            @if(!empty($facts['bedroom']))  <li>BEDROOM <b>{{ $facts['bedroom'] }}</b></li>@endif
                            @if(!empty($facts['sunny-side']))<li>SUNNY SIDE <b>{{ $facts['sunny-side'] }}</b></li>@endif
                        </ul>
                        <a href="{{ route('contact') }}" class="default-btn default-hot-toddy">
                            Download Brochure
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-7 p-0 m-0">
                    {{-- Simple slider container (your theme’s owl init will pick this up) --}}
                    <div class="house-slider-three owl-carousel owl-theme">
                        @forelse(($project->galleries ?? collect())->take(6) as $g)
                            <div class="house-three-item">
                                <img src="{{ asset('storage/'.$g->image_path) }}" alt="Gallery image">
                            </div>
                        @empty
                            <div class="house-three-item">
                                <img src="{{ asset('assets/img/house-details/house-1.jpg') }}" alt="Placeholder">
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- House Details Two End -->

{{-- ================== Map + Contact ================== --}}
<div class="map-area-two">
    <div class="container-fluid m-0 p-0">
        @if($mapEmbed)
            {{-- Use your stored Google Maps embed URL (Overview: title "map" or "map-iframe") --}}
            <iframe src="{{ $mapEmbed }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        @else
            {{-- Fallback static map (replace if needed) --}}
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1534.9307387091626!2d90.4244!3d23.7936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1760436291998!5m2!1sbn!2sbd"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        @endif

        <div class="contact-wrap">
            <div class="contact-form">
                <span>SEND MESSAGE</span>
                <h2>Contact With Us</h2>
                <form id="contactForm">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <i class='bx bx-user'></i>
                                <input type="text" name="name" class="form-control" required placeholder="Your Name*">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <i class='bx bx-user'></i>
                                <input type="email" name="email" class="form-control" required placeholder="Email*">
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <i class='bx bx-phone'></i>
                                <input type="text" name="phone_number" required class="form-control" placeholder="Your Phone">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <i class='bx bx-envelope'></i>
                                <textarea name="message" class="form-control" cols="30" rows="8" required placeholder="Your Message"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="default-btn default-hot-toddy">
                                Send Message
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Map Area Two End -->

@endsection




















{{--  
@extends('layouts.app2')

@section('title', 'Home — ASHARA')

@section('content')


    <!-- Inner Banner -->
    <div class="inner-banner inner-bg7">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>PROJECT DETAILS</span>
                    <h2>The Suburb Raleway Street #76</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Service Area Four -->
    <div class="service-area-four pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-three section-bg">
                        <i class='flaticon-bankrupt'></i>
                        <a href="service-details.html">
                            <h3>Property Managment</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur adipiscing
                        </p>
                        <a href="service-details.html" class="learn-more-btn">
                            Learn More
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-three active">
                        <i class='flaticon-value'></i>
                        <a href="service-details.html">
                            <h3>Commercial Development</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur adipiscing
                        </p>
                        <a href="service-details.html" class="learn-more-btn">
                            Learn More
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-three section-bg">
                        <i class='flaticon-time-management'></i>
                        <a href="service-details.html">
                            <h3>Construction Management</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur adipiscing
                        </p>
                        <a href="service-details.html" class="learn-more-btn">
                            Learn More
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-three section-bg">
                        <i class='flaticon-house'></i>
                        <a href="service-details.html">
                            <h3>Residentital Development</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur adipiscing
                        </p>
                        <a href="service-details.html" class="learn-more-btn">
                            Learn More
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Area Four End -->

    <!-- Project Area -->
    <div class="project-area project-bg1">
        <div class="container">
            <div class="project-card">
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
                        <b>INVESTOR:</b>
                        Jaeuin Group Inc
                    </li>
                </ul>

                <div class="project-card-btn">
                    <a href="project-details.html" class="default-btn default-hot-toddy">View Details <i
                            class='bx bx-right-arrow-alt'></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Project Area End -->

    <!-- Development Area -->
    <div class="development-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="development-card">
                        <h3>PROJECT DEVELOPMENT </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiumod tempor inciunt ut labore et dolore magna aliqua.
                            Ut enim ad minim oncunt Neque porro quisquam est qui dolorem
                            ipsum quia dolo cvelit sed quia non nuquam eius modi tempora inciunt
                            ut laboe magnam alquam quaerat vluptatem.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="development-card">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor inciunt ut labore et dolore magna aliqua. Ut enim
                            ad minim onecunt Neque porro quisquam est qui dolorem ipsum quia dolor
                            sit amet cosectetur adipisci velit, sed quia non nuquam eius modi tempora
                            incidunt ut labore et dolore magnam aliquam quaerat vluptatem.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Development Area End -->

    <!-- Development Section -->
    <section class="development-section pt-100 pb-70">
        <div class="container">
            <div class="development-content">
                <div class="section-title-two text-center">
                    <span class="section-span-bg2">INHABITATION house</span>
                    <h2>Development <b class="section-color2">Timeline</b></h2>
                </div>
            </div>

            <div class="row pt-45">
                <div class="col-lg-6 col-md-6">
                    <div class="development-item">
                        <img src="assets/img/project-details/1.jpg" alt="Images">
                        <div class="content">
                            <h3>Phase 1</h3>
                            <p>
                                Lorem ipsum dolor sit ame consectetur adipisicing eli sed usmod tempor
                                incididunt ut labore et dolore magnaenim minim veniaquis nostrud exercitation
                            </p>
                            <span>2024</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="development-item">
                        <img src="assets/img/project-details/2.jpg" alt="Images">
                        <div class="content">
                            <h3>Phase 3</h3>
                            <p>
                                Lorem ipsum dolor sit ame consectetur adipisicing eli sed usmod tempor
                                incididunt ut labore et dolore magnaenim minim veniaquis nostrud exercitation
                            </p>
                            <span>2024</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="development-item">
                        <img src="assets/img/project-details/3.jpg" alt="Images">
                        <div class="content">
                            <h3>Phase 3 And 4 In Development</h3>
                            <p>
                                Lorem ipsum dolor sit ame consectetur adipisicing eli sed usmod tempor
                                incididunt ut labore et dolore magnaenim minim veniaquis nostrud exercitation
                            </p>
                            <span>2024</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="development-item">
                        <img src="assets/img/project-details/4.jpg" alt="Images">
                        <div class="content">
                            <h3>Phase 3</h3>
                            <p>
                                Lorem ipsum dolor sit ame consectetur adipisicing eli sed usmod tempor
                                incididunt ut labore et dolore magnaenim minim veniaquis nostrud exercitation
                            </p>
                            <span>2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Development Section End -->

    <!-- House Details Two -->
    <div class="house-details-two pt-100 pb-70">
        <div class="container-fluid">
            <div class="container-max">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5">
                        <div class="house-content-two margin-left">
                            <span>HOUSES</span>
                            <h2>The Comfortable Bedroom <b>You Probably Expect? </b></h2>
                            <ul class="house-list">
                                <li>PARKING <b>01</b></li>
                                <li>BATHROOM <b>02</b></li>
                                <li>BEDROOM <b>03</b></li>
                                <li>SUNNY SIDE <b>Available</b></li>
                            </ul>
                            <a href="contact.html" class="default-btn default-hot-toddy">
                                Download Brochure
                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-7 p-0 m-0">
                        <div class="house-slider-three owl-carousel owl-theme">
                            <div class="house-three-item">
                                <img src="assets/img/house-details/house-1.jpg" alt="Images">
                            </div>
                            <div class="house-three-item">
                                <img src="assets/img/house-details/house-2.jpg" alt="Images">
                            </div>
                            <div class="house-three-item">
                                <img src="assets/img/house-details/house-3.jpg" alt="Images">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- House Details Two End -->

    <!-- Map Area Two -->
    <div class="map-area-two">
        <div class="container-fluid m-0 p-0">
            <iframe
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1534.9307387091626!2d90.42441888119575!3d23.793655463287056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7006d5430f9%3A0xb80c52bd3428e7d4!2z4KaG4Ka44Ka-4Kaw4Ka-IOCmquCnjeCmsOCni-CmquCmvuCmsOCnjeCmn-Cmv-CmnA!5e0!3m2!1sbn!2sbd!4v1760436291998!5m2!1sbn!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="contact-wrap">
                <div class="contact-form">
                    <span>SEND MESSAGE</span>
                    <h2>Contact With Us</h2>
                    <form id="contactForm">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-user'></i>
                                    <input type="text" name="name" id="name" class="form-control" required
                                        data-error="Please enter your name" placeholder="Your Name*">
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-user'></i>
                                    <input type="email" name="email" id="email" class="form-control" required
                                        data-error="Please enter your email" placeholder="Email*">
                                </div>
                            </div>

                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <i class='bx bx-phone'></i>
                                    <input type="text" name="phone_number" id="phone_number" required
                                        data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <i class='bx bx-envelope'></i>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required
                                        data-error="Write your message" placeholder="Your Message"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn default-hot-toddy">
                                    Send Message
                                    <i class='bx bx-right-arrow-alt'></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Area Two End -->

@endsection
--}}