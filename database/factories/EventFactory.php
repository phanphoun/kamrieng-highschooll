<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-1 month', '+3 months');

        return [
            'author_id' => User::factory(),
            'title_km' => fake()->text(50),
            'title_en' => fake()->sentence(4),
            'description_km' => fake()->text(200),
            'description_en' => fake()->paragraph(),
            'start_date' => $startDate,
            'end_date' => fake()->boolean(30) ? fake()->dateTimeBetween($startDate, (clone $startDate)->modify('+1 week')) : null,
            'location' => fake()->boolean(70) ? fake()->city() : null,
            'status' => 'published',
            'is_featured' => false,
            'registration_link' => fake()->boolean(20) ? fake()->url() : null,
        ];
    }

    /**
     * Indicate that the event is published.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
        ]);
    }

    /**
     * Indicate that the event is a draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
        ]);
    }

    /**
     * Indicate that the event is featured.
     */
    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }

    /**
     * Indicate that the event is upcoming.
     */
    public function upcoming(): static
    {
        return $this->state(fn (array $attributes) => [
            'start_date' => fake()->dateTimeBetween('+1 day', '+3 months'),
            'status' => 'published',
        ]);
    }
}
