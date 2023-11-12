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
        $instructions = $this->faker->sentence(3) . PHP_EOL;
        for($i = 0; $i <=3; $i++ ) {
            $instructions .= $this->faker->paragraph(random_int(2, 6));
        }
        return [
            'name' => $this->faker->sentence(3),
            'instructions' => $instructions
        ];
    }
}
