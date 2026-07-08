<?php

use App\Console\Commands\SyncApplicationStatuses;
use Illuminate\Support\Facades\Schedule;

// Generate sitemap daily
Schedule::call(function () {
    \App\Jobs\GenerateSitemap::dispatch();
})->daily();

// Sync enrollment application statuses hourly
Schedule::command(SyncApplicationStatuses::class)->hourly();
