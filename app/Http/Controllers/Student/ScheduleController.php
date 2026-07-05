<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display the student's class schedule.
     */
    public function index()
    {
        $student = Auth::user();
        $schedule = $student->schedule;
        return view('student.schedule', compact('student', 'schedule'));
    }

    /**
     * Display schedule for a specific day.
     */
    public function daily($day)
    {
        $student = Auth::user();
        $schedule = $student->schedule()->where('day', $day)->get();
        return view('student.schedule-daily', compact('student', 'schedule', 'day'));
    }
}