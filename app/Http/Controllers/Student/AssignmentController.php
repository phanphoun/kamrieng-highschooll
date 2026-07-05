<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    /**
     * Display the student's assignments.
     */
    public function index()
    {
        $student = Auth::user();
        $assignments = $student->classAssignments;
        return view('student.assignments', compact('student', 'assignments'));
    }

    /**
     * Display assignment details.
     */
    public function show($id)
    {
        $student = Auth::user();
        $assignment = \App\Models\Assignment::findOrFail($id);
        // Check if student has access to this assignment through their class
        if (!$student->schoolClasses()->where('id', $assignment->class_id)->exists()) {
            abort(403, 'You do not have access to this assignment.');
        }
        return view('student.assignment-detail', compact('student', 'assignment'));
    }

    /**
     * Submit an assignment.
     */
    public function submit(Request $request, $id)
    {
        $student = Auth::user();
        $assignment = $student->assignments()->findOrFail($id);

        $validated = $request->validate([
            'submission_text' => 'nullable|string',
            'submission_file' => 'nullable|file|max:10240',
        ]);

        // Handle file upload if present
        if ($request->hasFile('submission_file')) {
            $path = $request->file('submission_file')->store('submissions');
            $validated['submission_file'] = $path;
        }

        $assignment->update($validated);

        return redirect()->route('student.assignments')->with('success', 'Assignment submitted successfully.');
    }
}