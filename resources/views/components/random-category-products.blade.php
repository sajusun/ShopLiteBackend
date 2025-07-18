@if($category && $products->count())
    <div id="products" class="container mx-auto px-6 py-8">
        <h3 class="text-2xl  font-bold text-gray-800 mb-6">Featured Products in {{$category->name}}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($products as $product)
                <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-xl transition">
                    <a href="{{ route('shop.products.show', [$product->slug,$product->id]) }}">

                        @if($product->image)
                            {{--                    <img src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">--}}
                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        @else
                            <img src="" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        @endif
                    </a>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h4>
                        <p class="text-gray-500 text-sm mt-1">{{ $product->category->name }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-indigo-600 text-lg font-bold">${{ $product->price }}</span>
                            <button class="bg-indigo-600 text-white text-sm px-3 py-1.5 rounded hover:bg-indigo-700">Add to Cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
