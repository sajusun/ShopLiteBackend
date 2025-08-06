<x-app-layout>
    <div class="max-w-xl mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-4">bKash Payment (Sandbox)</h2>

        <button id="payNow" class="bg-pink-500 text-blue-500 px-4 py-2 rounded hover:bg-pink-600">
            Pay ৳10 with bKash
        </button>

        <div id="result" class="mt-4 text-sm text-gray-700"></div>
    </div>

    <script>
        document.getElementById('payNow').addEventListener('click', async () => {
            const resultBox = document.getElementById('result');
            resultBox.innerText = 'Generating token...';

            const tokenRes = await fetch('/bkash/token');
            const tokenData = await tokenRes.json();

            if (tokenData.token) {
                resultBox.innerText = 'Token received. Processing payment...';

                const payRes = await fetch('/bkash/pay', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                const payData = await payRes.json();
                console.log(payData);

                if (payData.paymentID) {
                    resultBox.innerText = `Payment created: ${payData.paymentID}`;
                } else {
                    resultBox.innerText = 'Failed to create payment';
                }
            } else {
                resultBox.innerText = 'Failed to generate token';
            }
        });
    </script>
</x-app-layout>
