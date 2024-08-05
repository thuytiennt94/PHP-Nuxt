<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Crust;
use App\Models\Pizza;
use App\Models\PizzaTopping;
use App\Models\Topping;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Category::factory()->count(5)->create();
        Crust::factory()->count(5)->create();
        Topping::factory()->count(5)->create();
        Pizza::factory()->count(5)->create();
        // PizzaTopping::factory()->count(5)->create();
    }
}
