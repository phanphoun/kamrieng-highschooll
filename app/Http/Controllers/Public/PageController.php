<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Activity;
use App\Models\Event;
use App\Models\Faq;
use App\Models\HeroSlide;
use App\Models\News;
use App\Models\Statistic;

class PageController extends Controller
{
    /**
     * Display the home page.
     */
    public function home()
    {
        $heroSlides = HeroSlide::active()->get();
        $featuredNews = News::published()->featured()->latest('published_at')->take(3)->get();
        $upcomingEvents = Event::published()->where('event_date', '>=', now())->orderBy('event_date')->take(4)->get();
        $statistics = Statistic::active()->get();
        $activities = Activity::published()->latest('published_at')->take(6)->get();
        $achievements = Achievement::published()->latest()->take(4)->get();
        $faqs = Faq::published()->get();

        return view('public.pages.home', compact(
            'heroSlides', 'featuredNews', 'upcomingEvents',
            'statistics', 'activities', 'achievements', 'faqs'
        ));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        return view('public.pages.about');
    }

    /**
     * Display the sitemap page.
     */
    public function sitemap()
    {
        return view('public.pages.sitemap');
    }
}
