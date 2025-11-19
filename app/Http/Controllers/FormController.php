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
}
