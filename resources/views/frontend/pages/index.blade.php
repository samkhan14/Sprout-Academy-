@extends('frontend.partials.master')

@section('title', 'Home')

@section('meta_description',
    'The Sprout Academy develops the whole child by meeting social, emotional, physical, and
    intellectual needs through learning and growing every day.')

@section('content')

    <!-- Hero Section -->
    <section class="hero-section"
        style="background-image: url('{{ asset('frontend/assets/home_page_images/hero-img.png') }}');"
        aria-label="Hero banner">
        <div class="container">
            <div class="hero-content">
                @include('frontend.components.green-badge', ['text' => 'WE GUIDE'])
                <h1 class="hero-title">CHILDREN IN THE <br> RIGHT DIRECTION</h1>
                {{-- <a href="#tour" class="btn btn-secondary btn-lg">Schedule a Tour</a> --}}
                <a href="#tour" class="btn btn-foundation btn-lg">Schedule a Tour</a>
            </div>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section class="mission-section" aria-labelledby="mission-heading">
        <div class="container">
            <div class="mission-content">
                <span class="section-label">Our Mission</span>
                <p class="mission-text">
                    The Sprout Academy develops the whole child by meeting social, emotional, physical, and intellectual
                    needs through learning and growing every day.
                </p>
            </div>
        </div>
    </section>

    <!-- Three Easy Steps Section -->
    <section class="steps-section section" aria-labelledby="steps-heading">
        <div class="container">
            <h2 id="steps-heading" class="section-title">THREE EASY STEPS</h2>

            <div class="steps-container">
                <!-- Step 1 -->
                <div class="step-item">
                    <div class="step-icon blue" aria-hidden="true">
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2ZM12 11.5C10.62 11.5 9.5 10.38 9.5 9C9.5 7.62 10.62 6.5 12 6.5C13.38 6.5 14.5 7.62 14.5 9C14.5 10.38 13.38 11.5 12 11.5Z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <h3 class="step-title">CHOOSE LOCATION</h3>
                    <p class="step-description">Start by choosing a location.</p>
                </div>

                <!-- Step 2 -->
                <div class="step-item">
                    <div class="step-icon orange" aria-hidden="true">
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 4C16.55 4 17 4.45 17 5V6H19C20.1 6 21 6.9 21 8V19C21 20.1 20.1 21 19 21H5C3.9 21 3 20.1 3 19V8C3 6.9 3.9 6 5 6H7V5C7 4.45 7.45 4 8 4C8.55 4 9 4.45 9 5V6H15V5C15 4.45 15.45 4 16 4ZM5 10V19H19V10H5ZM12 13C13.66 13 15 14.34 15 16C15 17.66 13.66 19 12 19C10.34 19 9 17.66 9 16C9 14.34 10.34 13 12 13Z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <h3 class="step-title">SCHEDULE A TOUR</h3>
                    <p class="step-description">Schedule a tour and experience.</p>
                </div>

                <!-- Step 3 -->
                <div class="step-item">
                    <div class="step-icon green" aria-hidden="true">
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <h3 class="step-title">RELAX</h3>
                    <p class="step-description">Know your child is in good hands.</p>
                </div>
            </div>

            <div class="steps-cta">
                <p class="steps-cta-text">So, what are you waiting for?</p>
                <a href="#tour" class="btn btn-secondary btn-lg">Schedule a Tour</a>
            </div>
        </div>
    </section>

    <!-- Accreditation Section -->
    <section class="accreditation-section" aria-labelledby="accreditation-heading">
        <div class="container">
            <h2 id="accreditation-heading" class="accreditation-title section-title">ACCREDITED, AWARDED, & LICENSED</h2>

            <div class="accreditation-grid">
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif1.png') }}" alt="Florida VPK Accreditation"
                        loading="lazy">
                </div>
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif2.png') }}"
                        alt="Florida Health Certification" loading="lazy">
                </div>
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif3.png') }}" alt="APPLE Accreditation"
                        loading="lazy">
                </div>
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif4.png') }}" alt="USDA Certification"
                        loading="lazy">
                </div>
                <div class="accreditation-card">
                    <img src="{{ asset('frontend/assets/home_page_images/certif5.png') }}"
                        alt="Early Learning Coalition of Pinellas County" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Why Parents Love Us / Testimonials Section -->
    <section class="testimonials-section section" aria-labelledby="testimonials-heading">
        <div class="container">
            <div class="testimonial-header">
                <h2 id="testimonials-heading" class="section-title">WANT TO SEE WHY PARENTS LOVE US?</h2>
            </div>

            <div class="row mb-5">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <span class="section-label">Why The Sprout Academy?</span>
                    <h3 class="display-6 fw-bold mb-3">YOUR CHILD WON'T COME HOME A MESS</h3>
                    <p class="lead">
                        We believe in hands-on learning that engages children's curiosity while maintaining a clean,
                        organized environment. Our innovative approach ensures your child explores, learns, and grows
                        without the mess.
                    </p>
                </div>
                <div class="col-lg-7">
                    <div class="video-showcase">
                        <img src="{{ asset('frontend/assets/home_page_images/singlevideo.png') }}"
                            alt="Children engaged in sensory learning activities" loading="lazy">
                        <button class="video-play-btn" aria-label="Play video about our learning approach">
                            <span class="visually-hidden">Play video</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Image Carousel -->
            <div class="testimonial-carousel mb-5" role="region" aria-label="Photo gallery">
                <img src="{{ asset('frontend/assets/home_page_images/vdo-img1.png') }}"
                    alt="Child enjoying sensory play activities" loading="lazy">
                <img src="{{ asset('frontend/assets/home_page_images/vdo-img2.png') }}"
                    alt="Happy child at learning table" loading="lazy">
                <img src="{{ asset('frontend/assets/home_page_images/vdo-img1.png') }}"
                    alt="Child building with colorful blocks" loading="lazy">
            </div>

            <!-- Testimonial Cards -->
            <div class="testimonial-cards">
                <div class="testimonial-card">
                    <div class="testimonial-quote-icon" aria-hidden="true">"</div>
                    <p class="testimonial-text">
                        "The Sprout Academy has been a blessing for our family. The teachers are caring and professional,
                        and our daughter loves going every day!"
                    </p>
                    <p class="testimonial-author">SARAH M.</p>
                    <div class="testimonial-rating" aria-label="5 out of 5 stars">
                        ★★★★★
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-quote-icon" aria-hidden="true">"</div>
                    <p class="testimonial-text">
                        "We couldn't be happier with the education and care our son receives. The curriculum is engaging and
                        age-appropriate."
                    </p>
                    <p class="testimonial-author">MICHAEL T.</p>
                    <div class="testimonial-rating" aria-label="5 out of 5 stars">
                        ★★★★★
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-quote-icon" aria-hidden="true">"</div>
                    <p class="testimonial-text">
                        "The facilities are clean, safe, and welcoming. We feel confident knowing our children are in such
                        good hands every day."
                    </p>
                    <p class="testimonial-author">JENNIFER L.</p>
                    <div class="testimonial-rating" aria-label="5 out of 5 stars">
                        ★★★★★
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- From Our Founders Section -->
    <section class="founders-section section" aria-labelledby="founders-heading">
        <div class="container">
            <div class="founders-container">
                <div class="founders-image">
                    <img src="{{ asset('frontend/assets/home_page_images/founder-img.png') }}"
                        alt="Justin and Rachel, founders of The Sprout Academy" loading="lazy">
                </div>
                <div class="founders-content">
                    <span class="section-label">About</span>
                    <h2 id="founders-heading" class="founders-title">From Our Founders</h2>
                    <p class="founders-text">
                        We started The Sprout Academy with a simple mission: to provide a nurturing environment where every
                        child can grow, learn, and thrive. Our commitment to excellence in early childhood education drives
                        everything we do, from our carefully designed curriculum to our passionate team of educators.
                    </p>
                    <p class="founders-text">
                        Every day, we're honored to be part of your child's journey and to watch them blossom into
                        confident, curious learners.
                    </p>
                    <p class="founders-signature">- Justin & Rachel</p>
                    <svg class="founders-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                            fill="currentColor" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Spots Are Limited / Locations Section -->
    <section class="locations-section section" aria-labelledby="locations-heading">
        <div class="container">
            <div class="locations-header">
                <h2 id="locations-heading" class="section-title">SPOTS ARE LIMITED!</h2>
                <p class="locations-subtitle">Schedule a tour to enroll today.</p>
            </div>

            <div class="locations-grid">
                <!-- Seminole -->
                <div class="location-card">
                    <img src="{{ asset('frontend/assets/home_page_images/sch-img-1.png') }}"
                        alt="The Sprout Academy Seminole location exterior" class="location-image" loading="lazy">
                    <div class="location-info">
                        <h3 class="location-name">Seminole</h3>
                        <a href="{{ route('frontend.locations') }}#seminole" class="btn btn-primary location-btn">View
                            Details</a>
                    </div>
                </div>

                <!-- St. Pete (Featured) -->
                <div class="location-card featured">
                    <img src="{{ asset('frontend/assets/home_page_images/sch-img-2.png') }}"
                        alt="The Sprout Academy St. Pete location exterior" class="location-image" loading="lazy">
                    <div class="location-info">
                        <h3 class="location-name">ST. PETE</h3>
                        <p class="location-address">1970 54th Ave. N, St. Petersburg, FL 33714</p>
                        <a href="{{ route('frontend.locations') }}#st-pete" class="btn btn-secondary location-btn">Tour
                            This
                            Center</a>
                    </div>
                </div>

                <!-- Pinellas Park -->
                <div class="location-card">
                    <img src="{{ asset('frontend/assets/home_page_images/sch-img-3.png') }}"
                        alt="The Sprout Academy Pinellas Park location exterior" class="location-image" loading="lazy">
                    <div class="location-info">
                        <h3 class="location-name">Pinellas Park</h3>
                        <a href="{{ route('frontend.locations') }}#pinellas-park"
                            class="btn btn-primary location-btn">View
                            Details</a>
                    </div>
                </div>

                <!-- Montessori -->
                <div class="location-card">
                    <img src="{{ asset('frontend/assets/home_page_images/sch-img-4.png') }}"
                        alt="The Sprout Academy Montessori location exterior" class="location-image" loading="lazy">
                    <div class="location-info">
                        <h3 class="location-name">Montessori</h3>
                        <a href="{{ route('frontend.locations') }}#montessori" class="btn btn-primary location-btn">View
                            Details</a>
                    </div>
                </div>

                <!-- Largo -->
                <div class="location-card">
                    <img src="{{ asset('frontend/assets/home_page_images/sch-img-5.png') }}"
                        alt="The Sprout Academy Largo location exterior" class="location-image" loading="lazy">
                    <div class="location-info">
                        <h3 class="location-name">Largo</h3>
                        <a href="{{ route('frontend.locations') }}#largo" class="btn btn-primary location-btn">View
                            Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
