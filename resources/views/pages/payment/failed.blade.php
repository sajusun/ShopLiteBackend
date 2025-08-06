<x-app-layout>
    <div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-lg rounded-2xl p-8 max-w-md text-center">
        <div class="text-red-500 mb-4">
            @if($reason=='failed'|| $reason=='canceled')
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            @else
                <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            @endif
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Payment {{$reason??'Failed'}}</h2>
        <p class="text-gray-600 mb-4">{{ $message ?? 'Something went wrong during the payment process.' }}</p>

        <a href="{{ route('home') }}" class="inline-block mt-4 px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Go Back Home</a>
    </div>
    </div>
</x-app-layout>
