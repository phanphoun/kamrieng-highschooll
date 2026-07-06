<?php

namespace Database\Factories;

use App\Models\Leadership;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Leadership>
 */
class LeadershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_km' => fake()->text(30),
            'name_en' => fake()->name(),
            'position_km' => 'នាយក',
            'position_en' => 'Principal',
            'photo' => null,
            'bio_km' => fake()->text(200),
            'bio_en' => fake()->paragraph(),
            'sort_order' => fake()->numberBetween(0, 100),
        ];
    }

    /**
     * Set the position for the leader.
     */
    public function position(string $positionEn, string $positionKm = ''): static
    {
        return $this->state(fn (array $attributes) => [
            'position_en' => $positionEn,
            'position_km' => $positionKm ?: $positionEn,
        ]);
    }
}
