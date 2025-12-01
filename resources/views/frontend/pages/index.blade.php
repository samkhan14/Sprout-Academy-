@extends('frontend.partials.master')

@section('title', 'Home')

@section('meta_description',
    'The Sprout Academy develops the whole child by meeting social, emotional, physical, and
    intellectual needs through learning and growing every day.')

@section('content')

    <!-- Hero Section -->
    <section class="hero-section"
        style="background-image: url('{{ asset('frontend/assets/home_page_images/hero-img.png') }}');"
        aria-label="Hero banner">
        <div class="container">
            <div class="hero-content">
                @include('frontend.components.green-badge', ['text' => 'WE GUIDE'])
                <h1 class="hero-title">CHILDREN IN THE <br> RIGHT DIRECTION</h1>
                {{-- <a href="#tour" class="btn btn-secondary btn-lg">Schedule a Tour</a> --}}
                <a href="#tour" class="btn btn-foundation btn-lg">Schedule a Tour</a>
            </div>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section class="mission-section" aria-labelledby="mission-heading">
        <div class="container">
            <div class="mission-content">
                @include('frontend.components.section-heading', [
                    'text' => 'Our Mission',
                    'bgColor' => '#6daa44',
                    'borderColor' => '#6CAA43',
                    'rotation' => 'right',
                ])
                <p class="mission-text">
                    The Sprout Academy develops the whole child by meeting social, emotional, physical, and intellectual
                    needs through learning and growing every day.
                </p>
            </div>
        </div>
    </section>

    <!-- Three Easy Steps Section -->
    <section class="steps-section section" aria-labelledby="steps-heading">
        <div class="container">
            <div class="text-center">
                @include('frontend.components.section-heading', [
                    'text' => 'We Keep It Simple',
                    'bgColor' => '#6daa44',
                    'borderColor' => '#6CAA43',
                    'rotation' => 'left',
                ])
            </div>

            <h2 id="steps-heading" class="section-title">THREE EASY STEPS</h2>
            <div class="steps-container">
                <!-- Step 1 -->
                <div class="step-item">
                    <div class="step-icon blue" aria-hidden="true">
                        <img src="{{ asset('frontend/assets/home_page_images/loc_icon1.png') }}" alt="Choose Location"
                            loading="lazy">
                    </div>
                    <h3 class="step-title">CHOOSE LOCATION</h3>
                    <p class="step-description">Start by choosing a location.</p>
                </div>

                <!-- Step 2 -->
                <div class="step-item">
                    <div class="step-icon orange" aria-hidden="true">
                        <img src="{{ asset('frontend/assets/home_page_images/loc_icon2.png') }}" alt="Schedule a Tour"
                            loading="lazy">
                    </div>
                    <h3 class="step-title">SCHEDULE A TOUR</h3>
                    <p class="step-description">Schedule a tour and experience.</p>
                </div>

                <!-- Step 3 -->
                <div class="step-item">
                    <div class="step-icon green" aria-hidden="true">
                        <img src="{{ asset('frontend/assets/home_page_images/loc_icon3.png') }}" alt="Relax"
                            loading="lazy">
                    </div>
                    <h3 class="step-title">RELAX</h3>
                    <p class="step-description">Know your child is in good hands.</p>
                </div>
            </div>

            <div class="steps-cta">
                <p class="steps-cta-text">So, what are you waiting for?</p>
                <a href="#tour" class="btn btn-tour-outline btn-lg">Schedule a Tour &raquo;</a>
            </div>
        </div>
    </section>

    <!-- Accreditation Section -->
    <section class="accreditation-section" aria-labelledby="accreditation-heading">
        <div class="container">
            <div class="text-center">
                @include('frontend.components.section-heading', [
                    'text' => "We're one of the best",
                    'bgColor' => '#0A2239',
                    'borderColor' => '#0A2239',
                    'rotation' => 'right',
                ])
            </div>
            <h2 id="accreditation-heading" class="accreditation-title section-title">ACCREDITED, AWARDED, & LICENSED</h2>

            <div class="accreditation-slider">
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif1.png') }}" alt="Florida VPK Accreditation"
                        loading="lazy">
                </div>
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif2.png') }}"
                        alt="Florida Health Certification" loading="lazy">
                </div>
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif3.png') }}" alt="APPLE Accreditation"
                        loading="lazy">
                </div>
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif4.png') }}" alt="USDA Certification"
                        loading="lazy">
                </div>
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif5.png') }}"
                        alt="Early Learning Coalition of Pinellas County" loading="lazy">
                </div>
                <!-- Duplicate items for seamless loop -->
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif1.png') }}" alt="Florida VPK Accreditation"
                        loading="lazy">
                </div>
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif2.png') }}"
                        alt="Florida Health Certification" loading="lazy">
                </div>
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif3.png') }}" alt="APPLE Accreditation"
                        loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Why Parents Love Us Section -->
    <section class="why-parents-section section" aria-labelledby="why-parents-heading">
        <div class="container">
            <!-- Title Below Video -->
            <div class="text-center mt-5 mb-5">
                <h2 id="why-parents-heading" class="section-title">WANT TO SEE WHY PARENTS LOVE US?</h2>
            </div>
            <!-- Video Showcase at Top -->
            <div class="main-video-wrapper">
                <div class="video-showcase-main">
                    <video id="main-video" class="main-video-player"
                        poster="{{ asset('frontend/assets/home_page_images/singlevideo.png') }}" controls playsinline>
                        <source src="{{ asset('frontend/assets/videos/main-video.mp4') }}" type="video/mp4">
                        <source src="{{ asset('frontend/assets/videos/main-video.webm') }}" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                    <button class="video-play-btn-main" id="play-video-btn"
                        aria-label="Play video about our learning approach">
                        <span class="visually-hidden">Play video</span>
                    </button>
                </div>
            </div>


            <!-- Why Choose Us Content -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    {{-- <span class="section-label">Why the sprout academy?</span> --}}
                    @include('frontend.components.section-heading', [
                        'text' => 'Why the sprout academy?',
                        'bgColor' => '#6daa44',
                        'borderColor' => '#6CAA43',
                        'rotation' => 'left',
                    ])
                    <h3 class="why-choose-title">YOUR CHILD WON'T COME HOME A MESS</h3>
                    <a href="#tour" class="btn btn-foundation btn-lg mt-3">Enroll Now</a>
                </div>
                <div class="col-lg-7">
                    <p class="why-choose-text-right mb-3">
                        Finding quality childcare that balances education, safety, and fun can be challenging for parents.
                        Many facilities promise engaging activities but often send children home covered in mess, which can
                        be stressful for busy families.
                    </p>
                    <p class="why-choose-text-right">
                        At The Sprout Academy, we've solved this problem. Our innovative approach provides hands-on learning
                        experiences that engage children's natural curiosity while maintaining a clean, organized
                        environment.
                        We guarantee your child will explore, learn, and grow—without coming home a mess.
                    </p>
                </div>
            </div>

        </div>

        <!-- Full Width Marquee Video Gallery -->
        <div class="marquee-gallery-wrapper">
            <div class="marquee-gallery-slider">
                <div class="marquee-slide">
                    <img src="{{ asset('frontend/assets/home_page_images/vdo-img1.png') }}"
                        alt="Child enjoying classroom activities" loading="lazy">
                </div>
                <div class="marquee-slide">
                    <img src="{{ asset('frontend/assets/home_page_images/vdo-img2.png') }}"
                        alt="Happy child at learning table" loading="lazy">
                </div>
                <div class="marquee-slide">
                    <img src="{{ asset('frontend/assets/home_page_images/vdo-img1.png') }}"
                        alt="Child building with colorful blocks" loading="lazy">
                </div>
                <div class="marquee-slide">
                    <img src="{{ asset('frontend/assets/home_page_images/vdo-img2.png') }}" alt="Happy child learning"
                        loading="lazy">
                </div>
                <div class="marquee-slide">
                    <img src="{{ asset('frontend/assets/home_page_images/vdo-img1.png') }}" alt="Child in classroom"
                        loading="lazy">
                </div>
                <div class="marquee-slide">
                    <img src="{{ asset('frontend/assets/home_page_images/vdo-img2.png') }}" alt="Happy child at table"
                        loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- From Our Founders Section -->
    <section class="founders-section" aria-labelledby="founders-heading">
        <div class="founders-grid-wrapper">
            <!-- Left Column - Image -->
            <div class="founders-image-column">
                <img src="{{ asset('frontend/assets/home_page_images/founder-img.png') }}"
                    alt="Justin and Rachel, founders of The Sprout Academy" loading="lazy" class="founders-image">
            </div>

            <!-- Right Column - Content -->
            <div class="founders-content-column">
                <div class="founders-content-inner">
                    <div class="mt-5">
                        @include('frontend.components.section-heading', [
                            'text' => 'A Word',
                            'bgColor' => '#6daa44',
                            'borderColor' => '#6CAA43',
                            'rotation' => 'left',
                        ])
                    </div>
                    <h2 id="founders-heading" class="founders-title">From Our Founders</h2>
                    <p class="founders-text">
                        "All three of our children attend or have attended The Sprout Academy and grew up around our staff.
                        We are extremely passionate about what we do and creating a wonderful, safe, learning atmosphere for
                        children in our community. "
                    </p>
                    <p class="founders-signature">- Justin & Rachel</p>
                    <div class="founders-icon-wrapper">
                        <img src="{{ asset('frontend/assets/home_page_images/tree-layer.png') }}"
                            alt="Justin and Rachel, founders of The Sprout Academy" loading="lazy" class="founders-icon">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    @include('frontend.components.testimonials-slider')

    <!-- Spots Are Limited / Locations Section -->
    <section class="locations-section section" aria-labelledby="locations-heading">
        <div class="container">
            <div class="locations-header">
                <h2 id="locations-heading" class="section-title">SPOTS ARE LIMITED!</h2>
                <p class="locations-subtitle">Enroll Today & Secure Your Child's Spot</p>
            </div>

            <div class="locations-grid">
                <!-- Seminole -->
                <div class="location-card">
                    <div class="location-image-wrapper">
                        <img src="{{ asset('frontend/assets/home_page_images/sch-img-1.png') }}"
                            alt="The Sprout Academy Seminole location exterior" class="location-image" loading="lazy">
                    </div>
                    <div class="location-bar">
                        <span class="location-name">SEMINOLE</span>
                        <button class="location-toggle" aria-label="Toggle location details">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="location-overlay">
                        <div class="location-overlay-content">
                            <h3 class="location-overlay-title">SEMINOLE</h3>
                            <p class="location-overlay-address">9259 Park Blvd Seminole, FL 33777</p>
                            <a href="{{ route('enrollment.form', ['location' => 'seminole', 'ref' => 'home']) }}"
                                class="btn btn-secondary">Schedule a
                                Tour</a>
                        </div>
                    </div>
                </div>

                <!-- Pinellas Park -->
                <div class="location-card">
                    <div class="location-image-wrapper">
                        <img src="{{ asset('frontend/assets/home_page_images/sch-img-3.png') }}"
                            alt="The Sprout Academy Pinellas Park location exterior" class="location-image"
                            loading="lazy">
                    </div>
                    <div class="location-bar">
                        <span class="location-name">PINELLAS PARK</span>
                        <button class="location-toggle" aria-label="Toggle location details">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="location-overlay">
                        <div class="location-overlay-content">
                            <h3 class="location-overlay-title">PINELLAS PARK</h3>
                            <p class="location-overlay-address">Pinellas Park Location</p>
                            <a href="{{ route('enrollment.form', ['location' => 'pinellas-park', 'ref' => 'home']) }}"
                                class="btn btn-secondary">Schedule
                                a Tour</a>
                        </div>
                    </div>
                </div>

                <!-- Montessori -->
                <div class="location-card">
                    <div class="location-image-wrapper">
                        <img src="{{ asset('frontend/assets/home_page_images/sch-img-4.png') }}"
                            alt="The Sprout Academy Montessori location exterior" class="location-image" loading="lazy">
                    </div>
                    <div class="location-bar">
                        <span class="location-name">MONTESSORI</span>
                        <button class="location-toggle" aria-label="Toggle location details">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="location-overlay">
                        <div class="location-overlay-content">
                            <h3 class="location-overlay-title">MONTESSORI</h3>
                            <p class="location-overlay-address">Montessori Location</p>
                            <a href="{{ route('enrollment.form', ['location' => 'montessori', 'ref' => 'home']) }}"
                                class="btn btn-secondary">Schedule a
                                Tour</a>
                        </div>
                    </div>
                </div>

                <!-- Montessori -->
                <div class="location-card">
                    <div class="location-image-wrapper">
                        <img src="{{ asset('frontend/assets/home_page_images/sch-img-4.png') }}"
                            alt="The Sprout Academy Montessori location exterior" class="location-image" loading="lazy">
                    </div>
                    <div class="location-bar">
                        <span class="location-name">MONTESSORI</span>
                        <button class="location-toggle" aria-label="Toggle location details">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="location-overlay">
                        <div class="location-overlay-content">
                            <h3 class="location-overlay-title">MONTESSORI</h3>
                            <p class="location-overlay-address">Montessori Location</p>
                            <a href="{{ route('enrollment.form', ['location' => 'montessori', 'ref' => 'home']) }}"
                                class="btn btn-secondary">Schedule a
                                Tour</a>
                        </div>
                    </div>
                </div>

                <!-- Montessori -->
                <div class="location-card">
                    <div class="location-image-wrapper">
                        <img src="{{ asset('frontend/assets/home_page_images/sch-img-4.png') }}"
                            alt="The Sprout Academy Montessori location exterior" class="location-image" loading="lazy">
                    </div>
                    <div class="location-bar">
                        <span class="location-name">MONTESSORI</span>
                        <button class="location-toggle" aria-label="Toggle location details">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="location-overlay">
                        <div class="location-overlay-content">
                            <h3 class="location-overlay-title">MONTESSORI</h3>
                            <p class="location-overlay-address">Montessori Location</p>
                            <a href="{{ route('enrollment.form', ['location' => 'montessori', 'ref' => 'home']) }}"
                                class="btn btn-secondary">Schedule a
                                Tour</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        // Initialize Accreditation Slider
        if (typeof jQuery !== 'undefined' && typeof jQuery.fn.slick !== 'undefined') {
            $(document).ready(function() {
                console.log('Initializing Accreditation Slider');

                if ($('.accreditation-slider').length > 0) {
                    $('.accreditation-slider').slick({
                        infinite: true,
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        arrows: true,
                        dots: true,
                        centerMode: false,
                        variableWidth: false,
                        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    });
                    console.log('Accreditation Slider Initialized Successfully');
                } else {
                    console.error('Accreditation slider element not found');
                }

                // Video Play Button Functionality
                const playBtn = document.getElementById('play-video-btn');
                const video = document.getElementById('main-video');
                const videoContainer = document.querySelector('.video-showcase-main');

                if (playBtn && video) {
                    // Play button click
                    playBtn.addEventListener('click', function() {
                        video.play();
                        videoContainer.classList.add('playing');
                        video.setAttribute('controls', 'controls');
                    });

                    // When video ends, show play button again
                    video.addEventListener('ended', function() {
                        videoContainer.classList.remove('playing');
                        video.removeAttribute('controls');
                    });

                    // If user pauses the video
                    video.addEventListener('pause', function() {
                        if (!video.ended) {
                            // Keep controls visible even when paused
                            videoContainer.classList.add('playing');
                        }
                    });

                    // When video starts playing
                    video.addEventListener('play', function() {
                        videoContainer.classList.add('playing');
                    });
                }

                // Initialize Marquee Video Gallery - Continuous Slow Scroll
                if ($('.marquee-gallery-slider').length > 0) {
                    $('.marquee-gallery-slider').slick({
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 0, // Continuous movement without pause
                        speed: 5000, // 5 seconds for smooth slow transition
                        cssEase: 'linear', // Linear for constant speed
                        arrows: false,
                        dots: false,
                        pauseOnHover: false, // Don't pause on hover for continuous effect
                        draggable: true,
                        swipe: true,
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                    speed: 5000
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    speed: 4000
                                }
                            }
                        ]
                    });
                    console.log('Marquee Video Gallery - Continuous Scroll Initialized');
                }

            });
        } else {
            console.error('jQuery or Slick not loaded');
        }
    </script>
@endpush
