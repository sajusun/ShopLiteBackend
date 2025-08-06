<x-app-layout>
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white shadow-lg rounded-xl p-8 max-w-md text-center">
            <div class="flex justify-center mb-4">
                <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-2">Payment Successful!</h2>
            <p class="text-gray-600 mb-6">
                Thank you! Your payment was processed successfully.
            </p>

            <a href="{{ route('home') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                Back to Home
            </a>
        </div>
    </div>
</x-app-layout>
