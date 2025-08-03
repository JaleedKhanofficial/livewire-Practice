<div>
    <form wire:submit="CreateUser" action="">
        <input wire:model="name" type="text" placeholder="Enter your name">
        <input wire:model="email" type="email" placeholder="Enter your email">
        <input wire.model="password" type="password" placeholder="Enter your password">
        <button>Create User</button>
    </form>

    @foreach ($users as $user)
    <h4>{{ $user->name }}</h4>
    <h4>{{ $user->email }}</h4>
    <h4>{{ $user->password }}</h4>
    @endforeach
</div>
