<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of news articles.
     */
    public function index()
    {
        $articles = News::latest()->paginate(20);

        return view('admin.news.index', compact('articles'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created article.
     */
    public function store(StoreNewsRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title_en']);
        $validated['author_id'] = auth()->id();
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('news', 'public');
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article created successfully.');
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified article.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $validated = $request->validated();

        $validated['published_at'] = $validated['is_published'] && ! $news->published_at ? now() : $news->published_at;

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('news', 'public');
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article updated successfully.');
    }

    /**
     * Remove the specified article.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News article deleted successfully.');
    }
}
