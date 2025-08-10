<div wire:poll.15000ms class="bg-white shadow rounded p-6 w-full max-w-3xl overflow-x-auto">
    <h3 class="text-xl font-semibold mb-4 text-gray-700">Users</h3>
<p class="text-sm text-gray-500">Last updated: {{ $time }}</p>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="py-2 px-4 border-r text-left text-gray-600">#</th>
                <th class="py-2 px-4 border-r text-left text-gray-600">Name</th>
                <th class="py-2 px-4 border-r text-left text-gray-600">Email</th>
                <th class="py-2 px-4 border-r text-left text-gray-600">Image</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4 border-r">{{ $users->firstItem() + $index }}</td>
                    <td class="py-2 px-4 border-r">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-r">{{ $user->email }}</td>
                    <td class="py-2 px-4">
                        @if($user->image)
                            <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Picture" class="w-10 h-10 rounded-full">
                        @else
                            <span class="text-gray-400">N/A</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">
                        No users found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
