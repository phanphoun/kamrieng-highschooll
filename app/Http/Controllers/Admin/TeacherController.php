<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display all teachers.
     */
    public function index()
    {
        $teachers = User::where('role', 'teacher')->orderBy('name')->paginate(20);
        return view('admin.teachers', compact('teachers'));
    }

    /**
     * Show the form for creating a new teacher.
     */
    public function create()
    {
        return view('admin.teacher-create');
    }

    /**
     * Store a newly created teacher.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = 'teacher';
        User::create($validated);

        return redirect()->route('admin.teachers')->with('success', 'Teacher created successfully.');
    }

    /**
     * Display the specified teacher.
     */
    public function show($id)
    {
        $teacher = User::where('role', 'teacher')->findOrFail($id);
        return view('admin.teacher-detail', compact('teacher'));
    }

    /**
     * Show the form for editing the specified teacher.
     */
    public function edit($id)
    {
        $teacher = User::where('role', 'teacher')->findOrFail($id);
        return view('admin.teacher-edit', compact('teacher'));
    }

    /**
     * Update the specified teacher.
     */
    public function update(Request $request, $id)
    {
        $teacher = User::where('role', 'teacher')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$teacher->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        $teacher->update($validated);

        return redirect()->route('admin.teachers')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified teacher.
     */
    public function destroy($id)
    {
        $teacher = User::where('role', 'teacher')->findOrFail($id);
        $teacher->delete();
        return redirect()->route('admin.teachers')->with('success', 'Teacher deleted successfully.');
    }
}