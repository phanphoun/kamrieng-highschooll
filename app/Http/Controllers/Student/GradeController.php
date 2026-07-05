<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    /**
     * Display the student's grades.
     */
    public function index()
    {
        $student = Auth::user();
        $grades = $student->grades;
        return view('student.grades', compact('student', 'grades'));
    }

    /**
     * Display detailed grade information.
     */
    public function show($id)
    {
        $student = Auth::user();
        $grade = $student->grades()->findOrFail($id);
        return view('student.grade-detail', compact('student', 'grade'));
    }
}