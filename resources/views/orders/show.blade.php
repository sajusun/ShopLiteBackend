<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Order #{{ $order->id }} Details</h2>

        <div class="mb-4">
            <strong>Status:</strong> {{ ucfirst($order->status) }} <br>
            <strong>Placed On:</strong> {{ $order->created_at->format('d M, Y') }}
        </div>

        <h3 class="text-lg font-bold mb-2">Items:</h3>
        <table class="w-full border text-sm mb-4">
            <thead>
            <tr class="border-b">
                <th class="p-2">Product</th>
                <th class="p-2">Price</th>
                <th class="p-2">Quantity</th>
                <th class="p-2">Subtotal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->items as $item)
                <tr class="border-b">
                    <td class="p-2 flex items-center gap-3">
                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="" class="w-10 h-10 object-cover">
                        {{ $item->product_name }}
                    </td>
                    <td class="p-2">${{ $item->price }}</td>
                    <td class="p-2">{{ $item->quantity }}</td>
                    <td class="p-2">${{ $item->price * $item->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-right font-bold text-lg">Total: ${{ $order->total_price }}</div>

        <a href="{{ route('orders.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded">Back to Orders</a>
    </div>
</x-app-layout>
