<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredient = Ingredient::create([
            "name" => "Jamón",
            "price" => "0.99",
            "stock" => "10",
            "state" => 1
        ]);
        $ingredient = Ingredient::create([
            "name" => "Peperroni",
            "price" => "0.99",
            "stock" => "10",
            "state" => 1
        ]);
        $ingredient = Ingredient::create([
            "name" => "Cebolla",
            "price" => "0.99",
            "stock" => "10",
            "state" => 1
        ]);
        $ingredient = Ingredient::create([
            "name" => "Tocino",
            "price" => "0.99",
            "stock" => "10",
            "state" => 1
        ]);
        
    }
}
