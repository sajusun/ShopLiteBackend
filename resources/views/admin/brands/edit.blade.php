<x-admin-layout>
    <div class="max-w-xl mx-auto p-6 bg-white shadow rounded my-8">
        <h1 class="text-2xl font-bold mb-4">Edit Brands</h1>

        <form action="{{ route('admin.brands.update', $brand) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium mb-2">Brands Name</label>
                <input type="text" name="name" value="{{ old('name', $brand->name) }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                       placeholder="Category name">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-2">Description</label>
                <textarea name="description" rows="2" class="w-full border p-2 mt-2"
                          placeholder="Description....">{{$brand->description??''}}</textarea>
            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update
            </button>
            <a href="{{ route('admin.brands.index') }}" class="ml-4 text-gray-600">Cancel</a>
        </form>
    </div>
</x-admin-layout>
