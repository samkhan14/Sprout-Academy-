@extends('frontend.partials.master')

@section('title', 'Time Clock Change Request Form')

@section('content')

    @include('frontend.components.form_header', [
        'title' => 'Time Clock Change Request Form',
    ])
    {{-- Form Section --}}
    <section class="form-section form-section-gradient">
        <div class="container">
            <div class="site_form site_form_time_clock_change_request">
                <form id="timeClockChangeRequestForm">
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

                                {{-- Location --}}
                                <div class="form-field form-field-full">
                                    <label for="location">Center Location *</label>
                                    <select id="location" class="form-select">
                                        <option value="">Select Your Center</option>
                                        <option value="seminole">Seminole</option>
                                        <option value="orlando">Orlando</option>
                                        <option value="tampa">Tampa</option>
                                    </select>
                                </div>

                                {{-- Date Field using Component --}}
                                @include('frontend.components.form_components.date-split-field', [
                                    'fieldId' => 'todayDate',
                                    'label' => 'Date to be changed',
                                    'required' => true,
                                    'defaultDate' => 'today',
                                    'minDate' => null,
                                ])

                                {{-- Time Field using Component --}}
                                @include('frontend.components.form_components.time-split-field', [
                                    'fieldId' => 'clockIn',
                                    'label' => 'Clock in time',
                                    'required' => true,
                                    'autoFill' => true,
                                ])

                                {{-- Time Fields using Components --}}
                                @include('frontend.components.form_components.time-split-field', [
                                    'fieldId' => 'clockOutLunch',
                                    'label' => 'Clock out for lunch',
                                    'required' => true,
                                    'autoFill' => false,
                                ])

                                @include('frontend.components.form_components.time-split-field', [
                                    'fieldId' => 'clockInLunch',
                                    'label' => 'Clock in from lunch',
                                    'required' => true,
                                    'autoFill' => false,
                                ])

                                @include('frontend.components.form_components.time-split-field', [
                                    'fieldId' => 'clockOut',
                                    'label' => 'Clock out time',
                                    'required' => true,
                                    'autoFill' => false,
                                ])

                                <div class="form-field form-field-full">
                                    <label for="areaRepair">Reason for change of time request *</label>
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

                                {{-- First Name / Last Name --}}
                                <div class="form-field">
                                    <label for="firstName">First Name*</label>
                                    <input type="text" id="firstName" class="form-input" />
                                </div>

                                <div class="form-field">
                                    <label for="lastName">Last Name*</label>
                                    <input type="text" id="lastName" class="form-input" />
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
