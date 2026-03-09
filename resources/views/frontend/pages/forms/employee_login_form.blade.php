@extends('frontend.partials.master')

@section('title')

@section('content')
    <!-- Enrollment Form Section -->
    <section class="location-enrollment-form-section">
        <div class="location-enrollment-container">
            <div class="location-enrollment-card">
                <!-- Logo -->
                <div class="location-enrollment-logo">
                    <img src="{{ asset('frontend/assets/home_page_images/small-tree.png') }}" alt="The Sprout Academy">
                </div>

                <!-- Form -->
                <div class="location-enrollment-form-content">
                    <p class="location-enrollment-instruction">To begin, please enter your email address below.</p>

                    <form id="locationEnrollmentForm" method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <div id="formMessage" class="form-message" style="display: none;"></div>

                        <!-- Email Field -->
                        <div class="form-field location-enrollment-email-field">
                            <label for="emailAddress">Email Address*</label>
                            <input type="email" id="emailAddress" name="email"
                                class="form-input location-enrollment-input" placeholder="Johnsmith@gmail.com" required
                                aria-label="Email address">
                        </div>

                        <!-- Password Field -->
                        <div class="form-field location-enrollment-password-field">
                            <label for="password">Password*</label>
                            <input type="password" id="password" name="password"
                                class="form-input location-enrollment-input" placeholder="********" required
                                aria-label="Password">
                        </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn location-enrollment-submit-btn mt-5" id="submitBtn">
                    GO
                </button>
                </form>

            </div>
        </div>
        </div>

        <!-- Background Sprout Icon -->
        <div class="location-enrollment-bg-icon">
            <img src="{{ asset('frontend/assets/home_page_images/gallery-img-icon.png') }}" alt="Sprout Icon"
                aria-hidden="true">
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('employeeLoginForm');
            const formMessage = document.getElementById('formMessage');
            const submitBtn = document.getElementById('submitBtn');

            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Hide previous messages
                    formMessage.style.display = 'none';

                    // Disable button
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Loading...';

                    // Create FormData
                    const formData = new FormData(form);

                    // AJAX submission
                    fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            }
                        })
                        .then(response => {
                            return response.json().then(data => ({
                                status: response.status,
                                data: data
                            }));
                        })
                        .then(result => {
                            if (result.status === 200 && result.data.success) {
                                // Success - redirect to step1
                                window.location.href = result.data.redirect_url ||
                                    '{{ route('dashboard') }}';
                            } else {
                                // Error
                                let errorMessage = 'An error occurred. Please try again.';
                                if (result.data.message) {
                                    errorMessage = result.data.message;
                                }
                                if (result.data.errors) {
                                    const errorList = Object.values(result.data.errors).flat().join(
                                        '<br>');
                                    errorMessage += '<br>' + errorList;
                                }
                                formMessage.innerHTML = errorMessage;
                                formMessage.className = 'form-message error';
                                formMessage.style.display = 'block';

                                // Re-enable button
                                submitBtn.disabled = false;
                                submitBtn.textContent = 'GO';
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            formMessage.textContent = 'An error occurred. Please try again later.';
                            formMessage.className = 'form-message error';
                            formMessage.style.display = 'block';

                            // Re-enable button
                            submitBtn.disabled = false;
                            submitBtn.textContent = 'GO';
                        });
                });
            }
        });
    </script>
@endpush
