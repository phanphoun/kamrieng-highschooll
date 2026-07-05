<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $admin = Auth::user();
        $stats = [
            'total_students' => \App\Models\User::where('role', 'student')->count(),
            'total_teachers' => \App\Models\User::where('role', 'teacher')->count(),
            'total_classes' => \App\Models\SchoolClass::count(),
            'total_parents' => \App\Models\User::where('role', 'parent')->count(),
        ];
        return view('admin.dashboard', compact('admin', 'stats'));
    }
}