<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentApplicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_name_en' => fake()->name(),
            'date_of_birth' => fake()->date('Y-m-d', '2008-12-31'),
            'gender' => fake()->randomElement(['male', 'female']),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'grade_applying_for' => fake()->randomElement(['Grade 10', 'Grade 11', 'Grade 12']),
            'academic_year' => '2025-2026',
            'parent_name' => fake()->name(),
            'parent_phone' => fake()->phoneNumber(),
        ];
    }
}
