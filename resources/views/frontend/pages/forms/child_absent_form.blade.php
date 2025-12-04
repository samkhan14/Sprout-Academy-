@extends('frontend.partials.master')

@section('title', 'Child Absent Form')

@section('content')

    @include('frontend.components.form_header', [
        'title' => 'Child Absent Form',
    ])
    {{-- Form Section --}}
    <section class="form-section form-section-gradient">
        <div class="container">
            <div class="site_form site_form_child_absent">
                <form id="childAbsentForm" method="POST" action="{{ route('frontend.childAbsentForm') }}" novalidate>
                    @csrf
                    <div class="form-wrapper">
                        <!-- Left Form Section -->
                        <div class="form-left">
                            {{-- Success/Error Messages --}}
                            <div id="formMessage" class="form-message" style="display: none;"></div>

                            <div class="form-grid">
                                {{-- First Name / Last Name --}}
                                <div class="form-field">
                                    <label for="firstName">First Name*</label>
                                    <input type="text" id="firstName" name="first_name" class="form-input" required />
                                </div>

                                <div class="form-field">
                                    <label for="lastName">Last Name*</label>
                                    <input type="text" id="lastName" name="last_name" class="form-input" required />
                                </div>

                                {{-- Child Name --}}
                                <div class="form-field">
                                    <label for="childName">Child Name*</label>
                                    <input type="text" id="childName" name="child_name" class="form-input" required />
                                </div>

                                <div class="form-field">
                                    <label for="phoneNumber">Phone Number*</label>
                                    <input type="tel" id="phoneNumber" name="phone_number" class="form-input"
                                        required />
                                </div>

                                {{-- Location --}}
                                <div class="form-field form-field-full">
                                    <label for="location">Center Location *</label>
                                    <select id="location" name="location" class="form-select" required>
                                        <option value="">Select Your Center</option>
                                        <option value="seminole">Seminole</option>
                                        <option value="clearwater">Clearwater</option>
                                        <option value="pinellas-park">Pinellas Park</option>
                                        <option value="montessori">Montessori</option>
                                        <option value="largo">Largo</option>
                                        <option value="st-petersburg">St. Petersburg</option>
                                    </select>
                                </div>

                                {{-- Date Field using Component --}}
                                @include('frontend.components.form_components.date-split-field', [
                                    'fieldId' => 'dateOfExpectedReturn',
                                    'label' => 'Date of Expected Return',
                                    'required' => true,
                                    'defaultDate' => 'today',
                                    'minDate' => null,
                                ])

                                {{-- Hidden date input for form submission --}}
                                <input type="hidden" id="dateOfExpectedReturnFormatted" name="date_of_expected_return" />

                                {{-- Reason --}}
                                <div class="form-field form-field-full">
                                    <label for="reason">Reason for Child's Absence:</label>
                                    <div class="textarea-wrapper">
                                        <textarea id="reason" name="reason" class="form-textarea" placeholder="Type Reason Here"></textarea>
                                    </div>
                                </div>


                            </div>

                            <button type="submit" class="submit-btn" id="submitBtn">
                                <span class="btn-text">Submit Now</span>
                                <span class="btn-spinner" style="display: none;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M21 12a9 9 0 11-6.219-8.56" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Form submission with AJAX
                const form = document.getElementById('childAbsentForm');
                const submitBtn = document.getElementById('submitBtn');
                const btnText = submitBtn.querySelector('.btn-text');
                const btnSpinner = submitBtn.querySelector('.btn-spinner');
                const formMessage = document.getElementById('formMessage');

                if (form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        // Hide previous messages
                        formMessage.style.display = 'none';
                        formMessage.className = 'form-message';

                        // Combine date fields (MM, DD, YY) into formatted date
                        const dateMonth = document.getElementById('dateOfExpectedReturnMonth').value;
                        const dateDay = document.getElementById('dateOfExpectedReturnDay').value;
                        const dateYear = document.getElementById('dateOfExpectedReturnYear').value;

                        if (dateMonth && dateDay && dateYear) {
                            // Convert YY to YYYY (assuming 20XX for years)
                            const dateFullYear = '20' + dateYear;
                            // Format as YYYY-MM-DD
                            const dateFormatted =
                                `${dateFullYear}-${dateMonth.padStart(2, '0')}-${dateDay.padStart(2, '0')}`;
                            document.getElementById('dateOfExpectedReturnFormatted').value = dateFormatted;
                        }

                        // Show spinner and disable button
                        btnText.style.display = 'none';
                        btnSpinner.style.display = 'inline-block';
                        submitBtn.disabled = true;

                        // Create FormData
                        const formData = new FormData(form);

                        // AJAX submission
                        fetch(form.action, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Hide spinner and enable button
                                btnText.style.display = 'inline-block';
                                btnSpinner.style.display = 'none';
                                submitBtn.disabled = false;

                                if (data.success) {
                                    // Show success message
                                    formMessage.textContent = data.message;
                                    formMessage.className = 'form-message success';
                                    formMessage.style.display = 'block';

                                    // Reset form
                                    form.reset();

                                    // Redirect to thank you page after 2 seconds
                                    setTimeout(() => {
                                        window.location.href = '{{ route('frontend.thankYou') }}';
                                    }, 2000);
                                } else {
                                    // Show error message
                                    let errorMessage = data.message ||
                                        'An error occurred. Please try again.';

                                    // Add validation errors if present
                                    if (data.errors) {
                                        const errorList = Object.values(data.errors).flat().join('<br>');
                                        errorMessage += '<br>' + errorList;
                                    }

                                    formMessage.innerHTML = errorMessage;
                                    formMessage.className = 'form-message error';
                                    formMessage.style.display = 'block';

                                    // Scroll to message
                                    formMessage.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'nearest'
                                    });
                                }
                            })
                            .catch(error => {
                                // Hide spinner and enable button
                                btnText.style.display = 'inline-block';
                                btnSpinner.style.display = 'none';
                                submitBtn.disabled = false;

                                // Show error message
                                formMessage.textContent =
                                    'An error occurred while submitting the form. Please try again later.';
                                formMessage.className = 'form-message error';
                                formMessage.style.display = 'block';

                                console.error('Error:', error);
                            });
                    });
                }
            });
        </script>
    @endpush
@endsection
