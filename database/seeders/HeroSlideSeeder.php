<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'title_en' => 'Welcome to EduKhmer High School',
                'title_kh' => 'សូមស្វាគមន៍មកកាន់វិទ្យាល័យអេឌុយខ្មែរ',
                'subtitle_en' => 'Nurturing Minds, Building Futures',
                'subtitle_kh' => 'បណ្ដុះបញ្ញា កសាងអនាគត',
                'description_en' => 'Providing quality education to Cambodian students since 2005.',
                'description_kh' => 'ផ្ដល់ការអប់រំប្រកបដោយគុណភាពដល់សិស្សានុសិស្សខ្មែរតាំងពីឆ្នាំ២០០៥',
                'image_path' => '', // Empty -> uses Unsplash fallback from the view
                'btn_text_en' => 'Learn More',
                'btn_text_kh' => 'ស្វែងយល់បន្ថែម',
                'btn_link' => '/about',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title_en' => 'Excellence in Education',
                'title_kh' => 'ឧត្តមភាពក្នុងការអប់រំ',
                'subtitle_en' => 'Empowering Students for Success',
                'subtitle_kh' => 'ពង្រឹងសមត្ថភាពសិស្សដើម្បីជោគជ័យ',
                'description_en' => 'Our dedicated faculty and modern facilities create an ideal learning environment.',
                'description_kh' => 'សាស្ត្រាចារ្យដ៏លះបង់ និងបរិក្ខារទំនើបរបស់យើងបង្កើតបរិស្ថានសិក្សាដ៏ល្អឥតខ្ចោះ',
                'image_path' => '', // Empty -> uses Unsplash fallback from the view
                'btn_text_en' => 'Our Programs',
                'btn_text_kh' => 'កម្មវិធីសិក្សា',
                'btn_link' => '/activities',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title_en' => 'Enroll Now',
                'title_kh' => 'ចុះឈ្មោះឥឡូវនេះ',
                'subtitle_en' => '2025-2026 Academic Year',
                'subtitle_kh' => 'ឆ្នាំសិក្សា ២០២៥-២០២៦',
                'description_en' => 'Applications are now open for the upcoming academic year.',
                'description_kh' => 'ការដាក់ពាក្យចុះឈ្មោះឥឡូវនេះបើកសម្រាប់ឆ្នាំសិក្សាថ្មី',
                'image_path' => '', // Empty -> uses Unsplash fallback from the view
                'btn_text_en' => 'Apply Today',
                'btn_text_kh' => 'ដាក់ពាក្យថ្ងៃនេះ',
                'btn_link' => '/enrollment',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::firstOrCreate(
                ['sort_order' => $slide['sort_order']],
                $slide
            );
        }
    }
}
