<?php

namespace Database\Seeders;

use App\Models\SiteSettings;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        SiteSettings::firstOrCreate(
            ['school_code' => 'EDUKHMER'],
            [
                'school_name_en' => 'EduKhmer High School',
                'school_name_kh' => 'វិទ្យាល័យអេឌុយខ្មែរ',
                'school_code' => 'EDUKHMER',
                'address_en' => '123 Education Boulevard, Phnom Penh, Cambodia',
                'address_kh' => '១២៣ មហាវិថីអប់រំ, ភ្នំពេញ, កម្ពុជា',
                'phone' => '+855 23 888 999',
                'email' => 'info@edukhmer.edu.kh',
                'website' => 'https://edukhmer.edu.kh',
                'academic_year' => '2025-2026',
                'principal_name' => 'Dr. Sok Vannak',
                'established_year' => 2005,
                'opening_hours' => '7:00 AM - 5:00 PM',
                'is_maintenance_mode' => false,
            ]
        );
    }
}
