<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 md:p-6 bg-gradient-to-br from-emerald-50 via-green-50 to-teal-50 dark:from-emerald-950/40 dark:via-green-950/30 dark:to-teal-950/50 min-h-screen">
        <!-- Header Section -->
        <div class="flex flex-col gap-2 mb-2">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-2xl bg-gradient-to-r from-emerald-400 via-green-500 to-teal-500 shadow-lg shadow-emerald-500/20">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0Zm0 22a10 10 0 1 1 10-10 10 10 0 0 1-10 10Z" />
                        <path d="M17 14.5c-.3-.2-1.9-.9-2.2-1-.3-.1-.5-.2-.8.2-.3.4-1.2 1.4-1.5 1.7-.3.3-.6.3-1.1.1s-2.1-.8-4-2.5c-1.5-1.3-2.5-2.9-2.8-3.4-.3-.5 0-.8.2-1 .2-.2.5-.5.7-.7.2-.2.3-.5.4-.8.1-.3.1-.6-.1-.9-.2-.3-1.2-2.9-1.7-4-.4-1-.8-.9-1.1-.9h-.9c-.3 0-.8.1-1.2.6-.4.5-1.7 1.7-1.7 4.1s1.7 4.7 1.9 5c.2.3 3.2 5.1 7.9 7 4.7 1.9 4.7 1.3 5.5 1.2.8-.1 2.7-1.1 3-2.2.3-1.1.3-2 .2-2.2-.1-.2-.4-.3-.7-.5Z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-emerald-900 dark:text-emerald-100">Dashboard Admin</h1>
                    <p class="text-emerald-600 dark:text-emerald-300">Manage your business efficiently</p>
                </div>
            </div>
            <!-- Decorative Elements -->
            <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-wa-light/10 rounded-full blur-xl"></div>
            <div class="absolute -top-6 -left-6 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
            <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-wa-light/20 rounded-full blur-lg"></div>
        </div>

        <!-- Stats Cards Section - Enhanced with glass morphism -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
            @isset($totalServices)
            <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-white/90 via-white/80 to-white/70 dark:from-emerald-900/40 dark:via-green-900/30 dark:to-teal-900/40 backdrop-blur-xl border border-emerald-100/50 dark:border-emerald-700/30 p-6 shadow-xl shadow-emerald-500/5 hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-500 hover:-translate-y-2">
                <!-- Animated Background -->
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-gradient-to-r from-emerald-300/20 to-teal-400/20 rounded-full group-hover:scale-150 group-hover:rotate-45 transition-all duration-700"></div>
                <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-gradient-to-r from-green-300/20 to-emerald-400/20 rounded-full group-hover:scale-125 group-hover:-rotate-45 transition-all duration-700 delay-100"></div>

                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-6">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-emerald-400/20 via-green-500/20 to-teal-500/20 backdrop-blur-sm">
                            <div class="p-2 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                        <span class="text-xs font-semibold px-3 py-1.5 rounded-full bg-gradient-to-r from-emerald-500/10 to-teal-500/10 text-emerald-700 dark:text-emerald-300 border border-emerald-200/50 dark:border-emerald-700/50">Services</span>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Services</span>
                </div>
                <div class="mb-4 relative z-10">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Total Services</h3>
                    <p class="text-3xl md:text-4xl font-bold text-gray-900">{{ $totalServices }}</p>
                    <div class="mt-2 h-1 w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                </div>
                <a href="{{ route('admin.services.index') }}" class="flex items-center justify-between text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors group/link relative z-10">
                    <span>Lihat Services</span>
                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @endisset

            @isset($totalGalleries)
            <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-white/90 via-white/80 to-white/70 dark:from-emerald-900/40 dark:via-green-900/30 dark:to-teal-900/40 backdrop-blur-xl border border-emerald-100/50 dark:border-emerald-700/30 p-6 shadow-xl shadow-emerald-500/5 hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-500 hover:-translate-y-2">
                <!-- Animated Background -->
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-gradient-to-r from-green-300/20 to-emerald-400/20 rounded-full group-hover:scale-150 group-hover:rotate-45 transition-all duration-700"></div>
                <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-gradient-to-r from-teal-300/20 to-green-400/20 rounded-full group-hover:scale-125 group-hover:-rotate-45 transition-all duration-700 delay-100"></div>

                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-6">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-emerald-400/20 via-green-500/20 to-teal-500/20 backdrop-blur-sm">
                            <div class="p-2 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <span class="text-xs font-semibold px-3 py-1.5 rounded-full bg-gradient-to-r from-emerald-500/10 to-teal-500/10 text-emerald-700 dark:text-emerald-300 border border-emerald-200/50 dark:border-emerald-700/50">Galleries</span>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Galleries</span>
                </div>
                <div class="mb-4 relative z-10">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Total Galleries</h3>
                    <p class="text-3xl md:text-4xl font-bold text-gray-900">{{ $totalGalleries }}</p>
                    <div class="mt-2 h-1 w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                </div>
                <a href="{{ route('admin.galleries.index') }}" class="flex items-center justify-between text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors group/link relative z-10">
                    <span>Lihat Galleries</span>
                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @endisset

            @isset($totalBookings)
            <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-wa-light/30">
                <div class="absolute top-0 right-0 w-24 h-24 bg-wa-light/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-110 transition-transform duration-500"></div>

                <div class="flex items-center justify-between mb-4 relative z-10">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10 group-hover:from-wa-light/20 group-hover:to-wa-dark/20 transition-all duration-300">
                        <svg class="w-6 h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Bookings</span>
                </div>
                <div class="mb-4 relative z-10">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Total Bookings</h3>
                    <p class="text-3xl md:text-4xl font-bold text-gray-900">{{ $totalBookings }}</p>
                    <div class="mt-2 h-1 w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="flex items-center justify-between text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors group/link relative z-10">
                    <span>Lihat Bookings</span>
                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @endisset

            @isset($totalProducts)
            <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-white/90 via-white/80 to-white/70 dark:from-emerald-900/40 dark:via-green-900/30 dark:to-teal-900/40 backdrop-blur-xl border border-emerald-100/50 dark:border-emerald-700/30 p-6 shadow-xl shadow-emerald-500/5 hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-500 hover:-translate-y-2">
                <!-- Animated Background -->
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-gradient-to-r from-teal-300/20 to-green-400/20 rounded-full group-hover:scale-150 group-hover:rotate-45 transition-all duration-700"></div>
                <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-gradient-to-r from-emerald-300/20 to-teal-400/20 rounded-full group-hover:scale-125 group-hover:-rotate-45 transition-all duration-700 delay-100"></div>

                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-6">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-emerald-400/20 via-green-500/20 to-teal-500/20 backdrop-blur-sm">
                            <div class="p-2 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                        </div>
                        <span class="text-xs font-semibold px-3 py-1.5 rounded-full bg-gradient-to-r from-emerald-500/10 to-teal-500/10 text-emerald-700 dark:text-emerald-300 border border-emerald-200/50 dark:border-emerald-700/50">Products</span>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Products</span>
                </div>
                <div class="mb-4 relative z-10">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Total Products</h3>
                    <p class="text-3xl md:text-4xl font-bold text-gray-900">{{ $totalProducts }}</p>
                    <div class="mt-2 h-1 w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                </div>
                <a href="{{ route('admin.products.index') }}" class="flex items-center justify-between text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors group/link relative z-10">
                    <span>Lihat Products</span>
                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @endisset
        </div>

        <!-- Latest Products Section - Enhanced -->
        @isset($products)
        <div class="rounded-2xl border border-gray-200 bg-white overflow-hidden transition-all duration-300 hover:shadow-lg">
            <div class="p-5 md:p-6 border-b border-gray-100">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-gradient-to-r from-wa-light/10 to-wa-dark/10">
                                <svg class="w-5 h-5 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <h3 class="text-xl md:text-2xl font-bold text-gray-900">Our Products</h3>
                        </div>
                        <p class="text-sm text-gray-500 mt-1 ml-12">Recently added and updated products</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('admin.products.create') }}" class="px-4 py-2.5 bg-gradient-to-r from-wa-light to-wa-dark text-white rounded-xl hover:shadow-lg transition-all duration-300 flex items-center gap-2 font-medium group/btn">
                            <svg class="w-4 h-4 group-hover/btn:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            New Product
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="px-4 py-2.5 border border-wa-light/30 text-wa-dark rounded-xl hover:bg-wa-light/5 transition-all duration-300 flex items-center gap-2 font-medium">
                            View All
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-6">
                @if($products->isEmpty())
                <div class="text-center py-10 md:py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-wa-light/10 to-wa-dark/10 mb-4">
                        <svg class="w-8 h-8 text-wa-dark/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">No products yet</h4>
                    <p class="text-gray-500 mb-6 max-w-md mx-auto">Start by adding your first product to showcase in your store.</p>
                    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-wa-light to-wa-dark text-white rounded-xl hover:shadow-lg transition-all duration-300 font-medium group/btn">
                        <svg class="w-4 h-4 group-hover/btn:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Your First Product
                    </a>
                </div>
                @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
                    @foreach($products as $product)
                    <div class="group relative bg-gradient-to-br from-white via-white/90 to-white/80 dark:from-emerald-900/30 dark:via-green-900/20 dark:to-teal-900/30 rounded-2xl border border-emerald-100/50 dark:border-emerald-700/30 overflow-hidden shadow-lg shadow-emerald-500/5 hover:shadow-2xl hover:shadow-emerald-500/20 transition-all duration-500 hover:-translate-y-2">
                        <!-- Product Badge -->
                        @if($product->label)
                        <div class="absolute top-4 right-4 z-10">
                            <span class="{{ $product->getLabelColorClass() }} text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg backdrop-blur-sm bg-opacity-90 border border-white/20">
                                {{ $product->label }}
                            </span>
                        </div>
                        @endif

                        <!-- Image Container -->
                        <div class="relative overflow-hidden h-48 md:h-56 bg-gradient-to-br from-wa-light/5 to-wa-dark/5">
                            @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-wa-dark/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            @endif

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                            <!-- Quick Actions -->
                            <div class="absolute bottom-4 left-4 right-4 flex gap-2 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                                <a href="{{ route('admin.products.show', $product->id) }}" class="flex-1 px-4 py-2.5 bg-white/90 dark:bg-emerald-900/90 backdrop-blur-sm text-emerald-700 dark:text-emerald-300 rounded-lg hover:bg-white dark:hover:bg-emerald-800 transition-colors font-semibold text-sm flex items-center justify-center gap-2 border border-emerald-200/50 dark:border-emerald-700/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Details
                                </a>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-5">
                            <h4 class="text-lg font-bold text-emerald-900 dark:text-white mb-3 line-clamp-1 group-hover:text-emerald-700 dark:group-hover:text-emerald-300 transition-colors">{{ $product->name }}</h4>
                            <p class="text-emerald-600 dark:text-emerald-400 text-sm mb-4 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>

                            <div class="pt-4 border-t border-emerald-100/50 dark:border-emerald-700/30">
                                <div class="flex items-center justify-between">
                                    <div>
                                        @if($product->original_price)
                                        <p class="text-xs text-emerald-500 dark:text-emerald-400 line-through mb-1">Rp {{ number_format($product->original_price, 0, ',', '.') }}</p>
                                        @endif
                                        <p class="text-xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    </div>
                                    <span class="text-xs font-semibold px-3 py-1.5 rounded-full bg-gradient-to-r from-emerald-500/10 to-teal-500/10 text-emerald-700 dark:text-emerald-300">
                                        #{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>
                                <span class="text-xs px-2 py-1 rounded-full bg-wa-light/10 text-wa-dark">
                                    #{{ $loop->iteration }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        @endisset

        <!-- Quick Stats Section - Enhanced -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- System Status -->
            <div class="rounded-2xl bg-gradient-to-br from-white/90 via-white/80 to-white/70 dark:from-emerald-900/40 dark:via-green-900/30 dark:to-teal-900/40 backdrop-blur-xl border border-emerald-100/50 dark:border-emerald-700/30 overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-500/10">
                <div class="bg-gradient-to-r from-emerald-500/5 via-green-500/5 to-teal-500/5 border-b border-emerald-100/50 dark:border-emerald-700/30 p-6">
                    <div class="flex items-center gap-4">
                        <div class="p-3 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 shadow-lg shadow-emerald-500/30">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-emerald-900 dark:text-white">System Status</h3>
                            <p class="text-emerald-600 dark:text-emerald-300">Overview of your dashboard</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <!-- Status Item -->
                        <div class="group flex items-center justify-between p-4 rounded-xl bg-gradient-to-r from-emerald-500/5 via-green-500/5 to-teal-500/5 hover:from-emerald-500/10 hover:via-green-500/10 hover:to-teal-500/10 transition-all duration-300 border border-emerald-100/50 dark:border-emerald-700/30">
                            <div class="flex items-center gap-4">
                                <div class="p-2.5 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-emerald-900 dark:text-white">Total Users</p>
                                    <p class="text-sm text-emerald-600 dark:text-emerald-400">Registered users count</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">0</span>
                                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                            </div>
                        </div>

                        <!-- Status Item -->
                        <div class="group flex items-center justify-between p-4 rounded-xl bg-gradient-to-r from-emerald-500/5 via-green-500/5 to-teal-500/5 hover:from-emerald-500/10 hover:via-green-500/10 hover:to-teal-500/10 transition-all duration-300 border border-emerald-100/50 dark:border-emerald-700/30">
                            <div class="flex items-center gap-4">
                                <div class="p-2.5 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-emerald-900 dark:text-white">Total Categories</p>
                                    <p class="text-sm text-emerald-600 dark:text-emerald-400">Product categories</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">0</span>
                                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="mt-6 p-4 rounded-xl bg-gradient-to-r from-emerald-500/10 via-green-500/10 to-teal-500/10 border border-emerald-100/50 dark:border-emerald-700/30">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-semibold text-emerald-900 dark:text-white">Storage Usage</span>
                                <span class="text-sm font-semibold text-emerald-600 dark:text-emerald-400">65%</span>
                            </div>
                            <div class="w-full h-2.5 bg-emerald-100 dark:bg-emerald-800/50 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full animate-pulse" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="rounded-2xl bg-gradient-to-br from-white/90 via-white/80 to-white/70 dark:from-emerald-900/40 dark:via-green-900/30 dark:to-teal-900/40 backdrop-blur-xl border border-emerald-100/50 dark:border-emerald-700/30 overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-500/10">
                <div class="bg-gradient-to-r from-emerald-500/5 via-green-500/5 to-teal-500/5 border-b border-emerald-100/50 dark:border-emerald-700/30 p-6">
                    <div class="flex items-center gap-4">
                        <div class="p-3 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 shadow-lg shadow-emerald-500/30">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-emerald-900 dark:text-white">Quick Actions</h3>
                            <p class="text-emerald-600 dark:text-emerald-300">Common tasks at your fingertips</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('admin.services.create') }}" class="group flex flex-col items-center justify-center p-5 rounded-xl bg-gradient-to-br from-emerald-500/10 via-green-500/10 to-teal-500/10 hover:from-emerald-500/20 hover:via-green-500/20 hover:to-teal-500/20 transition-all duration-300 border border-emerald-100/50 dark:border-emerald-700/30">
                            <div class="p-3 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500 mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <span class="font-semibold text-emerald-900 dark:text-white text-sm">Add Service</span>
                            <span class="text-xs text-emerald-600 dark:text-emerald-400 mt-1">Create new</span>
                        </a>

                        <a href="{{ route('admin.galleries.index') }}" class="group flex flex-col items-center justify-center p-5 rounded-xl bg-gradient-to-br from-emerald-500/10 via-green-500/10 to-teal-500/10 hover:from-emerald-500/20 hover:via-green-500/20 hover:to-teal-500/20 transition-all duration-300 border border-emerald-100/50 dark:border-emerald-700/30">
                            <div class="p-3 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500 mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="font-semibold text-emerald-900 dark:text-white text-sm">Add Gallery</span>
                            <span class="text-xs text-emerald-600 dark:text-emerald-400 mt-1">Upload images</span>
                        </a>

                        <a href="{{ route('admin.products.create') }}" class="group flex flex-col items-center justify-center p-5 rounded-xl bg-gradient-to-br from-emerald-500/10 via-green-500/10 to-teal-500/10 hover:from-emerald-500/20 hover:via-green-500/20 hover:to-teal-500/20 transition-all duration-300 border border-emerald-100/50 dark:border-emerald-700/30">
                            <div class="p-3 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500 mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <span class="font-semibold text-emerald-900 dark:text-white text-sm">Add Product</span>
                            <span class="text-xs text-emerald-600 dark:text-emerald-400 mt-1">New item</span>
                        </a>

                        <a href="{{ route('admin.settings') }}" class="group flex flex-col items-center justify-center p-5 rounded-xl bg-gradient-to-br from-emerald-500/10 via-green-500/10 to-teal-500/10 hover:from-emerald-500/20 hover:via-green-500/20 hover:to-teal-500/20 transition-all duration-300 border border-emerald-100/50 dark:border-emerald-700/30">
                            <div class="p-3 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500 mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                </svg>
                            </div>
                            <span class="font-semibold text-emerald-900 dark:text-white text-sm">Settings</span>
                            <span class="text-xs text-emerald-600 dark:text-emerald-400 mt-1">Configure</span>
                        </a>
                    </div>

                    <!-- Welcome Message -->
                    <div class="mt-6 p-4 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 text-white">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-white/20 backdrop-blur-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold">Welcome back!</p>
                                <p class="text-sm opacity-90">Everything is running smoothly</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* WhatsApp-inspired Green Colors (P3 color space) */
        :root {
            --wa-emerald-50: #f0fdf4;
            --wa-emerald-100: #dcfce7;
            --wa-emerald-200: #bbf7d0;
            --wa-emerald-300: #86efac;
            --wa-emerald-400: #4ade80;
            --wa-emerald-500: #22c55e;
            /* Primary green */
            --wa-emerald-600: #16a34a;
            /* WhatsApp green */
            --wa-emerald-700: #15803d;
            --wa-emerald-800: #166534;
            --wa-emerald-900: #14532d;
            --wa-green-500: #25D366;
            /* WhatsApp logo green */
            --wa-teal-500: #0d9488;
            /* Accent teal */
        }

        .dark {
            --wa-emerald-50: #042f2e;
            --wa-emerald-100: #064e3b;
            --wa-emerald-200: #065f46;
            --wa-emerald-300: #047857;
            --wa-emerald-400: #059669;
            --wa-emerald-500: #10b981;
            /* Primary green dark */
            --wa-emerald-600: #34d399;
            /* WhatsApp green light */
            --wa-emerald-700: #6ee7b7;
            --wa-emerald-800: #a7f3d0;
            --wa-emerald-900: #d1fae5;
            --wa-green-500: #25D366;
            --wa-teal-500: #2dd4bf;
        }

        /* Custom animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        @keyframes pulse-glow {

            0%,
            100% {
                opacity: 0.6;
            }

            50% {
                opacity: 1;
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        .animate-shimmer {
            background: linear-gradient(90deg,
                    transparent 0%,
                    rgba(37, 211, 102, 0.2) 50%,
                    transparent 100%);
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }

        /* Glass morphism effect */
        .backdrop-blur-xl {
            backdrop-filter: blur(20px);
        }

        /* Gradient text effect */
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(37, 211, 102, 0.1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, var(--wa-emerald-500), var(--wa-teal-500));
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, var(--wa-emerald-600), var(--wa-teal-600));
        }

        /* Line clamp utilities */
        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }

        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }
    </style>
</x-layouts.app>
