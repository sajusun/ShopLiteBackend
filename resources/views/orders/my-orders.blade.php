<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">🧾 My Orders</h1>

        @if ($orders->isEmpty())
            <p class="text-gray-600">You haven't placed any orders yet.</p>
        @else
            @foreach ($orders as $order)
                <div class="bg-white shadow-md rounded-lg mb-6 p-5 border">
                    <div class="flex justify-between mb-2">
                        <div>
                            <p class="text-sm text-gray-600">Order ID: <span class="font-semibold">{{ $order->id }}</span></p>
                            <p class="text-sm text-gray-600">Date: {{ $order->created_at->format('d M, Y') }}</p>
                        </div>
                        <div>
              <span class="px-3 py-1 rounded-full text-sm {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                {{ ucfirst($order->status) }}
              </span>
                        </div>
                    </div>

                    <div class="border-t mt-3 pt-3 space-y-3">
                        @foreach ($order->items as $item)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ asset('storage/'.$item->product->image) }}" alt="{{ $item->product->name }}"
                                         class="w-16 h-16 object-cover rounded">
                                    <div>
                                        <h2 class="font-semibold">{{ $item->product->name }}</h2>
                                        <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-700">${{ number_format($item->price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4 text-right">
                        <p class="text-md font-semibold">Total: ${{ number_format($order->amount, 2) }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
