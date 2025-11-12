@php
    $testimonials = [
        [
            'headline' => 'I DRIVE A HALF HOUR OUT OF MY WAY',
            'text' => '"The Sprout Academy is the best. My son still talks about his time there. He just graduated Kindergarten but he will never forget his time at Sprout!"',
            'author' => 'THERESA C',
        ],
        [
            'headline' => 'I DRIVE A HALF HOUR OUT OF MY WAY',
            'text' => '"The Sprout Academy is the best. My son still talks about his time there. He just graduated Kindergarten but he will never forget his time at Sprout!"',
            'author' => 'THERESA C',
        ],
        [
            'headline' => 'I DRIVE A HALF HOUR OUT OF MY WAY',
            'text' => '"The Sprout Academy is the best. My son still talks about his time there. He just graduated Kindergarten but he will never forget his time at Sprout!"',
            'author' => 'THERESA C',
        ],
        [
            'headline' => 'I DRIVE A HALF HOUR OUT OF MY WAY',
            'text' => '"The Sprout Academy is the best. My son still talks about his time there. He just graduated Kindergarten but he will never forget his time at Sprout!"',
            'author' => 'THERESA C',
        ],
        [
            'headline' => 'I DRIVE A HALF HOUR OUT OF MY WAY',
            'text' => '"The Sprout Academy is the best. My son still talks about his time there. He just graduated Kindergarten but he will never forget his time at Sprout!"',
            'author' => 'THERESA C',
        ],
    ];
@endphp

<section class="testimonials-section" aria-label="Customer testimonials">
    <div class="container">
        <div class="testimonial-slider">
            @foreach ($testimonials as $testimonial)
                <div class="testimonial-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-quote-badge" aria-hidden="true"></div>
                        
                        <h3 class="testimonial-headline">{{ $testimonial['headline'] }}</h3>
                        
                        <p class="testimonial-text">{{ $testimonial['text'] }}</p>
                        
                        <div class="testimonial-footer">
                            <p class="testimonial-author">- {{ $testimonial['author'] }}</p>
                            <div class="testimonial-rating" aria-label="5 out of 5 stars">★★★★★</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
