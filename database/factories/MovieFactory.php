<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word,
            'storyline' => fake()->paragraph,
            'language' => fake()->randomElement(["English", "French", "German"]),
            'release_date' => fake()->numberBetween(2015, 2025), 
            'box_office' => fake()->numberBetween(500000, 300000), 
            'rating' => fake()->numberBetween(1, 10), 
            'runtime' => fake()->numberBetween(60, 180), 
        ];
    }
}
