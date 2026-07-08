<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LeadershipFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_en' => fake()->name(),
            'position_en' => fake()->jobTitle(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'sort_order' => fake()->numberBetween(0, 10),
            'is_active' => true,
        ];
    }
}
