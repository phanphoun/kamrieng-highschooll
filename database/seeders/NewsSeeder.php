<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title_en' => 'EduKhmer High School Wins National Science Competition',
                'title_kh' => 'វិទ្យាល័យអេឌុយខ្មែរឈ្នះការប្រកួតវិទ្យាសាស្ត្រជាតិ',
                'slug' => 'edukhmer-wins-national-science-competition',
                'content_en' => '<p>Our students have once again made us proud by winning first place in the National Science Competition 2025. The team of four students presented an innovative project on sustainable agriculture.</p>',
                'content_kh' => '<p>សិស្សរបស់យើងបានធ្វើឱ្យយើងមានមោទនភាពម្តងទៀតដោយឈ្នះចំណាត់ថ្នាក់លេខ ១ ក្នុងការប្រកួតវិទ្យាសាស្ត្រជាតិ ២០២៥</p>',
                'excerpt_en' => 'Our students won first place in the National Science Competition 2025.',
                'excerpt_kh' => 'សិស្សរបស់យើងបានឈ្នះចំណាត់ថ្នាក់លេខ ១ ក្នុងការប្រកួតវិទ្យាសាស្ត្រជាតិ ២០២៥',
                'category' => 'achievement',
                'is_published' => true,
                'published_at' => now(),
                'is_featured' => true,
            ],
            [
                'title_en' => 'New Computer Lab Inaugurated',
                'title_kh' => 'បើកបន្ទប់កុំព្យូទ័រថ្មី',
                'slug' => 'new-computer-lab-inaugurated',
                'content_en' => '<p>We are excited to announce the inauguration of our new state-of-the-art computer laboratory, equipped with 50 modern workstations.</p>',
                'excerpt_en' => 'New computer lab with 50 modern workstations now open.',
                'category' => 'campus',
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
        ];

        foreach ($articles as $article) {
            News::firstOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }
    }
}
