<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Your Cart</h2>

        @if(session('cart'))
            <table class="w-full border">
                <thead>
                <tr class="border">
                    <th class="p-2">Product</th>
                    <th class="p-2">Quantity</th>
                    <th class="p-2">Price</th>
                    <th class="p-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr class="border">
                        <td class="p-2 flex items-center gap-3">
                            <img src="{{ asset('storage/'.$item['image']) }}" alt="" class="w-14 h-14 object-cover">
                            {{ $item['name'] }}
                        </td>
                        <td class="p-2">
                            <form method="POST" action="{{ route('cart.update') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 border">
                                <button class="ml-2 bg-blue-500 text-white px-2 py-1 rounded">Update</button>
                            </form>
                        </td>
                        <td class="p-2">${{ $item['price'] }}</td>
                        <td class="p-2">
                            <form method="POST" action="{{ route('cart.remove') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-6 text-right text-lg font-bold">Total: ${{ $total }}</div>
            <a href="{{ route('checkout.index') }}" class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded">Proceed to Checkout</a>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
</x-app-layout>
