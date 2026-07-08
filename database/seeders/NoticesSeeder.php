<?php

namespace Database\Seeders;

use App\Models\Notice;
use Illuminate\Database\Seeder;

class NoticesSeeder extends Seeder
{
    public function run(): void
    {
        $notices = [
            [
                'title_en' => 'School Holiday - National Day',
                'title_kh' => 'ថ្ងៃឈប់សម្រាកសាលា - ទិវាជាតិ',
                'content_en' => 'The school will be closed on November 9 in observance of National Day.',
                'content_kh' => 'សាលានឹងបិទនៅថ្ងៃទី ៩ ខែវិច្ឆិកា ក្នុងឱកាសទិវាជាតិ',
                'type' => 'holiday',
                'target_audience' => 'all',
                'is_published' => true,
                'publish_date' => now()->subDay(),
                'expiry_date' => now()->addMonth(),
            ],
            [
                'title_en' => 'Exam Schedule Released',
                'title_kh' => 'ប្រកាសកាលវិភាគប្រឡង',
                'content_en' => 'The final exam schedule for Semester 1 has been published. Please check the notice board.',
                'content_kh' => 'កាលវិភាគប្រឡងចុងឆមាសទី ១ ត្រូវបានប្រកាសរួចហើយ',
                'type' => 'exam',
                'target_audience' => 'students',
                'is_published' => true,
                'publish_date' => now(),
                'is_urgent' => true,
            ],
        ];

        foreach ($notices as $notice) {
            Notice::firstOrCreate(
                ['title_en' => $notice['title_en']],
                $notice
            );
        }
    }
}
