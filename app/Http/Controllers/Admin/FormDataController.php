<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceWorkOrder;
use App\Models\Suggestion;
use App\Models\TimeClockChangeRequest;
use App\Models\StandardTShirtOrder;
use App\Models\SpecialtyTShirtOrder;
use App\Models\SnackOrder;
use App\Models\TimeOffRequestForm;
use App\Models\SupplyOrder;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FormDataController extends Controller
{
    // Maintenance Work Orders
    public function maintenanceWorkOrders(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $orders = MaintenanceWorkOrder::select('*');

            return DataTables::of($orders)
                ->addColumn('full_name', function ($order) {
                    return $order->first_name . ' ' . $order->last_name;
                })
                ->editColumn('todays_date', function ($order) {
                    return $order->todays_date ? $order->todays_date->format('M d, Y') : '';
                })
                ->editColumn('completion_date', function ($order) {
                    return $order->completion_date ? $order->completion_date->format('M d, Y') : '';
                })
                ->editColumn('created_at', function ($order) {
                    return $order->created_at->format('M d, Y h:i A');
                })
                ->make(true);
        }

        return view('backend.pages.forms.maintenance-work-orders');
    }

    // Suggestions
    public function suggestions(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $suggestions = Suggestion::select('*');

            return DataTables::of($suggestions)
                ->addColumn('full_name', function ($suggestion) {
                    return $suggestion->first_name . ' ' . $suggestion->last_name;
                })
                ->editColumn('created_at', function ($suggestion) {
                    return $suggestion->created_at->format('M d, Y h:i A');
                })
                ->make(true);
        }

        return view('backend.pages.forms.suggestions');
    }

    // Time Clock Change Requests
    public function timeClockChangeRequests(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $requests = TimeClockChangeRequest::select('*');

            return DataTables::of($requests)
                ->addColumn('full_name', function ($request) {
                    return $request->first_name . ' ' . $request->last_name;
                })
                ->addColumn('supervisor_name', function ($request) {
                    return $request->supervisor_first_name . ' ' . $request->supervisor_last_name;
                })
                ->editColumn('date_to_be_changed', function ($request) {
                    return $request->date_to_be_changed ? $request->date_to_be_changed->format('M d, Y') : '';
                })
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('M d, Y h:i A');
                })
                ->make(true);
        }

        return view('backend.pages.forms.time-clock-change-requests');
    }

    // Time Off Requests
    public function timeOffRequests(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $requests = TimeOffRequestForm::select('*');

            return DataTables::of($requests)
                ->addColumn('full_name', function ($request) {
                    return $request->name;
                })
                ->editColumn('todays_date', function ($request) {
                    return $request->todays_date ? $request->todays_date->format('M d, Y') : '';
                })
                ->editColumn('start_date', function ($request) {
                    return $request->start_date ? $request->start_date->format('M d, Y') : '';
                })
                ->editColumn('end_date', function ($request) {
                    return $request->end_date ? $request->end_date->format('M d, Y') : '';
                })
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('M d, Y h:i A');
                })
                ->make(true);
        }

        return view('backend.pages.forms.time-off-requests');
    }

    // Standard T-Shirt Orders
    public function standardTShirtOrders(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $orders = StandardTShirtOrder::select('*');

            return DataTables::of($orders)
                ->addColumn('full_name', function ($order) {
                    return $order->first_name . ' ' . $order->last_name;
                })
                ->editColumn('colors', function ($order) {
                    if (is_array($order->colors)) {
                        return implode(', ', $order->colors);
                    }
                    return $order->colors ?? '';
                })
                ->editColumn('special_instructions', function ($order) {
                    return $order->special_instructions ?? '-';
                })
                ->editColumn('created_at', function ($order) {
                    return $order->created_at->format('M d, Y h:i A');
                })
                ->make(true);
        }

        return view('backend.pages.forms.standard-t-shirt-orders');
    }

    // Specialty T-Shirt Orders
    public function specialtyTShirtOrders(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $orders = SpecialtyTShirtOrder::select('*');

            return DataTables::of($orders)
                ->addColumn('full_name', function ($order) {
                    return $order->first_name . ' ' . $order->last_name;
                })
                ->editColumn('themes', function ($order) {
                    if (is_array($order->themes)) {
                        return implode(', ', $order->themes);
                    }
                    return $order->themes ?? '';
                })
                ->editColumn('special_instructions', function ($order) {
                    return $order->special_instructions ?? '-';
                })
                ->editColumn('created_at', function ($order) {
                    return $order->created_at->format('M d, Y h:i A');
                })
                ->make(true);
        }

        return view('backend.pages.forms.specialty-t-shirt-orders');
    }

    // Supply Orders
    public function supplyOrders(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $orders = SupplyOrder::select('*');

            return DataTables::of($orders)
                ->addColumn('items_count', function ($order) {
                    if (is_array($order->order_items)) {
                        return count($order->order_items);
                    }
                    return 0;
                })
                ->editColumn('order_items', function ($order) {
                    if (is_array($order->order_items)) {
                        $items = [];
                        foreach ($order->order_items as $key => $value) {
                            if ($value > 0) {
                                $items[] = ucfirst(str_replace('_', ' ', $key)) . ': ' . $value;
                            }
                        }
                        return implode(', ', $items);
                    }
                    return '';
                })
                ->editColumn('created_at', function ($order) {
                    return $order->created_at->format('M d, Y h:i A');
                })
                ->make(true);
        }

        return view('backend.pages.forms.supply-orders');
    }

    // Snack Orders
    public function snackOrders(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $orders = SnackOrder::select('*');

            return DataTables::of($orders)
                ->addColumn('items_count', function ($order) {
                    if (is_array($order->order_items)) {
                        return count($order->order_items);
                    }
                    return 0;
                })
                ->editColumn('order_items', function ($order) {
                    if (is_array($order->order_items)) {
                        $items = [];
                        foreach ($order->order_items as $key => $value) {
                            if ($value > 0) {
                                $items[] = ucfirst(str_replace('_', ' ', $key)) . ': ' . $value;
                            }
                        }
                        return implode(', ', $items);
                    }
                    return '';
                })
                ->editColumn('created_at', function ($order) {
                    return $order->created_at->format('M d, Y h:i A');
                })
                ->make(true);
        }

        return view('backend.pages.forms.snack-orders');
    }

    // Newsletter Subscriptions
    public function newsletterSubscriptions(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $subscriptions = NewsletterSubscription::select('*');

            return DataTables::of($subscriptions)
                ->editColumn('name', function ($subscription) {
                    return $subscription->name ?? '-';
                })
                ->editColumn('created_at', function ($subscription) {
                    return $subscription->created_at->format('M d, Y h:i A');
                })
                ->make(true);
        }

        return view('backend.pages.forms.newsletter-subscriptions');
    }
}
