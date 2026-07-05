<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display all students.
     */
    public function index()
    {
        $students = User::where('role', 'student')->orderBy('name')->paginate(20);
        return view('admin.students', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('admin.student-create');
    }

    /**
     * Store a newly created student.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'parent_id' => 'nullable|exists:users,id',
            'class_id' => 'nullable|exists:school_classes,id',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = 'student';
        User::create($validated);

        return redirect()->route('admin.students')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified student.
     */
    public function show($id)
    {
        $student = User::where('role', 'student')->findOrFail($id);
        return view('admin.student-detail', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit($id)
    {
        $student = User::where('role', 'student')->findOrFail($id);
        return view('admin.student-edit', compact('student'));
    }

    /**
     * Update the specified student.
     */
    public function update(Request $request, $id)
    {
        $student = User::where('role', 'student')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$student->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'parent_id' => 'nullable|exists:users,id',
            'class_id' => 'nullable|exists:school_classes,id',
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        $student->update($validated);

        return redirect()->route('admin.students')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified student.
     */
    public function destroy($id)
    {
        $student = User::where('role', 'student')->findOrFail($id);
        $student->delete();
        return redirect()->route('admin.students')->with('success', 'Student deleted successfully.');
    }
}