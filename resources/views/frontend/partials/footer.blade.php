<!-- Newsletter Section -->
<section class="footer-newsletter">
    <div class="container">
        <div class="text-center">
            @include('frontend.components.section-heading', [
                'text' => 'Join Our Newsletter',
                'bgColor' => '#6daa44',
                'borderColor' => '#6CAA43',
                'rotation' => 'right',
            ])
        </div>
        <h2 class="newsletter-title">Stay Connected to The Sprout Academy!</h2>
        <form id="newsletterForm" class="newsletter-form needs-validation" method="POST"
            action="{{ route('form.subscribeNewsletter') }}" novalidate>
            @csrf
            <input type="text" class="newsletter-input" name="name" id="newsletterName" placeholder="Your Name"
                required aria-label="Your name">
            <input type="email" class="newsletter-input" name="email" id="newsletterEmail" placeholder="Your Email"
                required aria-label="Your email address">
            <button type="submit" class="btn btn-secondary" id="newsletterSubmitBtn">
                <span class="btn-text">Subscribe Now!</span>
                <span class="btn-spinner" style="display: none;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M21 12a9 9 0 11-6.219-8.56" />
                    </svg>
                </span>
            </button>
        </form>
        <div id="newsletterMessage" class="newsletter-message" style="display: none;"></div>
    </div>
</section>

<!-- Main Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- Brand Column -->
            <div class="footer-col">
                <a class="footer-brand" href="{{ route('frontend.home') }}">
                    <img src="{{ asset('frontend/assets/home_page_images/footer-logo.png') }}" alt="The Sprout Academy"
                        width="180" height="50" loading="lazy">
                </a>
                <p class="footer-description">
                    The Sprout Academy develops the whole child by meeting social, emotional, physical, and intellectual
                    needs through learning and growing every day.
                </p>
            </div>

            <!-- Quick Links Column -->
            <div class="footer-col">
                <h3 class="footer-title">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('frontend.ourPrograms') }}">Programs</a></li>
                    <li><a href="{{ route('frontend.enroll') }}">Enroll Now</a></li>
                    <li><a href="{{ route('frontend.locations') }}">Locations</a></li>
                    @auth
                        <li><a href="{{ route('frontend.employeeForms') }}">Employee Forms</a></li>
                    @endauth
                </ul>
            </div>

            <!-- Locations Column -->
            <div class="footer-col">
                <h3 class="footer-title">Our Locations</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('frontend.locationSeminole') }}">Seminole</a></li>
                    <li><a href="{{ route('frontend.locationClearwater') }}">St. Pete</a></li>
                    <li><a href="{{ route('frontend.locationPinellasPark') }}">Pinellas Park</a></li>
                    <li><a href="{{ route('frontend.locationLargo') }}">Largo</a></li>
                    <li><a href="{{ route('frontend.locationMontessori') }}">Montessori</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p class="mb-0">
                &copy; {{ date('Y') }} The Sprout Academy. All rights reserved.
            </p>
            <div class="d-none">
                <a href="#privacy">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>
