<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizza = Pizza::create([
            "name" => "Jamón",
            "price" => "6.99",
            "size" => 1,
            "ingredient_id" => 1,
            "state" => 1
        ]);

        $pizza = Pizza::create([
            "name" => "Pepperoni",
            "price" => "11.99",
            "size" => 2,
            "ingredient_id" => 2,
            "state" => 1
        ]);

         $pizza = Pizza::create([
            "name" => "Tocino",
            "price" => "13.99",
            "size" => 3,
            "ingredient_id" => 4,
            "state" => 1
        ]);
    }
}
