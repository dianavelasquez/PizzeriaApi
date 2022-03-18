<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users;
use App\Http\Livewire\Branch;
use App\Http\Livewire\Ingredients;
use App\Http\Livewire\Blends;
use App\Http\Livewire\Pizzas;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'panel'], function(){
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/clientes', Users::class)->name('clientes');

    Route::get('/sucursales', Branch::class)->name('sucursales');
    Route::get('/ingredients', Ingredients::class)->name('ingredients');
    Route::get('/blends', Blends::class)->name('blends');
    Route::get('/pizzas', Pizzas::class)->name('pizzas');
});


