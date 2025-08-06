<x-app-layout>
<form action="/ssl-checkout" method="POST">
    @csrf
    <input type="number" name="amount" placeholder="Amount">
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="phone" placeholder="Phone">
    <button type="submit">Pay with SSLCommerz</button>
</form>

<form action="/bkash-checkout" method="POST">
    @csrf
    <input type="number" name="amount" placeholder="Amount">
    <button type="submit">Pay with bKash</button>
</form>
</x-app-layout>
