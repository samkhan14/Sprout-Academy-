@extends('frontend.partials.master')

@section('title', 'Enrollment - Children Info - ' . $locationData['name'])

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

                <!-- Form -->
                <form id="enrollmentStep2Form" class="enrollment-form" method="POST" action="{{ route('enrollment.saveStep2', ['location' => $location]) }}" enctype="multipart/form-data">
                    @csrf
                    <div id="formMessage" class="enrollment-message" style="display: none;"></div>

                    <!-- Child Info -->
                    <div class="enrollment-section">
                        <div class="section-header">
                            <i class="fas fa-child section-icon"></i>
                            <h2 class="section-title">Child Info</h2>
                        </div>
                        <div class="section-required-note">
                            <span class="required-asterisk">*</span> Indicates Required Field
                        </div>

                        <div id="childrenFieldsContainer">
                            @if (isset($children) && count($children) > 0)
                                @foreach ($children as $index => $child)
                                    <div class="child-field-group" data-child-index="{{ $index }}">
                                        <div class="form-row">
                                            <div class="form-field">
                                                <label>First Name*</label>
                                                <input type="text" name="child_first_name[]" class="form-input" 
                                                    value="{{ $child->first_name }}" required />
                                            </div>
                                            <div class="form-field">
                                                <label>M.I.</label>
                                                <input type="text" name="child_middle_initial[]" class="form-input" 
                                                    value="{{ $child->middle_initial ?? '' }}" maxlength="1" />
                                            </div>
                                            <div class="form-field">
                                                <label>Last Name*</label>
                                                <input type="text" name="child_last_name[]" class="form-input" 
                                                    value="{{ $child->last_name }}" required />
                                            </div>
                                            <div class="form-field">
                                                <label>Gender</label>
                                                <select name="child_gender[]" class="form-select">
                                                    <option value="">Select Gender</option>
                                                    <option value="male" {{ $child->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ $child->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                    <option value="other" {{ $child->gender == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                            <div class="form-field">
                                                <label>Date Of Birth</label>
                                                @include('frontend.components.form_components.date-split-field', [
                                                    'fieldId' => 'childDateOfBirth' . $index,
                                                    'label' => '',
                                                    'required' => false,
                                                    'defaultDate' => null,
                                                    'minDate' => null,
                                                    'wrapperClass' => '',
                                                ])
                                                <input type="hidden" name="child_date_of_birth[]" 
                                                    id="childDateOfBirth{{ $index }}Formatted"
                                                    value="{{ $child->date_of_birth ? $child->date_of_birth->format('Y-m-d') : '' }}" />
                                            </div>
                                        </div>

                                        <!-- Profile Picture -->
                                        <div class="profile-section">
                                            @include('frontend.components.enrollment.profile-picture', [
                                                'imageUrl' => $child->profile_image 
                                                    ? \Illuminate\Support\Facades\Storage::url($child->profile_image) 
                                                    : asset('frontend/assets/images/default-profile.png'),
                                                'name' => $child->first_name . ' ' . $child->last_name,
                                                'fieldName' => 'child_profile_image[]',
                                                'showChangeButton' => true,
                                            ])
                                        </div>

                                        @if ($index > 0)
                                            <button type="button" class="btn-remove-child" onclick="removeChildField(this)">Remove Child</button>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="child-field-group" data-child-index="0">
                                    <div class="form-row">
                                        <div class="form-field">
                                            <label>First Name*</label>
                                            <input type="text" name="child_first_name[]" class="form-input" required />
                                        </div>
                                        <div class="form-field">
                                            <label>M.I.</label>
                                            <input type="text" name="child_middle_initial[]" class="form-input" maxlength="1" />
                                        </div>
                                        <div class="form-field">
                                            <label>Last Name*</label>
                                            <input type="text" name="child_last_name[]" class="form-input" required />
                                        </div>
                                        <div class="form-field">
                                            <label>Gender</label>
                                            <select name="child_gender[]" class="form-select">
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-field">
                                            <label>Date Of Birth</label>
                                            @include('frontend.components.form_components.date-split-field', [
                                                'fieldId' => 'childDateOfBirth0',
                                                'label' => '',
                                                'required' => false,
                                                'defaultDate' => null,
                                                'minDate' => null,
                                                'wrapperClass' => '',
                                            ])
                                            <input type="hidden" name="child_date_of_birth[]" id="childDateOfBirth0Formatted" />
                                        </div>
                                    </div>

                                    <!-- Profile Picture -->
                                    <div class="profile-section">
                                        @include('frontend.components.enrollment.profile-picture', [
                                            'imageUrl' => asset('frontend/assets/images/default-profile.png'),
                                            'name' => '',
                                            'fieldName' => 'child_profile_image[]',
                                            'showChangeButton' => true,
                                        ])
                                    </div>
                                </div>
                            @endif
                        </div>

                        <button type="button" class="btn-add-child" onclick="addChildField()">
                            <i class="fas fa-plus"></i> Save & Add Next Child
                        </button>
                    </div>

                    <!-- Action Buttons -->
                    <div class="enrollment-actions">
                        <button type="submit" class="btn-enrollment btn-step3" data-action="step3">
                            SAVE & GO TO STEP 3
                        </button>
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
    let childIndex = {{ isset($children) && count($children) > 0 ? count($children) : 1 }};

    function addChildField() {
        const container = document.getElementById('childrenFieldsContainer');
        const index = childIndex++;
        const newGroup = document.createElement('div');
        newGroup.className = 'child-field-group';
        newGroup.setAttribute('data-child-index', index);
        newGroup.innerHTML = `
            <div class="form-row">
                <div class="form-field">
                    <label>First Name*</label>
                    <input type="text" name="child_first_name[]" class="form-input" required />
                </div>
                <div class="form-field">
                    <label>M.I.</label>
                    <input type="text" name="child_middle_initial[]" class="form-input" maxlength="1" />
                </div>
                <div class="form-field">
                    <label>Last Name*</label>
                    <input type="text" name="child_last_name[]" class="form-input" required />
                </div>
                <div class="form-field">
                    <label>Gender</label>
                    <select name="child_gender[]" class="form-select">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-field">
                    <label>Date Of Birth</label>
                    <div class="date-split-wrapper" data-date-field="childDateOfBirth${index}">
                        <input type="text" id="childDateOfBirth${index}Month" class="form-input date-split-input" placeholder="MM" maxlength="2" />
                        <input type="text" id="childDateOfBirth${index}Day" class="form-input date-split-input" placeholder="DD" maxlength="2" />
                        <input type="text" id="childDateOfBirth${index}Year" class="form-input date-split-input" placeholder="YY" maxlength="2" />
                        <input type="text" id="childDateOfBirth${index}DatePicker" class="form-input date-picker-hidden" style="display: none;" />
                        <div class="date-split-icon" id="childDateOfBirth${index}CalendarIcon" data-date-trigger="childDateOfBirth${index}" style="cursor: pointer;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                    </div>
                    <input type="hidden" name="child_date_of_birth[]" id="childDateOfBirth${index}Formatted" />
                </div>
            </div>
            <div class="profile-section">
                <div class="profile-picture-wrapper">
                    <div class="profile-picture-container">
                        <img src="{{ asset('frontend/assets/images/default-profile.png') }}" alt="" class="profile-picture" />
                        <input type="file" name="child_profile_image[]" accept="image/*" class="profile-picture-input" style="display: none;" />
                    </div>
                    <button type="button" class="btn-change-image" onclick="this.previousElementSibling.querySelector('input').click()">Change Image</button>
                </div>
            </div>
            <button type="button" class="btn-remove-child" onclick="removeChildField(this)">Remove Child</button>
        `;
        container.appendChild(newGroup);
    }

    function removeChildField(button) {
        button.closest('.child-field-group').remove();
    }
</script>
@endpush

