@extends('frontend.partials.master')

@section('title', 'We Care for Your Child')

@section('content')
    {{-- Header Section --}}
    @include('frontend.partials.header_inner', [
        'bgImage' => asset('frontend/assets/home_page_images/hdr-care-page.png'),
        'title' => 'Safety, & Nutrition',
        'showButton' => false,
        'subtitle' => 'Child Care',
    ])

    {{-- Why Choose Section --}}
    <section class="why-choose-section">
        <div class="container">
            <div class="section-heading-wrapper">
                <img src="{{ asset('frontend/assets/home_page_images/lock.png') }}" alt="Icon" class="section-icon-left">
                <h2 class="section-title">We Care for Your Child The Way
                    You Would</h2>
                <img src="{{ asset('frontend/assets/home_page_images/star.png') }}" alt="Icon" class="section-icon-right">
            </div>

            {{-- Video Player --}}
            <div class="video-showcase-main">
                <video class="main-video-player" poster="{{ asset('frontend/assets/home_page_images/singlevideo.png') }}"
                    controls preload="metadata">
                    <source src="{{ asset('frontend/assets/videos/sprout-academy-video.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <button class="video-play-btn-main" aria-label="Play video">
                    <span class="play-icon"></span>
                </button>
            </div>
        </div>
    </section>

@endsection
