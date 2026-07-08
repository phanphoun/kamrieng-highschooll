<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title_en' => fake()->sentence(),
            'title_kh' => null,
            'slug' => fake()->slug(),
            'content_en' => fake()->paragraphs(3, true),
            'content_kh' => null,
            'category' => fake()->randomElement(['academic', 'sports', 'cultural', 'announcement']),
            'is_published' => true,
            'published_at' => now(),
            'is_featured' => fake()->boolean(20),
            'views_count' => fake()->numberBetween(0, 500),
        ];
    }
}
