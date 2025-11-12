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
        <form class="newsletter-form needs-validation" novalidate>
            <input type="text" class="newsletter-input" name="name" placeholder="Your Name" required
                aria-label="Your name">
            <input type="email" class="newsletter-input" name="email" placeholder="Your Email" required
                aria-label="Your email address">
            <button type="submit" class="btn btn-secondary">Subscribe Now!</button>
        </form>
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
                    <li><a href="{{ route('frontend.programsAndCurriculum') }}">Programs</a></li>
                    <li><a href="#enroll">Enroll Now</a></li>
                    <li><a href="{{ route('frontend.locations') }}">Locations</a></li>
                    {{-- <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li> --}}
                    {{-- <li><a href="#careers">Careers</a></li> --}}
                </ul>
            </div>

            <!-- Locations Column -->
            <div class="footer-col">
                <h3 class="footer-title">Our Locations</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('frontend.locations') }}#seminole">Seminole</a></li>
                    <li><a href="{{ route('frontend.locations') }}#st-pete">St. Pete</a></li>
                    <li><a href="{{ route('frontend.locations') }}#pinellas-park">Pinellas Park</a></li>
                    <li><a href="{{ route('frontend.locations') }}#largo">Largo</a></li>
                    <li><a href="{{ route('frontend.locations') }}#montessori">Montessori</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p class="mb-0">
                &copy; {{ date('Y') }} The Sprout Academy. All rights reserved.
            </p>
            <div>
                <a href="#privacy">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>
