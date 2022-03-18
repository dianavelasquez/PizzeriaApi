<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\PizzaController;
use App\Http\Controllers\Api\BlendController;
use App\Http\Controllers\Api\IngredientController;
use App\Http\Controllers\Api\PurchaseController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('branches',[BranchController::class, 'index']);
Route::get('pizzas',[PizzaController::class, 'index']);
Route::get('blends',[BlendController::class, 'index']);
Route::get('ingredients', [IngredientController::class, 'index']);
Route::get('purchases', [PurchaseController::class, 'index']);
Route::get('purchases-store', [PurchaseController::class, 'store']);