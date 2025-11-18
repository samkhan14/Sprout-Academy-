<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function TimeOffRequestForm()
    {
        return view('frontend.pages.forms.time_off_request_form');
    }
}
