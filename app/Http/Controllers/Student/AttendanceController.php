<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display the student's attendance records.
     */
    public function index()
    {
        $student = Auth::user();
        $attendance = $student->attendance;
        return view('student.attendance', compact('student', 'attendance'));
    }

    /**
     * Display attendance for a specific month.
     */
    public function monthly($month)
    {
        $student = Auth::user();
        $attendance = $student->attendance()->whereMonth('date', $month)->get();
        return view('student.attendance-monthly', compact('student', 'attendance', 'month'));
    }
}