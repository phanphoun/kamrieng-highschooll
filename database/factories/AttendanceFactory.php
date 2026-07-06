<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\User;
use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Attendance>
 */
class AttendanceFactory extends Factory
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
            'date' => fake()->date(),
            'status' => fake()->randomElement(['present', 'absent', 'late', 'excused']),
            'notes' => fake()->optional()->sentence(),
            'marked_by_id' => User::factory(),
        ];
    }

    /**
     * Indicate that the attendance is present.
     */
    public function present(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'present',
        ]);
    }

    /**
     * Indicate that the attendance is absent.
     */
    public function absent(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'absent',
        ]);
    }

    /**
     * Indicate that the attendance is late.
     */
    public function late(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'late',
        ]);
    }

    /**
     * Indicate that the attendance is excused.
     */
    public function excused(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'excused',
        ]);
    }
}
