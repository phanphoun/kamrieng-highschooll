<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementsSeeder extends Seeder
{
    public function run(): void
    {
        $achievements = [
            [
                'title_en' => 'Gold Medal in ASEAN Math Olympiad',
                'title_kh' => 'មេដាយមាសក្នុងការប្រកួតគណិតវិទ្យាអាស៊ាន',
                'description_en' => 'Our student won the gold medal at the ASEAN Mathematics Olympiad 2025.',
                'category' => 'academic',
                'achieved_by' => 'Sok Piseth',
                'achieved_date' => '2025-03-20',
                'is_published' => true,
            ],
            [
                'title_en' => 'Best School in Battambang Province',
                'title_kh' => 'សាលាល្អជាងគេក្នុងខេត្តបាត់ដំបង',
                'description_en' => 'Recognized as the top-performing high school in Battambang province for 3 consecutive years.',
                'category' => 'school',
                'achieved_date' => '2025-01-15',
                'is_published' => true,
            ],
        ];

        foreach ($achievements as $achievement) {
            Achievement::firstOrCreate(
                ['title_en' => $achievement['title_en']],
                $achievement
            );
        }
    }
}
