<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Checkout</h2>

        <form method="POST" action="{{ route('checkout.placeOrder') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Full Name</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Email: (Optional)</label>
                <input type="text" name="email" class="w-full border rounded p-2" >
            </div>
            <div class="mb-4">
                <label class="block font-semibold">Phone Number :</label>
                <input type="text" name="phone" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Address :</label>
                <textarea name="address" rows="2" class="w-full border rounded p-2" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Choose Payment Method</label>
                <select name="payment_method" class="w-full border rounded p-2" required>
                    <option value="cod">Cash on Delivery</option>
                    <option value="sslcommerz">SSLCOMMERZ (Bangladesh)</option>
                    <!-- Add more later -->
                </select>
            </div>

            <h3 class="text-lg font-bold mt-6 mb-3">Order Summary</h3>
            <ul class="mb-4 border p-4 rounded">
                @php $subTotal = 0;
                    $flatShippingCost = config('app.order_flat_shipping', 60);

                @endphp
                @foreach($cart as $item)
                    @php $subTotal += $item['price'] * $item['quantity']; @endphp
                    <li class="flex justify-between border-b py-1">
                        {{ $item['name'] }} × {{ $item['quantity'] }}
                        <span>${{ $item['price'] * $item['quantity'] }}</span>
                    </li>
                @endforeach
                <li class="grid font-bold pt-2 border-1">
                    <div class=" flex justify-between"><span>Subtotal :</span><span>${{ $subTotal }}</span></div>
                    <div class=" flex justify-between"><span>Shipping Cost:</span><span>${{ $flatShippingCost }}</span></div>
                    <div class=" flex justify-between"><span>Total</span><span>${{ $subTotal+$flatShippingCost }}</span></div>
                </li>
            </ul>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Place Order</button>
        </form>
    </div>
</x-app-layout>
