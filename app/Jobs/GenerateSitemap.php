<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;

class GenerateSitemap implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
        // Generate sitemap entries for public pages
        $sitemap = [];

        $sitemap[] = ['loc' => url('/'), 'priority' => '1.0'];
        $sitemap[] = ['loc' => url('/about'), 'priority' => '0.9'];
        $sitemap[] = ['loc' => url('/news'), 'priority' => '0.8'];
        $sitemap[] = ['loc' => url('/activities'), 'priority' => '0.7'];
        $sitemap[] = ['loc' => url('/achievements'), 'priority' => '0.6'];
        $sitemap[] = ['loc' => url('/gallery'), 'priority' => '0.6'];
        $sitemap[] = ['loc' => url('/calendar'), 'priority' => '0.7'];
        $sitemap[] = ['loc' => url('/downloads'), 'priority' => '0.5'];
        $sitemap[] = ['loc' => url('/contact'), 'priority' => '0.5'];
        $sitemap[] = ['loc' => url('/enrollment'), 'priority' => '0.8'];

        // Store in cache for the sitemap route
        Cache::forever('sitemap', $sitemap);
    }
}
