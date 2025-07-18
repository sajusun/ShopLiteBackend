<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded text-center">
                {{ session('error') }}
            </div>
        @endif
        <h2 class="text-2xl font-bold mb-6">Order #{{ $order->id }} Details</h2>
        <div class="mb-4">
            <strong>Status:</strong> {{ ucfirst($order->status) }} <br>
            <strong>Placed On:</strong> {{ $order->created_at->format('d M, Y') }}
        </div>
<div class="flex justify-between mb-2">
    <h3 class="text-lg font-bold">products:</h3>
    @if ($order->status === 'pending')
        <form action="{{ route('my.orders.cancel', $order->id) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to cancel this order?');">
            @csrf
            @method('PATCH')
            <input type="submit" value="Cancel Order" class="text-red-600 rounded hover:text-red-700 cursor-pointer">
        </form>
    @endif
</div>
        <table class="w-full border text-sm mb-4">
            <thead>
            <tr class="border-b">
                <th class="p-2">Image</th>
                <th class="p-2">Price</th>
                <th class="p-2">Quantity</th>
                <th class="p-2">Subtotal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->items as $item)
                <tr class="border-b text-center">
                    <td class="p-2 flex items-center gap-3">
                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="" class="w-12 h-12 mx-auto object-cover">
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

        <a href="{{ route('my.orders.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded">Back to Orders</a>
    </div>

</x-app-layout>



{{--second design--}}
{{--<x-app-layout>--}}
{{--    <div class="max-w-4xl mx-auto px-4 py-10">--}}
{{--        <h1 class="text-2xl font-bold mb-4">📦 Order Details</h1>--}}

{{--        <div class="bg-white rounded shadow p-6 mb-6">--}}
{{--            <div class="flex justify-between mb-2">--}}
{{--                <div>--}}
{{--                    <p class="text-sm">Order ID: <span class="font-medium">{{ $order->id }}</span></p>--}}
{{--                    <p class="text-sm">Date: {{ $order->created_at->format('d M, Y H:i') }}</p>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--          <span class="px-3 py-1 rounded-full text-sm {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">--}}
{{--            {{ ucfirst($order->status) }}--}}
{{--          </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="bg-white rounded shadow p-6 mb-6">--}}
{{--            <h2 class="text-lg font-semibold mb-4">🛒 Products</h2>--}}
{{--            <div class="space-y-4">--}}
{{--                @foreach ($order->items as $item)--}}
{{--                    <div class="flex items-center justify-between">--}}
{{--                        <div class="flex items-center space-x-4">--}}
{{--                            <img src="{{ asset('storage/'.$item->product->image) }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded">--}}
{{--                            <div>--}}
{{--                                <p class="font-medium">{{ $item->product->name }}</p>--}}
{{--                                <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="text-right">--}}
{{--                            <p>${{ number_format($item->price, 2) }}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="bg-white rounded shadow p-6">--}}
{{--            <h2 class="text-lg font-semibold mb-4">🧾 Order Summary</h2>--}}
{{--            <div class="flex justify-between mb-2">--}}
{{--                <span>Total Price:</span>--}}
{{--                <span class="font-semibold">${{ number_format($order->total_price, 2) }}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="mt-6">--}}
{{--            <a href="{{ route('my.orders.index') }}" class="text-indigo-600 hover:underline">&larr; Back to Orders</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
