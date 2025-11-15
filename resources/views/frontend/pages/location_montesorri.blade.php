@extends('frontend.partials.master')

@section('title', 'Location Montessori')

@section('content')
    <!-- Inner Page Header -->
    @include('frontend.partials.header_inner', [
        'bgImage' => asset('frontend/assets/home_page_images/hdr-montessori.png'),
        'title' => 'MONTESORRI',
        'subtitle' => 'Explore Our Academy',
        'showButton' => true,
        'buttonText' => 'Register My Child At This Location',
        'buttonLink' => route('frontend.locations'),
    ])

    <!-- Locations Virtual Tour Section -->
    <section class="virtual-tour-locations locations-page" id="locations">
        <div class="container">
            <!-- Montessori Location -->
            <div class="vt-location-block" id="montessori">
                @include('frontend.components.google-map', [
                    'address' => '2255 Countryside Blvd, Clearwater, FL 33763',
                ])
                <div class="vt-location-info">
                    <h2 class="vt-location-title">MONTESSORI</h2>
                    <div class="vt-contact-list">
                        <div class="vt-contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">LOCATION ADDRESS</span>
                                <span class="vt-contact-value">2255 Countryside Blvd, Clearwater, FL 33763</span>
                            </div>
                        </div>
                        <div class="vt-contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">PHONE</span>
                                <span class="vt-contact-value">(727) 799-7687</span>
                            </div>
                        </div>
                        <div class="vt-contact-item">
                            <i class="fas fa-fax"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">FAX</span>
                                <span class="vt-contact-value">(727) 799-7688</span>
                            </div>
                        </div>
                        <div class="vt-contact-item">
                            <i class="fas fa-envelope"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">EMAIL</span>
                                <span class="vt-contact-value">montessori@sproutacademy.com</span>
                            </div>
                        </div>
                        <div class="vt-contact-item">
                            <i class="fas fa-clock"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">HOURS OF OPERATION</span>
                                <span class="vt-contact-value">Monday - Friday: 7:00 AM - 6:00 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="vt-action-buttons">
                        <a href="#register" class="btn btn-enroll">Register Here</a>

                    </div>
                </div>
            </div>
            <section class="location-text">
                <div class="container">
                    <div class="location-text-content">
                        <p class="location-text-description">We are located directly off of Belleair road in Clearwater in
                            between Starkey and Belcher. At The Sprout Academy – Montessori we believe in the value and
                            uniqueness of each child we serve. Our childcare experience is designed to promote each child’s
                            own individual, social, emotional, physical, and cognitive development. As caregivers and
                            educators, our mission is to provide a safe and developmentally appropriate learning
                            environment, which fosters a child’s natural desire to explore, discover, create, and become a
                            lifelong learner.</p>
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
