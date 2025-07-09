<x-guest-layout>
    <div class="p-8  text-center max-w-md">
        <h1 class="text-4xl font-bold text-red-600 mb-4">403</h1>
        <h2 class="text-2xl font-semibold mb-2">Unauthorized Access</h2>
        <p class="text-gray-600 mb-6">
            Sorry — you don't have permission to access this page.
        </p>

        <a href="{{ url()->previous() }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Go Back
        </a>

    </div>
</x-guest-layout>
