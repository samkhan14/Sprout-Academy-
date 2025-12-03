<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $locations = Location::active()->get();
        return view('frontend.pages.index', compact('locations'));
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
        $locations = Location::active()->get();
        return view('frontend.pages.locations', compact('locations'));
    }

    public function Sproutvine()
    {
        return view('frontend.pages.sproutvine');
    }

    public function VirtualTour()
    {
        $locations = Location::active()->get();
        return view('frontend.pages.virtual_tour', compact('locations'));
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

    public function InfantToddlerEducation()
    {
        return view('frontend.pages.infant_toddler_education');
    }

    public function PreschoolEarlyEducation()
    {
        return view('frontend.pages.preschool_early_education');
    }

    public function EducationFor512YearOld()
    {
        return view('frontend.pages.education_for_5_12_year_old');
    }

    public function EmployeeForms()
    {
        // This route is already protected by auth middleware, but adding extra check
        if (!auth()->check()) {
            abort(403, 'Unauthorized access. Please login to view employee forms.');
        }
        return view('frontend.pages.employee_forms');
    }

    public function ThankYou()
    {
        return view('frontend.pages.thank-you');
    }

    public function Enroll()
    {
        return view('frontend.pages.enrollment');
    }
}
