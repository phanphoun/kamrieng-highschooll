<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
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
            'file_path' => 'documents/' . fake()->uuid() . '.pdf',
            'file_size' => fake()->numberBetween(1000, 5000000),
            'category' => fake()->randomElement(['academic', 'administrative', 'forms', 'policies']),
            'download_count' => fake()->numberBetween(0, 1000),
        ];
    }

    /**
     * Set a category for the document.
     */
    public function category(string $category): static
    {
        return $this->state(fn (array $attributes) => [
            'category' => $category,
        ]);
    }
}
