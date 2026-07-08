<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display search results.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        $results = collect();
        if ($query) {
            $results = News::published()
                ->where('title_en', 'like', "%{$query}%")
                ->orWhere('title_kh', 'like', "%{$query}%")
                ->orWhere('content_en', 'like', "%{$query}%")
                ->orWhere('content_kh', 'like', "%{$query}%")
                ->paginate(20);
        }

        return view('public.pages.search', compact('results', 'query'));
    }
}
