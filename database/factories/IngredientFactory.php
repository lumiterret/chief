<?php

namespace Database\Factories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $description = $this->faker->sentence(3) . PHP_EOL;
        for($i = 0; $i <=3; $i++ ) {
            $description .= $this->faker->paragraph(random_int(2, 6));
        }

        return [
            'name' => $this->faker->sentence(2),
            'description' => $description,
            'created_at' => $this->faker->dateTimeBetween('-1month', 'now'),
        ];

    }
}
