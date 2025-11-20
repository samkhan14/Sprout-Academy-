<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FormController;

Route::controller(FrontendController::class)->name('frontend.')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/virtual-tour', 'VirtualTour')->name('virtualTour');
    Route::get('/the-sprout-academy-difference', 'TheSproutAcademyDifference')->name('theSproutAcademyDifference');
    Route::get('/we-care-for-your-child', 'WeCareForYourChild')->name('weCareForYourChild');
    Route::get('/tuition-costs', 'TuitionCosts')->name('tuitionCosts');
    Route::get('/meet-the-team', 'MeetTheTeam')->name('meetTheTeam');
    Route::get('/meet-the-owner', 'MeetTheOwner')->name('meetTheOwner');
    Route::get('/download-forms', 'DownloadForms')->name('downloadForms');
    Route::get('/locations', 'Locations')->name('locations');
    Route::get('/location/seminole', 'LocationSeminole')->name('locationSeminole');
    Route::get('/location/clearwater', 'LocationClearwater')->name('locationClearwater');
    Route::get('/location/st-petersburg', 'LocationStPetersburg')->name('locationStPetersburg');
    Route::get('/location/pinellas-park', 'LocationPinellasPark')->name('locationPinellasPark');
    Route::get('/location/montessori', 'LocationMontessori')->name('locationMontessori');
    Route::get('/location/largo', 'LocationLargo')->name('locationLargo');
    Route::get('/our-programs', 'OurPrograms')->name('ourPrograms');
    Route::get('our-programs/infant-toddler-education', 'InfantToddlerEducation')->name('infantToddlerEducation');
    Route::get('our-programs/preschool-early-education', 'PreschoolEarlyEducation')->name('preschoolEarlyEducation');
    Route::get('our-programs/education-for-5-12-year-old', 'EducationFor512YearOld')->name('educationFor512YearOld');
    Route::get('/for-parents', 'Parents')->name('parents');
    Route::get('/sproutvine', 'Sproutvine')->name('sproutvine');
    Route::get('/employee-forms', 'EmployeeForms')->name('employeeForms');

});


Route::controller(FormController::class)->name('form.')->group(function () {
    Route::get('/time-off-request-form', 'TimeOffRequestForm')->name('timeOffRequestForm');
    Route::get('/maintenance-work-order-form', 'MaintenanceWorkOrderForm')->name('maintenanceWorkOrderForm');
    Route::get('/supply-order-form', 'SupplyOrderForm')->name('supplyOrderForm');
    Route::get('/snack-order-form', 'SnackOrderForm')->name('snackOrderForm');
    Route::get('/suggestion-form', 'SuggestionForm')->name('suggestionForm');
    Route::get('/time-clock-change-request-form', 'TimeClockChangeRequestForm')->name('timeClockChangeRequestForm');
    Route::get('/standard-t-shirt-order-form', 'StandardTShirtOrderForm')->name('standardTShirtOrderForm');
    Route::get('/specialty-t-shirt-order-form', 'SpecialtyTShirtOrderForm')->name('specialtyTShirtOrderForm');
});
