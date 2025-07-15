<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Your Orders</h2>

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
                    <th class="p-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr class="border-b">
                        <td class="p-2 font-semibold">#{{ $order->id }}</td>
                        <td class="p-2">${{ $order->total_price }}</td>
                        <td class="p-2">{{ ucfirst($order->status) }}</td>
                        <td class="p-2">{{ $order->created_at->format('d M, Y') }}</td>
                        <td class="p-2">
                            <a href="{{ route('orders.show', $order) }}" class="text-blue-500">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
