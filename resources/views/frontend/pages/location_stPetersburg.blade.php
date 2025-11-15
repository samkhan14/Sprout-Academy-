@extends('frontend.partials.master')

@section('title', 'Location St. Petersburg')

@section('content')
    <!-- Inner Page Header -->
    @include('frontend.partials.header_inner', [
        'bgImage' => asset('frontend/assets/home_page_images/hdr-stpetersburg.png'),
        'title' => 'ST. PETERSBURG',
        'subtitle' => 'Explore Our Academy',
        'showButton' => true,
        'buttonText' => 'Register My Child At This Location',
        'buttonLink' => route('frontend.locations'),
    ])

    <!-- Locations Virtual Tour Section -->
    <section class="virtual-tour-locations locations-page" id="locations">
        <div class="container">
            <!-- Seminole Location -->
            <div class="vt-location-block" id="st-petersburg">
                <div class="vt-location-info">
                    <h2 class="vt-location-title">ST. PETERSBURG</h2>
                    <div class="vt-contact-list">
                        <div class="vt-contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">LOCATION ADDRESS</span>
                                <span class="vt-contact-value">1100 1st Ave N, St. Petersburg, FL 33701</span>
                            </div>
                        </div>
                        <div class="vt-contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">PHONE</span>
                                <span class="vt-contact-value">727-541-6260</span>
                            </div>
                        </div>
                        <div class="vt-contact-item">
                            <i class="fas fa-fax"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">FAX</span>
                                <span class="vt-contact-value">727-851-9975</span>
                            </div>
                        </div>
                        <div class="vt-contact-item">
                            <i class="fas fa-envelope"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">EMAIL</span>
                                <span class="vt-contact-value">Sheena@the-sprout-academy.com
                            </div>
                        </div>
                        <div class="vt-contact-item">
                            <i class="fas fa-clock"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">HOURS OF OPERATION</span>
                                <span class="vt-contact-value">Monday-Friday – 6:30 a.m. to 6:00 p.m</span>
                            </div>
                        </div>
                    </div>
                    <div class="vt-action-buttons">
                        <a href="#register" class="btn btn-enroll">Register Here</a>

                    </div>
                </div>
                @include('frontend.components.google-map', [
                    'address' => '1100 1st Ave N, St. Petersburg, FL 33701',
                ])
            </div>
            <section class="location-text">
                <div class="container">
                    <div class="location-text-content">
                        <p class="location-text-description">We are set off of 54th Ave. in beautiful St Petersburg in
                            Pinellas County. Our quaint location offers everything that you could want for your child within
                            an environment conducive to learning and safety. The entire complex has been remodeled within
                            the last year and offers the highest quality educational facility in the area. We rigorously
                            follow and uphold all the top standards of the Apple accreditation, Gold Seal Florida Quality
                            Care, and the The Sprout Academy policies.</p>
                        <a href="#" class="location-text-link">Follow Our Socials:
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Location Gallery Section -->
            @include('frontend.components.masonry-gallery', [
                'locationName' => 'seminole',
            ])
        </div>
    </section>
@endsection
