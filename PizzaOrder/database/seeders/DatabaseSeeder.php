<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Crust;
use App\Models\Pizza;
use App\Models\Topping;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->count(5)->create();
        Crust::factory()->count(5)->create();
        Topping::factory()->count(5)->create();
        Pizza::factory()->count(5)->create();
    }
}
