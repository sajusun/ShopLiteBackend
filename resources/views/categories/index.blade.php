<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <h2 class="text-3xl font-bold mb-6">Categories</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories as $category)
                <div class="bg-white shadow rounded p-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $category->name }}</h3>

                    <div class="grid grid-cols-2 gap-3 mb-3">
                        @forelse($category->products as $product)
                            <div class="border rounded overflow-hidden">
                                <a href="{{ route('shop.products.show', [$product->slug,$product->id]) }}" >
                                    <img src="{{ asset('storage/'.$product->image) }}" class="h-24 w-full object-cover" alt="{{ $product->name }}">

                                </a>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm col-span-2">No products available.</p>
                        @endforelse
                    </div>

                    <a href="{{ route('shop.products.index','category='. $category->name) }}"
                       class="text-indigo-600 hover:underline text-sm font-medium">Browse All Products →</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
