<?php    // Call this method from tinker or route for quick seeding
    // public function createFiftyUsers()
    // {
    //     \App\Models\User::factory()->count(50)->create();
    // }
    ?>
<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class Clicker extends Component
{
    #[Rule('required|string|min:3|max:255')]
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
        $this->reset(['name', 'email', 'password']);
        request()->session()->flash('message', 'User created successfully!');

    }

    public function render()
    {
        $users = User::all();

        return view('livewire.clicker',[
            'users' => $users,
        ]);
    }
}
