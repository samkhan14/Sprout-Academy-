@extends('frontend.partials.master')

@section('title', 'Maintenance Work Order Form')

@section('content')

    @include('frontend.components.form_header', [
        'title' => 'Maintenance Work Order Form',
        'text' => 'Fill out form for a repair work order.',
    ])
    {{-- Form Section --}}
    <section class="form-section form-section-gradient">
        <div class="container">
            <div class="site_form site_form_maintenance_work_order">
                <form id="maintenanceWorkOrderForm">
                    <div class="form-wrapper">
                        <!-- Left Form Section -->
                        <div class="form-left">
                            <div class="form-grid">

                                {{-- Date Field using Component --}}
                                @include('frontend.components.form_components.date-split-field', [
                                    'fieldId' => 'todaysDate*',
                                    'label' => 'Today\'s Date',
                                    'required' => true,
                                    'defaultDate' => 'today',
                                    'minDate' => null,
                                ])

                                @include('frontend.components.form_components.date-split-field', [
                                    'fieldId' => 'completionDate',
                                    'label' => 'Date of Completion Needed*',
                                    'required' => true,
                                    'defaultDate' => 'today',
                                    'minDate' => null,
                                ])


                                {{-- First Name / Last Name --}}
                                <div class="form-field">
                                    <label for="firstName">First Name*</label>
                                    <input type="text" id="firstName" class="form-input" />
                                </div>

                                <div class="form-field">
                                    <label for="lastName">Last Name*</label>
                                    <input type="text" id="lastName" class="form-input" />
                                </div>

                                {{-- Phone Number / Email --}}
                                <div class="form-field">
                                    <label for="phoneNumber">Phone Number*</label>
                                    <input type="tel" id="phoneNumber" class="form-input" />
                                </div>

                                <div class="form-field">
                                    <label for="email">Email*</label>
                                    <input type="email" id="email" class="form-input" />
                                </div>

                                {{-- Location --}}
                                <div class="form-field form-field-full">
                                    <label for="location">Location*</label>
                                    <select id="location" class="form-select">
                                        <option value="">Select Your Center</option>
                                        <option value="seminole">Seminole</option>
                                        <option value="orlando">Orlando</option>
                                        <option value="tampa">Tampa</option>
                                    </select>
                                </div>

                                {{-- Description Of Work Needed --}}
                                <div class="form-field form-field-full">
                                    <label for="description">Description Of Work Needed:</label>
                                    <div class="textarea-wrapper">
                                        <textarea id="description" class="form-textarea" placeholder="Type here"></textarea>
                                    </div>
                                </div>

                                {{-- Attach A File / Area Repair Needed --}}
                                <div class="form-field">
                                    <label for="attachFile">Attach A File*</label>
                                    <div class="file-upload-wrapper">
                                        <input type="file" id="attachFile" class="form-file-input" />
                                        <label for="attachFile" class="form-file-label">
                                            <span class="file-upload-text" id="fileUploadText">Choose a File to
                                                Upload</span>
                                        </label>
                                        <div class="file-upload-icon" id="fileUploadIcon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 19V5M5 12l7-7 7 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-field">
                                    <label for="areaRepair">Area Repair Needed*</label>
                                    <select id="areaRepair" class="form-select">
                                        <option value="">Select area of repair</option>
                                        <option value="plumbing">Plumbing</option>
                                        <option value="electrical">Electrical</option>
                                        <option value="hvac">HVAC</option>
                                        <option value="painting">Painting</option>
                                        <option value="carpentry">Carpentry</option>
                                        <option value="other">Other</option>
                                    </select>
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

                // File upload handler
                const attachFileInput = document.getElementById('attachFile');
                const fileUploadText = document.getElementById('fileUploadText');
                const fileUploadIcon = document.getElementById('fileUploadIcon');

                if (attachFileInput && fileUploadText && fileUploadIcon) {
                    // Click on icon opens file picker
                    fileUploadIcon.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        attachFileInput.click();
                    });

                    // Click on label also opens file picker
                    const fileLabel = document.querySelector('.form-file-label');
                    if (fileLabel) {
                        fileLabel.addEventListener('click', function(e) {
                            e.preventDefault();
                            attachFileInput.click();
                        });
                    }

                    attachFileInput.addEventListener('change', function(e) {
                        if (e.target.files && e.target.files.length > 0) {
                            fileUploadText.textContent = e.target.files[0].name;
                        } else {
                            fileUploadText.textContent = 'Choose a File to Upload';
                        }
                    });
                }

                // Form validation
                const form = document.getElementById('maintenanceWorkOrderForm');
                if (form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        // Basic validation
                        const firstName = document.getElementById('firstName').value.trim();
                        const lastName = document.getElementById('lastName').value.trim();
                        const phoneNumber = document.getElementById('phoneNumber').value.trim();
                        const email = document.getElementById('email').value.trim();
                        const location = document.getElementById('location').value.trim();
                        const attachFile = document.getElementById('attachFile').files.length;
                        const completionDate = document.getElementById('completionDate').value.trim();
                        const description = document.getElementById('description').value.trim();
                        const attachFile = document.getElementById('attachFile').files.length;
                        const areaRepair = document.getElementById('areaRepair').value.trim();

                        if (!firstName || !lastName || !phoneNumber || !email || !location || !attachFile ||
                            !completionDate || !description || !areaRepair) {
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
