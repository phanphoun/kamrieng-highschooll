<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AchievementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title_en' => fake()->sentence(),
            'description_en' => fake()->paragraph(),
            'category' => fake()->randomElement(['academic', 'sports', 'arts', 'community']),
            'achieved_by' => fake()->name(),
            'achieved_date' => fake()->date(),
            'is_published' => true,
        ];
    }
}
