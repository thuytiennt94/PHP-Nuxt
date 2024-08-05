<?php

namespace Database\Factories;

use App\Models\Pizza;
use App\Models\Topping;
use Illuminate\Database\Eloquent\Factories\Factory;

class PizzaToppingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return [
        //     'pizza_id' => Pizza::inRandomOrder()->first()->id,
        //     'topping_id' => Topping::inRandomOrder()->first()->id,
        // ];
    }
}
