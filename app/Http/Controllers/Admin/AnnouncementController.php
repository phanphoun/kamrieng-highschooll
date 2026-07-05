<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display all announcements.
     */
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.announcements', compact('announcements'));
    }

    /**
     * Show the form for creating a new announcement.
     */
    public function create()
    {
        return view('admin.announcement-create');
    }

    /**
     * Store a newly created announcement.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'target_audience' => 'required|in:all,students,teachers,parents',
            'publish_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after:publish_date',
            'is_active' => 'boolean',
        ]);

        $validated['created_by'] = auth()->id();
        Announcement::create($validated);

        return redirect()->route('admin.announcements')->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified announcement.
     */
    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcement-detail', compact('announcement'));
    }

    /**
     * Show the form for editing the specified announcement.
     */
    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcement-edit', compact('announcement'));
    }

    /**
     * Update the specified announcement.
     */
    public function update(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'target_audience' => 'required|in:all,students,teachers,parents',
            'publish_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after:publish_date',
            'is_active' => 'boolean',
        ]);

        $announcement->update($validated);

        return redirect()->route('admin.announcements')->with('success', 'Announcement updated successfully.');
    }

    /**
     * Remove the specified announcement.
     */
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        return redirect()->route('admin.announcements')->with('success', 'Announcement deleted successfully.');
    }
}