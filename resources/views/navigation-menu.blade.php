<nav x-data="{ open: false }" class="bg-white relative border-b border-gray-100 dark:border-gray-600 z-50 dark:bg-gray-800 dark:text-gray-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('guestHome') }}">
                        <x-jet-application-mark class="block h-10 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('markets') }}" :active="request()->routeIs('markets')">
                        {{ __('Markets') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('exchange') }}" :active="request()->routeIs('exchange')">
                        {{ __('Exchange') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('pricing') }}" :active="request()->routeIs('pricing')">
                        {{ __('Pricing') }}
                    </x-jet-nav-link>
                    <x-my-dropdown>
                        <x-slot:trigger>
                            {{ __('About') }}
                        </x-slot:trigger>

                        <x-slot:content>
                            <x-jet-dropdown-link href="{{ route('pricing') }}">
                                {{ 'About ' . config('app.name') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('team') }}">
                                {{ __('Team members') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('testimonials') }}">
                                {{ __('Client Reviews') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('faqs') }}">
                                {{ __('Frequently Asked Questions') }}
                            </x-jet-dropdown-link>
                        </x-slot:content>
                    </x-my-dropdown>
                    <x-my-dropdown>
                        <x-slot:trigger>
                            {{ __('Resources') }}
                        </x-slot:trigger>

                        <x-slot:content>
                            <x-jet-dropdown-link href="{{ route('articles') }}">
                                {{ __('Market Feeds') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('transactions') }}">
                                {{ __('Transaction updates') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('projector') }}">
                                {{ __('ROI projector') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('ukrain') }}">
                                {{ __('Humanitarian Support') }}
                            </x-jet-dropdown-link>
                        </x-slot:content>
                    </x-my-dropdown>
                    <x-jet-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                        {{ __('Contact') }}
                    </x-jet-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center gap-2 sm:ml-4">
                <!-- Settings Dropdown -->
                @auth
                    <div class="relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ url('storage/' . Auth::user()->profile_photo_path) }}"
                                        alt="{{ Auth::user()->name }}" />
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-500 dark:text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>
                                <x-jet-dropdown-link href="{{ route('user.dashboard') }}">
                                    {{ __('Dashboard') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('user.investments') }}">
                                    {{ __('Investments') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('user.deposits') }}">
                                    {{ __('Deposits') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('user.withdrawals') }}">
                                    {{ __('Withdrawals') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('user.fiat_withdrawals') }}">
                                    {{ __('Bank Withdrawals') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('user.mybots') }}">
                                    {{ __('Subscriptions') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('user.wallets') }}">
                                    {{ __('My wallets') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('user.refincome') }}">
                                    {{ __('Affiliate Program') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-300 dark:border-gray-500"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endauth

                @guest
                    <div class="ml-3 relative">
                        <x-secondary-link-button href="{{ route('login') }}">
                            <span class="mr-1 text-blue-950">{{ __('Sign in') }}</span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-950">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>
                            </span>
                        </x-secondary-link-button>
                    </div>
                @endguest
                <div x-data="{
                    isDark: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
                    toggleDark() {
                        this.isDark = !this.isDark;
                        if (this.isDark) {
                            document.documentElement.classList.add('dark');
                            localStorage.theme = 'dark';
                        } else {
                            document.documentElement.classList.remove('dark');
                            localStorage.theme = 'light';
                        }
                    },
                    init() {
                        if (this.isDark) {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                    }
                }" x-init="init()">
                    <button @click="toggleDark" x-bind:class="isDark ? 'justify-end' : 'justify-start'"
                        class="w-12 rounded-full inline-flex border border-gray-500 dark:border-gray-400 p-1 bg-gray-200 dark:bg-gray-600">
                        <svg :class="isDark ? 'block' : 'hidden'"
                            class="w-5 h-5 bg-gray-400 text-gray-800 rounded-full" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" width="24" height="24" stroke-width="2">
                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M12 5l0 .01"></path>
                            <path d="M17 7l0 .01"></path>
                            <path d="M19 12l0 .01"></path>
                            <path d="M17 17l0 .01"></path>
                            <path d="M12 19l0 .01"></path>
                            <path d="M7 17l0 .01"></path>
                            <path d="M5 12l0 .01"></path>
                            <path d="M7 7l0 .01"></path>
                        </svg>
                        <svg :class="isDark ? 'hidden' : 'block'" class="w-5 h-5 bg-white text-gray-800 rounded-full"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                            stroke-width="2">
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-indigo-500 hover:text-indigo-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-indigo-700 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-show="open" x-bind:class="{ 'block': open, 'hidden': !open }"
        class="fixed inset-0 bg-white dark:bg-gray-800 flex flex-col hidden lg:hidden">
        <div class="w-full h-full flex flex-col gap-6 px-6 overflow-y-auto">
            <div class="w-full flex justify-between items-center py-4 border-b border-gray-300">
                <div x-data="{
                    isDark: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
                    toggleDark() {
                        this.isDark = !this.isDark;
                        if (this.isDark) {
                            document.documentElement.classList.add('dark');
                            localStorage.theme = 'dark';
                        } else {
                            document.documentElement.classList.remove('dark');
                            localStorage.theme = 'light';
                        }
                    },
                    init() {
                        if (this.isDark) {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                    }
                }" x-init="init()">
                    <button @click="toggleDark" x-bind:class="isDark ? 'justify-end' : 'justify-start'"
                        class="w-12 rounded-full inline-flex border border-gray-500 dark:border-gray-400 p-1 bg-gray-200 dark:bg-gray-600">
                        <svg :class="isDark ? 'block' : 'hidden'"
                            class="w-5 h-5 bg-gray-400 text-gray-800 rounded-full" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" width="24" height="24" stroke-width="2">
                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M12 5l0 .01"></path>
                            <path d="M17 7l0 .01"></path>
                            <path d="M19 12l0 .01"></path>
                            <path d="M17 17l0 .01"></path>
                            <path d="M12 19l0 .01"></path>
                            <path d="M7 17l0 .01"></path>
                            <path d="M5 12l0 .01"></path>
                            <path d="M7 7l0 .01"></path>
                        </svg>
                        <svg :class="isDark ? 'hidden' : 'block'" class="w-5 h-5 bg-white text-gray-800 rounded-full"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                            stroke-width="2">
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                            </path>
                        </svg>
                    </button>
                </div>
                <button x-on:click="open=false"
                    class="inline-flex gap2 items-center px-4 py-2 rounded-full border border-indigo-600 hover:bg-indigo-100 text-gray-800 dark:text-gray-100 archivo-300 text-xs">
                    <span class="uppercase">close</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                        stroke-width="2">
                        <path d="M18 6l-12 12"></path>
                        <path d="M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow flex flex-col">
                <div class="py-4 space-y-2">
                    <x-jet-responsive-nav-link href="/" :active="request()->routeIs('guestHome')">
                        {{ __('Return home') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('markets') }}" :active="request()->routeIs('markets')">
                        {{ __('Markets') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('exchange') }}" :active="request()->routeIs('about')">
                        {{ __('Exchange') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('pricing') }}" :active="request()->routeIs('pricing')">
                        {{ __('Our Pricing') }}
                    </x-jet-responsive-nav-link>
                    <x-responsive-nav-link-dropdown>
                        <x:slot:trigger>
                            {{ __('About us') }}
                        </x:slot:trigger>
                        <x:slot:links>
                            <x-jet-responsive-nav-link href="{{ route('about') }}">
                                {{ __('About ') . config('app.name') }}
                            </x-jet-responsive-nav-link>
                            <x-jet-responsive-nav-link href="{{ route('team') }}">
                                {{ __('team members') }}
                            </x-jet-responsive-nav-link>
                            <x-jet-responsive-nav-link href="{{ route('testimonials') }}">
                                {{ __('Clients review') }}
                            </x-jet-responsive-nav-link>
                            <x-jet-responsive-nav-link href="{{ route('faqs') }}">
                                {{ __('Frequently asked questions') }}
                            </x-jet-responsive-nav-link>
                            <x-jet-responsive-nav-link href="{{ route('terms.show') }}">
                                {{ __('Terms of use') }}
                            </x-jet-responsive-nav-link>
                            <x-jet-responsive-nav-link href="{{ route('policy.show') }}">
                                {{ __('Privacy policy') }}
                            </x-jet-responsive-nav-link>
                        </x:slot:links>
                    </x-responsive-nav-link-dropdown>
                    <x-responsive-nav-link-dropdown>
                        <x:slot:trigger>
                            {{ __('Resources') }}
                        </x:slot:trigger>
                        <x:slot:links>
                            <x-jet-responsive-nav-link href="{{ route('articles') }}">
                                {{ __('Market Feeds') }}
                            </x-jet-responsive-nav-link>
                            <x-jet-responsive-nav-link href="{{ route('transactions') }}">
                                {{ __('Transaction updates') }}
                            </x-jet-responsive-nav-link>
                            <x-jet-responsive-nav-link href="{{ route('projector') }}">
                                {{ __('ROI projector') }}
                            </x-jet-responsive-nav-link>
                            <x-jet-responsive-nav-link href="{{ route('ukrain') }}">
                                {{ __('Humanitarian Support') }}
                            </x-jet-responsive-nav-link>
                        </x:slot:links>
                    </x-responsive-nav-link-dropdown>
                    <x-jet-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                        {{ __('Contact Us') }}
                    </x-jet-responsive-nav-link>
                </div>
                <!-- Responsive Settings Options -->
                <div class="w-full flex-grow flex flex-col justify-end">
                    <div class="w-full pt-4 pb-2 border-t border-gray-300">
                        @auth
                            <div class="flex items-center px-4">
                                <div class="shrink-0 mr-3">
                                    @if (Auth::user()->profile_photo_path)
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ url('storage/' . Auth::user()->profile_photo_path) }}"
                                            alt="{{ Auth::user()->name }}" />
                                    @else
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ url('storage/profile-photos/user.png') }}"
                                            alt="{{ Auth::user()->name }}" />
                                    @endif
                                </div>
                                <div>
                                    <div class="font-medium text-base text-gray-800 dark:text-gray-100">{{ Auth::user()->name }}</div>
                                    <div class="font-medium text-sm text-gray-500 dark:text-gray-300">{{ Auth::user()->email }}</div>
                                </div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('user.dashboard') }}" :active="request()->routeIs('user.dashboard')">
                                    {{ __('Dashboard') }}
                                </x-jet-responsive-nav-link>
                                <!-- Account Management -->
                                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                    {{ __('Profile') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('user.investments') }}" :active="request()->routeIs('user.investments')">
                                    {{ __('Investments') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('user.deposits') }}" :active="request()->routeIs('user.deposits')">
                                    {{ __('Deposits') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('user.withdrawals') }}" :active="request()->routeIs('user.withdrawals')">
                                    {{ __('Withdrawals') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('user.fiat_withdrawals') }}"
                                    :active="request()->routeIs('user.fiat_withdrawals')">
                                    {{ __('Bank Withdrawals') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('user.mybots') }}" :active="request()->routeIs('user.mybots')">
                                    {{ __('Subscriptions') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('user.wallets') }}" :active="request()->routeIs('user.wallets')">
                                    {{ __('My wallets') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('user.refincome') }}" :active="request()->routeIs('user.refincome')">
                                    {{ __('Affiliate Program') }}
                                </x-jet-responsive-nav-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>
                            </div>
                        @endauth

                        @guest
                            <div class="px-2 w-full flex">
                                <a href="{{ route('login') }}"
                                    class='w-full flex justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md archivo-600 text-xs text-white uppercase tracking-widest hover:text-white hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-gray-300 transition'>
                                    {{ __('Sign in') }}
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>

            </div>
        </div>
    </div>
</nav>
