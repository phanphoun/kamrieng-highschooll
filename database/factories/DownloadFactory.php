<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DownloadFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title_en' => fake()->sentence(),
            'description_en' => fake()->paragraph(),
            'file_path' => fake()->filePath(),
            'file_size' => fake()->numberBetween(100000, 5000000),
            'file_type' => fake()->randomElement(['pdf', 'docx', 'xlsx', 'jpg']),
            'category' => fake()->randomElement(['forms', 'documents', 'reports', 'guidelines']),
            'is_published' => true,
        ];
    }
}
