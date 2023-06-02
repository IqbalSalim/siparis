<nav x-data="{ open: false }"
    class="border-b border-gray-100 from-primary-300 bg-gradient-to-r via-primary-500 to-primary-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block w-auto h-10 text-white fill-current" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @can('olah user')
                    <x-nav-link :href="route('user')" :active="request()->routeIs('user')">
                        {{ __('User') }}
                    </x-nav-link>
                    @endcan
                    @can('olah arsip')
                    @endcan
                    @can('olah arsip')
                    <x-nav-link :href="route('notaris')" :active="request()->routeIs('notaris')">
                        {{ __('Notaris') }}
                    </x-nav-link>
                    @endcan
                    @can('olah arsip')
                    <x-nav-link :href="route('ppat')" :active="request()->routeIs('ppat')">
                        {{ __('PPAT') }}
                    </x-nav-link>
                    @endcan
                    @can('olah surat masuk')
                    <x-nav-link :href="route('suratmasuk')" :active="request()->routeIs('suratmasuk')">
                        {{ __('Surat Masuk') }}
                    </x-nav-link>
                    @endcan
                    @can('olah surat keluar')
                    <x-nav-link :href="route('suratkeluar')" :active="request()->routeIs('suratkeluar')">
                        {{ __('Surat Keluar') }}
                    </x-nav-link>
                    @endcan

                    <x-dropdown align="left" width="48" :active="request()->routeIs('laporan.*')">
                        <x-slot name="trigger">
                            <x-nav-link class="border-none cursor-pointer">
                                {{ __('Laporan') }}
                            </x-nav-link>
                        </x-slot>
                        <x-slot name='content'>
                            <x-dropdown-link :href="route('laporan.notaris')"
                                :active="request()->routeIs('laporan.notaris')">
                                {{ __('Notaris') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('laporan.ppat')" :active="request()->routeIs('laporan.ppat')">
                                {{ __('PPAT') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('laporan.suratmasuk')"
                                :active="request()->routeIs('laporan.suratmasuk')">
                                {{ __('Surat Masuk') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('laporan.suratkeluar')"
                                :active="request()->routeIs('laporan.suratkeluar')">
                                {{ __('Surat Keluar') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-bold text-white transition duration-150 ease-in-out hover:text-secondary-300 hover:border-secondary-300 focus:outline-none focus:text-secondary-300 focus:border-secondary-300">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('profil')"
                                class="flex items-center font-bold text-primary-600 gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ __('Profil') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('password')"
                                class="flex items-center font-bold text-primary-600 gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                </svg>
                                {{ __('Password') }}
                            </x-dropdown-link>
                            <hr>
                            <x-dropdown-link class="flex items-center font-bold gap-x-2" :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>
                                {{ __('Log Out') }}
                            </x-dropdown-link>

                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->karyawan->nama }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>