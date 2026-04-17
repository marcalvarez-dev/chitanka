<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class EditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isbn' => fake()->unique()->numerify('#############'), // 13 dígitos
            'title' => fake()->sentence(3),
            'language' => fake()->randomElement(['es', 'en', 'fr', 'de']),
            'publication_date' => fake()->date(),
            'price' => fake()->randomFloat(2, 5, 100),
            'stock' => fake()->numberBetween(0, 50),
            'format' => fake()->randomElement(['paperback', 'hardcover', 'ebook']),
            'synopsis' => fake()->paragraph(),
            'editorial_id' => 1,
            'book_id' => \App\Models\Book::factory(), // 🔥 CLAVE
        ];
    }
}
