<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Crust;
use App\Models\Topping;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizza>
 */
class PizzaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'category_id' => Category::factory(),
            'crust_id' => Crust::factory(),
            'price' => $this->faker->randomFloat(2, 5, 20),
            'topping_id' => Topping::factory(),
        ];
    }
}
