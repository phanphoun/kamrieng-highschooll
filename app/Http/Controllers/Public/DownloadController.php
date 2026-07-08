<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Download;

class DownloadController extends Controller
{
    /**
     * Display a listing of downloads.
     */
    public function index()
    {
        $downloads = Download::published()->orderBy('category')->get();
        $categories = Download::published()->select('category')->distinct()->pluck('category');

        return view('public.pages.downloads', compact('downloads', 'categories'));
    }
}
