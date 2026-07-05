<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display the teacher's classes for attendance tracking.
     */
    public function index()
    {
        $teacher = Auth::user();
        $classes = $teacher->classes;
        return view('teacher.attendance', compact('teacher', 'classes'));
    }

    /**
     * Display attendance form for a specific class.
     */
    public function showClass($classId)
    {
        $teacher = Auth::user();
        $class = $teacher->classes()->findOrFail($classId);
        $students = $class->students;
        $date = now()->format('Y-m-d');
        return view('teacher.attendance-class', compact('teacher', 'class', 'students', 'date'));
    }

    /**
     * Store attendance records for students.
     */
    public function store(Request $request, $classId)
    {
        $teacher = Auth::user();
        $class = $teacher->classes()->findOrFail($classId);

        $validated = $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*.student_id' => 'required|exists:users,id',
            'attendance.*.status' => 'required|in:present,absent,late,excused',
            'attendance.*.notes' => 'nullable|string',
        ]);

        foreach ($validated['attendance'] as $attendanceData) {
            // Update or create attendance record
            $class->students()->updateOrCreate(
                ['id' => $attendanceData['student_id']],
                [
                    'attendance_date' => $validated['date'],
                    'attendance_status' => $attendanceData['status'],
                    'attendance_notes' => $attendanceData['notes']
                ]
            );
        }

        return redirect()->route('teacher.attendance')->with('success', 'Attendance recorded successfully.');
    }
}