<x-app-layout>
    <div class="max-w-xl mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Contact Us</h2>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center">
                {{ $errors->first()}}
            </div>

        @endif
        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-2 bg-white p-6 shadow rounded-lg">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" required
                       class="mt-1 w-full border rounded px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Contact Number</label>
                <input type="text" name="phone" id="phone" placeholder="Optional"
                       class="mt-1 w-full border rounded px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                       class="mt-1 w-full border rounded px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                <input type="text" name="subject" id="subject" placeholder="Optional"
                       class="mt-1 w-full border rounded px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea name="message" id="message" rows="5" required
                          class="mt-1 w-full border rounded px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded hover:bg-indigo-700">
                Send Message
            </button>
        </form>
    </div>
</x-app-layout>
