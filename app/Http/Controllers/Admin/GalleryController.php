<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use App\Http\Requests\StoreGalleryAlbumRequest;
use App\Http\Requests\UpdateGalleryAlbumRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::withCount('images')->latest()->paginate(20);
        return view('admin.gallery.index', compact('albums'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(StoreGalleryAlbumRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('gallery/covers', 'public');
        }

        GalleryAlbum::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery album created successfully.');
    }

    public function show(GalleryAlbum $gallery)
    {
        $album = $gallery->load('images');
        return view('admin.gallery.show', compact('album'));
    }

    public function edit(GalleryAlbum $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(UpdateGalleryAlbumRequest $request, GalleryAlbum $gallery)
    {
        $validated = $request->validated();

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('gallery/covers', 'public');
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery album updated successfully.');
    }

    public function destroy(GalleryAlbum $gallery)
    {
        $gallery->images()->delete();
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery album deleted successfully.');
    }

    /**
     * Upload images to an album.
     */
    public function uploadImages(Request $request, GalleryAlbum $gallery)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|max:5120',
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('gallery/' . $gallery->id, 'public');
            $gallery->images()->create(['image_path' => $path]);
        }

        return back()->with('success', 'Images uploaded successfully.');
    }

    /**
     * Remove an image from an album.
     */
    public function destroyImage(GalleryImage $image)
    {
        $image->delete();
        return back()->with('success', 'Image removed successfully.');
    }
}
