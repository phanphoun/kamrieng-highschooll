<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title_en' => fake()->sentence(3),
            'slug' => fake()->slug(),
            'content_en' => fake()->paragraphs(3, true),
            'is_published' => true,
            'show_in_menu' => fake()->boolean(),
            'sort_order' => fake()->numberBetween(0, 10),
            'template' => fake()->randomElement(['default', 'full-width', 'sidebar']),
        ];
    }
}
