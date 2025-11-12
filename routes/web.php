<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::controller(FrontendController::class)->name('frontend.')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/for-parents', 'Parents')->name('parents');
    Route::get('/programs-and-curriculum', 'programsAndCurriculum')->name('programsAndCurriculum');
    Route::get('/locations', 'Locations')->name('locations');
    Route::get('/Sproutvine', 'Sproutvine')->name('sproutvine');
    Route::get('virtual-tour', 'VirtualTour')->name('virtualTour');
});
