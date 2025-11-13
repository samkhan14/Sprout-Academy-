@php
    $testimonials = [
        [
            'text' =>
                'Would recommend this school to anyone. My daughter loves it there. It\'s extremely clean organized and they are all very attentive and loving towards the children!',
            'author' => 'Stephanie L',
        ],
        [
            'text' =>
                'Would recommend this school to anyone. My daughter loves it there. It\'s extremely clean organized and they are all very attentive and loving towards the children!',
            'author' => 'Stephanie L',
        ],
        [
            'text' =>
                'Would recommend this school to anyone. My daughter loves it there. It\'s extremely clean organized and they are all very attentive and loving towards the children!',
            'author' => 'Stephanie L',
        ],
        [
            'text' =>
                'Would recommend this school to anyone. My daughter loves it there. It\'s extremely clean organized and they are all very attentive and loving towards the children!',
            'author' => 'Stephanie L',
        ],
        [
            'text' =>
                'Would recommend this school to anyone. My daughter loves it there. It\'s extremely clean organized and they are all very attentive and loving towards the children!',
            'author' => 'Stephanie L',
        ],
    ];
@endphp

<div class="testimonials-section-2">
    <section class="testimonials-section-v2" aria-label="Customer testimonials">
        <div class="container">
            {{-- Section Title --}}
            <h2 class="testimonials-v2-title">What Parents Are Saying</h2>

            <div class="testimonial-slider-v2">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-slide-v2">
                        <div class="testimonial-card-v2">
                            <div class="testimonial-quote-icon-v2">
                                <img src="{{ asset('frontend/assets/home_page_images/qoute.png') }}" alt="Quote">
                            </div>

                            <p class="testimonial-text-v2">{{ $testimonial['text'] }}</p>

                            <div class="testimonial-footer-v2">
                                <p class="testimonial-author-v2">{{ $testimonial['author'] }}</p>
                                <div class="testimonial-rating-v2" aria-label="5 out of 5 stars">★★★★★</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        // Initialize Testimonial Slider V2 (3 items, center active)
        if ($('.testimonial-slider-v2').length > 0) {
            $('.testimonial-slider-v2').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '0px',
                variableWidth: false,
                autoplay: true,
                autoplaySpeed: 3000,
                speed: 600,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            centerMode: true,
                            centerPadding: '0px'
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            centerMode: true,
                            centerPadding: '40px'
                        }
                    }
                ]
            });
            console.log('Testimonial Slider V2 Initialized');
        }
    </script>
@endpush
