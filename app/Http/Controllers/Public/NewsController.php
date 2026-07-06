<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a paginated list of published news articles.
     */
    public function index(Request $request)
    {
        $query = News::with('category')->published()->recent();

        // Filter by category slug
        if ($request->filled('category')) {
            $category = NewsCategory::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Search by title or body (check both languages)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'like', "%{$search}%")
                  ->orWhere('title_km', 'like', "%{$search}%")
                  ->orWhere('body_en', 'like', "%{$search}%")
                  ->orWhere('body_km', 'like', "%{$search}%");
            });
        }

        $news = $query->paginate(6);

        $categories = NewsCategory::all();

        $featured = News::with('category')
            ->published()
            ->featured()
            ->recent()
            ->take(3)
            ->get();

        return view('public.news.index', compact('news', 'categories', 'featured'));
    }

    /**
     * Display the specified news article.
     */
    public function show(News $news)
    {
        if ($news->status !== 'published' || ($news->published_at && $news->published_at->isFuture())) {
            abort(404);
        }

        $relatedNews = News::with('category')
            ->published()
            ->where('id', '!=', $news->id)
            ->where(function ($query) use ($news) {
                if ($news->category_id) {
                    $query->where('category_id', $news->category_id);
                }
            })
            ->recent()
            ->take(3)
            ->get();

        return view('public.news.show', compact('news', 'relatedNews'));
    }
}
