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
}
