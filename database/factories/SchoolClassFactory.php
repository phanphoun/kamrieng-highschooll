<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Grade ' . fake()->numberBetween(7, 12) . fake()->randomElement(['A', 'B', 'C']),
            'grade_level' => (string) fake()->numberBetween(7, 12),
            'section' => fake()->randomElement(['A', 'B', 'C']),
            'room_number' => fake()->numerify('Room ###'),
            'teacher_id' => User::factory(),
            'capacity' => fake()->numberBetween(30, 50),
            'academic_year' => '2025-2026',
            'description' => fake()->sentence(),
        ];
    }
}
