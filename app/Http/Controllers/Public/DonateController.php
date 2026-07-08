<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class DonateController extends Controller
{
    /**
     * Display the donation page.
     */
    public function index()
    {
        return view('public.pages.donate');
    }
}
