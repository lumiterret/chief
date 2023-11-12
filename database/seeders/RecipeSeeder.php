<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recipe::factory()->count(15)->create()->each(function ($recipe) {
            $faker = Faker::create();
            $limit = $faker->numberBetween(3,7);
            $ingredients = Ingredient::inRandomOrder()->take($limit)->get();
            foreach ($ingredients as $ingredient) {
                $recipe->ingredients()->attach($ingredient, ['note' => $faker->sentence()]);
            }
        });
    }
}
