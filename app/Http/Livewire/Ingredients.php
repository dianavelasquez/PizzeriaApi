<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ingredient;

class Ingredients extends Component
{
    public $isModalOpen = 0;
    public $ingredients;
    public $name;
    public $price;
    public $stock;
    public $state;
    public $ingredient_id;

    public function render()
    {
        $this->ingredients = Ingredient::all();
        return view('livewire.ingredients.index');
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
        $this->price = "";
        $this->stock = "";
        $this->state = "";
    }

    public function store(){
        $this->validate([
            'name' =>'required',
            'price' => 'required',
            'stock' => 'required',
            'state' => 'required',
        ]);

        Ingredient::updateOrCreate(['id' => $this->ingredient_id], [
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
            'state' => $this->state,
        ]);

        session()->flash('message', $this->ingredient_id ? 'Ingrediente actualizado exitosamente.' : 'Ingrediente agregado exitosamente.');
        $this->closeModalPopover();
        $this->clearField();
    }

    public function edit($id){
        $ingredient = Ingredient::find($id);
        $this->name = $ingredient->name;
        $this->price = $ingredient->price;
        $this->stock = $ingredient->stock;
        $this->state = $ingredient->state;
        $this->ingredient_id = $ingredient->id;
        $this->isModalOpen = 1;
    }

    public function delete($id){
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
        session()->flash('message','Ingrediente eliminado.');
    }
}
