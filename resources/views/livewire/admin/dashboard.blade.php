<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 md:gap-6 p-3 sm:p-4 md:p-6 bg-gray-50 min-h-screen">
        
        <!-- Welcome Header -->
        <div class="rounded-xl md:rounded-2xl bg-gradient-to-r from-wa-dark to-wa-darker p-4 sm:p-6 md:p-8 text-white relative overflow-hidden shadow-lg">
            <div class="absolute inset-0 bg-gradient-to-br from-wa-light/20 to-transparent"></div>
            <div class="relative z-10">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-3 md:gap-4">
                    <div>
                        <h1 class="text-xl sm:text-2xl md:text-3xl font-bold mb-1 md:mb-2">Selamat Datang, Admin! 👋</h1>
                        <p class="text-white/90 text-sm sm:text-base md:text-lg">Kelola bisnis AC Anda dengan mudah dari dashboard ini</p>
                    </div>
                    <div class="flex items-center gap-2 self-start lg:self-center">
                        <span class="text-xs sm:text-sm text-white/80">Hari ini</span>
                        <span class="px-2 sm:px-3 py-1 sm:py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-xs sm:text-sm font-medium">
                            {{ now()->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="absolute -bottom-6 md:-bottom-8 -right-6 md:-right-8 w-24 sm:w-32 md:w-40 h-24 sm:h-32 md:h-40 bg-wa-light/10 rounded-full blur-xl"></div>
            <div class="absolute -top-4 md:-top-6 -left-4 md:-left-6 w-20 sm:w-24 md:w-32 h-20 sm:h-24 md:h-32 bg-white/10 rounded-full blur-xl"></div>
        </div>

        <!-- Stats Cards - Hidden on mobile, shown on desktop -->
        <div class="hidden md:grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-3 md:gap-4 lg:gap-6">
            @isset($totalServices)
            <div class="group relative overflow-hidden rounded-xl lg:rounded-2xl border border-gray-200 bg-white p-4 lg:p-5 xl:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3 lg:mb-4">
                    <div class="p-2 lg:p-3 rounded-lg xl:rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-2 lg:px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Services</span>
                </div>
                <div class="mb-3 lg:mb-4">
                    <h3 class="text-xs lg:text-sm font-medium text-gray-500 mb-1">Total Services</h3>
                    <p class="text-2xl lg:text-3xl xl:text-4xl font-bold text-gray-900">{{ $totalServices }}</p>
                    <div class="mt-2 h-1 w-12 lg:w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                </div>
                <a href="{{ route('admin.services.index') }}" class="flex items-center justify-between text-xs lg:text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors">
                    <span>Lihat Services</span>
                    <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @endisset

            @isset($totalGalleries)
            <div class="group relative overflow-hidden rounded-xl lg:rounded-2xl border border-gray-200 bg-white p-4 lg:p-5 xl:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3 lg:mb-4">
                    <div class="p-2 lg:p-3 rounded-lg xl:rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-2 lg:px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Galleries</span>
                </div>
                <div class="mb-3 lg:mb-4">
                    <h3 class="text-xs lg:text-sm font-medium text-gray-500 mb-1">Total Galleries</h3>
                    <p class="text-2xl lg:text-3xl xl:text-4xl font-bold text-gray-900">{{ $totalGalleries }}</p>
                    <div class="mt-2 h-1 w-12 lg:w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                </div>
                <a href="{{ route('admin.galleries.index') }}" class="flex items-center justify-between text-xs lg:text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors">
                    <span>Lihat Galleries</span>
                    <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @endisset

            @isset($totalBookings)
            <div class="group relative overflow-hidden rounded-xl lg:rounded-2xl border border-gray-200 bg-white p-4 lg:p-5 xl:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3 lg:mb-4">
                    <div class="p-2 lg:p-3 rounded-lg xl:rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-2 lg:px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Bookings</span>
                </div>
                <div class="mb-3 lg:mb-4">
                    <h3 class="text-xs lg:text-sm font-medium text-gray-500 mb-1">Total Bookings</h3>
                    <p class="text-2xl lg:text-3xl xl:text-4xl font-bold text-gray-900">{{ $totalBookings }}</p>
                    <div class="mt-2 h-1 w-12 lg:w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="flex items-center justify-between text-xs lg:text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors">
                    <span>Lihat Bookings</span>
                    <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @endisset

            @isset($totalProducts)
            <div class="group relative overflow-hidden rounded-xl lg:rounded-2xl border border-gray-200 bg-white p-4 lg:p-5 xl:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3 lg:mb-4">
                    <div class="p-2 lg:p-3 rounded-lg xl:rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-2 lg:px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Products</span>
                </div>
                <div class="mb-3 lg:mb-4">
                    <h3 class="text-xs lg:text-sm font-medium text-gray-500 mb-1">Total Products</h3>
                    <p class="text-2xl lg:text-3xl xl:text-4xl font-bold text-gray-900">{{ $totalProducts }}</p>
                    <div class="mt-2 h-1 w-12 lg:w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                </div>
                <a href="{{ route('admin.products.index') }}" class="flex items-center justify-between text-xs lg:text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors">
                    <span>Lihat Products</span>
                    <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @endisset
        </div>

        <!-- Products Section -->
        @isset($products)
        <div class="rounded-xl md:rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-lg">
            <div class="p-4 sm:p-5 md:p-6 border-b border-gray-100">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 md:gap-4">
                    <div>
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-gradient-to-r from-wa-light/10 to-wa-dark/10">
                                <svg class="w-5 h-5 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-900">Produk Terbaru</h3>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1 ml-12">Produk yang baru ditambahkan</p>
                    </div>
                    <div class="flex flex-wrap gap-2 sm:gap-3">
                        <a href="{{ route('admin.products.create') }}" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-gradient-to-r from-wa-light to-wa-dark text-white rounded-lg sm:rounded-xl hover:shadow-lg transition-all flex items-center gap-2 font-medium text-sm">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <span class="hidden sm:inline">New Product</span>
                            <span class="sm:hidden">New</span>
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="px-3 sm:px-4 py-2 sm:py-2.5 border border-wa-light/30 text-wa-dark rounded-lg sm:rounded-xl hover:bg-wa-light/5 transition-all flex items-center gap-2 font-medium text-sm">
                            <span class="hidden sm:inline">View All</span>
                            <span class="sm:hidden">All</span>
                            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-5 md:p-6">
                @if($products->isEmpty())
                <div class="text-center py-8 sm:py-10 md:py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-r from-wa-light/10 to-wa-dark/10 mb-4 sm:mb-6">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h4 class="text-lg sm:text-xl font-bold text-gray-900 mb-2">Belum Ada Produk 📦</h4>
                    <p class="text-gray-500 mb-6 text-sm sm:text-base">Mulai dengan menambahkan produk pertama Anda</p>
                    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-wa-light to-wa-dark text-white rounded-xl hover:shadow-lg transition-all font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Buat Produk Pertama
                    </a>
                </div>
                @else
                <!-- Products Grid: 2 columns on mobile, 3 columns on desktop -->
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
                    @foreach($products as $product)
                    <div class="group bg-white rounded-lg lg:rounded-xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="relative h-32 sm:h-40 lg:h-48 bg-gray-100">
                            @if($product->image)
                            <img src="{{ url('images/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                 loading="lazy"
                                 onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjRjNGNEY2Ii8+CjxwYXRoIGQ9Ik0xMDAgNzBMMTMwIDEwMEgxMTBWMTMwSDkwVjEwMEg3MEwxMDAgNzBaIiBmaWxsPSIjOUI5QjlCIi8+Cjx0ZXh0IHg9IjEwMCIgeT0iMTUwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSIjOUI5QjlCIiBmb250LXNpemU9IjEyIj5JbWFnZSBOb3QgRm91bmQ8L3RleHQ+Cjwvc3ZnPgo='">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-wa-light/10 to-wa-dark/10 flex items-center justify-center">
                                <svg class="w-8 h-8 sm:w-12 sm:h-12 lg:w-16 lg:h-16 text-wa-dark/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            @endif
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300"></div>
                        </div>
                        <div class="p-3 sm:p-4 lg:p-5">
                            <h4 class="text-sm sm:text-base lg:text-lg font-bold text-gray-900 mb-1 sm:mb-2 group-hover:text-wa-dark transition-colors line-clamp-1">{{ $product->name }}</h4>
                            <p class="text-gray-600 text-xs sm:text-sm mb-2 sm:mb-3 lg:mb-4 line-clamp-2">{{ Str::limit($product->description, 60) }}</p>
                            <div class="space-y-2 sm:space-y-3">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm sm:text-base lg:text-lg font-bold text-wa-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 sm:pt-3 border-t border-gray-100">
                                    <p class="text-xs text-gray-500">{{ $product->created_at->format('M d, Y') }}</p>
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 sm:py-2 text-xs sm:text-sm text-wa-dark hover:text-white hover:bg-wa-dark rounded-md sm:rounded-lg transition-all duration-300 font-medium border border-wa-dark/20 hover:border-wa-dark">
                                        <span class="hidden sm:inline">Lihat</span>
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
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

    <style>
    /* WhatsApp Green Colors */
    :root {
        --wa-50: #e8fdf2;
        --wa-100: #d1fae5;
        --wa-200: #a7f3d0;
        --wa-300: #6ee7b7;
        --wa-400: #34d399;
        --wa-500: #00d95f;
        --wa-600: #00ba54;
        --wa-700: #009944;
        --wa-800: #047857;
        --wa-light: #25D366;
        --wa-dark: #128C7E;
        --wa-darker: #075E54;
    }
    
    /* Apply colors to utility classes */
    .bg-wa-50 { background-color: var(--wa-50); }
    .bg-wa-100 { background-color: var(--wa-100); }
    .bg-wa-200 { background-color: var(--wa-200); }
    .bg-wa-500 { background-color: var(--wa-500); }
    .bg-wa-600 { background-color: var(--wa-600); }
    .bg-wa-700 { background-color: var(--wa-700); }
    .bg-wa-800 { background-color: var(--wa-800); }
    .bg-wa-light { background-color: var(--wa-light); }
    .bg-wa-dark { background-color: var(--wa-dark); }
    .bg-wa-darker { background-color: var(--wa-darker); }
    
    .text-wa-500 { color: var(--wa-500); }
    .text-wa-600 { color: var(--wa-600); }
    .text-wa-700 { color: var(--wa-700); }
    .text-wa-800 { color: var(--wa-800); }
    .text-wa-light { color: var(--wa-light); }
    .text-wa-dark { color: var(--wa-dark); }
    .text-wa-darker { color: var(--wa-darker); }
    
    .border-wa-300 { border-color: var(--wa-300); }
    
    .from-wa-light { --tw-gradient-from: var(--wa-light); }
    .from-wa-dark { --tw-gradient-from: var(--wa-dark); }
    .from-wa-500 { --tw-gradient-from: var(--wa-500); }
    .from-wa-600 { --tw-gradient-from: var(--wa-600); }
    .from-wa-700 { --tw-gradient-from: var(--wa-700); }
    .to-wa-dark { --tw-gradient-to: var(--wa-dark); }
    .to-wa-darker { --tw-gradient-to: var(--wa-darker); }
    .to-wa-600 { --tw-gradient-to: var(--wa-600); }
    .to-wa-700 { --tw-gradient-to: var(--wa-700); }
    .to-wa-800 { --tw-gradient-to: var(--wa-800); }
    
    .hover\:from-wa-700:hover { --tw-gradient-from: var(--wa-700); }
    .hover\:to-wa-800:hover { --tw-gradient-to: var(--wa-800); }
    
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
    
    /* Custom animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    /* Image loading optimization */
    img[loading="lazy"] {
        transition: opacity 0.3s;
    }
    
    img[loading="lazy"]:not([src]) {
        opacity: 0;
    }
    </style>
</x-layouts.app>
