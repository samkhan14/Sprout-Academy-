<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <p class="top-bar-text">Become a more confident parent through our valuable childcare resources.</p>
        <i class="fas fa-arrow-right"></i>
    </div>
</div>

<!-- Skip Link for Accessibility -->
<a class="skip-link" href="#main-content">Skip to main content</a>

<!-- Main Header -->
<header class="site-header">
    <nav class="navbar navbar-expand-lg" aria-label="Primary navigation">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('frontend.home') }}">
                <img src="{{ asset('frontend/assets/home_page_images/header-logo-colored.png') }}"
                    alt="The Sprout Academy - Childcare and Early Education" loading="eager">
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNav"
                aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle navigation menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="primaryNav">
                <ul class="navbar-nav align-items-lg-center">
                    <!-- For Parents - Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('frontend.parents') ? 'active' : '' }}"
                            href="#" id="parentsDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            For Parents
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="parentsDropdown">
                            <li><a class="dropdown-item" href="{{ route('frontend.parents') }}">Parent Resources</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Parent Portal</a></li>
                            <li><a class="dropdown-item" href="#">Parent Testimonials</a></li>
                            <li><a class="dropdown-item" href="#">FAQ</a></li>
                        </ul>
                    </li>

                    <!-- Programs & Curriculum -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.programsAndCurriculum') ? 'active' : '' }}"
                            href="{{ route('frontend.programsAndCurriculum') }}"
                            @if (request()->routeIs('frontend.programsAndCurriculum')) aria-current="page" @endif>
                            Programs & Curriculum
                        </a>
                    </li>

                    <!-- Locations -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.locations') ? 'active' : '' }}"
                            href="{{ route('frontend.locations') }}"
                            @if (request()->routeIs('frontend.locations')) aria-current="page" @endif>
                            Locations
                        </a>
                    </li>

                    <!-- Sproutvine with Icon -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.sproutvine') ? 'active' : '' }}"
                            href="{{ route('frontend.sproutvine') }}"
                            @if (request()->routeIs('frontend.sproutvine')) aria-current="page" @endif>
                            <i class="fas fa-newspaper me-1"></i>
                            Sproutvine
                        </a>
                    </li>

                    <!-- Enroll Button (Teal) -->
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-enroll" href="#enroll">Enroll</a>
                    </li>

                    <!-- Sprout Foundation Button (Orange) -->
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-foundation" href="#foundation">Sprout Foundation</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
