<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of news articles.
     */
    public function index()
    {
        $news = News::published()->latest('published_at')->paginate(9);
        $categories = News::published()->select('category')->distinct()->pluck('category');

        return view('public.pages.news.index', compact('news', 'categories'));
    }

    /**
     * Display the specified news article.
     */
    public function show($slug)
    {
        $article = News::where('slug', $slug)->firstOrFail();

        // Increment views
        $article->increment('views_count');

        $relatedNews = News::published()
            ->where('id', '!=', $article->id)
            ->where('category', $article->category)
            ->take(3)
            ->get();

        return view('public.pages.news.show', compact('article', 'relatedNews'));
    }
}
