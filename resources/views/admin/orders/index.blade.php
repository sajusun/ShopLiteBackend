<x-admin-layout>
    <div class="max-w-7xl mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Orders</h1>

        <table class="table-auto w-full border">
            <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Order ID</th>
                <th class="p-2 border">Customer</th>
                <th class="p-2 border">Total</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr class="text-center">
                    <td class="p-2 border">#{{ $order->id }}</td>
                    <td class="p-2 border">{{ $order->user->name }}</td>
                    <td class="p-2 border">${{ $order->total_price }}</td>
                    <td class="p-2 border">{{ ucfirst($order->status) }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-500">View</a>
                        |
                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this order?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
