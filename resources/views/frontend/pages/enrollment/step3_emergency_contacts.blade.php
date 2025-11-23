@extends('frontend.partials.master')

@section('title', 'Enrollment - Emergency Contacts - ' . $locationData['name'])

@section('content')
    <!-- Inner Page Header -->
    <section class="enrollment-header" style="background: linear-gradient(90deg, #1a5f7a 0%, #6daa44 100%);">
        <div class="container">
            <h1 class="enrollment-header-title">THE SPROUT ACADEMY - {{ $locationData['name'] }}</h1>
        </div>
    </section>

    <!-- Enrollment Form Section -->
    <section class="enrollment-form-section">
        <div class="container">
            <div class="enrollment-form-wrapper">
                <!-- Progress Bar -->
                @include('frontend.components.enrollment.progress-bar', ['currentStep' => $currentStep])

                <!-- Instructions -->
                <div class="enrollment-instructions">
                    <ol>
                        <li>Choose How You Are Related To Each Child (Below) And Select "Yes" If:
                            <ul>
                                <li>The Child Lives With You</li>
                                <li>You Are An Emergency Contact.</li>
                                <li>You Are An Authorized Pickup.</li>
                            </ul>
                        </li>
                        <li>To Add Additional People (Spouse, Relative, Neighbor, Doctor) Choose Save & Add Next Contact.</li>
                        <li>When Finished, Choose SAVE & GO TO REVIEW.</li>
                    </ol>
                </div>

                <!-- Form -->
                <form id="enrollmentStep3Form" class="enrollment-form" method="POST" action="{{ route('enrollment.saveStep3', ['location' => $location]) }}" enctype="multipart/form-data">
                    @csrf
                    <div id="formMessage" class="enrollment-message" style="display: none;"></div>

                    <!-- First Contact Person (Yourself) -->
                    <div class="enrollment-section">
                        <div class="section-header">
                            <i class="fas fa-users section-icon"></i>
                            <h2 class="section-title">First Contact Person (Yourself)</h2>
                        </div>
                        <div class="section-required-note">
                            <span class="required-asterisk">*</span> Indicates Required Field
                        </div>

                        <div id="contactsFieldsContainer">
                            @if (isset($contacts) && count($contacts) > 0)
                                @foreach ($contacts as $index => $contact)
                                    <div class="contact-field-group" data-contact-index="{{ $index }}">
                                        <!-- Contact Info -->
                                        <div class="contact-info-section">
                                            <div class="section-header">
                                                <i class="fas fa-user section-icon"></i>
                                                <h3 class="section-subtitle">Contact Info</h3>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-field">
                                                    <label>First Name*</label>
                                                    <input type="text" name="contact_first_name[]" class="form-input" 
                                                        value="{{ $contact->first_name }}" required />
                                                </div>
                                                <div class="form-field">
                                                    <label>M.I.</label>
                                                    <input type="text" name="contact_middle_initial[]" class="form-input" 
                                                        value="{{ $contact->middle_initial ?? '' }}" maxlength="1" />
                                                </div>
                                                <div class="form-field">
                                                    <label>Last Name*</label>
                                                    <input type="text" name="contact_last_name[]" class="form-input" 
                                                        value="{{ $contact->last_name }}" required />
                                                </div>
                                                <div class="form-field">
                                                    <label>Gender</label>
                                                    <select name="contact_gender[]" class="form-select">
                                                        <option value="">Select Gender</option>
                                                        <option value="male" {{ $contact->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                        <option value="female" {{ $contact->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                        <option value="other" {{ $contact->gender == 'other' ? 'selected' : '' }}>Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-field">
                                                    <label>Date Of Birth</label>
                                                    @include('frontend.components.form_components.date-split-field', [
                                                        'fieldId' => 'contactDateOfBirth' . $index,
                                                        'label' => '',
                                                        'required' => false,
                                                        'defaultDate' => null,
                                                        'minDate' => null,
                                                        'wrapperClass' => '',
                                                    ])
                                                    <input type="hidden" name="contact_date_of_birth[]" 
                                                        id="contactDateOfBirth{{ $index }}Formatted"
                                                        value="{{ $contact->date_of_birth ? $contact->date_of_birth->format('Y-m-d') : '' }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Relationship To Children -->
                                        <div class="relationship-section">
                                            <div class="section-header">
                                                <i class="fas fa-users section-icon"></i>
                                                <h3 class="section-subtitle">Relationship To Children</h3>
                                            </div>

                                            <div class="relationship-content">
                                                <!-- Profile Display -->
                                                <div class="contact-profile-display">
                                                    @include('frontend.components.enrollment.profile-picture', [
                                                        'imageUrl' => $contact->profile_image 
                                                            ? \Illuminate\Support\Facades\Storage::url($contact->profile_image) 
                                                            : asset('frontend/assets/images/default-profile.png'),
                                                        'name' => $contact->first_name . ' ' . $contact->last_name,
                                                        'fieldName' => 'contact_profile_image[]',
                                                        'showChangeButton' => false,
                                                    ])
                                                </div>

                                                <!-- Relationship Fields -->
                                                <div class="relationship-fields">
                                                    <div class="form-field">
                                                        <label>Relationship Type*</label>
                                                        <select name="contact_relationship_type[]" class="form-select" required>
                                                            <option value="">Select Relationship</option>
                                                            <option value="parent" {{ $contact->relationship_type == 'parent' ? 'selected' : '' }}>Parent</option>
                                                            <option value="guardian" {{ $contact->relationship_type == 'guardian' ? 'selected' : '' }}>Guardian</option>
                                                            <option value="relative" {{ $contact->relationship_type == 'relative' ? 'selected' : '' }}>Relative</option>
                                                            <option value="neighbor" {{ $contact->relationship_type == 'neighbor' ? 'selected' : '' }}>Neighbor</option>
                                                            <option value="doctor" {{ $contact->relationship_type == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                                            <option value="other" {{ $contact->relationship_type == 'other' ? 'selected' : '' }}>Other</option>
                                                        </select>
                                                    </div>

                                                    <div class="toggle-group">
                                                        @include('frontend.components.enrollment.toggle-switch', [
                                                            'name' => 'contact_lives_with[]',
                                                            'label' => 'Lives With',
                                                            'value' => $contact->lives_with ?? false,
                                                            'id' => 'livesWith' . $index,
                                                        ])
                                                        @include('frontend.components.enrollment.toggle-switch', [
                                                            'name' => 'contact_is_emergency[]',
                                                            'label' => 'Emergency',
                                                            'value' => $contact->is_emergency_contact ?? false,
                                                            'id' => 'isEmergency' . $index,
                                                        ])
                                                        @include('frontend.components.enrollment.toggle-switch', [
                                                            'name' => 'contact_is_pickup[]',
                                                            'label' => 'Pickup',
                                                            'value' => $contact->is_authorized_pickup ?? false,
                                                            'id' => 'isPickup' . $index,
                                                        ])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($index > 0)
                                            <button type="button" class="btn-remove-contact" onclick="removeContactField(this)">Remove Contact</button>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="contact-field-group" data-contact-index="0">
                                    <!-- Contact Info -->
                                    <div class="contact-info-section">
                                        <div class="section-header">
                                            <i class="fas fa-user section-icon"></i>
                                            <h3 class="section-subtitle">Contact Info</h3>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-field">
                                                <label>First Name*</label>
                                                <input type="text" name="contact_first_name[]" class="form-input" required />
                                            </div>
                                            <div class="form-field">
                                                <label>M.I.</label>
                                                <input type="text" name="contact_middle_initial[]" class="form-input" maxlength="1" />
                                            </div>
                                            <div class="form-field">
                                                <label>Last Name*</label>
                                                <input type="text" name="contact_last_name[]" class="form-input" required />
                                            </div>
                                            <div class="form-field">
                                                <label>Gender</label>
                                                <select name="contact_gender[]" class="form-select">
                                                    <option value="">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-field">
                                                <label>Date Of Birth</label>
                                                @include('frontend.components.form_components.date-split-field', [
                                                    'fieldId' => 'contactDateOfBirth0',
                                                    'label' => '',
                                                    'required' => false,
                                                    'defaultDate' => null,
                                                    'minDate' => null,
                                                    'wrapperClass' => '',
                                                ])
                                                <input type="hidden" name="contact_date_of_birth[]" id="contactDateOfBirth0Formatted" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Relationship To Children -->
                                    <div class="relationship-section">
                                        <div class="section-header">
                                            <i class="fas fa-users section-icon"></i>
                                            <h3 class="section-subtitle">Relationship To Children</h3>
                                        </div>

                                        <div class="relationship-content">
                                            <div class="contact-profile-display">
                                                @include('frontend.components.enrollment.profile-picture', [
                                                    'imageUrl' => asset('frontend/assets/images/default-profile.png'),
                                                    'name' => '',
                                                    'fieldName' => 'contact_profile_image[]',
                                                    'showChangeButton' => false,
                                                ])
                                            </div>

                                            <div class="relationship-fields">
                                                <div class="form-field">
                                                    <label>Relationship Type*</label>
                                                    <select name="contact_relationship_type[]" class="form-select" required>
                                                        <option value="">Select Relationship</option>
                                                        <option value="parent">Parent</option>
                                                        <option value="guardian">Guardian</option>
                                                        <option value="relative">Relative</option>
                                                        <option value="neighbor">Neighbor</option>
                                                        <option value="doctor">Doctor</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>

                                                <div class="toggle-group">
                                                    @include('frontend.components.enrollment.toggle-switch', [
                                                        'name' => 'contact_lives_with[]',
                                                        'label' => 'Lives With',
                                                        'value' => false,
                                                        'id' => 'livesWith0',
                                                    ])
                                                    @include('frontend.components.enrollment.toggle-switch', [
                                                        'name' => 'contact_is_emergency[]',
                                                        'label' => 'Emergency',
                                                        'value' => false,
                                                        'id' => 'isEmergency0',
                                                    ])
                                                    @include('frontend.components.enrollment.toggle-switch', [
                                                        'name' => 'contact_is_pickup[]',
                                                        'label' => 'Pickup',
                                                        'value' => false,
                                                        'id' => 'isPickup0',
                                                    ])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <button type="button" class="btn-add-contact" onclick="addContactField()">
                            <i class="fas fa-plus"></i> Save & Add Next Contact
                        </button>
                    </div>

                    <!-- Action Buttons -->
                    <div class="enrollment-actions">
                        <button type="submit" class="btn-enrollment btn-review" data-action="review">
                            SAVE & GO TO REVIEW
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="{{ asset('frontend/assets/js/enrollment-form.js') }}"></script>
<script>
    let contactIndex = {{ isset($contacts) && count($contacts) > 0 ? count($contacts) : 1 }};

    function addContactField() {
        const container = document.getElementById('contactsFieldsContainer');
        const index = contactIndex++;
        const newGroup = document.createElement('div');
        newGroup.className = 'contact-field-group';
        newGroup.setAttribute('data-contact-index', index);
        newGroup.innerHTML = `
            <div class="contact-info-section">
                <div class="section-header">
                    <i class="fas fa-user section-icon"></i>
                    <h3 class="section-subtitle">Contact Info</h3>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>First Name*</label>
                        <input type="text" name="contact_first_name[]" class="form-input" required />
                    </div>
                    <div class="form-field">
                        <label>M.I.</label>
                        <input type="text" name="contact_middle_initial[]" class="form-input" maxlength="1" />
                    </div>
                    <div class="form-field">
                        <label>Last Name*</label>
                        <input type="text" name="contact_last_name[]" class="form-input" required />
                    </div>
                    <div class="form-field">
                        <label>Gender</label>
                        <select name="contact_gender[]" class="form-select">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <label>Date Of Birth</label>
                        <div class="date-split-wrapper" data-date-field="contactDateOfBirth${index}">
                            <input type="text" id="contactDateOfBirth${index}Month" class="form-input date-split-input" placeholder="MM" maxlength="2" />
                            <input type="text" id="contactDateOfBirth${index}Day" class="form-input date-split-input" placeholder="DD" maxlength="2" />
                            <input type="text" id="contactDateOfBirth${index}Year" class="form-input date-split-input" placeholder="YY" maxlength="2" />
                            <input type="text" id="contactDateOfBirth${index}DatePicker" class="form-input date-picker-hidden" style="display: none;" />
                            <div class="date-split-icon" id="contactDateOfBirth${index}CalendarIcon" data-date-trigger="contactDateOfBirth${index}" style="cursor: pointer;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </div>
                        </div>
                        <input type="hidden" name="contact_date_of_birth[]" id="contactDateOfBirth${index}Formatted" />
                    </div>
                </div>
            </div>
            <div class="relationship-section">
                <div class="section-header">
                    <i class="fas fa-users section-icon"></i>
                    <h3 class="section-subtitle">Relationship To Children</h3>
                </div>
                <div class="relationship-content">
                    <div class="contact-profile-display">
                        <div class="profile-picture-wrapper">
                            <div class="profile-picture-container">
                                <img src="{{ asset('frontend/assets/images/default-profile.png') }}" alt="" class="profile-picture" />
                                <input type="file" name="contact_profile_image[]" accept="image/*" class="profile-picture-input" style="display: none;" />
                            </div>
                        </div>
                    </div>
                    <div class="relationship-fields">
                        <div class="form-field">
                            <label>Relationship Type*</label>
                            <select name="contact_relationship_type[]" class="form-select" required>
                                <option value="">Select Relationship</option>
                                <option value="parent">Parent</option>
                                <option value="guardian">Guardian</option>
                                <option value="relative">Relative</option>
                                <option value="neighbor">Neighbor</option>
                                <option value="doctor">Doctor</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="toggle-group">
                            <div class="toggle-switch-wrapper">
                                <label class="toggle-switch-label">Lives With</label>
                                <div class="toggle-switch">
                                    <input type="checkbox" name="contact_lives_with[]" id="livesWith${index}" value="1" class="toggle-input">
                                    <label for="livesWith${index}" class="toggle-label">
                                        <span class="toggle-slider">
                                            <span class="toggle-text-yes">YES</span>
                                            <span class="toggle-text-no">NO</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="toggle-switch-wrapper">
                                <label class="toggle-switch-label">Emergency</label>
                                <div class="toggle-switch">
                                    <input type="checkbox" name="contact_is_emergency[]" id="isEmergency${index}" value="1" class="toggle-input">
                                    <label for="isEmergency${index}" class="toggle-label">
                                        <span class="toggle-slider">
                                            <span class="toggle-text-yes">YES</span>
                                            <span class="toggle-text-no">NO</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="toggle-switch-wrapper">
                                <label class="toggle-switch-label">Pickup</label>
                                <div class="toggle-switch">
                                    <input type="checkbox" name="contact_is_pickup[]" id="isPickup${index}" value="1" class="toggle-input">
                                    <label for="isPickup${index}" class="toggle-label">
                                        <span class="toggle-slider">
                                            <span class="toggle-text-yes">YES</span>
                                            <span class="toggle-text-no">NO</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn-remove-contact" onclick="removeContactField(this)">Remove Contact</button>
        `;
        container.appendChild(newGroup);
    }

    function removeContactField(button) {
        button.closest('.contact-field-group').remove();
    }
</script>
@endpush

