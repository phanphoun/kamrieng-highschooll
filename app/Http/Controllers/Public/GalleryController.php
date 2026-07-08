<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;

class GalleryController extends Controller
{
    /**
     * Display a listing of gallery albums.
     */
    public function index()
    {
        $albums = GalleryAlbum::published()->withCount('images')->orderBy('sort_order')->paginate(12);

        return view('public.pages.gallery.index', compact('albums'));
    }

    /**
     * Display the specified album with its images.
     */
    public function show($id)
    {
        $album = GalleryAlbum::with('images')->findOrFail($id);

        return view('public.pages.gallery.show', compact('album'));
    }
}
