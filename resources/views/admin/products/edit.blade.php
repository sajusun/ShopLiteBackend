<x-admin-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow rounded">
        <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium mb-2">Product Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                       placeholder="Product name">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                       placeholder="0.00">
                @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">Stock Quantity</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
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
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">Product Image</label>
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" class="w-32 h-32 object-cover mb-2 rounded">
                @endif
                <input type="file" name="image"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update Product
            </button>
            <a href="{{ route('admin.products.index') }}" class="ml-4 text-gray-600">Cancel</a>
        </form>
    </div>
</x-admin-layout>
