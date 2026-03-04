<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <p class="top-bar-text">Become a more confident parent through our valuable childcare resources.</p>
       <a href="{{ route('frontend.ourPrograms') }}" target="_blank"> <i class="fas fa-arrow-right"></i></a>
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
            <div class="collapse navbar-collapse justify-content-end" id="primaryNav">
                <ul class="navbar-nav align-items-lg-center">
                    <!-- For Parents - Dropdown -->
                    <li class="nav-item dropdown">
                        @php
                            $isParentsActive =
                                request()->routeIs('frontend.theSproutAcademyDifference') ||
                                request()->routeIs('frontend.meetTheTeam') ||
                                request()->routeIs('frontend.downloadForms');
                        @endphp
                        <a class="nav-link dropdown-toggle {{ $isParentsActive ? 'active' : '' }}" href="#"
                            id="parentsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            For Parents
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="parentsDropdown">
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.theSproutAcademyDifference') ? 'active' : '' }}"
                                    href="{{ route('frontend.theSproutAcademyDifference') }}"
                                    @if (request()->routeIs('frontend.theSproutAcademyDifference')) aria-current="page" @endif>The Sprout Academy
                                    Difference</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.meetTheTeam') ? 'active' : '' }}"
                                    href="{{ route('frontend.meetTheTeam') }}"
                                    @if (request()->routeIs('frontend.meetTheTeam')) aria-current="page" @endif>Meet the Team</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.downloadForms') ? 'active' : '' }}"
                                    href="{{ route('frontend.downloadForms') }}"
                                    @if (request()->routeIs('frontend.downloadForms')) aria-current="page" @endif>Download Forms</a></li>
                        </ul>
                    </li>

                    <!-- Programs & Curriculum - Dropdown -->
                    <li class="nav-item dropdown">
                        @php
                            $isProgramsActive =
                                request()->routeIs('frontend.ourPrograms') ||
                                request()->routeIs('frontend.infantToddlerEducation') ||
                                request()->routeIs('frontend.preschoolEarlyEducation') ||
                                request()->routeIs('frontend.educationFor512YearOld');
                        @endphp
                        <a class="nav-link dropdown-toggle {{ $isProgramsActive ? 'active' : '' }}"
                            id="programsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Programs & Curriculum
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="programsDropdown">
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.infantToddlerEducation') ? 'active' : '' }}"
                                    href="{{ route('frontend.infantToddlerEducation') }}"
                                    @if (request()->routeIs('frontend.infantToddlerEducation')) aria-current="page" @endif>Daycare (Age 2 & Under)
                                    </a>
                            </li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.preschoolEarlyEducation') ? 'active' : '' }}"
                                    href="{{ route('frontend.preschoolEarlyEducation') }}"
                                    @if (request()->routeIs('frontend.preschoolEarlyEducation')) aria-current="page" @endif>Preschool (3-5 years)
                                    </a>
                            </li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.educationFor512YearOld') ? 'active' : '' }}"
                                    href="{{ route('frontend.educationFor512YearOld') }}"
                                    @if (request()->routeIs('frontend.educationFor512YearOld')) aria-current="page" @endif>School age (5-12 years)
                                    </a>
                            </li>
                        </ul>
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
                        <a class="nav-link" href="https://sproutvine.com/" target="_blank">
                            <img src="{{ asset('frontend/assets/home_page_images/spr1.png') }}" alt="Sproutvine" class="menu-icon me-1" style="width: 20px; height: 20px; object-fit: contain;">
                            Sproutvine
                        </a>
                    </li>

                    <li class="nav-item sproutvine-link">
                        <a class="nav-link" href="https://thesproutstore.com/" target="_blank">
                            <img src="{{ asset('frontend/assets/home_page_images/spr-store.png') }}" alt="Store" class="menu-icon me-1" style="width: 20px; height: 20px; object-fit: contain;">
                            Sprout Store
                        </a>
                    </li>

                    <!-- Enroll Button (Teal) -->
                    <!-- <li class="nav-item ms-lg-3">
                        <a class="btn btn-enroll  @if (request()->routeIs('frontend.enroll')) active @endif"
                            href="{{ route('frontend.enroll') }}"
                            @if (request()->routeIs('frontend.enroll')) aria-current="page" @endif>Enroll</a>
                    </li> -->

                    <!-- Schedule a Tour Button (Orange) -->
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-foundation" href="{{ route('frontend.virtualTour') }}" target="_blank">Schedule a Tour &raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
