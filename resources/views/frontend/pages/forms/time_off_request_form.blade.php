@extends('frontend.partials.master')

@section('title', 'Time Off Request Form')

@section('content')
    @include('frontend.components.form_header', [
        'title' => 'TIME OFF REQUEST FORM',
        'text' =>
            'Time Off Requests Must Be Submitted Three (3) Weeks In Advance Of The Date Being Requested Off. All Requests Are On A First Come First Serve Basis. Business Needs May Prohibit Request For Time Off To Being Approved. You Will Be Notified By Your Director If Your Request Has Been Approved.',
    ])

    {{-- Form Section --}}
    <section class="form-section form-section-gradient">
        <div class="container">
            <div class="site_form site_form_time_off_request">
                <form id="timeOffRequestForm" method="POST" action="{{ route('form.timeOffRequestForm') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-wrapper">
                        <!-- Left Form Section -->
                        <div class="form-left">
                            {{-- Success/Error Messages --}}
                            <div id="formMessage" class="form-message" style="display: none;"></div>

                            <div class="form-grid">
                                {{-- Name --}}
                                <div class="form-field">
                                    <label for="name">Name*</label>
                                    <input type="text" id="name" name="name" class="form-input" required />
                                </div>

                                {{-- Email --}}
                                <div class="form-field">
                                    <label for="email">Your Email*</label>
                                    <input type="email" id="email" name="email" class="form-input" required />
                                </div>

                                {{-- Location --}}
                                <div class="form-field form-field-full">
                                    <label for="location">Location*</label>
                                    <select id="location" name="location" class="form-select" required>
                                        <option value="seminole" selected>Seminole</option>
                                        <option value="clearwater">Clearwater</option>
                                        <option value="pinellas_park">Pinellas Park</option>
                                        <option value="largo">Largo</option>
                                        <option value="st_petersburg">St. Petersburg</option>
                                        <option value="montessori">Montessori</option>
                                    </select>
                                </div>

                                {{-- Today's Date using Component --}}
                                @include('frontend.components.form_components.date-split-field', [
                                    'fieldId' => 'today',
                                    'label' => 'Todays Date',
                                    'required' => true,
                                    'defaultDate' => 'today',
                                    'minDate' => null,
                                ])

                                {{-- Hidden date input for form submission --}}
                                <input type="hidden" id="todayFormatted" name="todays_date" />

                                {{-- Start Date using Component --}}
                                @include('frontend.components.form_components.date-split-field', [
                                    'fieldId' => 'startDate',
                                    'label' => 'Start Of Date Requested Off',
                                    'required' => true,
                                    'defaultDate' => null,
                                    'minDate' => 'today',
                                ])

                                {{-- Hidden date input for form submission --}}
                                <input type="hidden" id="startDateFormatted" name="start_date" />

                                {{-- End Date using Component --}}
                                @include('frontend.components.form_components.date-split-field', [
                                    'fieldId' => 'endDate',
                                    'label' => 'End Of Date Requested Off',
                                    'required' => true,
                                    'defaultDate' => null,
                                    'minDate' => 'today',
                                ])

                                {{-- Hidden date input for form submission --}}
                                <input type="hidden" id="endDateFormatted" name="end_date" />

                                {{-- Paid Or Unpaid --}}
                                <div class="form-field form-field-full">
                                    <label for="paidUnpaid">Paid Or Unpaid?*</label>
                                    <select id="paidUnpaid" name="paid_unpaid" class="form-select" required>
                                        <option value="">Select</option>
                                        <option value="paid">Paid</option>
                                        <option value="unpaid">Unpaid</option>
                                    </select>
                                </div>

                                {{-- Reason --}}
                                <div class="form-field form-field-full">
                                    <label for="reason">Reason Time Off Is Needed:</label>
                                    <div class="textarea-wrapper">
                                        <textarea id="reason" name="reason" class="form-textarea" placeholder="Type Reason Here"></textarea>
                                    </div>
                                </div>

                                {{-- Director Signature (Disabled) --}}
                                <div class="form-field form-field-full">
                                    <label for="directorSignature">Director Signature (After It Is Submitted)</label>
                                    <input type="text" id="directorSignature" name="director_signature"
                                        class="form-input" disabled />
                                </div>
                            </div>

                            <button type="submit" class="submit-btn" id="submitBtn">Submit Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('timeOffRequestForm');
            const submitBtn = document.getElementById('submitBtn');
            const spinner = document.createElement('span');
            spinner.className = 'spinner-border spinner-border-sm me-2';
            spinner.setAttribute('role', 'status');
            spinner.setAttribute('aria-hidden', 'true');

            if (form) {
                form.addEventListener('submit', async function(event) {
                    event.preventDefault();
                    submitBtn.disabled = true;
                    submitBtn.prepend(spinner);

                    // Combine split date fields into single date strings
                    const todayMonth = document.getElementById('todayMonth')?.value;
                    const todayDay = document.getElementById('todayDay')?.value;
                    const todayYear = document.getElementById('todayYear')?.value;
                    const todayFormattedEl = document.getElementById('todayFormatted');
                    if (todayMonth && todayDay && todayYear && todayFormattedEl) {
                        todayFormattedEl.value =
                            `20${todayYear}-${todayMonth.padStart(2, '0')}-${todayDay.padStart(2, '0')}`;
                    }

                    const startDateMonth = document.getElementById('startDateMonth')?.value;
                    const startDateDay = document.getElementById('startDateDay')?.value;
                    const startDateYear = document.getElementById('startDateYear')?.value;
                    const startDateFormattedEl = document.getElementById('startDateFormatted');
                    if (startDateMonth && startDateDay && startDateYear && startDateFormattedEl) {
                        startDateFormattedEl.value =
                            `20${startDateYear}-${startDateMonth.padStart(2, '0')}-${startDateDay.padStart(2, '0')}`;
                    }

                    const endDateMonth = document.getElementById('endDateMonth')?.value;
                    const endDateDay = document.getElementById('endDateDay')?.value;
                    const endDateYear = document.getElementById('endDateYear')?.value;
                    const endDateFormattedEl = document.getElementById('endDateFormatted');
                    if (endDateMonth && endDateDay && endDateYear && endDateFormattedEl) {
                        endDateFormattedEl.value =
                            `20${endDateYear}-${endDateMonth.padStart(2, '0')}-${endDateDay.padStart(2, '0')}`;
                    }

                    const formData = new FormData(form);

                    // Get CSRF token
                    const csrfToken = document.querySelector('meta[name="csrf-token"]');
                    if (!csrfToken) {
                        console.error('CSRF token meta tag not found');
                        const messageDiv = document.getElementById('formMessage');
                        if (messageDiv) {
                            messageDiv.className = 'form-message form-message-error';
                            messageDiv.textContent = 'CSRF token not found. Please refresh the page.';
                            messageDiv.style.display = 'block';
                        }
                        submitBtn.disabled = false;
                        spinner.remove();
                        return;
                    }

                    try {
                        const response = await fetch("{{ route('form.timeOffRequestForm') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            },
                            body: formData
                        });

                        let result;
                        const contentType = response.headers.get('content-type');
                        if (contentType && contentType.includes('application/json')) {
                            result = await response.json();
                        } else {
                            // If response is not JSON, it might be an HTML error page
                            const text = await response.text();
                            throw new Error(
                                'Server returned non-JSON response. Please check the form and try again.'
                            );
                        }

                        const messageDiv = document.getElementById('formMessage');
                        if (!messageDiv) {
                            console.error('Message div not found');
                            submitBtn.disabled = false;
                            spinner.remove();
                            return;
                        }

                        if (response.ok) {
                            messageDiv.className = 'form-message form-message-success';
                            messageDiv.textContent = result.message || 'Form submitted successfully!';
                            messageDiv.style.display = 'block';

                            form.reset();
                            // Optionally redirect to a thank you page
                            setTimeout(() => {
                                window.location.href = "{{ route('frontend.thankYou') }}";
                            }, 2000);
                        } else {
                            messageDiv.className = 'form-message form-message-error';
                            let errorMessage = 'Form submission failed.';
                            if (result.errors) {
                                errorMessage += '\n' + Object.values(result.errors).flat().join('\n');
                            } else if (result.message) {
                                errorMessage += '\n' + result.message;
                            }
                            messageDiv.textContent = errorMessage;
                            messageDiv.style.display = 'block';
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        const messageDiv = document.getElementById('formMessage');
                        if (messageDiv) {
                            messageDiv.className = 'form-message form-message-error';
                            messageDiv.textContent = 'An unexpected error occurred. Please try again.';
                            messageDiv.style.display = 'block';
                        }
                    } finally {
                        if (submitBtn) {
                            submitBtn.disabled = false;
                        }
                        if (spinner && spinner.parentNode) {
                            spinner.remove();
                        }
                    }
                });
            }
        });
    </script>
@endpush
