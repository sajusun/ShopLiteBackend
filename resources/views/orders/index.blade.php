<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Your Orders</h2>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded text-center">
                {{ session('success') }}
            </div>
        @endif
        @if($orders->isEmpty())
            <p>You haven’t placed any orders yet.</p>
        @else
            <table class="w-full border text-sm">
                <thead>
                <tr class="border-b">
                    <th class="p-2">Order No</th>
                    <th class="p-2">Total</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Date</th>
                    <th class="p-2">Payment Method</th>
                    <th class="p-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr class="border-b text-center">
                        <td class="p-2 font-semibold">#{{ $order->id }}</td>
                        <td class="p-2">${{ $order->amount }}</td>
                        <td class="p-2">{{ ucfirst($order->status) }}</td>
                        <td class="p-2">{{ $order->created_at->format('d M, Y') }}</td>
                        <td class="p-2">{{ $order->payment_method }}</td>
                        <td class="p-2">
                            <a href="{{ route('my.orders.show', $order) }}" class="text-blue-500">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>


{{--<x-app-layout>--}}
{{--    <div class="max-w-5xl mx-auto py-10 px-4">--}}
{{--        <h1 class="text-2xl font-bold mb-6">🧾 My Orders</h1>--}}

{{--        @if ($orders->isEmpty())--}}
{{--            <p class="text-gray-600">You haven't placed any orders yet.</p>--}}
{{--        @else--}}
{{--            @foreach ($orders as $order)--}}
{{--                <div class="bg-white shadow-md rounded-lg mb-6 p-5 border">--}}
{{--                    <div class="flex justify-between mb-2">--}}
{{--                        <div>--}}
{{--                            <p class="text-sm text-gray-600">Order ID: <span class="font-semibold">{{ $order->id }}</span></p>--}}
{{--                            <p class="text-sm text-gray-600">Date: {{ $order->created_at->format('d M, Y') }}</p>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--              <span class="px-3 py-1 rounded-full text-sm {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">--}}
{{--                {{ ucfirst($order->status) }}--}}
{{--              </span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="border-t mt-3 pt-3 space-y-3">--}}
{{--                        @foreach ($order->items as $item)--}}
{{--                            <div class="flex items-center justify-between">--}}
{{--                                <div class="flex items-center space-x-3">--}}
{{--                                    <img src="{{ asset('storage/'.$item->product->image) }}" alt="{{ $item->product->name }}"--}}
{{--                                         class="w-16 h-16 object-cover rounded">--}}
{{--                                    <div>--}}
{{--                                        <h2 class="font-semibold">{{ $item->product->name }}</h2>--}}
{{--                                        <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="text-right">--}}
{{--                                    <p class="text-sm text-gray-700">${{ number_format($item->price, 2) }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}

{{--                    <div class="mt-4 text-right">--}}
{{--                        <p class="text-md font-semibold">Total: ${{ number_format($order->total_price, 2) }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
