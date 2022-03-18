<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blend;
use App\Http\Resources\BlendsCollection;
use App\Http\Resources\BlendResource;
use Illuminate\Http\JsonResponse;

class BlendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blends = Blend::where('state',1)->get();
        if(!is_null($blends)){
            return new JsonResponse([
                'data'=>new BlendsCollection($blends),
                'success' => true
            ],200); 
        }else{
           return new JsonResponse([
                'data'=>[],
                'success' => false
            ],404);  
        }  
    }
}
