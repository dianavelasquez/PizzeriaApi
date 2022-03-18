<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function ingredient(){
        return $this->belongsTo("App\Models\Ingredient");
    }

    public function getSize($id){
        $size = "";
        $pizza = Pizza::find($id);

        switch($pizza->size){
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
