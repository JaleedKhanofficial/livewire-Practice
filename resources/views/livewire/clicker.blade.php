<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 py-8">
    @if (session('message'))
        <div class="mb-4 w-full max-w-md">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        </div>
    @endif
    <form wire:submit="CreateUser" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Create User</h2>
        <div class="mb-4">
            <input wire:model="name" type="text" placeholder="Enter your name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('name')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <input wire:model="email" type="email" placeholder="Enter your email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('email')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <input wire:model="password" type="password" placeholder="Enter your password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('password')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Create User</button>
        </div>
    </form>

    <div class="w-full max-w-md bg-white shadow rounded p-6">
        <h3 class="text-xl font-semibold mb-4 text-gray-700">Users</h3>
        @foreach ($users as $user)
            <div class="mb-4 border-b pb-2">
                <div class="text-lg font-medium text-gray-800">{{ $user->name }}</div>
                <div class="text-gray-600">{{ $user->email }}</div>
                <div class="text-gray-400 text-xs">{{ $user->password }}</div>
            </div>
        @endforeach
    </div>
</div>
