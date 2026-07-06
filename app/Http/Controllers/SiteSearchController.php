<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Activity;
use App\Models\Document;
use App\Models\Gallery;
use App\Models\Leadership;
use App\Models\News;
use App\Models\Notice;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SiteSearchController extends Controller
{
    /**
     * Maximum results per content type.
     */
    protected const PER_TYPE_LIMIT = 10;

    /**
     * Display search results.
     */
    public function index(Request $request)
    {
        $query = trim($request->input('q', ''));

        // Validate query length if provided
        if (strlen($query) > 200) {
            return redirect()->route('search')->withErrors(['q' => 'Query must not exceed 200 characters.']);
        }

        // Empty query: show prompt to enter a search term
        if (empty($query)) {
            return view('search.index', [
                'query' => '',
                'resultsets' => [],
                'totalResults' => 0,
                'showPrompt' => true,
            ]);
        }

        // Search across all public content types
        $resultsets = [
            'news' => $this->searchNews($query),
            'activities' => $this->searchActivities($query),
            'achievements' => $this->searchAchievements($query),
            'notices' => $this->searchNotices($query),
            'pages' => $this->searchPages($query),
            'leadership' => $this->searchLeadership($query),
            'documents' => $this->searchDocuments($query),
            'galleries' => $this->searchGalleries($query),
        ];

        // Filter out empty resultsets
        $resultsets = array_filter($resultsets, fn ($r) => $r->isNotEmpty());

        $totalResults = collect($resultsets)->sum(fn ($r) => $r->count());

        return view('search.index', [
            'query' => $query,
            'resultsets' => $resultsets,
            'totalResults' => $totalResults,
            'showPrompt' => false,
        ]);
    }

    /**
     * Search news articles.
     */
    protected function searchNews(string $query)
    {
        return News::published()
            ->search($query)
            ->select('id', 'title_km', 'title_en', 'slug', 'body_km', 'body_en', 'cover_image', 'published_at')
            ->orderByDesc('published_at')
            ->limit(self::PER_TYPE_LIMIT)
            ->get()
            ->map(fn ($item) => [
                'type' => 'news',
                'type_label' => 'ព័ត៌មាន',
                'type_label_en' => 'News',
                'title_km' => $item->title_km,
                'title_en' => $item->title_en,
                'slug' => $item->slug,
                'excerpt_km' => str($item->body_km)->limit(200),
                'excerpt_en' => str($item->body_en)->limit(200),
                'image' => $item->cover_image,
                'date' => $item->published_at?->format('Y-m-d'),
                'url' => $item->slug && Route::has('news.show') ? route('news.show', $item->slug) : null,
            ]);
    }

    /**
     * Search activities.
     */
    protected function searchActivities(string $query)
    {
        return Activity::published()
            ->search($query)
            ->select('id', 'title_km', 'title_en', 'description_km', 'description_en', 'activity_date', 'location')
            ->orderByDesc('activity_date')
            ->limit(self::PER_TYPE_LIMIT)
            ->get()
            ->map(fn ($item) => [
                'type' => 'activities',
                'type_label' => 'សកម្មភាព',
                'type_label_en' => 'Activities',
                'title_km' => $item->title_km,
                'title_en' => $item->title_en,
                'excerpt_km' => str($item->description_km)->limit(200),
                'excerpt_en' => str($item->description_en)->limit(200),
                'date' => $item->activity_date?->format('Y-m-d'),
                'location' => $item->location,
                'url' => null,
            ]);
    }

    /**
     * Search achievements.
     */
    protected function searchAchievements(string $query)
    {
        return Achievement::search($query)
            ->select('id', 'title_km', 'title_en', 'type', 'description', 'awarded_on', 'photo')
            ->orderByDesc('awarded_on')
            ->limit(self::PER_TYPE_LIMIT)
            ->get()
            ->map(fn ($item) => [
                'type' => 'achievements',
                'type_label' => 'សមិទ្ធផល',
                'type_label_en' => 'Achievements',
                'title_km' => $item->title_km,
                'title_en' => $item->title_en,
                'excerpt_km' => str($item->description)->limit(200),
                'excerpt_en' => str($item->description)->limit(200),
                'image' => $item->photo,
                'date' => $item->awarded_on?->format('Y-m-d'),
                'url' => null,
            ]);
    }

    /**
     * Search notices.
     */
    protected function searchNotices(string $query)
    {
        return Notice::active()
            ->search($query)
            ->select('id', 'title_km', 'title_en', 'body_km', 'body_en', 'is_urgent')
            ->orderByDesc('created_at')
            ->limit(self::PER_TYPE_LIMIT)
            ->get()
            ->map(fn ($item) => [
                'type' => 'notices',
                'type_label' => 'សេចក្តីជូនដំណឹង',
                'type_label_en' => 'Notices',
                'title_km' => $item->title_km,
                'title_en' => $item->title_en,
                'excerpt_km' => str($item->body_km)->limit(200),
                'excerpt_en' => str($item->body_en)->limit(200),
                'is_urgent' => $item->is_urgent,
                'url' => null,
            ]);
    }

    /**
     * Search static pages.
     */
    protected function searchPages(string $query)
    {
        return Page::search($query)
            ->select('id', 'key', 'title_km', 'title_en', 'body_km', 'body_en')
            ->limit(self::PER_TYPE_LIMIT)
            ->get()
            ->map(fn ($item) => [
                'type' => 'pages',
                'type_label' => 'ទំព័រ',
                'type_label_en' => 'Pages',
                'title_km' => $item->title_km,
                'title_en' => $item->title_en,
                'excerpt_km' => str($item->body_km)->limit(200),
                'excerpt_en' => str($item->body_en)->limit(200),
                'url' => Route::has('page.show') ? route('page.show', $item->key) : null,
            ]);
    }

    /**
     * Search leadership team.
     */
    protected function searchLeadership(string $query)
    {
        return Leadership::search($query)
            ->select('id', 'name_km', 'name_en', 'position_km', 'position_en', 'photo', 'bio_km', 'bio_en')
            ->orderBy('sort_order')
            ->limit(self::PER_TYPE_LIMIT)
            ->get()
            ->map(fn ($item) => [
                'type' => 'leadership',
                'type_label' => 'ថ្នាក់ដឹកនាំ',
                'type_label_en' => 'Leadership',
                'title_km' => $item->name_km,
                'title_en' => $item->name_en,
                'subtitle_km' => $item->position_km,
                'subtitle_en' => $item->position_en,
                'excerpt_km' => str($item->bio_km)->limit(200),
                'excerpt_en' => str($item->bio_en)->limit(200),
                'image' => $item->photo,
                'url' => null,
            ]);
    }

    /**
     * Search documents.
     */
    protected function searchDocuments(string $query)
    {
        return Document::search($query)
            ->select('id', 'title_km', 'title_en', 'category')
            ->orderByDesc('created_at')
            ->limit(self::PER_TYPE_LIMIT)
            ->get()
            ->map(fn ($item) => [
                'type' => 'documents',
                'type_label' => 'ឯកសារ',
                'type_label_en' => 'Documents',
                'title_km' => $item->title_km,
                'title_en' => $item->title_en,
                'category' => $item->category,
                'url' => null,
            ]);
    }

    /**
     * Search galleries.
     */
    protected function searchGalleries(string $query)
    {
        return Gallery::search($query)
            ->select('id', 'title_km', 'title_en', 'year', 'category', 'cover_image')
            ->orderByDesc('year')
            ->limit(self::PER_TYPE_LIMIT)
            ->get()
            ->map(fn ($item) => [
                'type' => 'galleries',
                'type_label' => 'វិចិត្រសាល',
                'type_label_en' => 'Galleries',
                'title_km' => $item->title_km,
                'title_en' => $item->title_en,
                'image' => $item->cover_image,
                'year' => $item->year,
                'category' => $item->category,
                'url' => null,
            ]);
    }
}
