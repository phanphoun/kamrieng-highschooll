<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadershipRequest;
use App\Http\Requests\UpdateLeadershipRequest;
use App\Models\Leadership;

class LeadershipController extends Controller
{
    public function index()
    {
        $members = Leadership::orderBy('sort_order')->paginate(20);

        return view('admin.leadership.index', compact('members'));
    }

    public function create()
    {
        return view('admin.leadership.create');
    }

    public function store(StoreLeadershipRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('leadership', 'public');
        }

        Leadership::create($validated);

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership member created successfully.');
    }

    public function edit(Leadership $leadership)
    {
        return view('admin.leadership.edit', compact('leadership'));
    }

    public function update(UpdateLeadershipRequest $request, Leadership $leadership)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('leadership', 'public');
        }

        $leadership->update($validated);

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership member updated successfully.');
    }

    public function destroy(Leadership $leadership)
    {
        $leadership->delete();

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership member deleted successfully.');
    }
}
