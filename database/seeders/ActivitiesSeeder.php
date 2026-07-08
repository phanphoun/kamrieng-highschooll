<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            [
                'title_en' => 'Annual Sports Day 2025',
                'title_kh' => 'ទិវាកីឡាប្រចាំឆ្នាំ ២០២៥',
                'slug' => 'annual-sports-day-2025',
                'description_en' => 'Our annual sports event featuring athletics, football, volleyball, and traditional Khmer games.',
                'description_kh' => 'ព្រឹត្តិការណ៍កីឡាប្រចាំឆ្នាំរបស់យើងដែលមានអត្តពលកម្ម បាល់ទាត់ បាល់ទះ និងល្បែងប្រពៃណីខ្មែរ',
                'activity_date' => '2025-06-15',
                'location' => 'School Sports Complex',
                'category' => 'sports',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title_en' => 'Khmer New Year Celebration',
                'title_kh' => 'ការប្រារព្ធពិធីចូលឆ្នាំខ្មែរ',
                'slug' => 'khmer-new-year-celebration',
                'description_en' => 'Traditional Khmer New Year celebration with cultural performances and games.',
                'description_kh' => 'ការប្រារព្ធពិធីចូលឆ្នាំខ្មែរជាមួយនឹងការសម្តែងវប្បធម៌ និងល្បែងប្រពៃណី',
                'activity_date' => '2025-04-13',
                'location' => 'School Main Hall',
                'category' => 'cultural',
                'is_published' => true,
                'published_at' => now()->subDays(14),
            ],
        ];

        foreach ($activities as $activity) {
            Activity::firstOrCreate(
                ['slug' => $activity['slug']],
                $activity
            );
        }
    }
}
