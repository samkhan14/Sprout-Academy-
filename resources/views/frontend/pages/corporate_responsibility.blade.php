@extends('frontend.partials.master')

@section('title', 'Corporate Responsibility')

@section('content')
    {{-- Hero Section --}}
    @include('frontend.partials.header_inner', [
        'bgImage' => asset('frontend/assets/home_page_images/hdr-bg-corporate.png'),
        'title' => "THE SPROUT ACADEMY'S GOALS, VALUES, AND BELIEFS",
        'showButton' => false,
    ])

    {{-- Philosophy Section - light teal box, sprout left + text right --}}
    <section class="corp-philosophy-section">
        <div class="container">
            <div class="corp-philosophy-box">
                <div class="corp-philosophy-graphic">
                    <img src="{{ asset('frontend/assets/home_page_images/tree-layer.png') }}" alt="Sprout Academy" class="corp-sprout-graphic" loading="lazy">
                </div>
                <div class="corp-philosophy-content">
                    <p class="corp-philosophy-p">
                        Our goal at The Sprout Academy is simple - extraordinary customer service by providing outstanding teachers for the families of the children that we take care of in our centers. We accomplish this by hiring and retaining the highest qualified childcare educators in the industry.
                    </p>
                    <p class="corp-philosophy-p">
                        The Sprout Academy is built upon a set of five Core Values which, when taken together, guide us to consistently maintain our focus and achieve our vision; Employee Success, Family Success, Social Awareness, Fiscal Responsibility, and Technical Excellence.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Core Values Timeline --}}
    {{-- <section class="corp-values-timeline-section">
        <div class="container">
            <div class="corp-timeline-line"></div>

            @php
                $values = [
                    ['num' => '01', 'color' => 'orange', 'title' => 'EMPLOYEE SUCCESS', 'text' => 'We are committed to the growth, well-being, and professional development of our employees. By investing in our team, we create a positive and effective learning environment for every child.', 'image' => 'frontend/assets/home_page_images/team1.png', 'align' => 'left'],
                    ['num' => '02', 'color' => 'blue', 'title' => 'FAMILY SUCCESS', 'text' => 'We are dedicated to supporting families and fostering strong parent-school partnerships. We believe that when families and educators work together, children achieve their fullest potential in a supportive community.', 'image' => 'frontend/assets/home_page_images/owner-family-pic.png', 'align' => 'right'],
                    ['num' => '03', 'color' => 'green', 'title' => 'SOCIAL AWARENESS', 'text' => 'We promote empathy, respect, and understanding among our students. We prepare them to become responsible and caring citizens who contribute positively to their communities and the world.', 'image' => 'frontend/assets/home_page_images/edu-1.png', 'align' => 'left'],
                    ['num' => '04', 'color' => 'teal', 'title' => 'FISCAL RESPONSIBILITY', 'text' => 'We manage our resources with transparency and integrity. We are committed to sustainable and ethical financial practices that ensure long-term stability and the best outcomes for our students and staff.', 'image' => 'frontend/assets/home_page_images/edu-2.png', 'align' => 'right'],
                    ['num' => '05', 'color' => 'orange', 'title' => 'TECHNICAL EXCELLENCE', 'text' => 'We embrace innovation and technology to enhance learning. We equip our students with the skills and tools they need to succeed in a rapidly evolving digital world.', 'image' => 'frontend/assets/home_page_images/bulb1.png', 'align' => 'left'],
                ];
            @endphp

            @foreach ($values as $item)
                <div class="corp-timeline-item corp-timeline-item--{{ $item['align'] }}">
                    <div class="corp-timeline-content-wrapper">
                        @if ($item['align'] === 'left')
                            <div class="corp-timeline-text">
                                <h3 class="corp-timeline-title">{{ $item['title'] }}</h3>
                                <p class="corp-timeline-para">{{ $item['text'] }}</p>
                            </div>
                            <div class="corp-timeline-visual">
                                <img src="{{ asset($item['image']) }}" alt="" class="corp-timeline-img" loading="lazy">
                            </div>
                        @else
                            <div class="corp-timeline-visual">
                                <img src="{{ asset($item['image']) }}" alt="" class="corp-timeline-img" loading="lazy">
                            </div>
                            <div class="corp-timeline-text">
                                <h3 class="corp-timeline-title">{{ $item['title'] }}</h3>
                                <p class="corp-timeline-para">{{ $item['text'] }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="corp-timeline-marker corp-timeline-marker--{{ $item['color'] }}">
                        <span>{{ $item['num'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section> --}}


    {{-- Core Values Timeline (5 values, alternating left/right; you can replace images) --}}
    <section class="difference-timeline-wrapper">
        <div class="container">
            <div class="timeline-line"></div>

            {{-- 01: Employee Success - Text Left, Image Right --}}
            <div class="timeline-section">
                <div class="timeline-content-wrapper left-content">
                    <div class="timeline-text">
                        <h3 class="timeline-heading">EMPLOYEE SUCCESS</h3>
                        <p class="timeline-paragraph">
                            We are committed to the growth, well-being, and professional development of our employees. By investing in our team, we create a positive and effective learning environment for every child.
                        </p>
                    </div>
                    <div class="timeline-image">
                        <div class="timeline-image-spacing">
                            <img src="{{ asset('frontend/assets/home_page_images/corporate-img-1.png') }}" alt="Employee Success">
                        </div>
                    </div>
                </div>
                <div class="timeline-icon-center">
                    <img src="{{ asset('frontend/assets/home_page_images/timeline-icon1.png') }}" alt="01">
                </div>
            </div>

            {{-- 02: Family Success - Image Left, Text Right --}}
            <div class="timeline-section">
                <div class="timeline-content-wrapper right-content">
                    <div class="timeline-image">
                        <div class="timeline-image-spacing">
                            <img src="{{ asset('frontend/assets/home_page_images/corporate-img-2.png') }}" alt="Family Success">
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h3 class="timeline-heading">FAMILY SUCCESS</h3>
                        <p class="timeline-paragraph">
                            We are dedicated to supporting families and fostering strong parent-school partnerships. We believe that when families and educators work together, children achieve their fullest potential in a supportive community.
                        </p>
                    </div>
                </div>
                <div class="timeline-icon-center">
                    <img src="{{ asset('frontend/assets/home_page_images/timeline-icon2.png') }}" alt="02">
                </div>
            </div>

            {{-- 03: Social Awareness - Text Left, Image Right --}}
            <div class="timeline-section">
                <div class="timeline-content-wrapper left-content">
                    <div class="timeline-text">
                        <h3 class="timeline-heading">SOCIAL AWARENESS</h3>
                        <p class="timeline-paragraph">
                            We promote empathy, respect, and understanding among our students. We prepare them to become responsible and caring citizens who contribute positively to their communities and the world.
                        </p>
                    </div>
                    <div class="timeline-image">
                        <div class="timeline-image-spacing">
                            <img src="{{ asset('frontend/assets/home_page_images/corporate-img-3.png') }}" alt="Social Awareness">
                        </div>
                    </div>
                </div>
                <div class="timeline-icon-center">
                    <img src="{{ asset('frontend/assets/home_page_images/timeline-icon3.png') }}" alt="03">
                </div>
            </div>

            {{-- 04: Fiscal Responsibility - Image Left, Text Right --}}
            <div class="timeline-section">
                <div class="timeline-content-wrapper right-content">
                    <div class="timeline-image">
                        <div class="timeline-image-spacing">
                            <img src="{{ asset('frontend/assets/home_page_images/corporate-img-4.png') }}" alt="Fiscal Responsibility">
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h3 class="timeline-heading">FISCAL RESPONSIBILITY</h3>
                        <p class="timeline-paragraph">
                            We manage our resources with transparency and integrity. We are committed to sustainable and ethical financial practices that ensure long-term stability and the best outcomes for our students and staff.
                        </p>
                    </div>
                </div>
                <div class="timeline-icon-center">
                    <img src="{{ asset('frontend/assets/home_page_images/timeline-icon4.png') }}" alt="04">
                </div>
            </div>

            {{-- 05: Technical Excellence - Text Left, Image Right --}}
            <div class="timeline-section">
                <div class="timeline-content-wrapper left-content">
                    <div class="timeline-text">
                        <h3 class="timeline-heading">TECHNICAL EXCELLENCE</h3>
                        <p class="timeline-paragraph">
                            We embrace innovation and technology to enhance learning. We equip our students with the skills and tools they need to succeed in a rapidly evolving digital world.
                        </p>
                    </div>
                    <div class="timeline-image">
                        <div class="timeline-image-spacing">
                            <img src="{{ asset('frontend/assets/home_page_images/corporate-img-1.png') }}" alt="Technical Excellence">
                        </div>
                    </div>
                </div>
                <div class="timeline-icon-center">
                    <img src="{{ asset('frontend/assets/home_page_images/timeline-icon5.png') }}" alt="05">
                </div>
            </div>
        </div>
    </section>

    {{-- Commitment Section --}}
    <section class="corp-commitment-section">
        <div class="container">
            <h2 class="corp-commitment-heading">OUR GOALS ARE ACCOMPLISHED BY A COMMITMENT FROM EVERY EMPLOYEE. OUR BELIEFS AND VALUES REQUIRE THAT WE:</h2>
            <ul class="corp-commitment-list">
                <li>Treat every employee with respect, fairness, and support, fostering a culture of collaboration and growth.</li>
                <li>Partner with families to support each child's development and ensure their success in and out of the classroom.</li>
                <li>Engage with our communities and promote social responsibility, diversity, and inclusion in all that we do.</li>
            </ul>
        </div>
    </section>

    {{-- Footer CTA / Newsletter is included via master layout --}}
@endsection
