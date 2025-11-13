<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::controller(FrontendController::class)->name('frontend.')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/virtual-tour', 'VirtualTour')->name('virtualTour');
    Route::get('/the-sprout-academy-difference', 'TheSproutAcademyDifference')->name('theSproutAcademyDifference');
    Route::get('/we-care-for-your-child', 'WeCareForYourChild')->name('weCareForYourChild');
    Route::get('/for-parents', 'Parents')->name('parents');
    Route::get('/programs-and-curriculum', 'programsAndCurriculum')->name('programsAndCurriculum');
    Route::get('/locations', 'Locations')->name('locations');
    Route::get('/Sproutvine', 'Sproutvine')->name('sproutvine');

});
