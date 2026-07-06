<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_id' => SchoolClass::factory(),
            'subject_id' => Subject::factory(),
            'teacher_id' => User::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'due_date' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'status' => 'published',
        ];
    }

    /**
     * Indicate that the assignment is published.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
        ]);
    }

    /**
     * Indicate that the assignment is a draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
        ]);
    }

    /**
     * Indicate that the assignment is overdue.
     */
    public function overdue(): static
    {
        return $this->state(fn (array $attributes) => [
            'due_date' => now()->subDay(),
        ]);
    }
}
