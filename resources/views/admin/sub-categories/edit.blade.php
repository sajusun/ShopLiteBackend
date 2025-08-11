<x-admin-layout>
    <div class="max-w-xl mx-auto p-6 bg-white shadow rounded">
        <h1 class="text-2xl font-bold mb-4">Edit Sub-Category</h1>

        <form action="{{ route('admin.sub_categories.update',$subCategory) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block font-medium mb-2">choose Category</label>
                <select name="category_id"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $subCategory->category->id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-2">Sub-Category Name</label>
                <input type="text" name="name" value="{{ old('name', $subCategory->name) }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                       placeholder="Category name">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="text-gray-500 text-md mb-2">Description</label>
                <textarea name="description" rows="2" class="w-full border p-2 mt-2 text-gray-500"
                          placeholder="Description....">{{$subCategory->description??''}}</textarea>
            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update Category
            </button>
            <a href="{{ route('admin.sub_categories.index') }}" class="ml-4 text-gray-600">Cancel</a>
        </form>
    </div>
</x-admin-layout>
