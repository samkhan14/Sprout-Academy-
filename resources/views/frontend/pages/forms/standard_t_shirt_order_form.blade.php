@extends('frontend.partials.master')

@section('title',
    'Standard Sprout T-Shirt Order
    Form')

@section('content')

    @include('frontend.components.form_header', [
        'title' => 'Standard Sprout T-Shirt Order Form',
        'text' =>
            'Orders are only placed at set times. Money is due at time of order or your order will not be placed. Please get with your director or DM for next order date!The t-shirt is a 50/50 blend short sleeve shirt',
    ])
    {{-- Form Section --}}
    <section class="form-section form-section-gradient">
        <div class="container">
            <div class="site_form site_form_standardSproutTShirtOrder">
                <form id="standardSproutTShirtOrderForm">
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

                                <div class="form-field">
                                    <label for="location">Location*</label>
                                    <select id="location" class="form-select">
                                        <option value="">Select Your Center</option>
                                        <option value="seminole">Seminole</option>
                                        <option value="orlando">Orlando</option>
                                        <option value="tampa">Tampa</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label for="size">Size*</label>
                                    <select id="size" name="size" class="form-select">
                                        <option value="">Select Size</option>
                                        <option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                        <option value="xlarge">X-Large</option>
                                        <option value="xxlarge">XX-Large</option>
                                    </select>
                                </div>

                                {{-- Color Checkboxes using Component --}}
                                @include('frontend.components.form_components.checkbox-group', [
                                    'fieldId' => 'colors',
                                    'label' => 'Check All That Apply',
                                    'name' => 'colors',
                                    'required' => true,
                                    'columns' => 4,
                                    'options' => [
                                        'tennessee_orange' => 'Tennessee Orange',
                                        'ash' => ['value' => 'ash', 'label' => 'Ash', 'checked' => true],
                                        'graphite_heather' => 'Graphite Heather',
                                        'light_pink' => 'Light Pink',
                                        'sand' => 'Sand',
                                        'black' => 'Black',
                                        'heloconia' => 'Heloconia',
                                        'navy' => 'Navy',
                                        'sports_royal' => 'Sports Royal',
                                        'safety_green' => 'Safety Green',
                                        'gravel' => 'Gravel',
                                        'carolina_blue' => 'Carolina Blue',
                                        'irish_green' => 'Irish Green',
                                        'maroon' => 'Maroon',
                                        'sport_grey' => 'Sport Grey',
                                        'daisy' => 'Daisy',
                                        'jade_dome' => 'Jade Dome',
                                        'orchid' => 'Orchid',
                                        'sports_scarlet' => 'Sports Scarlet',
                                        'safety_orange' => 'Safety Orange',
                                        'white' => 'White',
                                        'dark_heather' => 'Dark Heather',
                                        'red' => 'Red',
                                        'orange' => 'Orange',
                                        'texas_orange' => 'Texas Orange',
                                        'electric_green' => 'Electric Green',
                                        'light_blue' => 'Light Blue',
                                        'sapphire' => 'Sapphire',
                                        'dark_green' => 'Dark Green',
                                        'scarlet_red' => 'Scarlet Red',
                                        'royal' => 'Royal',
                                        'forest' => 'Forest',
                                        'kelly_green' => 'Kelly Green',
                                        'purple' => 'Purple',
                                        'azalea' => 'Azalea',
                                        'gold' => 'Gold',
                                        'lime' => 'Lime',
                                        'sports_dark_navy' => 'Sports Dark Navy',
                                        'dark_maroon' => 'Dark Maroon',
                                    ],
                                ])

                                {{-- Description Of Work Needed --}}
                                <div class="form-field form-field-full">
                                    <label for="description">Special Instructions</label>
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
