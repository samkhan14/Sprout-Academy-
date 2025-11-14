<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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


    Route::get('/for-parents', 'Parents')->name('parents');
    Route::get('/programs-and-curriculum', 'programsAndCurriculum')->name('programsAndCurriculum');
    Route::get('/sproutvine', 'Sproutvine')->name('sproutvine');
});
