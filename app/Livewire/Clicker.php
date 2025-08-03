<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Clicker extends Component
{
    #[Rule('required|stinh|min:2|max:255')]
    public $name;
    #[Rule('required|min:2')]
    public $password;
    #[Rule('required|email|unique:users')]
    public $email;
    public function CreateUser(){
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password'=> bcrypt($this->password)

        ]);

    }

    public function render()
    {
        $users = User::all();

        return view('livewire.clicker',[
            'users' => $users,
        ]);
    }
}
