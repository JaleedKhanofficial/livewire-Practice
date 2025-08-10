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
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class RegisterForm extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Rule('required|string|min:3|max:255')]
    public $name;
    #[Rule('required|min:2')]
    public $password;
    #[Rule('required|email|unique:users')]
    public $email;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;
    public function Create(){

        sleep(1);
        $validated =  $this->validate();

        if($this->image) {
            $validated['image'] = $this->image->store('images', 'public');
        }

        $user =  User::create($validated);

        $this->reset(['name', 'email', 'password','image']);

        session()->flash('message', 'User created successfully!');
        $this->dispatch('user-created', $user);
    }

    public function render()
    {
        $users = User::latest()->paginate(5);

        return view('livewire.register-form',[
            'users' => $users,
        ]);
    }
}
