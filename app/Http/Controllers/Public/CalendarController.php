<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;

class CalendarController extends Controller
{
    /**
     * Display the events calendar.
     */
    public function index()
    {
        $events = Event::published()->orderBy('event_date')->get();

        return view('public.pages.calendar', compact('events'));
    }
}
