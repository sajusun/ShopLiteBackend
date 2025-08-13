<x-admin-layout>
    <div class="h-full w-full my-10">
    <div class="max-w-2xl mx-auto p-6 bg-white shadow rounded">
        <h1 class="text-lg font-bold mb-4 bg-gray-400 text-white p-2 rounded text-center">Add New Product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="text-gray-500">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-2">Product Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                       placeholder="Product name">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                       placeholder="0.00">
                @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">Stock Quantity</label>
                <input type="number" name="stock" value="{{ old('stock') }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                       placeholder="0">
                @error('stock')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">Category</label>
                <select name="category_id"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-2">Sub Category</label>
                <select name="sub_category_id"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                    <option value="">Select Category</option>
                    @foreach($sub_categories as $sub_category)
                        <option value="{{ $sub_category->id }}" {{ old('category_id') == $sub_category->id ? 'selected' : '' }}>
                            {{ $sub_category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-2">Brands</label>
                <select name="brand_id"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                    <option value="">Select Bands</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
                @error('brand_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">Product Image</label>
                <input type="file" name="image"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-6 py-1
                    transition font-semibold rounded hover:bg-blue-600">Save
            </button>
            <a href="{{ route('admin.products.index') }}" class="ml-6 px-6 py-1 transition font-semibold text-gray-500  hover:text-gray-600">Cancel</a>
        </form>
    </div>
    </div>
</x-admin-layout>
