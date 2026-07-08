<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            AdminUserSeeder::class,
            SiteSettingsSeeder::class,
            ApplicationStatusSeeder::class,
            HeroSlideSeeder::class,
            LeadershipSeeder::class,
            StatisticsSeeder::class,
            PagesSeeder::class,
            NewsSeeder::class,
            ActivitiesSeeder::class,
            AchievementsSeeder::class,
            GallerySeeder::class,
            EventsSeeder::class,
            NoticesSeeder::class,
            DownloadsSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
