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
            <div class="site_form site_form_time_off_request">
                <div class="form-wrapper">
                    <!-- Left Form Section -->
                    <div class="form-left">
                        <div class="form-grid">
                            <div class="form-field">
                                <label for="name">Name*</label>
                                <input type="text" id="name" class="form-input" />
                            </div>

                            <div class="form-field">
                                <label for="email">Your Email*</label>
                                <input type="email" id="email" class="form-input" />
                            </div>

                            <div class="form-field">
                                <label for="location">Location*</label>
                                <select id="location" class="form-select">
                                    <option value="">Seminole</option>
                                    <option value="orlando">Orlando</option>
                                    <option value="tampa">Tampa</option>
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

                            {{-- Start Date using Component --}}
                            @include('frontend.components.form_components.date-split-field', [
                                'fieldId' => 'startDate',
                                'label' => 'Start Of Date Requested Off',
                                'required' => true,
                                'defaultDate' => null,
                                'minDate' => 'today',
                            ])

                            {{-- End Date using Component --}}
                            @include('frontend.components.form_components.date-split-field', [
                                'fieldId' => 'endDate',
                                'label' => 'End Of Date Requested Off',
                                'required' => true,
                                'defaultDate' => null,
                                'minDate' => 'today',
                            ])

                            <div class="form-field form-field-full">
                                <label for="paidUnpaid">Paid Or Unpaid? *</label>
                                <select id="paidUnpaid" class="form-select">
                                    <option value="paid">Paid</option>
                                    <option value="unpaid">Unpaid</option>
                                </select>
                            </div>

                            <div class="form-field form-field-full">
                                <label for="reason">Reason Time Off Is Needed:</label>
                                <textarea id="reason" class="form-textarea" placeholder="Type Reason Here"></textarea>
                            </div>

                            <div class="form-field form-field-full">
                                <label for="directorSignature">Director Signature (After It Is Submitted)</label>
                                <input type="text" id="directorSignature" class="form-input" disabled />
                            </div>
                        </div>

                        <button type="submit" class="submit-btn" id="submitBtn">Submit Now</button>
                    </div>

                    <!-- Right Calendar Section -->
                    <div class="form-right">
                        <div class="calendar-widget">
                            <div class="calendar-header">
                                <label>Date</label>
                                <span class="info-icon">i</span>
                            </div>

                            <div class="calendar-datetime-input">
                                <input type="text" id="dateTimeDisplay" class="form-input" value="02/02 10:39 PM"
                                    readonly />
                            </div>

                            <div id="calendar"></div>

                            <div class="calendar-footer">
                                <div class="calendar-footer-item">
                                    <label>Date</label>
                                    <input type="text" id="dateDisplay" class="form-input" value="02/02/2024" readonly />
                                </div>
                                <div class="calendar-footer-item">
                                    <label>Time</label>
                                    <input type="text" id="timeDisplay" class="form-input" value="10:39 PM" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
