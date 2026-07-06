<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_km' => fake()->text(50),
            'title_en' => fake()->sentence(4),
            'year' => fake()->year(),
            'category' => fake()->randomElement(['sports', 'academic', 'cultural', 'ceremony']),
            'cover_image' => null,
        ];
    }

    /**
     * Set a category for the gallery.
     */
    public function category(string $category): static
    {
        return $this->state(fn (array $attributes) => [
            'category' => $category,
        ]);
    }
}
