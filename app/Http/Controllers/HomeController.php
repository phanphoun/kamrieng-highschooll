<?php

namespace App\Http\Controllers;

use App\Models\Slide;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::active()->get();

        return view('home', compact('slides'));
    }
}
