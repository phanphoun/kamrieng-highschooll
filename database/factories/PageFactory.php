<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => fake()->unique()->slug(2),
            'title_km' => fake()->text(50),
            'title_en' => fake()->sentence(3),
            'body_km' => fake()->text(200),
            'body_en' => fake()->paragraph(),
        ];
    }
}
