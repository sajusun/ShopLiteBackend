<div x-data="{ active: 0, interval: null }"
     x-init="interval = setInterval(() => { active = (active + 1) % {{ count($products) }} }, 5000)"
     class="relative w-full overflow-hidden bg-gray-100 shadow-sm">

    <div class="flex transition-all duration-700" :style="`transform: translateX(-${active * 100}%);`">
        @foreach ($products as $product)
            <div class="min-w-full h-[380px] flex items-center justify-evenly px-8 py-6">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-bold text-indigo-700 mb-3">{{ $product->name }}</h2>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $product->description }}</p>
                    <a href="{{ route('checkout.index', 'product_id='.$product->id) }}"
                       class="bg-orange-500 text-white px-5 py-2 rounded shadow hover:bg-orange-600">Buy Now</a>
                    <a href="{{ route('shop.products.show', [$product->slug,$product->id]) }}"
                       class="bg-indigo-600 text-white px-5 py-2 rounded shadow hover:bg-indigo-700">Details</a>
                </div>
                <img src="{{ asset('storage/'.$product->image) }}"
                     alt="{{ $product->name }}"
                     class="h-72 w-96 object-cover rounded shadow hidden md:block">
            </div>
        @endforeach
    </div>

    <!-- Dots -->
    <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
        <template x-for="(item, index) in {{ count($products) }}">
            <button @click="active = index"
                    class="w-3 h-3 rounded-full border"
                    :class="active === index ? 'bg-indigo-600 border-indigo-600' : 'bg-white border-gray-300'"></button>
        </template>
    </div>
</div>
