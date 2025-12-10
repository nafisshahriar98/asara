@extends('layouts.app3')
@section('title', 'Home — ASHARA')

@section('content')


    <!-- Inner Banner -->
    <div class="inner-banner inner-bg1">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>CONTACT US</span>
                    <h2>We’re Always Helpful <br> To Lend A Hand</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->
    {{--
    <!-- Service Area Four -->
    <div class="service-area-four pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-three section-bg">
                        <i class='flaticon-bankrupt'></i>
                        <a href="#">
                            <h3>Property Managment</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur
                            adipiscing</p>
                        <!-- <a href="#" class="learn-more-btn">
                                                            Learn More
                                                            <i class='bx bx-right-arrow-alt'></i>
                                                        </a> -->
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-three active">
                        <i class='flaticon-value'></i>
                        <a href="#">
                            <h3>Commercial Development</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur
                            adipiscing</p>
                        <!-- <a href="#" class="learn-more-btn">
                                                            Learn More
                                                            <i class='bx bx-right-arrow-alt'></i>
                                                        </a> -->
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-three section-bg">
                        <i class='flaticon-time-management'></i>
                        <a href="#">
                            <h3>Construction Management</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur
                            adipiscing</p>
                        <!-- <a href="#" class="learn-more-btn">
                                                            Learn More
                                                            <i class='bx bx-right-arrow-alt'></i>
                                                        </a> -->
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-three section-bg">
                        <i class='flaticon-house'></i>
                        <a href="#">
                            <h3>Residentital Development</h3>
                        </a>
                        <p class="text-break">Lorem ipsum dolor sitameem adipiscing cnsectetur adisci- mod tur
                            adipiscing</p>
                        <!-- <a href="#" class="learn-more-btn">
                                                            Learn More
                                                            <i class='bx bx-right-arrow-alt'></i>
                                                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Area Four End -->
    --}}
    <!-- Map Area Two -->
    <!-- Contact Info Section -->
    <!-- Contact Information -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="h4 mb-1">Contact Information</h3>
                            <p class="text-muted mb-4">We’re here to help. Reach us via address, phone, or email.</p>

                            <ul class="list-group list-group-flush contact-list">
                                <!-- Address -->
                                <li class="list-group-item px-0 py-3">
                                    <div class="d-flex align-items-start gap-3">
                                        <span class="icon-circle">
                                            <i class="bi bi-geo-alt"></i>
                                        </span>
                                        <div>
                                            <div class="text-muted small fw-semibold">Address</div>
                                            <address class="mb-0 not-italic">
                                                Ga- 30/B, Level- 08, Suite- 8/A,<br>
                                                Mysha Chowdhury Tower, Shahjadpur,<br>
                                                Gulshan, Dhaka-1212.
                                            </address>
                                        </div>
                                    </div>
                                </li>

                                <!-- Phone -->
                                <li class="list-group-item px-0 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="icon-circle">
                                            <i class="bi bi-telephone"></i>
                                        </span>
                                        <div>
                                            <div class="text-muted small fw-semibold">Phone</div>
                                            <a href="tel:+8801711966255" class="link-underline link-underline-opacity-0">
                                                +88 01711966255
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- Email -->
                                <li class="list-group-item px-0 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="icon-circle">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <div>
                                            <div class="text-muted small fw-semibold">Email</div>
                                            <a href="mailto:asarapropertiesbd@gmail.com"
                                                class="link-underline link-underline-opacity-0">
                                                asarapropertiesbd@gmail.com
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <!-- Quick actions (optional) -->
                            <div class="d-flex flex-wrap gap-2 mt-4">
                                <a id="callBtn" href="tel:+8801711966255" class="btn btn-primary"
                                    style="background:#0E4F27;color:#fff;border-color:#0E4F27;">
                                    <i class="bi bi-telephone-outbound me-1"></i> Call Now
                                </a>
                                <style>
                                    #callBtn:hover {
                                        color: #f7b500 !important;
                                        background: #0E4F27;
                                        border-color: #0E4F27;
                                    }
                                </style>

                                <a href="mailto:asarapropertiesbd@gmail.com" class="btn btn-outline-secondary">
                                    <i class="bi bi-envelope-paper me-1"></i> Send Email
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="map-area-two">
        <div class="container-fluid m-0 p-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1534.9307387091626!2d90.42441888119575!3d23.793655463287056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7006d5430f9%3A0xb80c52bd3428e7d4!2z4KaG4Ka44Ka-4Kaw4Ka-IOCmquCnjeCmsOCni-CmquCmvuCmsOCnjeCmn-Cmv-CmnA!5e0!3m2!1sbn!2sbd!4v1760436291998!5m2!1sbn!2sbd"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
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
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-user'></i>
                                    <input type="email" name="email" id="email" class="form-control" required
                                        data-error="Please enter your email" placeholder="Email*">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-phone'></i>
                                    <input type="text" name="phone_number" id="phone_number" required
                                        data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-file'></i>
                                    <input type="text" name="msg_subject" id="msg_subject" class="form-control" required
                                        data-error="Please enter your subject" placeholder="Your Subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <i class='bx bx-envelope'></i>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required
                                        data-error="Write your message" placeholder="Your Message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn default-hot-toddy">
                                    Send Message
                                    <i class='bx bx-right-arrow-alt'></i>
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Area Two End -->

    <!-- newsletter Area -->
    <div class="newsletter-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="newsletter-content">
                        <i class='flaticon-email'></i>
                        <h2>Join our weekly <b class="section-color2">Newsletter</b></h2>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="newsletter-form-area">
                        <form class="newsletter-form" data-toggle="validator" method="POST">
                            <input type="email" class="form-control" placeholder="Your Email*" name="EMAIL" required
                                autocomplete="off">
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







    <style>
        /* Style phone and email links */
            {
                {
                -- a[href^="tel:"] {
                    color: #fff;
                    /* or your brand color */
                    text-decoration: none;
                    /* remove underline */
                    font-weight: 500;
                    /* optional, make it look cleaner */
                    background-color: #0E4F27 !important;
                }

                --
            }
        }

        a[href^="tel:"],
        a[href^="mailto:"] {
            color: #000;
            /* or your brand color */
            text-decoration: none;
            /* remove underline */
            font-weight: 500;
            /* optional, make it look cleaner */
        }

        a[href^="tel:"]:hover,
        a[href^="mailto:"]:hover {
            color: #f7b500;
            /* ASARA brand gold hover color */
            text-decoration: underline;
            /* optional hover underline */
            background-color: #0E4F27;
        }


        <style>.icon-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f1f3f5;
            color: #333;
            flex: 0 0 40px;
        }

        .contact-list .list-group-item {
            border: 0;
            border-top: 1px solid #eee;
        }

        .contact-list .list-group-item:first-child {
            border-top: 0;
        }

        address.not-italic {
            font-style: normal;
        }
    </style>

    </style>
@endsection