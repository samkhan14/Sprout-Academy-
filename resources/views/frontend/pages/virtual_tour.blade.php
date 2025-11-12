@extends('frontend.partials.master')

@section('title', 'Virtual Tour')

@section('meta_description',
    'Take a virtual tour of The Sprout Academy locations. Explore our facilities and see why
    parents love our childcare centers.')

@section('content')

    <!-- Inner Page Header -->
    @include('frontend.partials.header_inner', [
        'bgImage' => asset('frontend/assets/home_page_images/hdr-virtualtour.png'),
        'title' => 'VIRTUAL TOURS',
        'subtitle' => 'Explore Our Academy',
        'showButton' => false,
        'buttonText' => 'Explore Our Academy',
        'buttonLink' => '#locations',
    ])

    <!-- Locations Virtual Tour Section -->
    <section class="virtual-tour-locations" id="locations">
        <div class="container">

            <!-- Seminole Location -->
            <div class="vt-location-block" id="seminole">
                <div class="vt-location-info">
                    <h2 class="vt-location-title">SEMINOLE</h2>

                    <div class="vt-contact-list">
                        <div class="vt-contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">LOCATION ADDRESS</span>
                                <span class="vt-contact-value">7985 113th St N, Seminole, FL 33772</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">PHONE</span>
                                <span class="vt-contact-value">(727) 953-5544</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-fax"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">FAX</span>
                                <span class="vt-contact-value">(727) 953-5545</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-envelope"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">EMAIL</span>
                                <span class="vt-contact-value">seminole@sproutacademy.com</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-clock"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">HOURS OF OPERATION</span>
                                <span class="vt-contact-value">Monday - Friday: 6:30 AM - 6:00 PM</span>
                            </div>
                        </div>
                    </div>

                    <div class="vt-action-buttons">
                        <a href="#register" class="btn btn-enroll">Register Here</a>
                        <a href="{{ route('frontend.locations') }}#seminole" class="btn btn-foundation">More Information</a>
                    </div>
                </div>

                <div class="vt-location-viewer">
                    <div class="vt-viewer-container">
                        <div class="vt-viewer-label">FRONT OFFICE</div>
                        <div class="vt-viewer-controls">
                            <button class="vt-control-btn" aria-label="Zoom in"><i class="fas fa-plus"></i></button>
                            <button class="vt-control-btn" aria-label="Zoom out"><i class="fas fa-minus"></i></button>
                            <button class="vt-control-btn" aria-label="Fullscreen"><i class="fas fa-expand"></i></button>
                        </div>
                        <img src="{{ asset('frontend/assets/home_page_images/vr1.png') }}" alt="Seminole Front Office"
                            class="vt-viewer-image">
                        <button class="vt-viewer-arrow" aria-label="View more">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Clearwater Location -->
            <div class="vt-location-block" id="clearwater">
                <div class="vt-location-info">
                    <h2 class="vt-location-title">CLEARWATER</h2>

                    <div class="vt-contact-list">
                        <div class="vt-contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">LOCATION ADDRESS</span>
                                <span class="vt-contact-value">2750 State Road 580, Clearwater, FL 33761</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">PHONE</span>
                                <span class="vt-contact-value">(727) 726-0777</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-fax"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">FAX</span>
                                <span class="vt-contact-value">(727) 726-0778</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-envelope"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">EMAIL</span>
                                <span class="vt-contact-value">clearwater@sproutacademy.com</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-clock"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">HOURS OF OPERATION</span>
                                <span class="vt-contact-value">Monday - Friday: 6:30 AM - 6:00 PM</span>
                            </div>
                        </div>
                    </div>

                    <div class="vt-action-buttons">
                        <a href="#register" class="btn btn-enroll">Register Here</a>
                        <a href="{{ route('frontend.locations') }}#clearwater" class="btn btn-foundation">More
                            Information</a>
                    </div>
                </div>

                <div class="vt-location-viewer">
                    <div class="vt-viewer-container">
                        <div class="vt-viewer-label">OFFICE ROOM</div>
                        <div class="vt-viewer-controls">
                            <button class="vt-control-btn" aria-label="Zoom in"><i class="fas fa-plus"></i></button>
                            <button class="vt-control-btn" aria-label="Zoom out"><i class="fas fa-minus"></i></button>
                            <button class="vt-control-btn" aria-label="Fullscreen"><i class="fas fa-expand"></i></button>
                        </div>
                        <img src="{{ asset('frontend/assets/home_page_images/vr2.png') }}" alt="Clearwater Office Room"
                            class="vt-viewer-image">
                        <button class="vt-viewer-arrow" aria-label="View more">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Pinellas Park Location -->
            <div class="vt-location-block" id="pinellas-park">
                <div class="vt-location-info">
                    <h2 class="vt-location-title">PINELLAS PARK</h2>

                    <div class="vt-contact-list">
                        <div class="vt-contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">LOCATION ADDRESS</span>
                                <span class="vt-contact-value">5995 Park Blvd, Pinellas Park, FL 33781</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">PHONE</span>
                                <span class="vt-contact-value">(727) 544-5437</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-fax"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">FAX</span>
                                <span class="vt-contact-value">(727) 544-5438</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-envelope"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">EMAIL</span>
                                <span class="vt-contact-value">pinellaspark@sproutacademy.com</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-clock"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">HOURS OF OPERATION</span>
                                <span class="vt-contact-value">Monday - Friday: 6:30 AM - 6:00 PM</span>
                            </div>
                        </div>
                    </div>

                    <div class="vt-action-buttons">
                        <a href="#register" class="btn btn-enroll">Register Here</a>
                        <a href="{{ route('frontend.locations') }}#pinellas-park" class="btn btn-foundation">More
                            Information</a>
                    </div>
                </div>

                <div class="vt-location-viewer">
                    <div class="vt-viewer-container">
                        <div class="vt-viewer-label">FRONT DOOR</div>
                        <div class="vt-viewer-controls">
                            <button class="vt-control-btn" aria-label="Zoom in"><i class="fas fa-plus"></i></button>
                            <button class="vt-control-btn" aria-label="Zoom out"><i class="fas fa-minus"></i></button>
                            <button class="vt-control-btn" aria-label="Fullscreen"><i class="fas fa-expand"></i></button>
                        </div>
                        <img src="{{ asset('frontend/assets/home_page_images/vr3.png') }}" alt="Pinellas Park Front Door"
                            class="vt-viewer-image">
                        <button class="vt-viewer-arrow" aria-label="View more">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Montessori Location -->
            <div class="vt-location-block" id="montessori">
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
                        <a href="{{ route('frontend.locations') }}#montessori" class="btn btn-foundation">More
                            Information</a>
                    </div>
                </div>

                <div class="vt-location-viewer">
                    <div class="vt-viewer-container">
                        <div class="vt-viewer-label">ENTRY DOOR</div>
                        <div class="vt-viewer-controls">
                            <button class="vt-control-btn" aria-label="Zoom in"><i class="fas fa-plus"></i></button>
                            <button class="vt-control-btn" aria-label="Zoom out"><i class="fas fa-minus"></i></button>
                            <button class="vt-control-btn" aria-label="Fullscreen"><i class="fas fa-expand"></i></button>
                        </div>
                        <img src="{{ asset('frontend/assets/home_page_images/vr4.png') }}" alt="Montessori Entry Door"
                            class="vt-viewer-image">
                        <button class="vt-viewer-arrow" aria-label="View more">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Largo Location -->
            <div class="vt-location-block" id="largo">
                <div class="vt-location-info">
                    <h2 class="vt-location-title">LARGO</h2>

                    <div class="vt-contact-list">
                        <div class="vt-contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">LOCATION ADDRESS</span>
                                <span class="vt-contact-value">1807 Clearwater Largo Rd, Largo, FL 33770</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">PHONE</span>
                                <span class="vt-contact-value">(727) 588-5550</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-fax"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">FAX</span>
                                <span class="vt-contact-value">(727) 588-5551</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-envelope"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">EMAIL</span>
                                <span class="vt-contact-value">largo@sproutacademy.com</span>
                            </div>
                        </div>

                        <div class="vt-contact-item">
                            <i class="fas fa-clock"></i>
                            <div class="vt-contact-details">
                                <span class="vt-contact-label">HOURS OF OPERATION</span>
                                <span class="vt-contact-value">Monday - Friday: 6:30 AM - 6:00 PM</span>
                            </div>
                        </div>
                    </div>

                    <div class="vt-action-buttons">
                        <a href="#register" class="btn btn-enroll">Register Here</a>
                        <a href="{{ route('frontend.locations') }}#largo" class="btn btn-foundation">More Information</a>
                    </div>
                </div>

                <div class="vt-location-viewer">
                    <div class="vt-viewer-container">
                        <div class="vt-viewer-label">FRONT DOOR</div>
                        <div class="vt-viewer-controls">
                            <button class="vt-control-btn" aria-label="Zoom in"><i class="fas fa-plus"></i></button>
                            <button class="vt-control-btn" aria-label="Zoom out"><i class="fas fa-minus"></i></button>
                            <button class="vt-control-btn" aria-label="Fullscreen"><i class="fas fa-expand"></i></button>
                        </div>
                        <img src="{{ asset('frontend/assets/home_page_images/vr5.png') }}" alt="Largo Front Door"
                            class="vt-viewer-image">
                        <button class="vt-viewer-arrow" aria-label="View more">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
