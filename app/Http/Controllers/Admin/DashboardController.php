<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\EnrollmentApplication;
use App\Models\News;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_news' => News::count(),
            'total_enrollments' => EnrollmentApplication::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentEnrollments = EnrollmentApplication::with('status')
            ->latest()->take(5)->get();

        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentEnrollments', 'recentMessages'));
    }
}
