<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
