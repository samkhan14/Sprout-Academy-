@extends('frontend.partials.master')

@section('title', 'Enrollment - ' . $locationData['name'])

@section('content')
    <!-- Form Header -->
    @include('frontend.components.form_header', [
        'title' => 'THE SPROUT ACADEMY - ' . $locationData['name']
    ])

    <!-- Enrollment Form Section -->
    <section class="enrollment-form-section">
        <div class="container">
            <div class="enrollment-form-wrapper">
                <!-- Progress Bar -->
                @include('frontend.components.enrollment.progress-bar', ['currentStep' => $currentStep])

                <!-- Welcome Message -->
                <div class="enrollment-welcome">
                    <p>Welcome! Begin by creating a new account. Enter yourself as the Primary Account Person.</p>
                </div>

                <!-- Form -->
                <div class="enrollment-form">
                    <form id="enrollmentStep1Form" method="POST" action="{{ route('enrollment.saveStep1', ['location' => $location]) }}" enctype="multipart/form-data">
                    @csrf
                    <div id="formMessage" class="enrollment-message" style="display: none;"></div>

                    <!-- PRIMARY ACCOUNT PERSON -->
                    <div class="enrollment-section">
                        <div class="section-header">
                            <i class="fas fa-user section-icon"></i>
                            <h2 class="section-title">PRIMARY ACCOUNT PERSON</h2>
                        </div>
                        <div class="section-required-note">
                            <span class="required-asterisk">*</span> Indicates Required Field
                        </div>

                        <div class="form-row">
                            <div class="form-field">
                                <label for="firstName">First Name*</label>
                                <input type="text" id="firstName" name="first_name" class="form-input" 
                                    value="{{ ($primaryContact && $primaryContact->first_name) ? $primaryContact->first_name : '' }}" required />
                            </div>
                            <div class="form-field">
                                <label for="middleInitial">M.I.</label>
                                <input type="text" id="middleInitial" name="middle_initial" class="form-input" 
                                    value="{{ ($primaryContact && $primaryContact->middle_initial) ? $primaryContact->middle_initial : '' }}" maxlength="1" />
                            </div>
                            <div class="form-field">
                                <label for="lastName">Last Name*</label>
                                <input type="text" id="lastName" name="last_name" class="form-input" 
                                    value="{{ ($primaryContact && $primaryContact->last_name) ? $primaryContact->last_name : '' }}" required />
                            </div>
                            <div class="form-field">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-select">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ ($primaryContact && $primaryContact->gender == 'male') ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ ($primaryContact && $primaryContact->gender == 'female') ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ ($primaryContact && $primaryContact->gender == 'other') ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="form-field">
                                <label for="dateOfBirth">Date Of Birth</label>
                                @include('frontend.components.form_components.date-split-field', [
                                    'fieldId' => 'dateOfBirth',
                                    'label' => '',
                                    'required' => false,
                                    'defaultDate' => null,
                                    'minDate' => null,
                                    'wrapperClass' => '',
                                ])
                                <input type="hidden" id="dateOfBirthFormatted" name="date_of_birth" 
                                    value="{{ ($primaryContact && $primaryContact->date_of_birth) ? $primaryContact->date_of_birth->format('Y-m-d') : '' }}" />
                            </div>
                        </div>

                        <!-- Profile Picture -->
                        <div class="profile-section">
                            @include('frontend.components.enrollment.profile-picture', [
                                'imageUrl' => ($primaryContact && $primaryContact->profile_image) 
                                    ? \Illuminate\Support\Facades\Storage::url($primaryContact->profile_image) 
                                    : asset('frontend/assets/images/default-profile.png'),
                                'name' => (($primaryContact && $primaryContact->first_name) ? $primaryContact->first_name : '') . ' ' . (($primaryContact && $primaryContact->last_name) ? $primaryContact->last_name : ''),
                                'fieldName' => 'profile_image',
                                'showChangeButton' => true,
                            ])
                        </div>
                    </div>

                    <!-- ADDRESS -->
                    <div class="enrollment-section">
                        <div class="section-header">
                            <i class="fas fa-map-marker-alt section-icon"></i>
                            <h2 class="section-title">ADDRESS</h2>
                        </div>

                        <div class="form-row">
                            <div class="form-field form-field-full">
                                <label for="addressLine1">Address Line 1</label>
                                <input type="text" id="addressLine1" name="address_line_1" class="form-input" 
                                    value="{{ $address->address_line_1 ?? '' }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-field form-field-full">
                                <label for="addressLine2">Address Line 2</label>
                                <input type="text" id="addressLine2" name="address_line_2" class="form-input" 
                                    value="{{ $address->address_line_2 ?? '' }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-field">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" class="form-input" 
                                    value="{{ $address->city ?? '' }}" />
                            </div>
                            <div class="form-field">
                                <label for="state">State</label>
                                <select id="state" name="state" class="form-select">
                                    <option value="">Select State</option>
                                    <option value="FL" {{ ($address->state ?? '') == 'FL' ? 'selected' : '' }}>Florida</option>
                                    <!-- Add more states as needed -->
                                </select>
                            </div>
                            <div class="form-field">
                                <label for="zipCode">Zip Code</label>
                                <input type="text" id="zipCode" name="zip_code" class="form-input" 
                                    value="{{ $address->zip_code ?? '' }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-field">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="is_physical" value="1" 
                                        {{ ($address->is_physical ?? true) ? 'checked' : '' }} />
                                    <span>Physical</span>
                                </label>
                            </div>
                            <div class="form-field">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="is_mailing" value="1" 
                                        {{ ($address->is_mailing ?? false) ? 'checked' : '' }} />
                                    <span>Mailing</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- PHONE -->
                    <div class="enrollment-section">
                        <div class="section-header">
                            <i class="fas fa-phone section-icon"></i>
                            <h2 class="section-title">PHONE</h2>
                        </div>

                        <div id="phoneFieldsContainer">
                            @if (isset($phones) && count($phones) > 0)
                                @foreach ($phones as $index => $phone)
                                    <div class="phone-field-row" data-phone-index="{{ $index }}">
                                        <div class="form-field">
                                            <label>Type</label>
                                            <select name="phone_type[]" class="form-select">
                                                <option value="">Select Type</option>
                                                <option value="home" {{ $phone->type == 'home' ? 'selected' : '' }}>Home</option>
                                                <option value="mobile" {{ $phone->type == 'mobile' ? 'selected' : '' }}>Mobile</option>
                                                <option value="work" {{ $phone->type == 'work' ? 'selected' : '' }}>Work</option>
                                            </select>
                                        </div>
                                        <div class="form-field">
                                            <label>Area Code</label>
                                            <input type="text" name="phone_area_code[]" class="form-input" 
                                                value="{{ $phone->area_code ?? '' }}" maxlength="3" placeholder="XXX" />
                                        </div>
                                        <div class="form-field">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone_number[]" class="form-input" 
                                                value="{{ $phone->phone_number ?? '' }}" placeholder="XXX-XXXX" />
                                        </div>
                                        @if ($index > 0)
                                            <button type="button" class="btn-remove-phone" onclick="removePhoneField(this)">×</button>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="phone-field-row" data-phone-index="0">
                                    <div class="form-field">
                                        <label>Type</label>
                                        <select name="phone_type[]" class="form-select">
                                            <option value="">Select Type</option>
                                            <option value="home">Home</option>
                                            <option value="mobile">Mobile</option>
                                            <option value="work">Work</option>
                                        </select>
                                    </div>
                                    <div class="form-field">
                                        <label>Area Code</label>
                                        <input type="text" name="phone_area_code[]" class="form-input" maxlength="3" placeholder="XXX" />
                                    </div>
                                    <div class="form-field">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone_number[]" class="form-input" placeholder="XXX-XXXX" />
                                    </div>
                                </div>
                            @endif
                        </div>

                        <button type="button" class="btn-add-phone" onclick="addPhoneField()">
                            <i class="fas fa-plus"></i> Add New Phone
                        </button>
                    </div>

                    <!-- Action Buttons -->
                    <div class="enrollment-actions">
                        <button type="submit" class="btn-enrollment btn-step2" data-action="step2">
                            SAVE & GO TO STEP 2
                        </button>
                        <button type="submit" class="btn-enrollment btn-review" data-action="review">
                            SAVE & GO TO REVIEW
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="{{ asset('frontend/assets/js/enrollment-form.js') }}"></script>
<script>
    // Handle date picker
    document.addEventListener('DOMContentLoaded', function() {
        const dateField = document.querySelector('[data-date-field="dateOfBirth"]');
        if (dateField) {
            const datePicker = dateField.querySelector('#dateOfBirthDatePicker');
            if (datePicker && typeof flatpickr !== 'undefined') {
                flatpickr(datePicker, {
                    dateFormat: 'Y-m-d',
                    onChange: function(selectedDates) {
                        if (selectedDates.length > 0) {
                            document.getElementById('dateOfBirthFormatted').value = selectedDates[0].toISOString().split('T')[0];
                        }
                    }
                });
            }
        }

        // Profile image preview
        const profileImageInput = document.getElementById('profile_image');
        if (profileImageInput) {
            profileImageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profilePicturePreview').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });

    // Add phone field
    function addPhoneField() {
        const container = document.getElementById('phoneFieldsContainer');
        const index = container.children.length;
        const newRow = document.createElement('div');
        newRow.className = 'phone-field-row';
        newRow.setAttribute('data-phone-index', index);
        newRow.innerHTML = `
            <div class="form-field">
                <label>Type</label>
                <select name="phone_type[]" class="form-select">
                    <option value="">Select Type</option>
                    <option value="home">Home</option>
                    <option value="mobile">Mobile</option>
                    <option value="work">Work</option>
                </select>
            </div>
            <div class="form-field">
                <label>Area Code</label>
                <input type="text" name="phone_area_code[]" class="form-input" maxlength="3" placeholder="XXX" />
            </div>
            <div class="form-field">
                <label>Phone Number</label>
                <input type="text" name="phone_number[]" class="form-input" placeholder="XXX-XXXX" />
            </div>
            <button type="button" class="btn-remove-phone" onclick="removePhoneField(this)">×</button>
        `;
        container.appendChild(newRow);
    }

    // Remove phone field
    function removePhoneField(button) {
        button.closest('.phone-field-row').remove();
    }
</script>
@endpush

