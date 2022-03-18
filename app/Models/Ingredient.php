<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function ingredients()
    {
        return $this->belongsToMany('App\Models\BlendIngredient',"ingredient_id");
    }
}
