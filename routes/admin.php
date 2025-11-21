<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FormDataController;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Form Data Routes (Optimized - Single route for view and data)
    Route::controller(FormDataController::class)->prefix('forms')->name('forms.')->group(function () {
        Route::any('/maintenance-work-orders', 'maintenanceWorkOrders')->name('maintenance-work-orders');
        Route::any('/suggestions', 'suggestions')->name('suggestions');
        Route::any('/time-clock-change-requests', 'timeClockChangeRequests')->name('time-clock-change-requests');
        Route::any('/time-off-requests', 'timeOffRequests')->name('time-off-requests');
        Route::any('/standard-t-shirt-orders', 'standardTShirtOrders')->name('standard-t-shirt-orders');
        Route::any('/specialty-t-shirt-orders', 'specialtyTShirtOrders')->name('specialty-t-shirt-orders');
        Route::any('/supply-orders', 'supplyOrders')->name('supply-orders');
        Route::any('/snack-orders', 'snackOrders')->name('snack-orders');
        Route::any('/newsletter-subscriptions', 'newsletterSubscriptions')->name('newsletter-subscriptions');
    });
});
