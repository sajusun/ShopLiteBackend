<!-- Include Alpine.js for dropdown toggle -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<nav x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="text-2xl font-bold text-indigo-600">
                LiteShop
            </a>
            <form action="{{ route('shop.products.index') }}" method="GET" class="px-4">
                <input type="text" name="q" placeholder="Search..."
                       class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </form>
            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
                <a href="{{ url('/shop') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Shop</a>
                <a href="{{ url('/categories') }}"
                   class="text-gray-700 hover:text-indigo-600 font-medium">Categories</a>
                <a href="{{ url('/contact') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Contact</a>
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">

                <!-- Cart -->
                <a href="{{ url('/cart') }}" class="relative">
                    <svg class="h-6 w-6 text-gray-700 hover:text-indigo-600" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13L17 13M9 21a1 1 0 100-2 1 1 0 000 2zm6 0a1 1 0 100-2 1 1 0 000 2z"/>
                    </svg>
                    <span class="absolute -top-2 -right-2 text-xs font-bold bg-red-500 text-white rounded-full px-1">
{{--            {{ count(session('cart', 0)) }}--}}
                        {{count(session()->get('cart', []))}}
          </span>
                </a>
                <!-- User Auth -->


                <!-- Right side -->
                <div class="flex items-center space-x-4">
                    @auth()
                        <!-- User dropdown container -->
                        <div class="relative" x-data="{ open: false }">
                            <!-- Dropdown trigger button -->
                            <div @click="open = !open"
                                 class="flex items-center space-x-2 focus:outline-none cursor-pointer"
                                 aria-label="User menu"
                                 aria-haspopup="true"
                                 :aria-expanded="open">
                                <!-- User avatar -->
                                <div
                                    class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                                    <img
                                        src="{{ Auth::user()->profile_pic ? asset('storage/profile_pics/' . Auth::user()->profile_pic) : asset('storage/' . 'profile_pics/profile.png')}}"
                                        alt="Thumbnail">
                                </div>
                                <!-- User name (hidden on mobile) -->
                                <span class="hidden md:inline text-sm font-medium">{{ Auth::user()->name}}</span>
                                <!-- Chevron icon -->
                                <i class="fas fa-angle-down w-4 mr-2" :class="{'transform rotate-180': open}"> </i>
                            </div>

                            <!-- Dropdown menu -->
                            <div
                                x-show="open"
                                @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200"
                                style="display: none;"
                            >
                                <!-- User info -->
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-sm font-medium text-gray-800">{{ Auth::user()->name}}</p>
                                    <p class="text-xs text-gray-500 truncate">{{Auth::user()->email}}</p>
                                </div>
                                <!-- Dropdown items -->
                                <a href="{{ route('dashboard') }}"
                                   class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <i class="fas fa-dashboard w-4 mr-2"> </i>
                                    Dashboard
                                </a>
                                <a href="{{ route('profile.edit') }}"
                                   class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <i class="fas fa-user w-4 mr-2"> </i>
                                    Profile
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm
                text-gray-700 hover:bg-gray-100 flex items-center">
                                        <i class="fas fa-sign-out w-4 mr-2"> </i>
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div>
                            <a href="/login"
                               class="px-3 py-2 text-xs mx-1.5 md:px-4 md:py-2 md:text-sm font-bold
               color-main rounded-md md:mx-2">Sigh In</a>

                            <a href="/register"
                               class="px-3 py-2 mx-1.5 text-xs md:px-4 md:py-2
               md:text-sm bg-color-main font-semibold text-white rounded-md md:mx-2 ">Sigh Up</a>
                        </div>
                    @endauth
                </div>

                <!-- Mobile Hamburger -->
                <button @click="open = !open" class="md:hidden text-gray-700 hover:text-indigo-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" class="md:hidden mt-2 space-y-2">
            <a href="{{ url('/') }}" class="block text-gray-700 hover:text-indigo-600">Home</a>
            <a href="{{ url('/shop') }}" class="block text-gray-700 hover:text-indigo-600">Shop</a>
            <a href="{{ url('/categories') }}" class="block text-gray-700 hover:text-indigo-600">Categories</a>
            <a href="{{ url('/contact') }}" class="block text-gray-700 hover:text-indigo-600">Contact</a>

            @auth
                <a href="{{ url('/profile') }}" class="block text-gray-700 hover:text-indigo-600">Profile</a>
                @if(Auth::user()->is_admin ?? false)
                    <a href="{{ url('/admin/dashboard') }}" class="block text-gray-700 hover:text-indigo-600">Admin
                        Panel</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-4 py-2 text-gray-700 hover:text-indigo-600">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block text-gray-700 hover:text-indigo-600">Login</a>
                <a href="{{ route('register') }}" class="block text-gray-700 hover:text-indigo-600">Register</a>
            @endauth
        </div>
    </div>
</nav>
