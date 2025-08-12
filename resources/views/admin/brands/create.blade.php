<x-admin-layout>
    <div class="max-w-xl mx-auto p-6 bg-white shadow rounded my-8">
        <h1 class="text-2xl font-bold mb-4">Add New Brand</h1>

        <form action="{{ route('admin.brands.store') }}" method="POST" class="space-y-2">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-2">Brands Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                       placeholder="Enter Brands Name">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-medium text-gray-500">Description</label>
                <textarea name="description" rows="2" class="w-full border p-2 mt-2"
                          placeholder="Description...."></textarea>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-gray-500">Logo (optional)</label>
                <input type="file" name="logo" accept="image/*">
            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save
            </button>
            <a href="{{ route('admin.brands.index') }}" class="ml-4 text-gray-600">Cancel</a>
        </form>
    </div>
</x-admin-layout>
