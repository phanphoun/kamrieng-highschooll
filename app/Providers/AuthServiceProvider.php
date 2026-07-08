<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\EnrollmentApplication;
use App\Models\News;
use App\Policies\ActivityPolicy;
use App\Policies\EnrollmentPolicy;
use App\Policies\NewsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        News::class => NewsPolicy::class,
        Activity::class => ActivityPolicy::class,
        EnrollmentApplication::class => EnrollmentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
