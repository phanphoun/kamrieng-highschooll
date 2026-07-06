<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => User::factory(),
            'class_id' => SchoolClass::factory(),
            'subject_id' => Subject::factory(),
            'score' => fake()->numberBetween(40, 100),
            'grade_letter' => fake()->randomElement(['A', 'B', 'C', 'D', 'F']),
            'comments' => fake()->optional()->sentence(),
            'graded_by_id' => User::factory(),
        ];
    }
}
