<x-guest-layout>
    <div class="w-full">
        <div class="py-8">
            <h1 class="text-2xl font-bold text-red-800 mb-6 text-center">Admin Login</h1>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email"
                           class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required autofocus>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                </div>

{{--                <div class="flex items-center justify-between mb-4">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">--}}
{{--                        <label for="remember" class="ml-2 errors text-sm text-gray-700">Remember me</label>--}}
{{--                    </div>--}}
{{--                    <a href="/" class="text-sm text-blue-600 hover:underline">Forgot password?</a>--}}
{{--                </div>--}}

                <button type="submit" class="w-full bg-gray-600 text-white py-2 px-4 mt-4 rounded-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                    Login
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
