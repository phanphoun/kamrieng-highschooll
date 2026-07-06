<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Mathematics', 'English', 'Khmer Literature', 'Physics',
                'Chemistry', 'Biology', 'History', 'Geography',
                'Computer Science', 'Physical Education',
            ]),
            'code' => strtoupper(fake()->unique()->lexify('???')),
            'description' => fake()->sentence(),
        ];
    }
}
