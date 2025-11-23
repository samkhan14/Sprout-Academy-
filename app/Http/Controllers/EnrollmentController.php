<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\EnrollmentContact;
use App\Models\EnrollmentChild;
use App\Models\EnrollmentAddress;
use App\Models\EnrollmentPhone;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EnrollmentController extends Controller
{
    // Location data configuration
    private function getLocationData($location)
    {
        $locations = [
            'seminole' => [
                'name' => 'SEMINOLE',
                'address' => '9259 Park Blvd Seminole, FL 33777',
                'phone' => '727-399-2483',
                'map_address' => '9259 Park Blvd Seminole, FL 33777',
            ],
            'clearwater' => [
                'name' => 'CLEARWATER',
                'address' => '7985 113th St N, Seminole, FL 33772',
                'phone' => '(727) 953-5544',
                'map_address' => '7985 113th St N, Seminole, FL 33772',
            ],
            'pinellas-park' => [
                'name' => 'PINELLAS PARK',
                'address' => '7985 113th St N, Seminole, FL 33772',
                'phone' => '(727) 953-5544',
                'map_address' => '7985 113th St N, Seminole, FL 33772',
            ],
            'largo' => [
                'name' => 'LARGO',
                'address' => '7985 113th St N, Seminole, FL 33772',
                'phone' => '(727) 953-5544',
                'map_address' => '7985 113th St N, Seminole, FL 33772',
            ],
            'st-petersburg' => [
                'name' => 'ST. PETERSBURG',
                'address' => '7985 113th St N, Seminole, FL 33772',
                'phone' => '(727) 953-5544',
                'map_address' => '7985 113th St N, Seminole, FL 33772',
            ],
            'montessori' => [
                'name' => 'MONTESSORI',
                'address' => '7985 113th St N, Seminole, FL 33772',
                'phone' => '(727) 953-5544',
                'map_address' => '7985 113th St N, Seminole, FL 33772',
            ],
        ];

        return $locations[$location] ?? $locations['seminole'];
    }

    /**
     * Show enrollment form - Step 1 (Account Info)
     */
    public function showEnrollmentForm(Request $request, $location)
    {
        $locationData = $this->getLocationData($location);
        $enrollmentId = $request->session()->get('enrollment_id');
        $enrollment = null;
        $primaryContact = null;
        $address = null;
        $phones = collect([]); // Initialize as collection

        if ($enrollmentId) {
            $enrollment = Enrollment::with(['contacts' => function($query) {
                $query->where('is_primary', true);
            }, 'addresses', 'phones'])->find($enrollmentId);
            if ($enrollment) {
                $primaryContact = $enrollment->contacts ? $enrollment->contacts->where('is_primary', true)->first() : null;
                $address = $enrollment->addresses()->where('is_physical', true)->first();
                $phones = $enrollment->phones ?: collect([]);
            }
        }

        return view('frontend.pages.enrollment.step1_account_info', [
            'location' => $location,
            'locationData' => $locationData,
            'enrollment' => $enrollment,
            'primaryContact' => $primaryContact,
            'address' => $address,
            'phones' => $phones,
            'currentStep' => 1,
        ]);
    }

    /**
     * Save Step 1 - Account Info
     */
    public function saveStep1(Request $request, $location)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'middle_initial' => 'nullable|string|max:1',
                'gender' => 'nullable|in:male,female,other',
                'date_of_birth' => 'nullable|date',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'address_line_1' => 'nullable|string|max:255',
                'address_line_2' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'zip_code' => 'nullable|string|max:10',
                'is_physical' => 'nullable|boolean',
                'is_mailing' => 'nullable|boolean',
                'phone_type.*' => 'nullable|string|max:50',
                'phone_area_code.*' => 'nullable|string|max:3',
                'phone_number.*' => 'nullable|string|max:20',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Get or create enrollment
            $enrollmentId = $request->session()->get('enrollment_id');
            if ($enrollmentId) {
                $enrollment = Enrollment::find($enrollmentId);
            } else {
                $enrollment = Enrollment::create([
                    'location' => $location,
                    'status' => 'draft',
                    'current_step' => 1,
                ]);
                $request->session()->put('enrollment_id', $enrollment->id);
            }

            // Handle profile image upload
            $profileImagePath = null;
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $profileImagePath = $file->storeAs('enrollments/profiles', $filename, 'public');
            }

            // Create or update primary contact
            $primaryContact = $enrollment->primaryContact;
            if (!$primaryContact) {
                $primaryContact = EnrollmentContact::create([
                    'enrollment_id' => $enrollment->id,
                    'first_name' => $request->first_name,
                    'middle_initial' => $request->middle_initial,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'profile_image' => $profileImagePath,
                    'is_primary' => true,
                    'contact_order' => 0,
                ]);
            } else {
                $primaryContact->update([
                    'first_name' => $request->first_name,
                    'middle_initial' => $request->middle_initial,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'profile_image' => $profileImagePath ?? $primaryContact->profile_image,
                ]);
            }

            // Handle address
            if ($request->address_line_1) {
                $address = $enrollment->addresses()->where('is_physical', true)->first();
                if (!$address) {
                    EnrollmentAddress::create([
                        'enrollment_id' => $enrollment->id,
                        'enrollment_contact_id' => $primaryContact->id,
                        'address_line_1' => $request->address_line_1,
                        'address_line_2' => $request->address_line_2,
                        'city' => $request->city,
                        'state' => $request->state,
                        'zip_code' => $request->zip_code,
                        'is_physical' => $request->is_physical ?? true,
                        'is_mailing' => $request->is_mailing ?? false,
                    ]);
                } else {
                    $address->update([
                        'address_line_1' => $request->address_line_1,
                        'address_line_2' => $request->address_line_2,
                        'city' => $request->city,
                        'state' => $request->state,
                        'zip_code' => $request->zip_code,
                        'is_physical' => $request->is_physical ?? true,
                        'is_mailing' => $request->is_mailing ?? false,
                    ]);
                }
            }

            // Handle phones
            if ($request->phone_type) {
                // Delete existing phones for this contact
                $enrollment->phones()->where('enrollment_contact_id', $primaryContact->id)->delete();
                
                foreach ($request->phone_type as $index => $type) {
                    if ($type && $request->phone_area_code[$index] && $request->phone_number[$index]) {
                        EnrollmentPhone::create([
                            'enrollment_id' => $enrollment->id,
                            'enrollment_contact_id' => $primaryContact->id,
                            'type' => $type,
                            'area_code' => $request->phone_area_code[$index],
                            'phone_number' => $request->phone_number[$index],
                            'phone_order' => $index,
                        ]);
                    }
                }
            }

            // Update enrollment step
            $enrollment->update(['current_step' => 1]);

            return response()->json([
                'success' => true,
                'message' => 'Account information saved successfully.',
                'data' => [
                    'enrollment_id' => $enrollment->id,
                    'next_step' => 2,
                ]
            ], 200);

        } catch (\Exception $e) {
            Log::error('Enrollment Step 1 save failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Show Step 2 - Children Info
     */
    public function showStep2(Request $request, $location)
    {
        $locationData = $this->getLocationData($location);
        $enrollmentId = $request->session()->get('enrollment_id');
        
        if (!$enrollmentId) {
            return redirect()->route('enrollment.form', ['location' => $location]);
        }

        $enrollment = Enrollment::with('children')->find($enrollmentId);
        if (!$enrollment) {
            return redirect()->route('enrollment.form', ['location' => $location]);
        }

        return view('frontend.pages.enrollment.step2_children_info', [
            'location' => $location,
            'locationData' => $locationData,
            'enrollment' => $enrollment,
            'children' => $enrollment->children ?: collect([]),
            'currentStep' => 2,
        ]);
    }

    /**
     * Save Step 2 - Children Info
     */
    public function saveStep2(Request $request, $location)
    {
        try {
            $validator = Validator::make($request->all(), [
                'child_first_name.*' => 'required|string|max:255',
                'child_last_name.*' => 'required|string|max:255',
                'child_middle_initial.*' => 'nullable|string|max:1',
                'child_gender.*' => 'nullable|in:male,female,other',
                'child_date_of_birth.*' => 'nullable|date',
                'child_profile_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $enrollmentId = $request->session()->get('enrollment_id');
            if (!$enrollmentId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Enrollment session expired. Please start over.',
                ], 400);
            }

            $enrollment = Enrollment::find($enrollmentId);
            if (!$enrollment) {
                return response()->json([
                    'success' => false,
                    'message' => 'Enrollment not found.',
                ], 404);
            }

            // Delete existing children
            $enrollment->children()->delete();

            // Create new children
            if ($request->child_first_name) {
                foreach ($request->child_first_name as $index => $firstName) {
                    $profileImagePath = null;
                    if ($request->hasFile("child_profile_image.$index")) {
                        $file = $request->file("child_profile_image.$index");
                        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                        $profileImagePath = $file->storeAs('enrollments/children', $filename, 'public');
                    }

                    EnrollmentChild::create([
                        'enrollment_id' => $enrollment->id,
                        'first_name' => $firstName,
                        'middle_initial' => $request->child_middle_initial[$index] ?? null,
                        'last_name' => $request->child_last_name[$index],
                        'gender' => $request->child_gender[$index] ?? null,
                        'date_of_birth' => $request->child_date_of_birth[$index] ?? null,
                        'profile_image' => $profileImagePath,
                        'child_order' => $index,
                    ]);
                }
            }

            $enrollment->update(['current_step' => 2]);

            return response()->json([
                'success' => true,
                'message' => 'Children information saved successfully.',
                'data' => [
                    'enrollment_id' => $enrollment->id,
                    'next_step' => 3,
                ]
            ], 200);

        } catch (\Exception $e) {
            Log::error('Enrollment Step 2 save failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Show Step 3 - Emergency Contacts
     */
    public function showStep3(Request $request, $location)
    {
        $locationData = $this->getLocationData($location);
        $enrollmentId = $request->session()->get('enrollment_id');
        
        if (!$enrollmentId) {
            return redirect()->route('enrollment.form', ['location' => $location]);
        }

        $enrollment = Enrollment::with(['contacts' => function($query) {
            $query->where('is_primary', false);
        }])->find($enrollmentId);

        if (!$enrollment) {
            return redirect()->route('enrollment.form', ['location' => $location]);
        }

        return view('frontend.pages.enrollment.step3_emergency_contacts', [
            'location' => $location,
            'locationData' => $locationData,
            'enrollment' => $enrollment,
            'contacts' => $enrollment->contacts ?: collect([]),
            'currentStep' => 3,
        ]);
    }

    /**
     * Save Step 3 - Emergency Contacts
     */
    public function saveStep3(Request $request, $location)
    {
        try {
            $validator = Validator::make($request->all(), [
                'contact_first_name.*' => 'required|string|max:255',
                'contact_last_name.*' => 'required|string|max:255',
                'contact_middle_initial.*' => 'nullable|string|max:1',
                'contact_gender.*' => 'nullable|in:male,female,other',
                'contact_date_of_birth.*' => 'nullable|date',
                'contact_relationship_type.*' => 'nullable|string|max:255',
                'contact_lives_with.*' => 'nullable|boolean',
                'contact_is_emergency.*' => 'nullable|boolean',
                'contact_is_pickup.*' => 'nullable|boolean',
                'contact_profile_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $enrollmentId = $request->session()->get('enrollment_id');
            if (!$enrollmentId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Enrollment session expired. Please start over.',
                ], 400);
            }

            $enrollment = Enrollment::find($enrollmentId);
            if (!$enrollment) {
                return response()->json([
                    'success' => false,
                    'message' => 'Enrollment not found.',
                ], 404);
            }

            // Delete existing non-primary contacts
            $enrollment->contacts()->where('is_primary', false)->delete();

            // Create new emergency contacts
            if ($request->contact_first_name) {
                foreach ($request->contact_first_name as $index => $firstName) {
                    $profileImagePath = null;
                    if ($request->hasFile("contact_profile_image.$index")) {
                        $file = $request->file("contact_profile_image.$index");
                        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                        $profileImagePath = $file->storeAs('enrollments/contacts', $filename, 'public');
                    }

                    EnrollmentContact::create([
                        'enrollment_id' => $enrollment->id,
                        'first_name' => $firstName,
                        'middle_initial' => $request->contact_middle_initial[$index] ?? null,
                        'last_name' => $request->contact_last_name[$index],
                        'gender' => $request->contact_gender[$index] ?? null,
                        'date_of_birth' => $request->contact_date_of_birth[$index] ?? null,
                        'profile_image' => $profileImagePath,
                        'relationship_type' => $request->contact_relationship_type[$index] ?? null,
                        'lives_with' => $request->contact_lives_with[$index] ?? false,
                        'is_emergency_contact' => $request->contact_is_emergency[$index] ?? false,
                        'is_authorized_pickup' => $request->contact_is_pickup[$index] ?? false,
                        'is_primary' => false,
                        'contact_order' => $index,
                    ]);
                }
            }

            $enrollment->update(['current_step' => 3]);

            return response()->json([
                'success' => true,
                'message' => 'Emergency contacts saved successfully.',
                'data' => [
                    'enrollment_id' => $enrollment->id,
                    'next_step' => 4,
                ]
            ], 200);

        } catch (\Exception $e) {
            Log::error('Enrollment Step 3 save failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Show Step 4 - Review & Submit
     */
    public function showStep4(Request $request, $location)
    {
        $locationData = $this->getLocationData($location);
        $enrollmentId = $request->session()->get('enrollment_id');
        
        if (!$enrollmentId) {
            return redirect()->route('enrollment.form', ['location' => $location]);
        }

        $enrollment = Enrollment::with([
            'contacts' => function($query) {
                $query->orderBy('is_primary', 'desc');
            },
            'children',
            'addresses',
            'phones'
        ])->find($enrollmentId);

        if (!$enrollment) {
            return redirect()->route('enrollment.form', ['location' => $location]);
        }

        return view('frontend.pages.enrollment.step4_review', [
            'location' => $location,
            'locationData' => $locationData,
            'enrollment' => $enrollment,
            'currentStep' => 4,
        ]);
    }

    /**
     * Submit Enrollment
     */
    public function submitEnrollment(Request $request, $location)
    {
        try {
            $enrollmentId = $request->session()->get('enrollment_id');
            if (!$enrollmentId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Enrollment session expired. Please start over.',
                ], 400);
            }

            $enrollment = Enrollment::find($enrollmentId);
            if (!$enrollment) {
                return response()->json([
                    'success' => false,
                    'message' => 'Enrollment not found.',
                ], 404);
            }

            // Update enrollment status
            $enrollment->update([
                'status' => 'submitted',
                'current_step' => 4,
            ]);

            // Clear session
            $request->session()->forget('enrollment_id');

            return response()->json([
                'success' => true,
                'message' => 'Enrollment submitted successfully!',
                'data' => [
                    'enrollment_id' => $enrollment->id,
                    'redirect_url' => route('enrollment.thankYou', ['location' => $location]),
                ]
            ], 200);

        } catch (\Exception $e) {
            Log::error('Enrollment submission failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Thank You Page
     */
    public function thankYou(Request $request, $location)
    {
        $locationData = $this->getLocationData($location);
        
        return view('frontend.pages.enrollment.thank_you', [
            'location' => $location,
            'locationData' => $locationData,
        ]);
    }
}
