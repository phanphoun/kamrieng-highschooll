<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the student profile.
     */
    public function index()
    {
        $student = Auth::user();
        return view('student.profile', compact('student'));
    }

    /**
     * Update the student profile.
     */
    public function update(Request $request)
    {
        $student = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$student->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $student->update($validated);

        return redirect()->route('student.profile')->with('success', 'Profile updated successfully.');
    }
}