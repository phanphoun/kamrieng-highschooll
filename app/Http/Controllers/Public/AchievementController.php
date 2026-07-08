<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Achievement;

class AchievementController extends Controller
{
    /**
     * Display a listing of achievements.
     */
    public function index()
    {
        $achievements = Achievement::published()->latest('achieved_date')->paginate(12);

        return view('public.pages.achievements', compact('achievements'));
    }
}
