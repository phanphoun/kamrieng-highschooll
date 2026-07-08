<?php

use App\Console\Commands\SyncApplicationStatuses;
use App\Jobs\GenerateSitemap;
use Illuminate\Support\Facades\Schedule;

// Generate sitemap daily
Schedule::call(function () {
    GenerateSitemap::dispatch();
})->daily();

// Sync enrollment application statuses hourly
Schedule::command(SyncApplicationStatuses::class)->hourly();
