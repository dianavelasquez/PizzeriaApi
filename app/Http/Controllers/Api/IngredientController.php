<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Http\Resources\IngredientsCollection;
use App\Http\Resources\IngredientResources;
use Illuminate\Http\JsonResponse;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::where('state',1)->get();
        if(!is_null($ingredients)){
            return new JsonResponse([
                'data'=>new IngredientsCollection($ingredients),
                'success' => true
            ],200); 
        }else{
           return new JsonResponse([
                'data'=>[],
                'success' => false
            ],404);  
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
