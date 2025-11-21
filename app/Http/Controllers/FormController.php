<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceWorkOrder;
use App\Models\Suggestion;
use App\Models\TimeClockChangeRequest;
use App\Models\StandardTShirtOrder;
use App\Models\SpecialtyTShirtOrder;
use App\Models\NewsletterSubscription;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    public function TimeOffRequestForm()
    {
        return view('frontend.pages.forms.time_off_request_form');
    }

    public function MaintenanceWorkOrderForm()
    {
        return view('frontend.pages.forms.maintenance_work_order_form');
    }

    public function SuggestionForm()
    {
        return view('frontend.pages.forms.suggestion_form');
    }

    public function TimeClockChangeRequestForm()
    {
        return view('frontend.pages.forms.time_clock_change_request_form');
    }

    public function SupplyOrderForm()
    {
        $formFields = [
            'number_inputs' => [
                'left_column' => [
                    'placemats' => ['label' => 'Placemats', 'required' => true],
                    'napkins' => ['label' => 'Napkins', 'required' => true],
                    'large_paper_plates' => ['label' => 'Large Paper Plates', 'required' => true],
                    'five_oz_snack_cups' => ['label' => '5 Oz Snack Cups', 'required' => true],
                    'cups' => ['label' => 'Cups', 'required' => true],
                    'forks' => ['label' => 'Forks', 'required' => true],
                    'coffee_filters' => ['label' => 'Coffee Filters', 'required' => true],
                    'trash_bags' => ['label' => 'Trash Bags', 'required' => true],
                    'poly_gloves' => ['label' => 'Poly Gloves', 'required' => true],
                    'large_baggies_gallon_ziploc' => ['label' => 'Large Baggies (Gallon Ziploc)', 'required' => true],
                    'white_paper_bags' => ['label' => 'White Paper Bags', 'required' => true],
                    'lysol' => ['label' => 'Lysol', 'required' => true],
                    'fabuloso' => ['label' => 'Fabuloso', 'required' => true],
                    'bleach' => ['label' => 'Bleach', 'required' => true],
                    'air_freshner' => ['label' => 'Air Freshner', 'required' => true],
                    'thirty_three_gallon_trash_bags_st_pete' => ['label' => '33 Gallon Trash Bags (St Pete)', 'required' => true],
                    'fifty_gallon_trash_bags_st_pete_playground' => ['label' => '50 Gallon Trash Bags (St Pete Playground)', 'required' => true],
                    'tin_pans' => ['label' => 'Tin Pans', 'required' => true],
                    'receipt_book' => ['label' => 'Receipt Book', 'required' => true],
                    'sticky_notes' => ['label' => 'Sticky Notes', 'required' => true],
                    'note_pads' => ['label' => 'Note Pads', 'required' => true],
                    'color_printer_ink' => ['label' => 'Color Printer Ink', 'required' => true],
                ],
                'right_column' => [
                    'choose_your_center' => [
                        'label' => 'Choose Your Center',
                        'required' => true,
                        'type' => 'select',
                        'options' => [
                            'seminole' => 'Seminole',
                            'clearwater' => 'Clearwater',
                            'pinellas_park' => 'Pinellas Park',
                            'largo' => 'Largo',
                            'st_petersburg' => 'St. Petersburg',
                            'montessori' => 'Montessori'
                        ],
                        'default' => 'seminole'
                    ],
                    'small_paper_plates' => ['label' => 'Small Paper Plates', 'required' => true],
                    'bowls' => ['label' => 'Bowls', 'required' => true],
                    'three_oz_water_cups' => ['label' => '3 Oz Water Cups', 'required' => true],
                    'spoons' => ['label' => 'Spoons', 'required' => true],
                    'paper_cupcake_holders' => ['label' => 'Paper Cupcake Holders', 'required' => true],
                    'paper_towels_for_dispenser' => ['label' => 'Paper Towels (For Dispenser)', 'required' => true],
                    'tissues' => ['label' => 'Tissues', 'required' => true],
                    'vinyl_gloves' => ['label' => 'Vinyl Gloves', 'required' => true],
                    'sandwich_bags' => ['label' => 'Sandwich Bags', 'required' => true],
                    'staples' => ['label' => 'Staples', 'required' => true],
                    'ricoh_toner' => ['label' => 'Ricoh Toner', 'required' => true],
                    'copy_paper' => ['label' => 'Copy Paper', 'required' => true],
                    'hand_soap' => ['label' => 'Hand Soap', 'required' => true],
                    'dish_soap' => ['label' => 'Dish Soap', 'required' => true],
                    'toilet_paper' => ['label' => 'Toilet Paper', 'required' => true],
                    'paper_towels_rolls' => ['label' => 'Paper Towels (Rolls)', 'required' => true],
                    'windex' => ['label' => 'Windex', 'required' => true],
                    'clorox_wipes' => ['label' => 'Clorox Wipes', 'required' => true],
                    'small_baggies_sandwich_ziploc' => ['label' => 'Small Baggies (Sandwich Ziploc)', 'required' => true],
                    'black_paper_bags' => ['label' => 'Black Paper Bags', 'required' => true],
                    'black_printer_ink' => ['label' => 'Black Printer Ink', 'required' => true],
                ]
            ],
            'textarea' => [
                'other' => [
                    'label' => 'Other (Describe In Detail And Give Quantity Needed)',
                    'required' => false,
                    'placeholder' => 'Type here'
                ]
            ]
        ];

        return view('frontend.pages.forms.supply_order_form', compact('formFields'));
    }

    public function SnackOrderForm()
    {
        $formFields = [
            'number_inputs' => [
                'left_column' => [
                    'goldfish' => ['label' => 'Goldfish', 'required' => true],
                    'french_toast' => ['label' => 'French Toast', 'required' => true],
                    'pretzels' => ['label' => 'Pretzels', 'required' => true],
                    'ritz_crackers' => ['label' => 'Ritz Crackers', 'required' => true],
                    'apple_juice' => ['label' => 'Apple Juice', 'required' => true],
                    'apple' => ['label' => 'Apple', 'required' => true],
                    'cuties_oranges' => ['label' => 'Cuties Oranges', 'required' => true],
                    'muffins' => ['label' => 'Muffins', 'required' => true],
                ],
                'right_column' => [
                    'choose_your_center' => [
                        'label' => 'Choose Your Center',
                        'required' => true,
                        'type' => 'select',
                        'options' => [
                            'seminole' => 'Seminole',
                            'clearwater' => 'Clearwater',
                            'pinellas_park' => 'Pinellas Park',
                            'largo' => 'Largo',
                            'st_petersburg' => 'St. Petersburg',
                            'montessori' => 'Montessori'
                        ],
                        'default' => 'seminole'
                    ],
                    'raisins_or_craisins' => ['label' => 'Raisins Or Craisins', 'required' => true],
                    'yogurt_tubs_or_go_gurts' => ['label' => 'Yogurt Tubs Or Go-Gurts', 'required' => true],
                    'raisin_toast' => ['label' => 'Raisin Toast', 'required' => true],
                    'applesauce' => ['label' => 'Applesauce', 'required' => true],
                    'strawberries' => ['label' => 'Strawberries', 'required' => true],
                    'orange_juice' => ['label' => 'Orange Juice', 'required' => true],
                    'english_muffins' => ['label' => 'English Muffins', 'required' => true],
                    'granola_bars' => ['label' => 'Granola Bars', 'required' => true],
                ]
            ],
            'textarea' => [
                'other' => [
                    'label' => 'Other (Describe In Detail And Give Quantity Needed)',
                    'required' => false,
                    'placeholder' => 'Type here'
                ]
            ]
        ];

        return view('frontend.pages.forms.snack_order_form', compact('formFields'));
    }

    public function StandardTShirtOrderForm()
    {
        return view('frontend.pages.forms.standard_t_shirt_order_form');
    }

    public function SpecialtyTShirtOrderForm()
    {
        return view('frontend.pages.forms.specialty_t_shirt_order_form');
    }

    /**
     * Submit Maintenance Work Order Form
     */
    public function submitMaintenanceWorkOrder(Request $request)
    {
        try {
            // Validation rules
            $validator = Validator::make($request->all(), [
                'todays_date' => 'required|date',
                'completion_date' => 'required|date|after_or_equal:todays_date',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'location' => 'required|string|in:seminole,orlando,tampa',
                'description' => 'nullable|string|max:5000',
                'attach_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240', // 10MB max
                'area_repair' => 'required|string|in:plumbing,electrical,hvac,painting,carpentry,other',
            ], [
                'todays_date.required' => 'Today\'s date is required.',
                'todays_date.date' => 'Today\'s date must be a valid date.',
                'completion_date.required' => 'Completion date is required.',
                'completion_date.date' => 'Completion date must be a valid date.',
                'completion_date.after_or_equal' => 'Completion date must be today or later.',
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'phone_number.required' => 'Phone number is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'location.required' => 'Location is required.',
                'location.in' => 'Please select a valid location.',
                'attach_file.file' => 'The file must be a valid file.',
                'attach_file.mimes' => 'The file must be a PDF, DOC, DOCX, JPG, JPEG, or PNG file.',
                'attach_file.max' => 'The file size must not exceed 10MB.',
                'area_repair.required' => 'Area repair is required.',
                'area_repair.in' => 'Please select a valid area of repair.',
            ]);

            // If validation fails, return errors
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed. Please check your input.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Handle file upload
            $filePath = null;
            if ($request->hasFile('attach_file')) {
                $file = $request->file('attach_file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('maintenance_work_orders', $fileName, 'public');
            }

            // Create maintenance work order
            $workOrder = MaintenanceWorkOrder::create([
                'todays_date' => $request->todays_date,
                'completion_date' => $request->completion_date,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'location' => $request->location,
                'description' => $request->description,
                'file_path' => $filePath,
                'area_repair' => $request->area_repair,
            ]);

            // Log success
            Log::info('Maintenance work order submitted', [
                'id' => $workOrder->id,
                'email' => $workOrder->email,
                'location' => $workOrder->location,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Your maintenance work order has been submitted successfully!',
                'data' => [
                    'id' => $workOrder->id,
                ]
            ], 200);

        } catch (\Exception $e) {
            // Log error
            Log::error('Maintenance work order submission failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your form. Please try again later.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Submit Suggestion Form
     */
    public function submitSuggestion(Request $request)
    {
        try {
            // Validation rules
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'subject' => 'required|string|max:255',
                'description' => 'nullable|string|max:5000',
            ], [
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'subject.required' => 'Subject is required.',
            ]);

            // If validation fails, return errors
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed. Please check your input.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Create suggestion
            $suggestion = Suggestion::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'subject' => $request->subject,
                'description' => $request->description,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Your suggestion has been submitted successfully!',
                'data' => [
                    'id' => $suggestion->id,
                ]
            ], 200);

        } catch (\Exception $e) {
            // Log error
            Log::error('Suggestion submission failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your form. Please try again later.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Submit Time Clock Change Request Form
     */
    public function submitTimeClockChangeRequest(Request $request)
    {
        try {
            // Validation rules
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'location' => 'required|string|in:seminole,orlando,tampa',
                'date_to_be_changed' => 'required|date',
                'clock_in_time' => 'required|date_format:H:i',
                'clock_out_for_lunch' => 'nullable|date_format:H:i',
                'clock_in_from_lunch' => 'nullable|date_format:H:i',
                'clock_out_time' => 'nullable|date_format:H:i',
                'reason_for_change' => 'required|string|max:255',
                'supervisor_first_name' => 'nullable|string|max:255',
                'supervisor_last_name' => 'nullable|string|max:255',
            ], [
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'location.required' => 'Center location is required.',
                'location.in' => 'Please select a valid center location.',
                'date_to_be_changed.required' => 'Date to be changed is required.',
                'date_to_be_changed.date' => 'Date to be changed must be a valid date.',
                'clock_in_time.required' => 'Clock in time is required.',
                'clock_in_time.date_format' => 'Clock in time must be in valid time format.',
                'clock_out_for_lunch.date_format' => 'Clock out for lunch must be in valid time format.',
                'clock_in_from_lunch.date_format' => 'Clock in from lunch must be in valid time format.',
                'clock_out_time.date_format' => 'Clock out time must be in valid time format.',
                'reason_for_change.required' => 'Reason for change is required.',
            ]);

            // If validation fails, return errors
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed. Please check your input.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Create time clock change request
            $timeClockChangeRequest = TimeClockChangeRequest::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'location' => $request->location,
                'date_to_be_changed' => $request->date_to_be_changed,
                'clock_in_time' => $request->clock_in_time,
                'clock_out_for_lunch' => $request->clock_out_for_lunch,
                'clock_in_from_lunch' => $request->clock_in_from_lunch,
                'clock_out_time' => $request->clock_out_time,
                'reason_for_change' => $request->reason_for_change,
                'supervisor_first_name' => $request->supervisor_first_name,
                'supervisor_last_name' => $request->supervisor_last_name,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Your time clock change request has been submitted successfully!',
                'data' => [
                    'id' => $timeClockChangeRequest->id,
                ]
            ], 200);

        } catch (\Exception $e) {
            // Log error
            Log::error('Time clock change request submission failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your form. Please try again later.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Submit Standard T-Shirt Order Form
     */
    public function submitStandardTShirtOrder(Request $request)
    {
        try {
            // Validation rules
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'location' => 'required|string|in:seminole,orlando,tampa',
                'size' => 'required|string|in:small,medium,large,xlarge,xxlarge',
                'colors' => 'required|array|min:1',
                'colors.*' => 'string',
                'special_instructions' => 'nullable|string|max:5000',
            ], [
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'location.required' => 'Location is required.',
                'location.in' => 'Please select a valid location.',
                'size.required' => 'Size is required.',
                'size.in' => 'Please select a valid size.',
                'colors.required' => 'Please select at least one color.',
                'colors.array' => 'Colors must be an array.',
                'colors.min' => 'Please select at least one color.',
            ]);

            // If validation fails, return errors
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed. Please check your input.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Create standard t-shirt order
            $order = StandardTShirtOrder::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'location' => $request->location,
                'size' => $request->size,
                'colors' => $request->colors,
                'special_instructions' => $request->special_instructions,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Your standard t-shirt order has been submitted successfully!',
                'data' => [
                    'id' => $order->id,
                ]
            ], 200);

        } catch (\Exception $e) {
            // Log error
            Log::error('Standard t-shirt order submission failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your form. Please try again later.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Submit Specialty T-Shirt Order Form
     */
    public function submitSpecialtyTShirtOrder(Request $request)
    {
        try {
            // Validation rules
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'location' => 'required|string|in:seminole,orlando,tampa',
                'size' => 'required|string|in:small,medium,large,xlarge,xxlarge',
                'themes' => 'required|array|min:1',
                'themes.*' => 'string',
                'special_instructions' => 'nullable|string|max:5000',
            ], [
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'location.required' => 'Location is required.',
                'location.in' => 'Please select a valid location.',
                'size.required' => 'Size is required.',
                'size.in' => 'Please select a valid size.',
                'themes.required' => 'Please select at least one theme/holiday.',
                'themes.array' => 'Themes must be an array.',
                'themes.min' => 'Please select at least one theme/holiday.',
            ]);

            // If validation fails, return errors
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed. Please check your input.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Create specialty t-shirt order
            $order = SpecialtyTShirtOrder::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'location' => $request->location,
                'size' => $request->size,
                'themes' => $request->themes,
                'special_instructions' => $request->special_instructions,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Your specialty t-shirt order has been submitted successfully!',
                'data' => [
                    'id' => $order->id,
                ]
            ], 200);

        } catch (\Exception $e) {
            // Log error
            Log::error('Specialty t-shirt order submission failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your form. Please try again later.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Subscribe to Newsletter
     */
    public function subscribeNewsletter(Request $request)
    {
        try {
            // Validation rules
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:newsletter_subscriptions,email',
            ], [
                'name.required' => 'Name is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email is already subscribed to our newsletter.',
            ]);

            // If validation fails, return errors
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed. Please check your input.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Create newsletter subscription
            $subscription = NewsletterSubscription::create([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing to our newsletter!',
                'data' => [
                    'id' => $subscription->id,
                ]
            ], 200);

        } catch (\Exception $e) {
            // Log error
            Log::error('Newsletter subscription failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while subscribing. Please try again later.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

}
