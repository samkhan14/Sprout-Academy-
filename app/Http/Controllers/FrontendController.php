<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }

    public function Parents()
    {
        return view('frontend.pages.parents');
    }

    public function programsAndCurriculum()
    {
        return view('frontend.pages.programs');
    }

    public function Locations()
    {
        return view('frontend.pages.locations');
    }

    public function Sproutvine()
    {
        return view('frontend.pages.sproutvine');
    }

    public function VirtualTour()
    {
        return view('frontend.pages.virtual_tour');
    }
}
