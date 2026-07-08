<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteSettingsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'school_name_en' => fake()->company() . ' High School',
            'school_name_kh' => fake()->word(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->companyEmail(),
            'address_en' => fake()->address(),
        ];
    }
}
