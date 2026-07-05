<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display all school classes.
     */
    public function index()
    {
        $classes = SchoolClass::with('teacher')->orderBy('name')->paginate(20);
        return view('admin.classes', compact('classes'));
    }

    /**
     * Show the form for creating a new school class.
     */
    public function create()
    {
        $teachers = \App\Models\User::where('role', 'teacher')->get();
        return view('admin.class-create', compact('teachers'));
    }

    /**
     * Store a newly created school class.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:50',
            'section' => 'nullable|string|max:50',
            'room_number' => 'nullable|string|max:50',
            'teacher_id' => 'nullable|exists:users,id',
            'capacity' => 'nullable|integer|min:1',
            'academic_year' => 'required|string|max:20',
            'description' => 'nullable|string',
        ]);

        SchoolClass::create($validated);

        return redirect()->route('admin.classes')->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified school class.
     */
    public function show($id)
    {
        $class = SchoolClass::with(['teacher', 'students'])->findOrFail($id);
        return view('admin.class-detail', compact('class'));
    }

    /**
     * Show the form for editing the specified school class.
     */
    public function edit($id)
    {
        $class = SchoolClass::findOrFail($id);
        $teachers = \App\Models\User::where('role', 'teacher')->get();
        return view('admin.class-edit', compact('class', 'teachers'));
    }

    /**
     * Update the specified school class.
     */
    public function update(Request $request, $id)
    {
        $class = SchoolClass::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:50',
            'section' => 'nullable|string|max:50',
            'room_number' => 'nullable|string|max:50',
            'teacher_id' => 'nullable|exists:users,id',
            'capacity' => 'nullable|integer|min:1',
            'academic_year' => 'required|string|max:20',
            'description' => 'nullable|string',
        ]);

        $class->update($validated);

        return redirect()->route('admin.classes')->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified school class.
     */
    public function destroy($id)
    {
        $class = SchoolClass::findOrFail($id);
        $class->delete();
        return redirect()->route('admin.classes')->with('success', 'Class deleted successfully.');
    }

    /**
     * Add students to a class.
     */
    public function addStudents(Request $request, $id)
    {
        $class = SchoolClass::findOrFail($id);

        $validated = $request->validate([
            'student_ids' => 'required|array',
            'student_ids.*' => 'exists:users,id',
        ]);

        $class->students()->syncWithoutDetaching($validated['student_ids']);

        return redirect()->route('admin.classes.show', $id)->with('success', 'Students added to class successfully.');
    }

    /**
     * Remove students from a class.
     */
    public function removeStudents(Request $request, $id)
    {
        $class = SchoolClass::findOrFail($id);

        $validated = $request->validate([
            'student_ids' => 'required|array',
            'student_ids.*' => 'exists:users,id',
        ]);

        $class->students()->detach($validated['student_ids']);

        return redirect()->route('admin.classes.show', $id)->with('success', 'Students removed from class successfully.');
    }
}