<x-app-layout>
    <x-slot name="header">Tags</x-slot>

    @if (session('success'))
        <div class="mb-4 bg-green-50 text-green-700 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <h3 class="font-semibold mb-4">Create Tag</h3>
            <form action="{{ route('tags.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm">Name</label>
                    <input type="text" name="name" class="w-full rounded-xl border-gray-300" required>
                </div>
                <div>
                    <label class="block text-sm">Color</label>
                    <input type="color" name="color" class="rounded h-10 w-full cursor-pointer" value="#3b82f6">
                </div>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-xl">Save</button>
            </form>
        </div>
        
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <h3 class="font-semibold mb-4">Your Tags</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($tags as $tag)
                    <span class="px-3 py-1 rounded-full text-white text-sm" style="background-color: {{ $tag->color }}">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
