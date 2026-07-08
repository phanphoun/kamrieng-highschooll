<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;

class DonateController extends Controller
{
    /**
     * Display the donation page.
     */
    public function index()
    {
        $settings = SiteSettings::first();

        return view('public.pages.donate', compact('settings'));
    }
}
