<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title_en' => fake()->sentence(),
            'slug' => fake()->slug(),
            'description_en' => fake()->paragraph(),
            'content_en' => fake()->paragraphs(2, true),
            'activity_date' => fake()->date(),
            'location' => fake()->city(),
            'category' => fake()->randomElement(['sports', 'cultural', 'academic', 'community']),
            'is_published' => true,
            'published_at' => now(),
        ];
    }
}
