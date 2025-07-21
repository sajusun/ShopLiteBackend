{{--<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">--}}
{{--    <!-- Primary Navigation Menu -->--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--        <div class="flex justify-between h-16">--}}
{{--            <div class="flex">--}}
{{--                <!-- Logo -->--}}
{{--                <div class="shrink-0 flex items-center">--}}
{{--                    <a href="{{ route('admin.dashboard') }}">--}}
{{--                        <x-application-logo class="errors h-9 w-auto fill-current text-gray-800" />--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">--}}
{{--                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">--}}
{{--                        {{ __('Dashboard') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Settings Dropdown -->--}}
{{--            <div class="hidden sm:flex sm:items-center sm:ms-6">--}}
{{--                <x-dropdown align="right" width="48">--}}
{{--                    <x-slot name="trigger">--}}
{{--                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">--}}
{{--                            <div>{{ Auth::guard('admin')->user()->name }}</div>--}}

{{--                            <div class="ms-1">--}}
{{--                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </button>--}}
{{--                    </x-slot>--}}

{{--                    <x-slot name="content">--}}
{{--                        <x-dropdown-link :href="route('admin.profile.edit')">--}}
{{--                            {{ __('Profile') }}--}}
{{--                        </x-dropdown-link>--}}

{{--                        <!-- Authentication -->--}}
{{--                        <form method="POST" action="{{ route('admin.logout') }}">--}}
{{--                            @csrf--}}

{{--                            <x-dropdown-link :href="route('admin.logout')"--}}
{{--                                    onclick="event.preventDefault();--}}
{{--                                                this.closest('form').submit();">--}}
{{--                                {{ __('Log Out') }}--}}
{{--                            </x-dropdown-link>--}}
{{--                        </form>--}}
{{--                    </x-slot>--}}
{{--                </x-dropdown>--}}
{{--            </div>--}}

{{--            <!-- Hamburger -->--}}
{{--            <div class="-me-2 flex items-center sm:hidden">--}}
{{--                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">--}}
{{--                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">--}}
{{--                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />--}}
{{--                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Responsive Navigation Menu -->--}}
{{--    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">--}}
{{--        <div class="pt-2 pb-3 space-y-1">--}}
{{--            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">--}}
{{--                {{ __('Dashboard') }}--}}
{{--            </x-responsive-nav-link>--}}
{{--        </div>--}}

{{--        <!-- Responsive Settings Options -->--}}
{{--        <div class="pt-4 pb-1 border-t border-gray-200">--}}
{{--            <div class="px-4">--}}
{{--                <div class="font-medium text-base text-gray-800">{{ Auth::guard('admin')->user()->name  }}</div>--}}
{{--                <div class="font-medium text-sm text-gray-500">{{ Auth::guard('admin')->user()->email  }}</div>--}}
{{--            </div>--}}

{{--            <div class="mt-3 space-y-1">--}}
{{--                <x-responsive-nav-link :href="route('admin.profile.edit')">--}}
{{--                    {{ __('Profile') }}--}}
{{--                </x-responsive-nav-link>--}}
{{--                <div class="mt-3 space-y-1">--}}
{{--                <x-responsive-nav-link :href="route('admin.my.users.index')">--}}
{{--                    {{ __('Users') }}--}}
{{--                </x-responsive-nav-link>--}}

{{--                <!-- Authentication -->--}}
{{--                <form method="POST" action="{{ route('admin.logout') }}">--}}
{{--                    @csrf--}}

{{--                    <x-responsive-nav-link :href="route('admin.logout')"--}}
{{--                            onclick="event.preventDefault();--}}
{{--                                        this.closest('form').submit();">--}}
{{--                        {{ __('Log Out') }}--}}
{{--                    </x-responsive-nav-link>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}


<!-- Include Alpine.js for dropdown toggle -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<nav x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-indigo-600">
                ShopLite <span class="text-red-600">Admin Panel</span>
            </a>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
{{--                <div>--}}
{{--                    <form action="#" method="GET" class="px-4">--}}
{{--                        <input type="text" name="q" placeholder="Search..."--}}
{{--                               class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"/>--}}
{{--                    </form>--}}
{{--                </div>--}}
                <!-- Right side -->
                <div class="flex items-center space-x-4">
                        <div class="relative" x-data="{ open: false }">
                            <div @click="open = !open"
                                 class="flex items-center space-x-2 focus:outline-none cursor-pointer"
                                 aria-label="User menu"
                                 aria-haspopup="true"
                                 :aria-expanded="open">
                                <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                                    <img src="{{ Auth::guard('admin')->user()->profile_pic ? asset('storage/profile_pics/' . Auth::user()->profile_pic) : asset('storage/' . 'profile_pics/profile.png')}}"
                                         alt="Thumbnail">
                                </div>
                                <span class="hidden md:inline text-sm font-medium">{{ Auth::guard('admin')->user()->name}}</span>
                                <i class="fas fa-angle-down w-4 mr-2" :class="{'transform rotate-180': open}"> </i>
                            </div>

                            <!-- Dropdown menu -->
                            <div
                                x-show="open"
                                @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200"
                                style="display: none;">
                                <!-- User info -->
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-sm font-medium text-gray-800">{{ Auth::guard('admin')->user()->name}}</p>
                                    <p class="text-xs text-gray-500 truncate">{{Auth::guard('admin')->user()->email}}</p>
                                </div>
                                <!-- Dropdown items -->
                                <a href="{{ route('admin.dashboard') }}"
                                   class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <i class="fas fa-dashboard w-4 mr-2"> </i>
                                    Dashboard
                                </a>
                                <a href="{{ route('admin.profile.edit') }}"
                                   class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <i class="fas fa-user w-4 mr-2"> </i>
                                    Profile
                                </a>

                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                        <i class="fas fa-sign-out w-4 mr-2"> </i>
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>

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
        </div>
    </div>
</nav>

