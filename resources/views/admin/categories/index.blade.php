<x-admin-layout>
    <div class="max-w-4xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Categories</h1>

        <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Category</a>

        <ul class="mt-4 space-y-2">
            @foreach($categories as $category)
                <li class="p-3 bg-white rounded shadow flex justify-between items-center">
                    {{ $category->name }}
                    <div class="space-x-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-admin-layout>
