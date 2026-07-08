<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of activities.
     */
    public function index()
    {
        $activities = Activity::published()->latest('activity_date')->paginate(12);
        $categories = Activity::published()->select('category')->distinct()->pluck('category');

        return view('public.pages.activities.index', compact('activities', 'categories'));
    }

    /**
     * Display the specified activity.
     */
    public function show($slug)
    {
        $activity = Activity::where('slug', $slug)->firstOrFail();
        return view('public.pages.activities.show', compact('activity'));
    }
}
