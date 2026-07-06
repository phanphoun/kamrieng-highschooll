<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    /**
     * Display the teacher's assignments.
     */
    public function index()
    {
        $teacher = Auth::user();
        $assignments = $teacher->classes()->with('assignments')->get();
        return view('teacher.assignments', compact('teacher', 'assignments'));
    }

    /**
     * Show the form for creating a new assignment.
     */
    public function create()
    {
        $teacher = Auth::user();
        $classes = $teacher->classes;
        return view('teacher.assignment-create', compact('teacher', 'classes'));
    }

    /**
     * Store a newly created assignment.
     */
    public function store(Request $request)
    {
        $teacher = Auth::user();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'class_id' => 'required|exists:school_classes,id',
            'due_date' => 'nullable|date',
            'max_score' => 'nullable|numeric|min:0',
        ]);

        $validated['teacher_id'] = $teacher->id;
        $validated['status'] = 'published';

        Assignment::create($validated);

        return redirect()->route('teacher.assignments')
            ->with('success', 'Assignment created successfully.');
    }

    /**
     * Display the specified assignment.
     */
    public function show($id)
    {
        $teacher = Auth::user();
        $assignment = Assignment::with('submissions.student')
            ->where('teacher_id', $teacher->id)
            ->findOrFail($id);
        return view('teacher.assignment-detail', compact('teacher', 'assignment'));
    }

    /**
     * Show the form for editing the specified assignment.
     */
    public function edit($id)
    {
        $teacher = Auth::user();
        $assignment = Assignment::where('teacher_id', $teacher->id)->findOrFail($id);
        $classes = $teacher->classes;
        return view('teacher.assignment-edit', compact('teacher', 'assignment', 'classes'));
    }

    /**
     * Update the specified assignment.
     */
    public function update(Request $request, $id)
    {
        $teacher = Auth::user();
        $assignment = Assignment::where('teacher_id', $teacher->id)->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'max_score' => 'nullable|numeric|min:0',
        ]);

        $assignment->update($validated);

        return redirect()->route('teacher.assignments')
            ->with('success', 'Assignment updated successfully.');
    }

    /**
     * Remove the specified assignment.
     */
    public function destroy($id)
    {
        $teacher = Auth::user();
        $assignment = Assignment::where('teacher_id', $teacher->id)->findOrFail($id);
        $assignment->delete();

        return redirect()->route('teacher.assignments')
            ->with('success', 'Assignment deleted successfully.');
    }
}
