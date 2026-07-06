<?php

namespace Database\Factories;

use App\Models\Notice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Notice>
 */
class NoticeFactory extends Factory
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
            'body_km' => fake()->text(200),
            'body_en' => fake()->paragraph(),
            'is_urgent' => false,
            'starts_at' => now()->subDay(),
            'ends_at' => now()->addMonth(),
        ];
    }

    /**
     * Indicate that the notice is urgent.
     */
    public function urgent(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_urgent' => true,
        ]);
    }

    /**
     * Indicate that the notice is expired.
     */
    public function expired(): static
    {
        return $this->state(fn (array $attributes) => [
            'starts_at' => now()->subMonths(2),
            'ends_at' => now()->subMonth(),
        ]);
    }

    /**
     * Indicate that the notice has not started yet.
     */
    public function upcoming(): static
    {
        return $this->state(fn (array $attributes) => [
            'starts_at' => now()->addMonth(),
            'ends_at' => now()->addMonths(2),
        ]);
    }

    /**
     * Indicate that the notice has no date restrictions.
     */
    public function noDateRestrictions(): static
    {
        return $this->state(fn (array $attributes) => [
            'starts_at' => null,
            'ends_at' => null,
        ]);
    }
}
