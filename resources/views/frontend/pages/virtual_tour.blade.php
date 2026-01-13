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
            @forelse ($locations as $index => $location)
                @php
                    // Static image mapping based on location slug
                    $staticImages = [
                        'seminole' => ['image' => 'vr1.png', 'label' => 'FRONT OFFICE'],
                        'pinellas-park' => ['image' => 'vr3.png', 'label' => 'FRONT DOOR'],
                        'montessori' => ['image' => 'vr4.png', 'label' => 'ENTRY DOOR'],
                        'largo' => ['image' => 'vr5.png', 'label' => 'FRONT DOOR'],
                        'st-petersburg' => ['image' => 'vr3.png', 'label' => 'FRONT OFFICE'],
                    ];
                    $staticImage = $staticImages[$location->slug] ?? ['image' => null, 'label' => null];
                @endphp

                <div class="vt-location-block" id="{{ $location->slug }}">
                    @if ($index % 2 == 1)
                        {{-- Viewer first for odd indices (Montessori pattern) --}}
                        @if ($staticImage['image'])
                            <div class="vt-location-viewer">
                                <div class="vt-viewer-container">
                                    <div class="vt-viewer-label">{{ $staticImage['label'] }}</div>
                                    <div class="vt-viewer-controls">
                                        <button class="vt-control-btn" aria-label="Zoom in"><i
                                                class="fas fa-plus"></i></button>
                                        <button class="vt-control-btn" aria-label="Zoom out"><i
                                                class="fas fa-minus"></i></button>
                                        <button class="vt-control-btn" aria-label="Fullscreen"><i
                                                class="fas fa-expand"></i></button>
                                    </div>
                                    <img src="{{ asset('frontend/assets/home_page_images/' . $staticImage['image']) }}"
                                        alt="{{ $location->name }} Virtual Tour" class="vt-viewer-image">
                                    <button class="vt-viewer-arrow" aria-label="View more">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endif

                    <div class="vt-location-info">
                        <h2 class="vt-location-title">{{ $location->name }}</h2>
                        <div class="vt-contact-list">
                            <div class="vt-contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="vt-contact-details">
                                    <span class="vt-contact-label">LOCATION ADDRESS</span>
                                    <span class="vt-contact-value">{{ $location->address }}</span>
                                </div>
                            </div>
                            @if ($location->phone)
                                <div class="vt-contact-item">
                                    <i class="fas fa-phone-alt"></i>
                                    <div class="vt-contact-details">
                                        <span class="vt-contact-label">PHONE</span>
                                        <span class="vt-contact-value">{{ $location->phone }}</span>
                                    </div>
                                </div>
                            @endif
                            @if ($location->fax)
                                <div class="vt-contact-item">
                                    <i class="fas fa-fax"></i>
                                    <div class="vt-contact-details">
                                        <span class="vt-contact-label">FAX</span>
                                        <span class="vt-contact-value">{{ $location->fax }}</span>
                                    </div>
                                </div>
                            @endif
                            @if ($location->email)
                                <div class="vt-contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <div class="vt-contact-details">
                                        <span class="vt-contact-label">EMAIL</span>
                                        <span class="vt-contact-value">{{ $location->email }}</span>
                                    </div>
                                </div>
                            @endif
                            @if ($location->hours_of_operation)
                                <div class="vt-contact-item">
                                    <i class="fas fa-clock"></i>
                                    <div class="vt-contact-details">
                                        <span class="vt-contact-label">HOURS OF OPERATION</span>
                                        <span class="vt-contact-value">{!! nl2br(e($location->hours_of_operation)) !!}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="vt-action-buttons">
                            <a href="{{ route('enrollment.start', ['location' => $location->slug, 'ref' => 'virtual-tour']) }}"
                                class="btn btn-enroll">Register Here</a>

                            @php
                                $routeMap = [
                                    'seminole' => 'frontend.locationSeminole',
                                    'st-petersburg' => 'frontend.locationStPetersburg',
                                    'pinellas-park' => 'frontend.locationPinellasPark',
                                    'montessori' => 'frontend.locationMontessori',
                                    'largo' => 'frontend.locationLargo',
                                ];
                                $routeName = $routeMap[$location->slug] ?? null;
                            @endphp
                            @if ($routeName && Route::has($routeName))
                                <a href="{{ route($routeName) }}" class="btn btn-foundation">More Information</a>
                            @endif
                        </div>
                    </div>

                    @if ($index % 2 == 0)
                        {{-- Viewer second for even indices (Seminole, Pinellas Park, Largo pattern) --}}
                        @if ($staticImage['image'])
                            <div class="vt-location-viewer">
                                <div class="vt-viewer-container">
                                    <div class="vt-viewer-label">{{ $staticImage['label'] }}</div>
                                    <div class="vt-viewer-controls">
                                        <button class="vt-control-btn" aria-label="Zoom in"><i
                                                class="fas fa-plus"></i></button>
                                        <button class="vt-control-btn" aria-label="Zoom out"><i
                                                class="fas fa-minus"></i></button>
                                        <button class="vt-control-btn" aria-label="Fullscreen"><i
                                                class="fas fa-expand"></i></button>
                                    </div>
                                    <img src="{{ asset('frontend/assets/home_page_images/' . $staticImage['image']) }}"
                                        alt="{{ $location->name }} Virtual Tour" class="vt-viewer-image">
                                    <button class="vt-viewer-arrow" aria-label="View more">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            @empty
                <div class="text-center py-5">
                    <p>No locations available at this time.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
