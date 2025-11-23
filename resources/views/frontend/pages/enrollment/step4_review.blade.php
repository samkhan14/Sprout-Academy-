@extends('frontend.partials.master')

@section('title', 'Enrollment - Review - ' . $locationData['name'])

@section('content')
    <!-- Inner Page Header -->
    <section class="enrollment-header" style="background: linear-gradient(90deg, #1a5f7a 0%, #6daa44 100%);">
        <div class="container">
            <h1 class="enrollment-header-title">THE SPROUT ACADEMY - {{ $locationData['name'] }}</h1>
        </div>
    </section>

    <!-- Enrollment Review Section -->
    <section class="enrollment-review-section">
        <div class="container">
            <div class="enrollment-review-wrapper">
                <!-- Progress Bar -->
                @include('frontend.components.enrollment.progress-bar', ['currentStep' => $currentStep])

                <!-- Review Content -->
                <div class="review-content">
                    <!-- Left Column - Location Info -->
                    <div class="review-left">
                        <div class="location-info-card">
                            <div class="location-info-item">
                                <i class="fas fa-map-marker-alt location-icon"></i>
                                <div class="location-info-details">
                                    <span class="location-label">LOCATION ADDRESS:</span>
                                    <span class="location-value">{{ $locationData['address'] }}</span>
                                </div>
                            </div>
                            <div class="location-info-item">
                                <i class="fas fa-phone location-icon"></i>
                                <div class="location-info-details">
                                    <span class="location-label">PHONE:</span>
                                    <span class="location-value">{{ $locationData['phone'] }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Map -->
                        @include('frontend.components.google-map', [
                            'address' => $locationData['map_address'],
                        ])
                    </div>

                    <!-- Right Column - Review Cards -->
                    <div class="review-right">
                        <!-- ACCOUNT INFO -->
                        @php
                            $primaryContact = $enrollment ? $enrollment->contacts->where('is_primary', true)->first() : null;
                        @endphp
                        @if ($enrollment && $primaryContact)
                            <div class="review-card">
                                <div class="review-card-header">
                                    <h3 class="review-card-title">ACCOUNT INFO</h3>
                                    <button type="button" class="btn-edit-card" onclick="window.location.href='{{ route('enrollment.form', ['location' => $location]) }}'">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </div>
                                <div class="review-card-content">
                                    <div class="review-profile">
                                        <img src="{{ ($primaryContact && $primaryContact->profile_image) ? \Illuminate\Support\Facades\Storage::url($primaryContact->profile_image) : asset('frontend/assets/images/default-profile.png') }}" 
                                            alt="{{ ($primaryContact && $primaryContact->first_name) ? $primaryContact->first_name : 'Profile' }}" class="review-profile-image" />
                                        <div class="review-profile-info">
                                            <div class="review-name">{{ ($primaryContact && $primaryContact->first_name) ? $primaryContact->first_name : 'N/A' }}</div>
                                            <div class="review-detail">{{ ($primaryContact && $primaryContact->gender) ? ucfirst($primaryContact->gender) : 'Not Specified' }}</div>
                                            <div class="review-detail">
                                                {{ ($primaryContact && $primaryContact->date_of_birth) ? $primaryContact->date_of_birth->format('F d, Y') : 'DOB not Specified' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- CHILDREN INFO -->
                        @if ($enrollment && $enrollment->children && count($enrollment->children) > 0)
                            @foreach ($enrollment->children as $child)
                                <div class="review-card">
                                    <div class="review-card-header">
                                        <h3 class="review-card-title">CHILDREN INFO</h3>
                                        <button type="button" class="btn-edit-card" onclick="window.location.href='{{ route('enrollment.step2', ['location' => $location]) }}'">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                    <div class="review-card-content">
                                        <div class="review-profile">
                                            <img src="{{ ($child->profile_image) ? \Illuminate\Support\Facades\Storage::url($child->profile_image) : asset('frontend/assets/images/default-profile.png') }}" 
                                                alt="{{ $child->first_name ?? 'Child' }}" class="review-profile-image" />
                                            <div class="review-profile-info">
                                                <div class="review-name">{{ $child->first_name ?? 'N/A' }}</div>
                                                <div class="review-detail">{{ ucfirst($child->gender ?? 'Not Specified') }}</div>
                                                <div class="review-detail">
                                                    {{ ($child->date_of_birth) ? $child->date_of_birth->format('F d, Y') : 'DOB not Specified' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <!-- EMERGENCY CONTACTS -->
                        @php
                            $nonPrimaryContacts = $enrollment && $enrollment->contacts ? $enrollment->contacts->where('is_primary', false) : collect([]);
                        @endphp
                        @if ($enrollment && $enrollment->contacts && count($nonPrimaryContacts) > 0)
                            @foreach ($enrollment->contacts->where('is_primary', false) as $contact)
                                <div class="review-card">
                                    <div class="review-card-header">
                                        <h3 class="review-card-title">EMERGENCY CONTACTS</h3>
                                        <button type="button" class="btn-edit-card" onclick="window.location.href='{{ route('enrollment.step3', ['location' => $location]) }}'">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                    <div class="review-card-content">
                                        <div class="review-profile">
                                            @if ($contact->relationship_type)
                                                <div class="review-relationship-badge">{{ ucfirst($contact->relationship_type) }} to</div>
                                            @endif
                                            <img src="{{ ($contact->profile_image) ? \Illuminate\Support\Facades\Storage::url($contact->profile_image) : asset('frontend/assets/images/default-profile.png') }}" 
                                                alt="{{ $contact->first_name ?? 'Contact' }}" class="review-profile-image" />
                                            <div class="review-profile-info">
                                                <div class="review-name">{{ $contact->first_name ?? 'N/A' }}</div>
                                                <div class="review-detail">{{ ucfirst($contact->gender ?? 'Not Specified') }}</div>
                                                <div class="review-detail">
                                                    {{ ($contact->date_of_birth) ? $contact->date_of_birth->format('F d, Y') : 'DOB not Specified' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <!-- RELATIONSHIP -->
                        @php
                            $nonPrimaryContacts = $enrollment && $enrollment->contacts ? $enrollment->contacts->where('is_primary', false) : collect([]);
                        @endphp
                        @if ($enrollment && $enrollment->contacts && count($nonPrimaryContacts) > 0)
                            @foreach ($enrollment->contacts->where('is_primary', false) as $contact)
                                <div class="review-card">
                                    <div class="review-card-header">
                                        <h3 class="review-card-title">RELATIONSHIP</h3>
                                        <button type="button" class="btn-edit-card" onclick="window.location.href='{{ route('enrollment.step3', ['location' => $location]) }}'">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                    <div class="review-card-content">
                                        <div class="review-profile">
                                            @if ($contact->relationship_type)
                                                <div class="review-relationship-badge">{{ ucfirst($contact->relationship_type) }} to</div>
                                            @endif
                                            <img src="{{ ($contact->profile_image) ? \Illuminate\Support\Facades\Storage::url($contact->profile_image) : asset('frontend/assets/images/default-profile.png') }}" 
                                                alt="{{ $contact->first_name ?? 'Contact' }}" class="review-profile-image" />
                                            <div class="review-profile-info">
                                                <div class="review-name">{{ $contact->first_name ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Submit Form -->
                <form id="enrollmentSubmitForm" method="POST" action="{{ route('enrollment.submit', ['location' => $location]) }}">
                    @csrf
                    <div id="formMessage" class="enrollment-message" style="display: none;"></div>
                    <div class="enrollment-actions">
                        <button type="submit" class="btn-enrollment btn-submit">
                            SUBMIT ENROLLMENT
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@push('scripts')
<script src="{{ asset('frontend/assets/js/enrollment-form.js') }}"></script>
@endpush
@endsection

