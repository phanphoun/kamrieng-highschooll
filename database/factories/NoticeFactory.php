<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoticeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title_en' => fake()->sentence(),
            'content_en' => fake()->paragraphs(2, true),
            'type' => fake()->randomElement(['general', 'academic', 'administrative']),
            'target_audience' => fake()->randomElement(['all', 'students', 'parents', 'teachers']),
            'is_published' => true,
            'is_urgent' => fake()->boolean(10),
        ];
    }
}
