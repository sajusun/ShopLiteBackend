<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-1/2">
                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="w-full object-cover rounded-lg shadow">
            </div>

            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold mb-4">{{ $product->name }}</h2>
                <p class="text-xl text-green-600 font-bold mb-3">${{ $product->price }}</p>
                <p class="mb-4 text-gray-700">{{ $product->description }}</p>

                <form method="POST" action="{{ route('cart.add', $product) }}">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" class="border p-2 w-20 rounded mb-3">
                    <br>
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
