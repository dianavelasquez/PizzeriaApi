<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blend;
use App\Models\BlendIngredient;

class BlendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizza=new Blend();
        $pizza->name='Pizza hawaiana';
        $pizza->price=13.99;
        $pizza->size=1;
        $pizza->state=1;
        $pizza->stock=10;
        $pizza->save();

        $in=new BlendIngredient();
        $in->blend_id=$pizza->id;
        $in->ingredient_id=2;
        $in->save();
        $in=new BlendIngredient();
        $in->blend_id=$pizza->id;
        $in->ingredient_id=1;
        $in->save();
        $in=new BlendIngredient();
        $in->blend_id=$pizza->id;
        $in->ingredient_id=3;
        $in->save();
    }
}
