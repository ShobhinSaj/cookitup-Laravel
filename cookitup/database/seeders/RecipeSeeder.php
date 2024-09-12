<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recipe::factory(10)->create();
    }
    public function configure()
    {
        return $this->afterCreating(function (Recipe $recipe) {
            // Associate random ingredients with the recipe
            $ingredients = Ingredient::inRandomOrder()->limit(rand(1, 5))->get();
            $recipe->ingredients()->attach($ingredients);
        });
    }
}
