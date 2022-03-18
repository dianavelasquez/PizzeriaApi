<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $users, $name, $email, $password,$user_id,$user_type,$state;
    public $isModalOpen = 0;

    public function render()
    {
        $this->users = User::where('user_type',1)->get();
        return view('livewire.users.index');
    }

    public function create()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->name = '';
        $this->email = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'state' => 'required',
            //'password' => 'required|confirmed',
        ]);
    
        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'state' => $this->state,
        ]);
        session()->flash('message', $this->user_id ? 'Cliente actualizado con éxito.' : 'Cliente creado con éxito.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->state = $user->state;
        $this->resetErrorBag();
        $this->resetValidation();
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'User deleted.');
    }

    
}
