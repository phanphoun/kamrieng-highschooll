<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryAlbumFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title_en' => fake()->sentence(3),
            'description_en' => fake()->paragraph(),
            'is_published' => true,
            'sort_order' => fake()->numberBetween(0, 10),
        ];
    }
}
