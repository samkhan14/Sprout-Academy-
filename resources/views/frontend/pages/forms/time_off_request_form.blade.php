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

                        <!-- Right Calendar Widget Section -->
                        <div class="form-right">
                            <div class="calendar-widget">
                                <div class="calendar-header">
                                    <label>Date</label>
                                    <span class="info-icon">i</span>
                                </div>

                                <div class="calendar-datetime-input">
                                    <input type="text" id="calendarDateTimeDisplay" class="form-input"
                                        placeholder="MM/DD HH:MM AM/PM" readonly />
                                </div>

                                <div id="calendarWidget"></div>

                                <div class="calendar-footer">
                                    <div class="calendar-footer-item">
                                        <label>Date</label>
                                        <input type="text" id="calendarDateDisplay" class="form-input" readonly />
                                    </div>
                                    <div class="calendar-footer-item">
                                        <label>Time</label>
                                        <input type="text" id="calendarTimeDisplay" class="form-input" readonly />
                                    </div>
                                </div>
                            </div>
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
            // ========================================
            // CALENDAR WIDGET INITIALIZATION (Right Side)
            // ========================================
            let calendarWidgetInstance = null;
            let timePickerInstance = null;

            // Initialize calendar widget
            const now = new Date();
            const defaultDate = now;
            const defaultTime = now.toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });

            // Function to fetch and display time off requests on calendar
            function loadTimeOffRequests(month, year) {
                const location = document.getElementById('location')?.value || '';
                const apiUrl = "{{ route('form.timeOffRequests.calendar') }}";

                fetch(`${apiUrl}?location=${location}&month=${month}&year=${year}`)
                    .then(response => response.json())
                    .then(requests => {
                        // Clear existing badges
                        document.querySelectorAll('.flatpickr-day .time-off-badge').forEach(badge => badge
                            .remove());

                        // Add badges for each request
                        requests.forEach(request => {
                            const startDate = new Date(request.start_date + 'T00:00:00');
                            const endDate = new Date(request.end_date + 'T00:00:00');

                            // Get all dates in the range
                            const currentDate = new Date(startDate);
                            while (currentDate <= endDate) {
                                const dateYear = currentDate.getFullYear();
                                const dateMonth = currentDate.getMonth() + 1;
                                const dateDay = currentDate.getDate();

                                // Only show badges for dates in the current calendar month
                                if (dateYear == year && dateMonth == parseInt(month)) {
                                    // Find day element by matching date
                                    const allDays = document.querySelectorAll(
                                        '.flatpickr-day:not(.prevMonthDay):not(.nextMonthDay)');
                                    allDays.forEach(dayElement => {
                                        const dayText = dayElement.textContent.trim();
                                        const dayNum = parseInt(dayText);

                                        if (dayNum === dateDay) {
                                            // Verify it's the correct date by checking aria-label
                                            const ariaLabel = dayElement.getAttribute(
                                                'aria-label') || '';
                                            if (ariaLabel.includes(dateYear.toString()) &&
                                                (ariaLabel.includes(dateMonth.toString()) ||
                                                    ariaLabel.toLowerCase().includes(['january',
                                                        'february', 'march', 'april', 'may',
                                                        'june', 'july', 'august',
                                                        'september', 'october', 'november',
                                                        'december'
                                                    ][dateMonth - 1].toLowerCase()))) {
                                                // Check if badge already exists
                                                let badge = dayElement.querySelector(
                                                    '.time-off-badge');
                                                if (!badge) {
                                                    badge = document.createElement('span');
                                                    badge.className =
                                                        `time-off-badge status-${request.status}`;
                                                    badge.setAttribute('title',
                                                        `${request.name} - ${request.status}`
                                                    );
                                                    dayElement.appendChild(badge);
                                                }
                                            }
                                        }
                                    });
                                }

                                currentDate.setDate(currentDate.getDate() + 1);
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Error loading time off requests:', error);
                    });
            }

            // Initialize main calendar
            calendarWidgetInstance = flatpickr('#calendarWidget', {
                inline: true,
                defaultDate: defaultDate,
                dateFormat: 'm/d/Y',
                onChange: function(selectedDates, dateStr) {
                    if (selectedDates.length > 0) {
                        const date = selectedDates[0];
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const day = String(date.getDate()).padStart(2, '0');
                        const year = date.getFullYear();
                        const fullDate = month + '/' + day + '/' + year;
                        const shortDate = month + '/' + day;

                        // Update date display
                        document.getElementById('calendarDateDisplay').value = fullDate;

                        // Update combined display
                        const timeValue = document.getElementById('calendarTimeDisplay').value ||
                            defaultTime;
                        document.getElementById('calendarDateTimeDisplay').value = shortDate + ' ' +
                            timeValue;
                    }
                },
                onMonthChange: function(selectedDates, dateStr, instance) {
                    const month = String(instance.currentMonth + 1).padStart(2, '0');
                    const year = instance.currentYear;
                    loadTimeOffRequests(month, year);
                },
                onYearChange: function(selectedDates, dateStr, instance) {
                    const month = String(instance.currentMonth + 1).padStart(2, '0');
                    const year = instance.currentYear;
                    loadTimeOffRequests(month, year);
                },
                onReady: function(selectedDates, dateStr, instance) {
                    // Load requests for current month
                    const month = String(instance.currentMonth + 1).padStart(2, '0');
                    const year = instance.currentYear;
                    loadTimeOffRequests(month, year);
                }
            });

            // Initialize time picker - make it open on click of time display
            const timeDisplayInput = document.getElementById('calendarTimeDisplay');
            timePickerInstance = flatpickr(timeDisplayInput, {
                enableTime: true,
                noCalendar: true,
                dateFormat: 'h:i K',
                defaultDate: defaultDate,
                time_24hr: false,
                clickOpens: true,
                onChange: function(selectedDates, timeStr) {
                    const dateValue = document.getElementById('calendarDateDisplay').value;
                    if (dateValue) {
                        const shortDate = dateValue.substring(0, 5); // Get MM/DD part
                        document.getElementById('calendarDateTimeDisplay').value = shortDate + ' ' +
                            timeStr;
                    } else {
                        // If no date selected, use today's date
                        const today = new Date();
                        const month = String(today.getMonth() + 1).padStart(2, '0');
                        const day = String(today.getDate()).padStart(2, '0');
                        document.getElementById('calendarDateTimeDisplay').value = month + '/' + day +
                            ' ' + timeStr;
                    }
                }
            });

            // Make combined datetime display open time picker on click
            document.getElementById('calendarDateTimeDisplay').addEventListener('click', function() {
                if (timePickerInstance) {
                    timePickerInstance.open();
                }
            });

            // Set initial values
            const initialDate = now;
            const month = String(initialDate.getMonth() + 1).padStart(2, '0');
            const day = String(initialDate.getDate()).padStart(2, '0');
            const year = initialDate.getFullYear();
            const fullDate = month + '/' + day + '/' + year;
            const shortDate = month + '/' + day;

            document.getElementById('calendarDateDisplay').value = fullDate;
            document.getElementById('calendarTimeDisplay').value = defaultTime;
            document.getElementById('calendarDateTimeDisplay').value = shortDate + ' ' + defaultTime;

            // ========================================
            // FORM SUBMISSION HANDLER
            // ========================================
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
