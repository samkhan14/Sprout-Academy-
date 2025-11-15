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

    public function OurPrograms()
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

    public function TheSproutAcademyDifference()
    {
        return view('frontend.pages.sprout_academy_difference');
    }

    public function WeCareForYourChild()
    {
        return view('frontend.pages.we_care_for_your_child');
    }

    public function TuitionCosts()
    {
        return view('frontend.pages.tution_costs');
    }

    public function MeetTheTeam()
    {
        return view('frontend.pages.team');
    }

    public function MeetTheOwner()
    {
        return view('frontend.pages.meet_the_owner');
    }

    public function DownloadForms()
    {
        return view('frontend.pages.download_forms');
    }

    public function LocationSeminole()
    {
        return view('frontend.pages.location_seminole');
    }

    public function LocationClearwater()
    {
        return view('frontend.pages.location_clearwater');
    }

    public function LocationPinellasPark()
    {
        return view('frontend.pages.location_pinellessPark');
    }

    public function LocationMontessori()
    {
        return view('frontend.pages.location_montesorri');
    }

    public function LocationLargo()
    {
        return view('frontend.pages.location_largo');
    }

    public function LocationStPetersburg()
    {
        return view('frontend.pages.location_stPetersburg');
    }
}
