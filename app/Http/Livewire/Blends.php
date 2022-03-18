<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blend;
use App\Models\Ingredient;
use App\Models\BlendIngredient;

class Blends extends Component
{
    public $isModalOpen = 0;
    public $name;
    public $stock;
    public $price;
    public $size;
    public $state;
    public $blend_id;
    public $ingredient_id;
    public $ingredients;

    public function render()
    {
        $this->blends = Blend::all();
        $this->ingredients = Ingredient::where('state',1)->get();
        return view('livewire.blends.index');
    }

    public function create(){
        $this->clearField();
        $this->isModalOpen = 1;
    }

    public function closeModalPopover(){
        $this->isModalOpen = 0;
    }

    public function clearField(){
        $this->name = "";
        $this->stock = "";
        $this->price = "";
        $this->size = "";
        $this->state = "";
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'size' => 'required',
            'state' => 'required',
        ]);


        $blendhere = Blend::updateOrCreate(['id' => $this->blend_id], [
            'name' => $this->name,
            'stock' => $this->stock,
            'price' => $this->price,
            'size' => $this->size,
            'state' => $this->state,
        ]);

        for($i = 0; $i < count($this->ingredient_id); $i++)
        {
            $ingredient = new BlendIngredient();
            $ingredient->ingredient_id = $this->ingredient_id[$i];
            $ingredient->blend_id = $blendhere->id;
            $ingredient->save();
        }


        session()->flash('message', $this->blend_id ? 'Combinación actializada exitosamente.' : 'Combinación agregada exitosamente.');
        $this->closeModalPopover();
        $this->clearField();
    }

    public function edit($id){
        $blend = Blend::find($id);
        $this->name= $blend->name;
        $this->price = $blend->price;
        $this->size = $blend->size;
        $this->stock = $blend->stock;
        $this->state = $blend->state;
        $this->blend_id = $blend->id;
        $this->isModalOpen = 1;
    }

    public function delete($id){
        $blend = Blend::find($id);
        $blend->delete();
        session()->flash('message','Combinación eliminada.');
    }
}
