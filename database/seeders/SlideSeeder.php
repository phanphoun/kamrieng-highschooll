<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    public function run(): void
    {
        Slide::create([
            'title_km' => 'សូមស្វាគមន៍មកកាន់វិទ្យាល័យកំរៀង',
            'title_en' => 'Welcome to Kamrieng High School',
            'subtitle_km' => 'ឧត្តមភាពក្នុងការអប់រំ',
            'subtitle_en' => 'Excellence in Education',
            'description_km' => 'កសាងអ្នកដឹកនាំអនាគតនៃកម្ពុជា តាំងពីឆ្នាំ ១៩៩៨',
            'description_en' => 'Shaping the Future Leaders of Cambodia since 1998',
            'image_path' => 'slides/hero-1.jpg',
            'button_text_km' => 'ស្វែងយល់បន្ថែម',
            'button_text_en' => 'Explore Programs',
            'button_link' => '#about',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Slide::create([
            'title_km' => 'ការអប់រំប្រកបដោយគុណភាព',
            'title_en' => 'Quality Education for All',
            'subtitle_km' => 'សិក្សាដោយភាពរីករាយ',
            'subtitle_en' => 'Learn with Joy',
            'description_km' => 'យើងផ្តល់នូវកម្មវិធីសិក្សាទំនើប និងបរិយាកាសសិក្សាល្អប្រសើរ',
            'description_en' => 'We provide modern curriculum and an excellent learning environment for all students',
            'image_path' => 'slides/hero-2.jpg',
            'button_text_km' => 'ចុះឈ្មោះឥឡូវនេះ',
            'button_text_en' => 'Enroll Now',
            'button_link' => '#',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Slide::create([
            'title_km' => 'សហគមន៍សិក្សារឹងមាំ',
            'title_en' => 'Strong Learning Community',
            'subtitle_km' => 'រួមគ្នាកសាងអនាគត',
            'subtitle_en' => 'Building the Future Together',
            'description_km' => 'ចូលរួមជាមួយពួកយើងក្នុងដំណើរឆ្ពោះទៅរកចំណេះដឹង និងភាពជោគជ័យ',
            'description_en' => 'Join us on a journey of knowledge, growth, and success',
            'image_path' => 'slides/hero-3.jpg',
            'button_text_km' => 'មើលវិចិត្រសាល',
            'button_text_en' => 'View Gallery',
            'button_link' => '#',
            'sort_order' => 3,
            'is_active' => true,
        ]);
    }
}
