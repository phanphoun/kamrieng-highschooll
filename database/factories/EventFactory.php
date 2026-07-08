<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title_en' => fake()->sentence(),
            'description_en' => fake()->paragraph(),
            'event_date' => fake()->dateTimeBetween('now', '+6 months'),
            'location' => fake()->city(),
            'type' => fake()->randomElement(['academic', 'sports', 'cultural', 'meeting', 'holiday']),
            'is_published' => true,
        ];
    }
}
