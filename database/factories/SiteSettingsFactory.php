<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteSettingsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'school_name_en' => 'EduKhmer High School',
            'school_name_kh' => 'សាលារៀន អេឌុខ្មែរ',
            'school_code' => 'EDU001',
            'address_en' => '123 Education Blvd, Phnom Penh',
            'phone' => '0123456789',
            'email' => 'info@edukhmer.edu.kh',
        ];
    }
}
