<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Checkout</h2>

        <form method="POST" action="{{ route('checkout.placeOrder') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Name</label>
                <input type="text" name="customer_name" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="customer_email" class="w-full border p-2 rounded" required>
            </div>

            <h3 class="text-lg font-bold mt-6 mb-3">Order Summary</h3>
            <ul class="mb-4 border p-4 rounded">
                @php $total = 0; @endphp
                @foreach($cart as $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <li class="flex justify-between border-b py-1">
                        {{ $item['name'] }} × {{ $item['quantity'] }}
                        <span>${{ $item['price'] * $item['quantity'] }}</span>
                    </li>
                @endforeach
                <li class="flex justify-between font-bold pt-2">
                    Total
                    <span>${{ $total }}</span>
                </li>
            </ul>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Place Order</button>
        </form>
    </div>
</x-app-layout>
