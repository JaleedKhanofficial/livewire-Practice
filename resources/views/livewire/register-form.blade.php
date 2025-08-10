<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 py-8">
    @if (session('message'))
    <div class="mb-4 w-full max-w-md">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    </div>
    @endif
    <form wire:submit="Create" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Create User</h2>
        <label class="mb-2">Name</label>
        <div class="mb-4">
            <input wire:model="name" type="text" placeholder="Enter your name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('name')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <label class="mb-2">Email</label>
        <div class="mb-4">
            <input wire:model="email" type="email" placeholder="Enter your email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('email')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <label class="mb-2">Password</label>
        <div class="mb-6">
            <input wire:model="password" type="password" placeholder="Enter your password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('password')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <label class="mb-2">Profile picture</label>
        <div class="mb-4">
            <input
                wire:model="image"
                type="file"
                accept="image/png, image/jpeg"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('image')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <div wire:loading wire.target="Create">
            <span class="text-green-500">Loading...</span>
        </div>

        <div wire.loading.delay.longest>
            <span class="text-green-500">Sending...</span>
        </div>
        <div wire.loading.class.remove="bg-blue-500" wire.loading.attr="disable" class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Create User</button>
        </div>
    </form>

    <div class="w-full max-w-md bg-white shadow rounded p-6">
        <h3 class="text-xl font-semibold mb-4 text-gray-700">Users</h3>
        @foreach ($users as $user)
        <div class="mb-4 border-b pb-2">
            <div class="text-lg font-medium text-gray-800">{{ $user->name }}</div>
            <div class="text-gray-600">{{ $user->email }}</div>
            <div>
                @if($user->image)
                <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Picture" class="w-16 h-16 rounded-full mt-2">
                @endif
            </div>

        </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>