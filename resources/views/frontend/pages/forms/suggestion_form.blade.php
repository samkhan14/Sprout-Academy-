@extends('frontend.partials.master')

@section('title', 'Suggestion Form')

@section('content')

    @include('frontend.components.form_header', [
        'title' => 'Suggestion Form',
        'text' => 'Please let us know if you have suggestions to make Sprout even better!',
    ])
    {{-- Form Section --}}
    <section class="form-section form-section-gradient">
        <div class="container">
            <div class="site_form site_form_suggestion">
                <form id="suggestionForm">
                    <div class="form-wrapper">
                        <!-- Left Form Section -->
                        <div class="form-left">
                            <div class="form-grid">

                                {{-- First Name / Last Name --}}
                                <div class="form-field">
                                    <label for="firstName">First Name*</label>
                                    <input type="text" id="firstName" class="form-input" />
                                </div>

                                <div class="form-field">
                                    <label for="lastName">Last Name*</label>
                                    <input type="text" id="lastName" class="form-input" />
                                </div>

                                <div class="form-field form-field-full">
                                    <label for="email">Subject*</label>
                                    <input type="text" id="subject" class="form-input" />
                                </div>

                                {{-- Description Of Work Needed --}}
                                <div class="form-field form-field-full">
                                    <label for="description">Description Of Work Needed:</label>
                                    <div class="textarea-wrapper">
                                        <textarea id="description" class="form-textarea" placeholder="Type here"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="submit-btn" id="submitBtn">Submit Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>



    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                input.addEventListener('keydown', function(e) {
                    // Allow: backspace, delete, tab, escape, enter
                    if ([8, 9, 27, 13, 46].indexOf(e.keyCode) !== -1 ||
                        // Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
                        (e.keyCode === 65 && e.ctrlKey === true) ||
                        (e.keyCode === 67 && e.ctrlKey === true) ||
                        (e.keyCode === 86 && e.ctrlKey === true) ||
                        (e.keyCode === 88 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 ||
                            e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });


                // Form validation
                const form = document.getElementById('suggestionForm');
                if (form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        // Basic validation
                        const firstName = document.getElementById('firstName').value.trim();
                        const lastName = document.getElementById('lastName').value.trim();
                        const description = document.getElementById('description').value.trim();

                        if (!firstName || !lastName || !description) {
                            alert('Please fill in all required fields');
                            return;
                        }

                        alert('Form submitted successfully!');
                    });
                }
            });
        </script>
    @endpush
@endsection
