<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of notices.
     */
    public function index()
    {
        $notices = Notice::published()->latest()->paginate(15);

        return view('public.pages.notices', compact('notices'));
    }
}
