<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 md:p-6 bg-gray-50 min-h-screen">
        
        <!-- Welcome Header -->
        <div class="rounded-2xl bg-gradient-to-r from-wa-dark to-wa-darker p-6 md:p-8 text-white relative overflow-hidden shadow-lg">
            <div class="absolute inset-0 bg-gradient-to-br from-wa-light/20 to-transparent"></div>
            <div class="relative z-10">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold mb-2">Selamat Datang, Admin! 👋</h1>
                        <p class="text-white/90 text-lg">Kelola bisnis AC Anda dengan mudah dari dashboard ini</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-white/80">Hari ini</span>
                        <span class="px-3 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                            {{ now()->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
            <!-- Decorative Elements -->
            <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-wa-light/10 rounded-full blur-xl"></div>
            <div class="absolute -top-6 -left-6 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
            <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-wa-light/20 rounded-full blur-lg"></div>
        </div>

        <!-- Stats Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            @isset($totalServices)
            <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-wa-light/30">
                <div class="absolute top-0 right-0 w-24 h-24 bg-wa-light/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-110 transition-transform duration-500"></div>
                
                <div class="flex items-center justify-between mb-4 relative z-10">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10 group-hover:from-wa-light/20 group-hover:to-wa-dark/20 transition-all duration-300">
                        <svg class="w-6 h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
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
            <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-wa-light/30">
                <div class="absolute top-0 right-0 w-24 h-24 bg-wa-light/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-110 transition-transform duration-500"></div>

                <div class="flex items-center justify-between mb-4 relative z-10">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10 group-hover:from-wa-light/20 group-hover:to-wa-dark/20 transition-all duration-300">
                        <svg class="w-6 h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
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
            <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-wa-light/30">
                <div class="absolute top-0 right-0 w-24 h-24 bg-wa-light/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-110 transition-transform duration-500"></div>
                
                <div class="flex items-center justify-between mb-4 relative z-10">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10 group-hover:from-wa-light/20 group-hover:to-wa-dark/20 transition-all duration-300">
                        <svg class="w-6 h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
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
    
        <!-- Latest Products Section -->
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
    
            <div class="p-5 md:p-6">
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
                    <div class="group relative bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 hover:border-wa-light/30">
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
                            
                            @if($product->label)
                            <div class="absolute top-3 right-3 {{ $product->getLabelColorClass() }} text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg backdrop-blur-sm bg-opacity-90">
                                {{ $product->label }}
                            </div>
                            @endif
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-wa-dark/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <div class="absolute bottom-3 left-3 right-3 flex justify-between items-center transform translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('admin.products.show', $product->id) }}" class="px-4 py-2 bg-white text-gray-800 rounded-lg hover:bg-wa-light/10 transition-colors font-medium text-sm flex items-center gap-2 border border-wa-light/20">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Details
                                </a>
                            </div>
                        </div>
                        
                        <div class="p-4 md:p-5">
                            <h4 class="text-lg font-bold text-gray-900 mb-2 line-clamp-1 group-hover:text-wa-dark transition-colors">{{ $product->name }}</h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div>
                                    @if($product->original_price)
                                    <p class="text-xs text-gray-500 line-through mb-1">Rp {{ number_format($product->original_price, 0, ',', '.') }}</p>
                                    @endif
                                    <p class="text-xl font-bold text-wa-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
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
    </div>
</x-layouts.app>
