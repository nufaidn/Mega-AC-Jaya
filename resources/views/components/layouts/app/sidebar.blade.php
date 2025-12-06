<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800 pb-24 md:pb-0">
    <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Platform')" class="grid">
                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                @if(auth()->check() && auth()->user()->usertype == 'admin')
                <flux:navlist.item icon="wrench-screwdriver" :href="route('admin.services.index')" :current="request()->routeIs('admin.services.*')" wire:navigate>{{ __('Services') }}</flux:navlist.item>
                <flux:navlist.item icon="layout-grid" :href="route('admin.products.index')" :current="request()->routeIs('admin.products.*')" wire:navigate>{{ __('Products') }}</flux:navlist.item>
                <flux:navlist.item icon="shopping-cart" :href="route('admin.product-orders.index')" :current="request()->routeIs('admin.product-orders.*')" wire:navigate>{{ __('Product Orders') }}</flux:navlist.item>
                <flux:navlist.item icon="calendar" :href="route('admin.bookings.index')" :current="request()->routeIs('admin.bookings.*')" wire:navigate>{{ __('Booking') }}</flux:navlist.item>
                <flux:navlist.item icon="photo" :href="route('admin.galleries.index')" :current="request()->routeIs('admin.galleries.*')" wire:navigate>{{ __('Galleries') }}</flux:navlist.item>
                @endif
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist>

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile
                :name="auth()->user()->name"
                :initials="auth()->user()->initials()"
                icon-trailing="chevrons-up-down"
                data-test="sidebar-menu-button" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full" data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile
                :initials="auth()->user()->initials()"
                icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full" data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @if(auth()->check() && auth()->user()->usertype == 'admin')
    @php
    $navTotalServices = isset($totalServices) ? $totalServices : \App\Models\Service::count();
    $navTotalGalleries = isset($totalGalleries) ? $totalGalleries : \App\Models\Gallery::count();
    $navTotalProducts = isset($totalProducts) ? $totalProducts : \App\Models\Product::count();
    @endphp

    <!-- Mobile Bottom Navigation for Stats -->
    <div class="fixed bottom-0 left-0 right-0 z-50 bg-white dark:bg-neutral-800 border-t border-gray-200 dark:border-neutral-700 md:hidden">
        <div class="grid grid-cols-3 h-16">
            <!-- Services -->
            <a href="{{ route('admin.services.index') }}" class="flex flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-neutral-700/50 transition-colors relative group {{ request()->routeIs('admin.services.*') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/10' : '' }}">
                <div class="relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="absolute -top-2 -right-2 min-w-[1.25rem] h-5 flex items-center justify-center text-[10px] font-bold text-white bg-blue-600 rounded-full px-1 border-2 border-white dark:border-neutral-800">
                        {{ $navTotalServices }}
                    </span>
                </div>
                <span class="text-xs font-medium">Services</span>
            </a>

            <!-- Galleries -->
            <a href="{{ route('admin.galleries.index') }}" class="flex flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-neutral-700/50 transition-colors relative group {{ request()->routeIs('admin.galleries.*') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/10' : '' }}">
                <div class="relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="absolute -top-2 -right-2 min-w-[1.25rem] h-5 flex items-center justify-center text-[10px] font-bold text-white bg-green-600 rounded-full px-1 border-2 border-white dark:border-neutral-800">
                        {{ $navTotalGalleries }}
                    </span>
                </div>
                <span class="text-xs font-medium">Galleries</span>
            </a>

            <!-- Products -->
            <a href="{{ route('admin.products.index') }}" class="flex flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 hover:bg-gray-50 dark:hover:bg-neutral-700/50 transition-colors relative group {{ request()->routeIs('admin.products.*') ? 'text-purple-600 dark:text-purple-400 bg-purple-50 dark:bg-purple-900/10' : '' }}">
                <div class="relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="absolute -top-2 -right-2 min-w-[1.25rem] h-5 flex items-center justify-center text-[10px] font-bold text-white bg-purple-600 rounded-full px-1 border-2 border-white dark:border-neutral-800">
                        {{ $navTotalProducts }}
                    </span>
                </div>
                <span class="text-xs font-medium">Products</span>
            </a>
        </div>
    </div>
    @endif

    @fluxScripts
</body>

</html>•