<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cuisineIds = \App\Models\Cuisine::pluck('id')->all();
        $userIds = \App\Models\User::pluck('id')->all();
        return ['file' => fake()->word . ".jpg",
            'title' => fake()->word,
            'cuisine_id' => fake()->randomElement($cuisineIds),
            'user_id' => fake()->randomElement($userIds),
            'instruction' => fake()->paragraph,

        ];
    }
}
