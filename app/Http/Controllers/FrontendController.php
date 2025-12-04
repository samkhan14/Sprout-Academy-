<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\ChildAbsent;
use App\Models\ChildAbsentForm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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

    public function ChildAbsentForm(Request $request)
    {
        // Handle POST request - Form submission
        if ($request->isMethod('post')) {
            try {
                // Validation
                $validator = Validator::make($request->all(), [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'child_name' => 'required|string|max:255',
                    'phone_number' => 'required|string|max:20',
                    'location' => 'required|string|in:seminole,clearwater,pinellas-park,montessori,largo,st-petersburg',
                    'date_of_expected_return' => 'required|date',
                    'reason' => 'nullable|string|max:5000',
                ], [
                    'first_name.required' => 'First name is required.',
                    'last_name.required' => 'Last name is required.',
                    'child_name.required' => 'Child name is required.',
                    'phone_number.required' => 'Phone number is required.',
                    'location.required' => 'Location is required.',
                    'date_of_expected_return.required' => 'Date of expected return is required.',
                    'date_of_expected_return.date' => 'Please provide a valid date.',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Validation failed.',
                        'errors' => $validator->errors()
                    ], 422);
                }

                // Create child absent form
                $childAbsent = ChildAbsentForm::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'child_name' => $request->child_name,
                    'phone_number' => $request->phone_number,
                    'location' => $request->location,
                    'date_of_expected_return' => $request->date_of_expected_return,
                    'reason' => $request->reason,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Child absent form submitted successfully!'
                ], 200);

            } catch (\Exception $e) {
                Log::error('Error submitting child absent form: ' . $e->getMessage(), [
                    'exception' => $e,
                    'request_data' => $request->all(),
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while submitting the form. Please try again.'
                ], 500);
            }
        }

        // Handle GET request - Display form
        return view('frontend.pages.forms.child_absent_form');
    }
}
