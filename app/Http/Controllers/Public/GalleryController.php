<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of gallery albums.
     */
    public function index(Request $request)
    {
        $activeYear = $request->query('year');
        $activeCategory = $request->query('category');
        $years = GalleryAlbum::published()
            ->whereNotNull('created_at')
            ->orderByDesc('created_at')
            ->get(['created_at'])
            ->pluck('created_at')
            ->map(fn ($date) => $date->format('Y'))
            ->unique()
            ->values();

        $albums = GalleryAlbum::published()
            ->withCount('images')
            ->when($activeYear, fn ($query) => $query->whereYear('created_at', $activeYear))
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(12)
            ->withQueryString();

        return view('public.pages.gallery.index', compact('albums', 'years', 'activeYear', 'activeCategory'));
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
