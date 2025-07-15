<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">Shop Products</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="border rounded-lg overflow-hidden shadow">
                    <a href="{{ route('user.products.show', $product) }}">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="" class="w-full h-48 object-cover">
                        <div class="p-3">
                            <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                            <p class="text-gray-600">${{ $product->price }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
