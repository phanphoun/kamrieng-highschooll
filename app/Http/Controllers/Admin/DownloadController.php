<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDownloadRequest;
use App\Http\Requests\UpdateDownloadRequest;
use App\Models\Download;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::latest()->paginate(20);

        return view('admin.downloads.index', compact('downloads'));
    }

    public function create()
    {
        return view('admin.downloads.create');
    }

    public function store(StoreDownloadRequest $request)
    {
        $validated = $request->validated();

        $file = $request->file('file');
        $validated['file_path'] = $file->store('downloads', 'public');
        $validated['file_size'] = $file->getSize();
        $validated['file_type'] = $file->getClientOriginalExtension();

        Download::create($validated);

        return redirect()->route('admin.downloads.index')->with('success', 'Download created successfully.');
    }

    public function edit(Download $download)
    {
        return view('admin.downloads.edit', compact('download'));
    }

    public function update(UpdateDownloadRequest $request, Download $download)
    {
        $validated = $request->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $validated['file_path'] = $file->store('downloads', 'public');
            $validated['file_size'] = $file->getSize();
            $validated['file_type'] = $file->getClientOriginalExtension();
        }

        $download->update($validated);

        return redirect()->route('admin.downloads.index')->with('success', 'Download updated successfully.');
    }

    public function destroy(Download $download)
    {
        $download->delete();

        return redirect()->route('admin.downloads.index')->with('success', 'Download deleted successfully.');
    }
}
