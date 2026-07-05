<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the teacher dashboard.
     */
    public function index()
    {
        $teacher = Auth::user();
        return view('teacher.dashboard', compact('teacher'));
    }
}