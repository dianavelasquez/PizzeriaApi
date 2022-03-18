<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlendIngredient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ingredient()
    {
        return $this->belongsTo('App\Models\Ingredient');
    }
}
