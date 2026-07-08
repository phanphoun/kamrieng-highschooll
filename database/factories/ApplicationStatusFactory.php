<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationStatusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_en' => fake()->randomElement(['Pending', 'Under Review', 'Approved', 'Rejected']),
            'name_kh' => fake()->word(),
            'color' => fake()->hexColor(),
            'sort_order' => fake()->numberBetween(1, 10),
            'is_default' => false,
        ];
    }
}
