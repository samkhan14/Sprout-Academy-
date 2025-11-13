@extends('frontend.partials.master')
@section('title', 'Meet the Team')
@section('content')

    {{-- Header Section --}}
    @include('frontend.partials.header_inner', [
        'bgImage' => asset('frontend/assets/home_page_images/hdr-team.png'),
        'title' => 'MEET THE TEAM',
        'subtitle' => 'Caring & Passionate',
        'text' => 'For our teachers, it’s more than a job—it’s inspiring and awakening wonder in every child.',
        'showButton' => false,
    ])

    <!-- From Our Founders Section -->
    <section class="founders-section mt-7" aria-labelledby="founders-heading">
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
                            'text' => 'Founders of The Sprout Academy',
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

    {{-- Team Members Section --}}
    <section class="team-members-section">
        <div class="container">
            <div class="team-members-grid">
                {{-- Team Member Card - Alicia Sanders --}}
                <div class="team-member-card">
                    <div class="team-member-header">
                        <img src="{{ asset('frontend/assets/home_page_images/lock.png') }}" alt="Icon"
                            class="team-role-icon">
                        <h3 class="team-role-title">District Manager</h3>
                    </div>
                    <div class="team-member-content">
                        <div class="team-member-info">
                            <h4 class="team-member-name">Alicia Sanders</h4>
                            <div class="team-contact-item">
                                <div class="contact-icon-wrapper">
                                    <i class="fas fa-solid fa-phone"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">PHONE:</span>
                                    <span class="contact-value">727-657-2327</span>
                                </div>
                            </div>
                            <div class="team-contact-item">
                                <div class="contact-icon-wrapper">
                                    <i class="fas fa-solid fa-envelope"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">EMAIL:</span>
                                    <span class="contact-value">Alicia@the-sprout-academy.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="team-member-photo">
                            <img src="{{ asset('frontend/assets/home_page_images/team2.png') }}" alt="Alicia Sanders">
                        </div>
                    </div>
                </div>

                {{-- Add more team member cards here with the same structure --}}
            </div>
        </div>
    </section>

    {{-- Directors Section --}}
    @include('frontend.components.directors-section')

    {{-- Learning Fun Accordion Section --}}
    <section class="learning-fun-wrapper">
        <div class="container">
            <div class="learning-fun-badge">
                @include('frontend.components.section-heading', [
                    'text' => 'Only the Best',
                    'bgColor' => '#6daa44',
                    'borderColor' => '#6CAA43',
                    'rotation' => 'left',
                ])
            </div>
        </div>
    </section>

    @include('frontend.components.accordion-section', [
        'sectionTitle' => 'WE KNOW HOW TO MAKE LEARNING FUN FOR KIDS',
        'leftIcon' => null,
        'rightIcon' => asset('frontend/assets/home_page_images/star.png'),
        'columns' => 1,
        'accordionItems' => [
            [
                'title' => 'CARING AND PASSIONATE',
                'content' =>
                    'The Sprout Academy child care centers\' early childhood teachers are passionate about your child\'s happiness, growth and safety, and providing a nurturing environment that cultivates self-esteem.',
                'expanded' => false,
            ],
            [
                'title' => 'HIGHLY TRAINED EARLY CHILDHOOD TEACHERS',
                'content' =>
                    'The Sprout Academy child care centers\' early childhood teachers are passionate about your child\'s happiness, growth and safety, and providing a nurturing environment that cultivates self-esteem.',
                'expanded' => false,
            ],
            [
                'title' => 'SMALL CLASS SIZE',
                'content' =>
                    'The Sprout Academy child care centers\' early childhood teachers are passionate about your child\'s happiness, growth and safety, and providing a nurturing environment that cultivates self-esteem.',
                'expanded' => false,
            ],
            [
                'title' => 'PARTNERING WITH FAMILIES',
                'content' =>
                    'The Sprout Academy child care centers\' early childhood teachers are passionate about your child\'s happiness, growth and safety, and providing a nurturing environment that cultivates self-esteem.',
                'expanded' => false,
            ],
        ],
    ])

    @include('frontend.components.footer-cta', [
        'bgImage' => asset('frontend/assets/home_page_images/cta-banner.png'),
        'fancytitle' => 'Inquire About Openings',
        'title' => 'FIND THE SPROUT ACADEMY LOCATION NEAREST YOU',
        'buttonText' => 'Enroll',
        'buttonLink' => route('frontend.locations'),
    ])


@endsection
