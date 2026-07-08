<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEnrollmentStatusRequest;
use App\Models\ApplicationStatus;
use App\Models\EnrollmentApplication;

class EnrollmentController extends Controller
{
    public function index()
    {
        $applications = EnrollmentApplication::with('status')
            ->latest()
            ->paginate(20);

        $statuses = ApplicationStatus::orderBy('sort_order')->get();

        return view('admin.enrollments.index', compact('applications', 'statuses'));
    }

    public function show(EnrollmentApplication $enrollment)
    {
        $statuses = ApplicationStatus::orderBy('sort_order')->get();

        return view('admin.enrollments.show', compact('enrollment', 'statuses'));
    }

    public function updateStatus(StoreEnrollmentStatusRequest $request, EnrollmentApplication $enrollment)
    {
        $validated = $request->validated();

        $validated['reviewed_by'] = auth()->id();
        $validated['reviewed_at'] = now();

        $enrollment->update($validated);

        // Notify applicant
        $enrollment->notify(new EnrollmentStatusUpdated($enrollment));

        return redirect()->route('admin.enrollments.show', $enrollment)
            ->with('success', 'Application status updated successfully.');
    }
}
