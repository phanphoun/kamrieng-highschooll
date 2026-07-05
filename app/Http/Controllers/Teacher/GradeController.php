<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    /**
     * Display the teacher's classes and students for grading.
     */
    public function index()
    {
        $teacher = Auth::user();
        $classes = $teacher->classes;
        return view('teacher.grades', compact('teacher', 'classes'));
    }

    /**
     * Display students in a specific class for grading.
     */
    public function showClass($classId)
    {
        $teacher = Auth::user();
        $class = $teacher->classes()->findOrFail($classId);
        $students = $class->students;
        return view('teacher.grade-class', compact('teacher', 'class', 'students'));
    }

    /**
     * Store or update grades for students.
     */
    public function store(Request $request, $classId)
    {
        $teacher = Auth::user();
        $class = $teacher->classes()->findOrFail($classId);

        $validated = $request->validate([
            'grades' => 'required|array',
            'grades.*.student_id' => 'required|exists:users,id',
            'grades.*.score' => 'required|numeric|min:0|max:100',
            'grades.*.comments' => 'nullable|string',
        ]);

        foreach ($validated['grades'] as $gradeData) {
            // Update or create grade record
            $class->students()->updateOrCreate(
                ['id' => $gradeData['student_id']],
                ['grade' => $gradeData['score'], 'comments' => $gradeData['comments']]
            );
        }

        return redirect()->route('teacher.grades')->with('success', 'Grades updated successfully.');
    }
}