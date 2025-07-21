<x-admin-layout>
    <div class="max-w-7xl mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Products</h1>

        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Product</a>

        <table class="table-auto w-full mt-4 border">
            <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Price</th>
                <th class="p-2 border">Stock</th>
                <th class="p-2 border">Category</th>
                <th class="p-2 border">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="p-2 border">{{ $product->name }}</td>
                    <td class="p-2 border">${{ $product->price }}</td>
                    <td class="p-2 border">{{ $product->stock }}</td>
                    <td class="p-2 border">{{ $product->category->name }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-500">Edit</a>
                        |
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
