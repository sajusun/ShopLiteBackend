<x-admin-layout>
    <div class="max-w-7xl mx-auto p-4">
        <div class="flex justify-between py-1 px-8">
            <h1 class="text-xl font-bold py-1 text-gray-600">Products List</h1>
            <a href="{{ route('admin.products.create') }}"
               class="bg-gray-500 text-white px-4 py-1 font-bold rounded transition hover:bg-gray-600">+ Add New</a>
        </div>
        <table class="table-auto w-full mt-2 border text-base">
            <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Brands</th>
                <th class="p-2 border">Price</th>
                <th class="p-2 border">Stock</th>
                <th class="p-2 border">Category</th>
                <th class="p-2 border">Action</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-center">
            @foreach($products as $product)
                <tr>
                    <td class="p-2 border">{{ $product->name }}</td>
                    <td class="p-2 border">{{ $product->brand->name??'No brand assigned' }}</td>
                    <td class="p-2 border">${{ $product->price }}</td>
                    <td class="p-2 border">{{ $product->stock }}</td>
                    <td class="p-2 border">{{ $product->category->name }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="text-blue-500">Edit</a>
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
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-admin-layout>
