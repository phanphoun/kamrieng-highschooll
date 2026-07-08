<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Models\ApplicationStatus;
use App\Models\EnrollmentApplication;
use App\Models\User;
use App\Notifications\EnrollmentSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnrollmentController extends Controller
{
    /**
     * Display the enrollment application form.
     */
    public function apply()
    {
        $grades = ['Grade 10', 'Grade 11', 'Grade 12'];
        $academicYears = ['2025-2026', '2026-2027'];

        return view('public.pages.enrollment.apply', compact('grades', 'academicYears'));
    }

    /**
     * Store a new enrollment application.
     */
    public function store(StoreEnrollmentRequest $request)
    {
        $validated = $request->validated();

        // Generate tracking code
        $validated['tracking_code'] = 'EDU-'.strtoupper(Str::random(6));
        $validated['status_id'] = ApplicationStatus::where('is_default', true)->first()?->id;

        EnrollmentApplication::create($validated);

        // Notify admins
        $enrollment = EnrollmentApplication::where('tracking_code', $validated['tracking_code'])->first();
        $admins = User::role('admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new EnrollmentSubmitted($enrollment));
        }

        return redirect()->route('enrollment.track', ['code' => $validated['tracking_code']])
            ->with('success', __('messages.enrollment_success'));
    }

    /**
     * Track enrollment application status.
     */
    public function track(Request $request)
    {
        $code = $request->input('code');
        $application = null;

        if ($code) {
            $application = EnrollmentApplication::with('status')
                ->where('tracking_code', $code)
                ->first();
        }

        return view('public.pages.enrollment.track', compact('application', 'code'));
    }
}
