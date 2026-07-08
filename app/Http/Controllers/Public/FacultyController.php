<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Leadership;

class FacultyController extends Controller
{
    /**
     * Display the leadership/faculty directory.
     */
    public function index()
    {
        $leadership = Leadership::active()->get();

        return view('public.pages.faculty', compact('leadership'));
    }
}
