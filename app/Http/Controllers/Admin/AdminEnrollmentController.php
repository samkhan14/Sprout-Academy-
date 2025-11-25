<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminEnrollmentController extends Controller
{
    /**
     * Display list of all enrollments
     */
    public function index(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $enrollments = Enrollment::with([
                'contacts' => function($query) {
                    $query->where('is_primary', true);
                },
                'phones',
                'children'
            ])->select('enrollments.*');

            return DataTables::of($enrollments)
                ->addColumn('primary_contact', function ($enrollment) {
                    $primaryContact = $enrollment->contacts->where('is_primary', true)->first();
                    if ($primaryContact) {
                        return $primaryContact->first_name . ' ' . $primaryContact->last_name;
                    }
                    return 'N/A';
                })
                ->addColumn('phone', function ($enrollment) {
                    $phone = $enrollment->phones->first();
                    if ($phone && $phone->area_code && $phone->phone_number) {
                        return '(' . $phone->area_code . ') ' . $phone->phone_number;
                    }
                    return 'N/A';
                })
                ->addColumn('children_count', function ($enrollment) {
                    return $enrollment->children->count();
                })
                ->addColumn('contacts_count', function ($enrollment) {
                    // Load all contacts to count non-primary ones
                    $enrollment->load('contacts');
                    return $enrollment->contacts->where('is_primary', false)->count();
                })
                ->editColumn('location', function ($enrollment) {
                    return strtoupper($enrollment->location);
                })
                ->editColumn('status', function ($enrollment) {
                    $badgeClass = $enrollment->status === 'submitted' ? 'success' : 'warning';
                    return '<span class="badge bg-' . $badgeClass . '">' . ucfirst($enrollment->status) . '</span>';
                })
                ->editColumn('referrer', function ($enrollment) {
                    return $enrollment->referrer ? ucfirst(str_replace('-', ' ', $enrollment->referrer)) : 'N/A';
                })
                ->editColumn('created_at', function ($enrollment) {
                    return $enrollment->created_at->format('M d, Y h:i A');
                })
                ->addColumn('action', function ($enrollment) {
                    return '<a href="' . route('admin.enrollments.show', $enrollment->id) . '" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i> View Details
                    </a>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.pages.enrollments.index');
    }

    /**
     * Display enrollment details
     */
    public function show($id)
    {
        $enrollment = Enrollment::with([
            'contacts' => function($query) {
                $query->orderBy('is_primary', 'desc');
            },
            'children',
            'addresses',
            'phones'
        ])->findOrFail($id);

        return view('backend.pages.enrollments.show', compact('enrollment'));
    }
}

