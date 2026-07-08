<?php

namespace App\Console\Commands;

use Database\Seeders\AdminUserSeeder;
use Database\Seeders\ApplicationStatusSeeder;
use Database\Seeders\HeroSlideSeeder;
use Database\Seeders\PagesSeeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\SiteSettingsSeeder;
use Illuminate\Console\Command;

class SeedProductionData extends Command
{
    protected $signature = 'seed:production';

    protected $description = 'Seed production-ready content';

    public function handle(): void
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(SiteSettingsSeeder::class);
        $this->call(ApplicationStatusSeeder::class);
        $this->call(HeroSlideSeeder::class);
        $this->call(PagesSeeder::class);

        $this->info('Production data seeded successfully.');
    }
}
