<?php

namespace Database\Factories;

use App\Models\Achievement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Achievement>
 */
class AchievementFactory extends Factory
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
            'type' => fake()->randomElement(['student', 'teacher', 'school']),
            'description' => fake()->paragraph(),
            'photo' => null,
            'awarded_on' => fake()->date(),
            'is_featured' => false,
        ];
    }

    /**
     * Indicate that the achievement is featured.
     */
    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }
}
