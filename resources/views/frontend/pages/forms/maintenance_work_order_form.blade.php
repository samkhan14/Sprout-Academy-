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
                                {{-- Today's Date - Split into MM, DD, YY --}}
                                <div class="form-field form-field-full">
                                    <label for="todayDate">Today's Date*</label>
                                    <div class="date-split-wrapper">
                                        <input type="text" id="todayMonth" class="form-input date-split-input"
                                            placeholder="MM" maxlength="2" />
                                        <input type="text" id="todayDay" class="form-input date-split-input"
                                            placeholder="DD" maxlength="2" />
                                        <input type="text" id="todayYear" class="form-input date-split-input"
                                            placeholder="YY" maxlength="2" />
                                        <input type="text" id="todayDatePicker" class="form-input date-picker-hidden"
                                            style="display: none;" />
                                        <div class="date-split-icon" id="todayCalendarIcon" style="cursor: pointer;">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="#666" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <rect x="3" y="4" width="18" height="18" rx="2"
                                                    ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Date Of Completion Needed - Split into MM, DD, YY --}}
                                <div class="form-field form-field-full">
                                    <label for="completionDate">Date Of Completion Needed*</label>
                                    <div class="date-split-wrapper">
                                        <input type="text" id="completionMonth" class="form-input date-split-input"
                                            placeholder="MM" maxlength="2" />
                                        <input type="text" id="completionDay" class="form-input date-split-input"
                                            placeholder="DD" maxlength="2" />
                                        <input type="text" id="completionYear" class="form-input date-split-input"
                                            placeholder="YY" maxlength="2" />
                                        <input type="text" id="completionDatePicker"
                                            class="form-input date-picker-hidden" style="display: none;" />
                                        <div class="date-split-icon" id="completionCalendarIcon" style="cursor: pointer;">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="#666" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <rect x="3" y="4" width="18" height="18" rx="2"
                                                    ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10">
                                                </line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

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
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
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

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to update split date fields from selected date
                function updateSplitDateFields(selectedDate, monthId, dayId, yearId) {
                    if (selectedDate && selectedDate.length > 0) {
                        const date = new Date(selectedDate[0]);
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const day = String(date.getDate()).padStart(2, '0');
                        const year = String(date.getFullYear()).slice(-2);

                        document.getElementById(monthId).value = month;
                        document.getElementById(dayId).value = day;
                        document.getElementById(yearId).value = year;
                    }
                }

                // Auto-fill today's date
                const today = new Date();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const day = String(today.getDate()).padStart(2, '0');
                const year = String(today.getFullYear()).slice(-2);

                document.getElementById('todayMonth').value = month;
                document.getElementById('todayDay').value = day;
                document.getElementById('todayYear').value = year;

                // Get date wrapper elements for positioning
                const todayDateWrapper = document.querySelector('#todayMonth').closest('.date-split-wrapper');
                const completionDateWrapper = document.querySelector('#completionMonth').closest('.date-split-wrapper');
                const todayCalendarIcon = document.getElementById('todayCalendarIcon');
                const completionCalendarIcon = document.getElementById('completionCalendarIcon');

                // Function to position calendar relative to wrapper
                function positionCalendar(picker, iconElement) {
                    if (picker.calendarContainer && iconElement) {
                        const wrapper = iconElement.closest('.date-split-wrapper');
                        if (!wrapper) return;

                        const calendar = picker.calendarContainer;
                        calendar.style.position = 'absolute';
                        calendar.style.top = 'calc(100% + 8px)';
                        calendar.style.left = '0';
                        calendar.style.right = 'auto';
                        calendar.style.marginTop = '0';
                        calendar.style.marginLeft = '0';
                        calendar.style.zIndex = '9999';

                        // Check if calendar goes off-screen and adjust
                        setTimeout(() => {
                            const rect = calendar.getBoundingClientRect();
                            const viewportWidth = window.innerWidth;

                            if (rect.right > viewportWidth) {
                                calendar.style.left = 'auto';
                                calendar.style.right = '0';
                            }
                        }, 10);
                    }
                }

                // Initialize Flatpickr for Today's Date
                const todayDatePicker = flatpickr("#todayDatePicker", {
                    dateFormat: "Y-m-d",
                    defaultDate: "today",
                    appendTo: todayDateWrapper,
                    static: false,
                    onReady: function(selectedDates, dateStr, instance) {
                        positionCalendar(instance, todayCalendarIcon);
                    },
                    onChange: function(selectedDates) {
                        updateSplitDateFields(selectedDates, 'todayMonth', 'todayDay', 'todayYear');
                    }
                });

                // Initialize Flatpickr for Completion Date
                const completionDatePicker = flatpickr("#completionDatePicker", {
                    dateFormat: "Y-m-d",
                    minDate: "today",
                    appendTo: completionDateWrapper,
                    static: false,
                    onReady: function(selectedDates, dateStr, instance) {
                        positionCalendar(instance, completionCalendarIcon);
                    },
                    onChange: function(selectedDates) {
                        updateSplitDateFields(selectedDates, 'completionMonth', 'completionDay',
                            'completionYear');
                    }
                });

                // Open calendar on icon click for Today's Date
                todayCalendarIcon.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    todayDatePicker.open();
                    // Reposition after opening
                    setTimeout(() => {
                        positionCalendar(todayDatePicker, todayCalendarIcon);
                    }, 10);
                });

                // Open calendar on icon click for Completion Date
                completionCalendarIcon.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    completionDatePicker.open();
                    // Reposition after opening
                    setTimeout(() => {
                        positionCalendar(completionDatePicker, completionCalendarIcon);
                    }, 10);
                });

                // Auto-advance to next field on input
                function setupDateInputs(monthId, dayId, yearId) {
                    const monthInput = document.getElementById(monthId);
                    const dayInput = document.getElementById(dayId);
                    const yearInput = document.getElementById(yearId);

                    // Only allow numbers
                    [monthInput, dayInput, yearInput].forEach(input => {
                        input.addEventListener('input', function(e) {
                            e.target.value = e.target.value.replace(/[^0-9]/g, '');
                        });

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
                    });

                    // Auto-advance from month to day
                    monthInput.addEventListener('input', function(e) {
                        if (e.target.value.length === 2) {
                            dayInput.focus();
                        }
                    });

                    // Auto-advance from day to year
                    dayInput.addEventListener('input', function(e) {
                        if (e.target.value.length === 2) {
                            yearInput.focus();
                        }
                    });

                    // Validate month (01-12)
                    monthInput.addEventListener('blur', function(e) {
                        const val = parseInt(e.target.value);
                        if (val < 1 || val > 12) {
                            e.target.value = '';
                        } else {
                            e.target.value = String(val).padStart(2, '0');
                        }
                    });

                    // Validate day (01-31)
                    dayInput.addEventListener('blur', function(e) {
                        const val = parseInt(e.target.value);
                        if (val < 1 || val > 31) {
                            e.target.value = '';
                        } else {
                            e.target.value = String(val).padStart(2, '0');
                        }
                    });
                }

                // Setup date inputs
                setupDateInputs('todayMonth', 'todayDay', 'todayYear');
                setupDateInputs('completionMonth', 'completionDay', 'completionYear');

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
                        const todayMonth = document.getElementById('todayMonth').value.trim();
                        const todayDay = document.getElementById('todayDay').value.trim();
                        const todayYear = document.getElementById('todayYear').value.trim();
                        const completionMonth = document.getElementById('completionMonth').value.trim();
                        const completionDay = document.getElementById('completionDay').value.trim();
                        const completionYear = document.getElementById('completionYear').value.trim();

                        if (!firstName || !lastName || !phoneNumber || !email || !location || !attachFile ||
                            !todayMonth || !todayDay || !todayYear || !completionMonth || !completionDay || !
                            completionYear) {
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
