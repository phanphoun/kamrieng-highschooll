<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HeroSlideFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title_en' => fake()->sentence(3),
            'subtitle_en' => fake()->sentence(6),
            'description_en' => fake()->sentence(10),
            'image_path' => 'hero-slides/default.jpg',
            'sort_order' => fake()->numberBetween(0, 10),
            'is_active' => true,
        ];
    }
}
