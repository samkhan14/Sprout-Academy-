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
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.virtualTour') ? 'active' : '' }}"
                                    href="{{ route('frontend.virtualTour') }}"
                                    @if (request()->routeIs('frontend.virtualTour')) aria-current="page" @endif>Virtual
                                    Tour</a>
                            </li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.theSproutAcademyDifference') ? 'active' : '' }}"
                                    href="{{ route('frontend.theSproutAcademyDifference') }}"
                                    @if (request()->routeIs('frontend.theSproutAcademyDifference')) aria-current="page" @endif>The Sprout Academy
                                    Difference</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.weCareForYourChild') ? 'active' : '' }}"
                                    href="{{ route('frontend.weCareForYourChild') }}"
                                    @if (request()->routeIs('frontend.weCareForYourChild')) aria-current="page" @endif>We Care for Your
                                    Child</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.tuitionCosts') ? 'active' : '' }}"
                                    href="{{ route('frontend.tuitionCosts') }}"
                                    @if (request()->routeIs('frontend.tuitionCosts')) aria-current="page" @endif>Tuition Costs</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.meetTheTeam') ? 'active' : '' }}"
                                    href="{{ route('frontend.meetTheTeam') }}"
                                    @if (request()->routeIs('frontend.meetTheTeam')) aria-current="page" @endif>Meet the Team</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.meetTheOwner') ? 'active' : '' }}"
                                    href="{{ route('frontend.meetTheOwner') }}"
                                    @if (request()->routeIs('frontend.meetTheOwner')) aria-current="page" @endif>Meet the Owner</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.downloadForms') ? 'active' : '' }}"
                                    href="{{ route('frontend.downloadForms') }}"
                                    @if (request()->routeIs('frontend.downloadForms')) aria-current="page" @endif>Download Forms</a></li>
                        </ul>
                    </li>

                    <!-- Programs & Curriculum -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.ourPrograms') ? 'active' : '' }}"
                            href="{{ route('frontend.ourPrograms') }}"
                            @if (request()->routeIs('frontend.ourPrograms')) aria-current="page" @endif>
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
                    <li class="nav-item sproutvine-link">
                        <a class="nav-link {{ request()->routeIs('frontend.sproutvine') ? 'active' : '' }}"
                            href="#" @if (request()->routeIs('frontend.sproutvine')) aria-current="page" @endif>
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
