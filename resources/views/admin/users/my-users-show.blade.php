<x-admin-layout>
        <div class="max-w-5xl mx-auto bg-white p-6 rounded my-4">
        <section class="shadow-md w-full border-b px-12">
            <h2 class="text-xl font-bold mb-4 bg-gray-600 text-white text-center rounded py-2">User Details</h2>
            <div class="mb-6">
                <h3 class="text-lg font-semibold">Basic Info</h3>
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Phone:</strong> {{ $user->phone ?? '—' }}</p>
{{--                <p><strong>Country:</strong> {{ $user->userDetails->country ?? '—' }}</p>--}}
{{--                <p><strong>Address:</strong> {{ $user->userDetails->address ?? '—' }}</p>--}}
            </div>
        </section>

            <div class="max-w-5xl mx-auto p-6">
                <h2 class="text-xl font-bold mb-4 bg-gray-600 text-white text-center rounded py-2">Orders</h2>
            @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 mb-4 rounded text-center">
                        {{ session('success') }}
                    </div>
                @endif
                @if($user->orders->isEmpty())
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
                        @foreach($user->orders as $order)
                            <tr class="border-b text-center">
                                <td class="p-2 font-semibold">#{{ $order->id }}</td>
                                <td class="p-2">${{ $order->total_price }}</td>
                                <td class="p-2">{{ ucfirst($order->status) }}</td>
                                <td class="p-2">{{ $order->created_at->format('d M, Y') }}</td>
                                <td class="p-2">{{ $order->payment_method }}</td>
                                <td class="p-2">
                                    <a href="{{ route('admin.orders.destroy', $order) }}" class="text-blue-500">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
</x-admin-layout>
