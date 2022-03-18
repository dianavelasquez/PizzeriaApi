<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Branch as Sucursal;

class Branch extends Component
{
    public $isModalOpen = 0;
    public $branches;
    public $name;
    public $address;
    public $state;
    public $branch_id;

    public function render()
    {
        $this->branches = Sucursal::all();
        return view('livewire.branches.index');
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
        $this->address = "";
        $this->state = "";
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'state' => 'required',
            //'password' => 'required|confirmed',
        ]);
    
        Sucursal::updateOrCreate(['id' => $this->branch_id], [
            'name' => $this->name,
            'address' => $this->address,
            'state' => $this->state,
        ]);
        session()->flash('message', $this->branch_id ? 'Sucursal actualizada con éxito.' : 'Sucursal creada con éxito.');
        $this->closeModalPopover();
        $this->clearField();
    }

    public function edit($id){
        $branch = Sucursal::find($id);
        $this->name = $branch->name;
        $this->address = $branch->address;
        $this->state = $branch->state;
        $this->branch_id = $branch->id;
        $this->isModalOpen = 1;
    }

    public function delete($id){
        $branch = Sucursal::find($id);
        $branch->delete();
        session()->flash('message', 'Sucursal eliminada.');
    }
}
