<?php

namespace Database\Seeders;

use App\Models\Leadership;
use Illuminate\Database\Seeder;

class LeadershipSeeder extends Seeder
{
    public function run(): void
    {
        $leaders = [
            [
                'name_en' => 'Dr. Sok Vannak',
                'name_kh' => 'បណ្ឌិត សុខ វណ្ណៈ',
                'position_en' => 'Principal',
                'position_kh' => 'នាយក',
                'bio_en' => 'Leading EduKhmer High School with over 20 years of experience in education administration.',
                'bio_kh' => 'ដឹកនាំវិទ្យាល័យអេឌុយខ្មែរដោយមានបទពិសោធន៍ជាង ២០ ឆ្នាំក្នុងការគ្រប់គ្រងការអប់រំ',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name_en' => 'Ms. Chan Sophia',
                'name_kh' => 'កញ្ញា ចាន់ សុភី',
                'position_en' => 'Vice Principal',
                'position_kh' => 'នាយករង',
                'bio_en' => 'Oversees academic programs, curriculum development, and teacher professional development.',
                'bio_kh' => 'ទទួលបន្ទុកកម្មវិធីសិក្សា ការអភិវឌ្ឍកម្មវិធីសិក្សា និងការអភិវឌ្ឍវិជ្ជាជីវៈគ្រូបង្រៀន',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name_en' => 'Mr. Heng Boran',
                'name_kh' => 'លោក ហេង បូរ៉ាន់',
                'position_en' => 'Head of Academic Affairs',
                'position_kh' => 'ប្រធានកិច្ចការសិក្សា',
                'bio_en' => 'Responsible for curriculum planning, examination coordination, and academic standards.',
                'bio_kh' => 'ទទួលខុសត្រូវលើការរៀបចំផែនការសិក្សា ការសម្របសម្រួលការប្រឡង និងស្តង់ដារសិក្សា',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($leaders as $leader) {
            Leadership::firstOrCreate(
                ['name_en' => $leader['name_en']],
                $leader
            );
        }
    }
}
