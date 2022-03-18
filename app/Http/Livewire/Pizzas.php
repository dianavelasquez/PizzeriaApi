<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pizza;
use App\Models\Ingredient;

class Pizzas extends Component
{
    public $isModalOpen = 0;
    public $name;
    public $ingredient_id;
    public $price;
    public $size;
    public $state;
    public $pizza_id;
    public $pizzas;
    public $ingredients;

    public function render()
    {
        $this->pizzas = Pizza::all();
        $this->ingredients = Ingredient::where('state',1)->get();
        return view('livewire.pizzas.index');
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
        $this->ingredient_id = "";
        $this->price = "";
        $this->size = "";
        $this->state = "";
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'ingredient_id' => 'required',
            'price' => 'required',
            'size' => 'required',
            'state' => 'required',
        ]);

        Pizza::updateOrCreate(['id' => $this->pizza_id], [
            'name' => $this->name,
            'ingredient_id' => $this->ingredient_id,
            'price' => $this->price,
            'size' => $this->size,
            'state' => $this->state,
        ]);

        session()->flash('message', $this->pizza_id ? 'Especialidad actializada exitosamente.' : 'Combinación agregada exitosamente.');
        $this->closeModalPopover();
        $this->clearField();
    }

    public function edit($id){
        $pizza = Pizza::find($id);
        $this->name= $pizza->name;
        $this->price = $pizza->price;
        $this->size = $pizza->size;
        $this->stock = $pizza->stock;
        $this->state = $pizza->state;
        $this->pizza_id = $pizza->id;
        $this->isModalOpen = 1;
    }

    public function delete($id){
        $pizza = Pizza::find($id);
        $pizza->delete();
        session()->flash('message','Combinación eliminada.');
    }

}
