@extends('frontend.partials.master')

@section('title', 'Time Off Request Form')

@section('content')
    {{-- Form Header - Full Width --}}
    @include('frontend.components.form_header', [
        'title' => 'TIME OFF REQUEST FORM',
        'text' =>
            'Time Off Requests Must Be Submitted Three (3) Weeks In Advance Of The Date Being Requested. All Requests Are On A First Come First Serve Basis. Business Needs May Prohibit Request For Time Off To Being Approved. You Will Be Notified By Your Director If Your Request Has Been Approved.',
    ])

    {{-- Form Section --}}
    <section class="form-section">
        <div class="container">
            <form class="time-off-form" id="timeOffRequestForm" method="POST" action="#" novalidate>
                @csrf
                <div class="row">
                    {{-- Left Column --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label">
                                Name <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="name" name="name" required
                                placeholder="Enter your name" aria-required="true">
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="form-group">
                            <label for="location" class="form-label">
                                Location <span class="required">*</span>
                            </label>
                            <select class="form-control" id="location" name="location" required aria-required="true">
                                <option value="">Select Location</option>
                                <option value="seminole">Seminole</option>
                                <option value="clearwater">Clearwater</option>
                                <option value="pinellas-park">Pinellas Park</option>
                                <option value="largo">Largo</option>
                                <option value="st-pete">St. Petersburg</option>
                                <option value="montessori">Montessori</option>
                            </select>
                            <div class="invalid-feedback">Please select a location.</div>
                        </div>

                        <div class="form-group">
                            <label for="start_date" class="form-label">
                                Start Of Date Requested Off <span class="required">*</span>
                            </label>
                            <div class="input-group date-input-group">
                                <input type="text" class="form-control date-picker" id="start_date" name="start_date"
                                    required placeholder="MM/DD/YYYY" aria-required="true" readonly>
                                <span class="input-group-icon">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback">Please select a start date.</div>
                        </div>

                        <div class="form-group">
                            <label for="paid_unpaid" class="form-label">
                                Paid Or Unpaid? <span class="required">*</span>
                            </label>
                            <select class="form-control" id="paid_unpaid" name="paid_unpaid" required aria-required="true">
                                <option value="">Select Option</option>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                            </select>
                            <div class="invalid-feedback">Please select paid or unpaid.</div>
                        </div>

                        <div class="form-group">
                            <label for="reason" class="form-label">
                                Reason Time Off Is Needed
                            </label>
                            <div class="textarea-wrapper">
                                <span class="textarea-icon-left">
                                    <i class="fas fa-pencil-alt"></i>
                                </span>
                                <textarea class="form-control" id="reason" name="reason" rows="5" placeholder="Type Reason Here"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="director_signature" class="form-label">
                                Director Signature (After It Is Submitted)
                            </label>
                            <input type="text" class="form-control" id="director_signature" name="director_signature"
                                readonly placeholder="Will be filled after submission">
                        </div>
                    </div>

                    {{-- Right Column --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email" class="form-label">
                                Your Email <span class="required">*</span>
                            </label>
                            <input type="email" class="form-control" id="email" name="email" required
                                placeholder="Enter your email" aria-required="true">
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>

                        <div class="form-group">
                            <label for="today_date" class="form-label">
                                Todays Date <span class="required">*</span>
                            </label>
                            <div class="input-group date-input-group">
                                <input type="text" class="form-control date-picker" id="today_date" name="today_date"
                                    required placeholder="MM/DD/YYYY" aria-required="true" readonly>
                                <span class="input-group-icon">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback">Please select today's date.</div>
                        </div>

                        <div class="form-group">
                            <label for="end_date" class="form-label">
                                End Of Date Requested Off <span class="required">*</span>
                            </label>
                            <div class="input-group date-input-group">
                                <input type="text" class="form-control date-picker" id="end_date" name="end_date"
                                    required placeholder="MM/DD/YYYY" aria-required="true" readonly>
                                <span class="input-group-icon">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback">Please select an end date.</div>
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="form-submit-wrapper">
                    <button type="submit" class="btn btn-submit-form">
                        Submit Now
                    </button>
                </div>
            </form>
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize date pickers
                const dateOptions = {
                    dateFormat: "m/d/Y",
                    altInput: false,
                    allowInput: false,
                    clickOpens: true,
                };

                // Today's date picker (defaults to today)
                flatpickr("#today_date", {
                    ...dateOptions,
                    defaultDate: "today",
                });

                // Start date picker
                flatpickr("#start_date", dateOptions);

                // End date picker
                const endDatePicker = flatpickr("#end_date", dateOptions);

                // Set minimum date for start_date based on today
                const startDatePicker = flatpickr("#start_date", {
                    ...dateOptions,
                    minDate: "today",
                    onChange: function(selectedDates) {
                        if (selectedDates.length > 0) {
                            endDatePicker.set('minDate', selectedDates[0]);
                        }
                    }
                });

                // Form validation
                const form = document.getElementById('timeOffRequestForm');
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
            });
        </script>
    @endpush
@endsection
