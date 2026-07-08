<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationStatus;
use App\Models\EnrollmentApplication;

class EnrollmentStatsController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => EnrollmentApplication::count(),
            'pending' => EnrollmentApplication::whereHas('status', fn($q) => $q->where('is_default', true))->count(),
            'approved' => EnrollmentApplication::whereHas('status', fn($q) => $q->where('name_en', 'Approved'))->count(),
            'rejected' => EnrollmentApplication::whereHas('status', fn($q) => $q->where('name_en', 'Rejected'))->count(),
        ];

        $monthlyData = EnrollmentApplication::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $statusBreakdown = ApplicationStatus::withCount('applications')->get();

        return view('admin.enrollments.stats', compact('stats', 'monthlyData', 'statusBreakdown'));
    }
}
