<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    public function run(): void
    {
        Page::firstOrCreate(
            ['slug' => 'about'],
            [
                'title_en' => 'About Us',
                'title_kh' => 'អំពីយើងខ្ញុំ',
                'slug' => 'about',
                'content_en' => '<h2>Our History</h2><p>EduKhmer High School was founded in 2005 with a mission to provide quality education to Cambodian students. Over the years, we have grown from a small school to a leading educational institution in Cambodia.</p><h2>Our Mission</h2><p>To nurture intellectual curiosity, foster personal growth, and prepare students to become responsible global citizens.</p><h2>Our Vision</h2><p>To be a model of educational excellence in Cambodia, empowering every student to achieve their full potential.</p>',
                'content_kh' => '<h2>ប្រវត្តិរបស់យើង</h2><p>វិទ្យាល័យអេឌុយខ្មែរត្រូវបានបង្កើតឡើងក្នុងឆ្នាំ ២០០៥ ដោយមានបេសកកម្មផ្តល់ការអប់រំប្រកបដោយគុណភាពដល់សិស្សានុសិស្សខ្មែរ។</p>',
                'is_published' => true,
                'show_in_menu' => true,
                'sort_order' => 1,
                'template' => 'default',
            ]
        );
    }
}
