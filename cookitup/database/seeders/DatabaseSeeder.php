<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cuisine;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();
            Cuisine::query()->delete();
            $this->call(CuisineSeeder::class);

            Recipe::query()->delete();
            $this->call(RecipeSeeder::class);

            Ingredient::query()->delete();
            $this->call(IngredientSeeder::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
