<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => User::factory(),
            'title_km' => fake()->text(50),
            'title_en' => fake()->sentence(4),
            'description_km' => fake()->text(200),
            'description_en' => fake()->paragraph(),
            'activity_date' => fake()->date(),
            'location' => fake()->city(),
            'status' => 'published',
        ];
    }

    /**
     * Indicate that the activity is published.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
        ]);
    }
}
