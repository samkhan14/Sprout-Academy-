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
                @forelse ($locations as $location)
                    @php
                        // Static images map based on location slug
                        $locationImages = [
                            'seminole' => 'sch-img-1.png',
                            'clearwater' => 'sch-img-2.png',
                            'pinellas_park' => 'sch-img-3.png',
                            'montessori' => 'sch-img-4.png',
                            'largo' => 'sch-img-5.png',
                            'st_petersburg' => 'sch-img-1.png',
                        ];
                        $imageName = $locationImages[$location->slug] ?? 'sch-img-1.png';
                    @endphp
                    <div class="location-card">
                        <div class="location-image-wrapper">
                            <img src="{{ asset('frontend/assets/home_page_images/' . $imageName) }}"
                                alt="The Sprout Academy {{ $location->name }} location exterior" class="location-image"
                                loading="lazy">
                        </div>
                        <div class="location-bar">
                            <span class="location-name">{{ strtoupper($location->name) }}</span>
                            <button class="location-toggle" aria-label="Toggle location details">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="location-overlay">
                            <div class="location-overlay-content">
                                <h3 class="location-overlay-title">{{ strtoupper($location->name) }}</h3>
                                <p class="location-overlay-address">{{ $location->address }}</p>
                                <a href="{{ route('enrollment.start', ['location' => $location->slug, 'ref' => 'enroll']) }}"
                                    class="btn btn-secondary">Schedule a Tour</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <p>No locations available at this time.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
