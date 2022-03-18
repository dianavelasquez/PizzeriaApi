<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blend extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ingredients()
    {
        return $this->hasMany('App\Models\BlendIngredient',"blend_id");
    }

    public function getSize($id){
        $size = "";
        $blend = Blend::find($id);

        switch($blend->size){
            case 1:
                $size = "Personal";
                break;
            case 2:
                $size = "Grande";
                break;
            case 3:
                $size = "Gigante";
                break;
            case 4:
                $size = "4x4";
                break;
        }

        return $size;
    }
}
