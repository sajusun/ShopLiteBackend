<x-admin-layout>
    <div class="max-w-4xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Brands List</h1>

        <a href="{{ route('admin.brands.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Brands</a>

        <ul class="mt-4 space-y-2">
            @foreach($brands as $brand)
                <li class="p-3 bg-white rounded shadow flex justify-between items-center">
                    {{ $brand->name }}
                    <div class="space-x-2">
                        <a href="{{ route('admin.brands.edit', $brand) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this Brands?')">
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
