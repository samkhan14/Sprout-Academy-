@extends('frontend.partials.master')

@section('content')
    @include('frontend.partials.header_inner', [
        'bgImage' => asset('frontend/assets/home_page_images/hdr-pr.png'),
        'title' => 'Spots are Limited!',
        'subtitle' => 'The Sprout Academy',
        'text' => 'Schools fill up quickly. Enroll today!',
        'showButton' => false,
    ])

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
                            <a href="{{ route('enrollment.form', ['location' => 'seminole', 'ref' => 'enroll']) }}"
                                class="btn btn-secondary">Schedule a
                                Tour</a>
                        </div>
                    </div>
                </div>

                <!-- Pinellas Park -->
                <div class="location-card">
                    <div class="location-image-wrapper">
                        <img src="{{ asset('frontend/assets/home_page_images/sch-img-3.png') }}"
                            alt="The Sprout Academy Pinellas Park location exterior" class="location-image" loading="lazy">
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
                            <a href="{{ route('enrollment.form', ['location' => 'pinellas-park', 'ref' => 'enroll']) }}"
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
                            <a href="{{ route('enrollment.form', ['location' => 'montessori', 'ref' => 'enroll']) }}"
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
                            <a href="{{ route('enrollment.form', ['location' => 'montessori', 'ref' => 'enroll']) }}"
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
                            <a href="{{ route('enrollment.form', ['location' => 'montessori', 'ref' => 'enroll']) }}"
                                class="btn btn-secondary">Schedule a
                                Tour</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
