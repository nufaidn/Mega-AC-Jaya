@php
use Illuminate\Support\Str;
@endphp

<x-layouts.app :title="__('Dashboard')">
        <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 md:p-6 bg-gray-50 min-h-screen">
            <!-- Welcome Section -->
            <div class="rounded-2xl bg-gradient-to-r from-wa-dark to-wa-darker p-6 md:p-8 text-white relative overflow-hidden shadow-lg">
                <div class="absolute inset-0 bg-gradient-to-br from-wa-light/20 to-transparent"></div>
                <div class="relative z-10">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
                            <p class="text-white/90 text-lg">Kelola pesanan dan booking Anda dengan mudah dari dashboard ini</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-white/80">Hari ini</span>
                            <span class="px-3 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                                {{ now()->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-wa-light/10 rounded-full blur-xl"></div>
                <div class="absolute -top-6 -left-6 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
            </div>

            <!-- Stats Cards Section - Hidden on mobile, shown on desktop -->
            <div class="hidden md:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <!-- My Bookings -->
                <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-5 md:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10">
                            <svg class="w-6 h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Booking</span>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">My Bookings</h3>
                        <p class="text-3xl md:text-4xl font-bold text-gray-900">{{ $totalBookings ?? 0 }}</p>
                        <div class="mt-2 h-1 w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                    </div>
                    <a href="{{ route('bookings.index') }}" class="flex items-center justify-between text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors">
                        <span>Lihat Bookings</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
    
                <!-- My Orders -->
                <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-5 md:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10">
                            <svg class="w-6 h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Orders</span>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">My Orders</h3>
                        <p class="text-3xl md:text-4xl font-bold text-gray-900">{{ $totalOrders ?? 0 }}</p>
                        <div class="mt-2 h-1 w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                    </div>
                    <a href="{{ route('product-orders.index') }}" class="flex items-center justify-between text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors">
                        <span>Lihat Orders</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
    
                <!-- Completed Orders -->
                <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-5 md:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10">
                            <svg class="w-6 h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-wa-light/10 text-wa-dark">Completed</span>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Completed Orders</h3>
                        <p class="text-3xl md:text-4xl font-bold text-gray-900">{{ $completedOrders ?? 0 }}</p>
                        <div class="mt-2 h-1 w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                    </div>
                    <a href="{{ route('product-orders.index') }}" class="flex items-center justify-between text-sm font-medium text-wa-dark hover:text-wa-darker transition-colors">
                        <span>Lihat Completed</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>

                <!-- Create Booking -->
                <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-5 md:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-orange-100 to-orange-200">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-orange-100 text-orange-600">New</span>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Create Booking</h3>
                        <p class="text-3xl md:text-4xl font-bold text-gray-900">+</p>
                        <div class="mt-2 h-1 w-16 bg-gradient-to-r from-orange-400 to-orange-600 rounded-full"></div>
                    </div>
                    <a href="{{ route('bookings.create') }}" class="flex items-center justify-between text-sm font-medium text-orange-600 hover:text-orange-700 transition-colors">
                        <span>Buat Booking</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Mobile Action Cards - Shown only on mobile -->
            <div class="md:hidden grid grid-cols-2 gap-3">
                <!-- Buat Booking Card -->
                <a href="{{ route('service') }}" class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="flex flex-col items-center text-center">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10 mb-3">
                            <svg class="w-6 h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-1">Buat Booking</h3>
                        <p class="text-xs text-gray-500">Booking layanan</p>
                    </div>
                </a>

                <!-- Lihat Produk Card -->
                <a href="{{ route('product') }}" class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="flex flex-col items-center text-center">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10 mb-3">
                            <svg class="w-6 h-6 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-1">Lihat Produk</h3>
                        <p class="text-xs text-gray-500">Jelajahi produk</p>
                    </div>
                </a>
            </div>

            <!-- Mobile Stats Section - Compact stats for mobile -->
            <div class="md:hidden">
                <div class="rounded-2xl border border-gray-200 bg-white p-4 shadow-lg">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-wa-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Statistik Saya
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- My Bookings -->
                        <div class="text-center p-3 bg-gradient-to-br from-wa-light/5 to-wa-dark/5 rounded-xl border border-wa-light/20">
                            <div class="text-2xl font-bold text-wa-dark mb-1">{{ $totalBookings ?? 0 }}</div>
                            <div class="text-xs text-gray-600 font-medium">My Bookings</div>
                        </div>
                        
                        <!-- My Orders -->
                        <div class="text-center p-3 bg-gradient-to-br from-wa-light/5 to-wa-dark/5 rounded-xl border border-wa-light/20">
                            <div class="text-2xl font-bold text-wa-dark mb-1">{{ $totalOrders ?? 0 }}</div>
                            <div class="text-xs text-gray-600 font-medium">My Orders</div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex gap-2">
                            <a href="{{ route('bookings.index') }}" class="flex-1 text-center py-2 px-3 bg-wa-dark text-white rounded-lg text-sm font-medium hover:bg-wa-darker transition">
                                Bookings
                            </a>
                            <a href="{{ route('product-orders.index') }}" class="flex-1 text-center py-2 px-3 border border-wa-dark text-wa-dark rounded-lg text-sm font-medium hover:bg-wa-light/5 transition">
                                Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shopping & Booking Toggle Section -->
            <div class="rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-lg">
                <!-- Toggle Buttons -->
                <div class="p-6 border-b border-gray-100">
                    <div class="grid grid-cols-2 gap-4">
                        <button id="shopping-btn" class="action-btn active flex flex-col items-center p-6 rounded-xl border-2 border-wa-500 bg-wa-50 transition-all duration-300 hover:shadow-lg group">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Shopping</h3>
                            <p class="text-gray-600 text-center">Beli produk AC berkualitas</p>
                        </button>

                        <button id="booking-btn" class="action-btn flex flex-col items-center p-6 rounded-xl border-2 border-gray-200 bg-white transition-all duration-300 hover:shadow-lg group">
                            <div class="w-16 h-16 bg-wa-100 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Booking</h3>
                            <p class="text-gray-600 text-center">Booking layanan service AC</p>
                        </button>
                    </div>
                </div>

                <!-- Dynamic Content Area -->
                <div id="content-area" class="p-6">
                    <!-- Shopping Content -->
                    <div id="shopping-content" class="content-section">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Produk AC Terbaik</h3>
                        </div>

                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
                            @forelse($dashboardProducts as $product)
                            <div class="group bg-white rounded-lg lg:rounded-xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                <div class="relative h-24 sm:h-32 lg:h-48 bg-gray-100">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-wa-light/10 to-wa-dark/10 flex items-center justify-center">
                                            <svg class="w-8 h-8 sm:w-12 sm:h-12 lg:w-16 lg:h-16 text-wa-dark/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    @if($product->hasLabel())
                                        <span class="absolute top-2 left-2 px-2 py-1 text-xs font-medium text-white rounded-full {{ $product->getLabelColorClass() }}">
                                            {{ $product->label }}
                                        </span>
                                    @endif
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300"></div>
                                </div>
                                <div class="p-2 sm:p-3 lg:p-5">
                                    <h4 class="text-xs sm:text-sm lg:text-lg font-bold text-gray-900 mb-1 sm:mb-2 group-hover:text-wa-dark transition-colors line-clamp-1">{{ $product->name }}</h4>
                                    <p class="text-gray-600 text-xs sm:text-sm mb-2 sm:mb-3 lg:mb-4 line-clamp-2 hidden sm:block">{{ Str::limit($product->description, 60) }}</p>
                                    <div class="space-y-2 sm:space-y-3">
                                        <div class="flex items-center justify-between">
                                            @if($product->hasDiscount())
                                                <div class="flex flex-col">
                                                    <span class="text-xs sm:text-sm text-gray-500 line-through">{{ $product->formatted_original_price }}</span>
                                                    <span class="text-sm sm:text-base lg:text-lg font-bold text-wa-600">{{ $product->formatted_price }}</span>
                                                </div>
                                            @else
                                                <span class="text-sm sm:text-base lg:text-lg font-bold text-wa-600">{{ $product->formatted_price }}</span>
                                            @endif
                                        </div>
                                        <div class="flex items-center justify-between pt-1 sm:pt-3 border-t border-gray-100">
                                            <p class="text-xs text-gray-500 hidden sm:block">{{ $product->created_at->format('M d, Y') }}</p>
                                            <a href="{{ route('product.detail', $product->id) }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 sm:py-2 text-xs sm:text-sm text-wa-dark hover:text-white hover:bg-wa-dark rounded-md sm:rounded-lg transition-all duration-300 font-medium border border-wa-dark/20 hover:border-wa-dark w-full sm:w-auto justify-center">
                                                <span class="sm:hidden">Beli</span>
                                                <span class="hidden sm:inline">Beli</span>
                                                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-span-full text-center py-12">
                                <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                                <h4 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Produk</h4>
                                <p class="text-gray-500 mb-4">Produk akan ditampilkan di sini setelah admin menambahkannya</p>
                                <a href="{{ route('product') }}" class="inline-flex items-center gap-2 text-wa-600 hover:text-wa-700 font-medium">
                                    <span>Lihat Halaman Produk</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                            @endforelse
                        </div>

                        <div class="text-center mt-8">
                            <div class="flex flex-col sm:flex-row gap-3 justify-center items-center">
                                <span class="text-sm text-gray-600">Menampilkan {{ $dashboardProducts->count() }} dari {{ $totalProducts }} produk</span>
                                @if($totalProducts > 6)
                                <a href="{{ route('product') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-wa-light to-wa-dark text-white px-6 py-3 rounded-lg hover:shadow-lg transition font-medium">
                                    <span>Lihat Produk Lain</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Booking Content -->
                    <div id="booking-content" class="content-section hidden">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 bg-wa-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Layanan Service AC</h3>
                        </div>

                        <div class="grid grid-cols-2 lg:grid-cols-2 gap-3 sm:gap-4 md:gap-6">
                            @forelse($dashboardServices as $service)
                            <div class="group bg-white rounded-lg lg:rounded-xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                <!-- Service Image -->
                                <div class="relative h-24 sm:h-32 lg:h-48 bg-gray-100">
                                    @if($service->image)
                                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-wa-light/10 to-wa-dark/10 flex items-center justify-center">
                                            <svg class="w-8 h-8 sm:w-12 sm:h-12 lg:w-16 lg:h-16 text-wa-dark/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300"></div>
                                </div>
                                
                                <!-- Service Content -->
                                <div class="p-2 sm:p-3 lg:p-5">
                                    <h4 class="text-xs sm:text-sm lg:text-lg font-bold text-gray-900 mb-1 sm:mb-2 group-hover:text-wa-dark transition-colors line-clamp-1">{{ $service->name }}</h4>
                                    <p class="text-gray-600 text-xs sm:text-sm mb-2 sm:mb-3 lg:mb-4 line-clamp-2 hidden sm:block">{{ Str::limit($service->description, 80) }}</p>
                                    <div class="space-y-2 sm:space-y-3">
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm sm:text-base lg:text-lg font-bold text-wa-600">Rp {{ number_format($service->price, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="flex items-center justify-between pt-1 sm:pt-3 border-t border-gray-100">
                                            <p class="text-xs text-gray-500 hidden sm:block">{{ $service->created_at->format('M d, Y') }}</p>
                                            <a href="{{ route('bookings.create', ['service' => $service->name]) }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 sm:py-2 text-xs sm:text-sm text-wa-dark hover:text-white hover:bg-wa-dark rounded-md sm:rounded-lg transition-all duration-300 font-medium border border-wa-dark/20 hover:border-wa-dark w-full sm:w-auto justify-center">
                                                <span class="sm:hidden">Book</span>
                                                <span class="hidden sm:inline">Book</span>
                                                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-span-full text-center py-12">
                                <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <h4 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Layanan</h4>
                                <p class="text-gray-500 mb-4">Layanan akan ditampilkan di sini setelah admin menambahkannya</p>
                                <a href="{{ route('service') }}" class="inline-flex items-center gap-2 text-wa-600 hover:text-wa-700 font-medium">
                                    <span>Lihat Halaman Layanan</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                            @endforelse
                        </div>

                        <div class="text-center mt-8">
                            <div class="flex flex-col sm:flex-row gap-3 justify-center items-center">
                                <span class="text-sm text-gray-600">Menampilkan {{ $dashboardServices->count() }} dari {{ $totalServices }} layanan</span>
                                @if($totalServices > 4)
                                <a href="{{ route('service') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-wa-light to-wa-dark text-white px-6 py-3 rounded-lg hover:shadow-lg transition font-medium">
                                    <span>Lihat Layanan Lainnya</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    
            <!-- Menunggu Pembayaran Section -->
            @php
                // Filter hanya yang belum bayar (bukan paid)
                $unpaidBookings = \App\Models\Booking::where('user_id', Auth::id())
                    ->where('payment_status', '!=', 'paid')
                    ->whereIn('status', ['pending'])
                    ->whereNotNull('payment_url')
                    ->get();
                $unpaidOrders = \App\Models\ProductOrder::where('user_id', Auth::id())
                    ->where('payment_status', '!=', 'paid')
                    ->whereIn('status', ['pending'])
                    ->whereNotNull('payment_url')
                    ->get();
            @endphp
            
            <div class="rounded-2xl border border-red-200 bg-white overflow-hidden shadow-lg">
                <div class="bg-red-100 p-5 md:p-6 border-b border-red-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-red-900">Menunggu Pembayaran</h3>
                            <p class="text-sm text-red-700">Item yang perlu dibayar</p>
                        </div>
                    </div>
                    @if($unpaidBookings->count() > 0 || $unpaidOrders->count() > 0)
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 mt-3">
                        <p class="text-sm text-yellow-800">
                            <strong>💡 Tips:</strong> Setelah melakukan pembayaran, klik tombol <strong>"Cek Status"</strong> untuk memperbarui status pembayaran Anda.
                        </p>
                    </div>
                    @endif
                </div>

                <div class="p-5 md:p-6">
                    @if($unpaidBookings->count() == 0 && $unpaidOrders->count() == 0)
                    <!-- Empty State -->
                    <div class="text-center py-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Kosong</h4>
                        <p class="text-gray-500 mb-6">Belum ada pembayaran yang tertunda. Semua transaksi Anda sudah lunas atau belum ada pesanan.</p>
                        <div class="flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="{{ route('service') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-wa-light to-wa-dark text-white rounded-lg hover:shadow-lg transition font-medium text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Buat Booking
                            </a>
                            <a href="{{ route('product') }}" class="inline-flex items-center gap-2 px-4 py-2 border border-wa-light text-wa-dark rounded-lg hover:bg-wa-light/5 transition font-medium text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Lihat Produk
                            </a>
                        </div>
                    </div>
                    @else
                    <!-- Unpaid Items List -->
                    <div class="space-y-4">
                        @foreach($unpaidBookings as $booking)
                        <div class="flex flex-col md:flex-row md:items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-200 gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Booking {{ $booking->service }}</h4>
                                    <p class="text-sm text-gray-500">{{ $booking->created_at->format('M d, Y') }}</p>
                                    <p class="text-sm font-medium text-gray-700">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @if($booking->payment_url)
                                <a href="{{ $booking->payment_url }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 transition font-medium text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    </svg>
                                    Bayar Sekarang
                                </a>
                                <form action="{{ route('bookings.check-payment', $booking->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center gap-2 px-3 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-medium text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                        Cek Status
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('bookings.generate-payment', $booking->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-orange-600 text-white rounded-xl hover:bg-orange-700 transition font-medium text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Generate Payment
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                        @endforeach

                        @foreach($unpaidOrders as $order)
                        <div class="flex flex-col md:flex-row md:items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-200 gap-4">
                            <div class="flex items-center gap-4">
                                @if($order->product->image)
                                <img src="{{ asset('images/' . $order->product->image) }}" alt="{{ $order->product->name }}" class="w-12 h-12 rounded-xl object-cover flex-shrink-0">
                                @else
                                <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                @endif
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $order->product->name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                                    <p class="text-sm font-medium text-gray-700">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @if($order->payment_url)
                                <a href="{{ $order->payment_url }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 transition font-medium text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    </svg>
                                    Bayar Sekarang
                                </a>
                                <form action="{{ route('product-orders.check-payment', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center gap-2 px-3 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-medium text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                        Cek Status
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('product-orders.generate-payment', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-orange-600 text-white rounded-xl hover:bg-orange-700 transition font-medium text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Generate Payment
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <!-- Recent Orders Section -->
            @isset($recentOrders)
            <div class="rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-lg">
                <div class="p-5 md:p-6 border-b border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="p-2 rounded-lg bg-gradient-to-r from-wa-light/10 to-wa-dark/10">
                                    <svg class="w-5 h-5 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl md:text-2xl font-bold text-gray-900">Recent Orders</h3>
                            </div>
                            <p class="text-sm text-gray-500 mt-1 ml-12">Your latest product orders</p>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('product-orders.create') }}" class="px-4 py-2.5 bg-gradient-to-r from-wa-light to-wa-dark text-white rounded-xl hover:from-wa-light/90 hover:to-wa-dark/90 transition-all duration-300 hover:shadow-lg shadow-wa-dark/20 hover:shadow-wa-dark/30 flex items-center gap-2 font-medium group/btn">
                                <svg class="w-4 h-4 group-hover/btn:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                New Order
                            </a>
                            <a href="{{ route('product-orders.index') }}" class="px-4 py-2.5 border border-wa-light/30 dark:border-wa-dark/30 text-wa-dark dark:text-wa-light rounded-xl hover:bg-wa-light/5 dark:hover:bg-wa-dark/10 transition-all duration-300 flex items-center gap-2 font-medium">
                                View All
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
    
                <div class="p-5 md:p-6">
                    @if($recentOrders->isEmpty())
                    <div class="text-center py-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Kosong</h4>
                        <p class="text-gray-500 mb-6">Belum ada pesanan produk. Mulai dengan membuat pesanan pertama Anda untuk melihatnya di sini.</p>
                        <a href="{{ route('product-orders.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-wa-light to-wa-dark text-white rounded-lg hover:shadow-lg transition font-medium text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Buat Pesanan Pertama
                        </a>
                    </div>
                    @else
                    <div class="space-y-4">
                        @foreach($recentOrders as $order)
                        <div class="group flex items-center justify-between p-4 bg-gradient-to-r from-wa-light/5 to-wa-dark/5 dark:from-wa-dark/10 dark:to-wa-darker/10 rounded-xl hover:from-wa-light/10 hover:to-wa-dark/10 dark:hover:from-wa-dark/20 dark:hover:to-wa-darker/20 transition-all duration-300 hover:-translate-y-0.5 border border-wa-light/10 dark:border-wa-dark/20">
                            <div class="flex items-center gap-4">
                                @if($order->product->image)
                                <div class="relative">
                                    <img src="{{ asset('images/' . $order->product->image) }}" alt="{{ $order->product->name }}" class="w-12 h-12 rounded-lg object-cover border border-wa-light/20">
                                    <div class="absolute inset-0 bg-wa-light/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                                @else
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-wa-light/10 to-wa-dark/10 dark:from-wa-dark/20 dark:to-wa-darker/20 flex items-center justify-center border border-wa-light/20">
                                    <svg class="w-6 h-6 text-wa-dark/50 dark:text-wa-light/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                @endif
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white group-hover:text-wa-dark dark:group-hover:text-wa-light transition-colors">{{ $order->product->name }}</h4>
                                    <p class="text-sm text-gray-500 dark:text-neutral-400 flex items-center gap-2">
                                        <span>Qty: {{ $order->quantity }}</span>
                                        <span class="text-wa-dark dark:text-wa-light">•</span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $order->created_at->format('M d, Y') }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900 dark:text-white group-hover:text-wa-dark dark:group-hover:text-wa-light transition-colors">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $order->status === 'completed' ? 'bg-gradient-to-r from-wa-light/20 to-wa-dark/20 text-wa-dark dark:text-wa-light border border-wa-light/30' : ($order->status === 'pending' ? 'bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' : 'bg-gradient-to-r from-red-100 to-red-200 text-red-800 dark:bg-red-900/30 dark:text-red-400') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @endisset

           
    
    <style>
    /* WhatsApp Green Colors (P3 color space) */
    :root {
        --wa-light: #25D366; /* WhatsApp green light */
        --wa-dark: #128C7E;  /* WhatsApp green dark */
        --wa-darker: #075E54; /* WhatsApp green darker */
    }
    
    .dark {
        --wa-light: #25D366;
        --wa-dark: #128C7E;
        --wa-darker: #075E54;
    }
    
    /* Apply colors to utility classes */
    .bg-wa-light { background-color: var(--wa-light); }
    .bg-wa-dark { background-color: var(--wa-dark); }
    .bg-wa-darker { background-color: var(--wa-darker); }
    
    .text-wa-light { color: var(--wa-light); }
    .text-wa-dark { color: var(--wa-dark); }
    .text-wa-darker { color: var(--wa-darker); }
    
    .border-wa-light { border-color: var(--wa-light); }
    .border-wa-dark { border-color: var(--wa-dark); }
    .border-wa-darker { border-color: var(--wa-darker); }
    
    .from-wa-light { --tw-gradient-from: var(--wa-light); }
    .to-wa-dark { --tw-gradient-to: var(--wa-dark); }
    .to-wa-darker { --tw-gradient-to: var(--wa-darker); }
    
    .hover\:from-wa-light:hover { --tw-gradient-from: var(--wa-light); }
    .hover\:to-wa-dark:hover { --tw-gradient-to: var(--wa-dark); }
    .hover\:to-wa-darker:hover { --tw-gradient-to: var(--wa-darker); }
    
    /* Custom animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
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

    /* Shopping/Booking Toggle Styles */
    .action-btn {
        transition: all 0.3s ease;
    }
    
    .action-btn.active {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 217, 95, 0.2);
    }
    
    .content-section {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translateY(0);
        opacity: 1;
    }
    
    .content-section.hidden {
        display: none;
    }
    
    .content-section.fade-out {
        opacity: 0;
        transform: translateY(-10px);
    }
    
    .content-section.fade-in {
        opacity: 1;
        transform: translateY(0);
    }
    
    .content-section.slide-in {
        animation: slideInUp 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }
    
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .animate-fade-in-scale {
        animation: fadeInScale 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }
    
    /* Loading shimmer effect */
    .loading-shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }
    
    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }
    
    /* Content area transition */
    #content-area {
        position: relative;
        overflow: hidden;
    }
    
    /* Smooth height transition */
    .content-section {
        min-height: 400px;
    }
    
    /* Product/Service Card Hover Effects */
    .product-card:hover {
        transform: translateY(-4px);
    }
    
    .service-card:hover {
        transform: translateY(-4px);
    }
    
    /* Card Animation on Content Switch */
    .product-card, .service-card {
        opacity: 0;
        transform: translateY(20px);
        animation: cardFadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }
    
    .product-card:nth-child(1), .service-card:nth-child(1) {
        animation-delay: 0.1s;
    }
    
    .product-card:nth-child(2), .service-card:nth-child(2) {
        animation-delay: 0.2s;
    }
    
    .product-card:nth-child(3), .service-card:nth-child(3) {
        animation-delay: 0.3s;
    }
    
    .product-card:nth-child(4), .service-card:nth-child(4) {
        animation-delay: 0.4s;
    }
    
    .product-card:nth-child(5), .service-card:nth-child(5) {
        animation-delay: 0.5s;
    }
    
    .product-card:nth-child(6), .service-card:nth-child(6) {
        animation-delay: 0.6s;
    }
    
    .product-card:nth-child(7), .service-card:nth-child(7) {
        animation-delay: 0.7s;
    }
    
    .product-card:nth-child(8), .service-card:nth-child(8) {
        animation-delay: 0.8s;
    }
    
    .product-card:nth-child(9), .service-card:nth-child(9) {
        animation-delay: 0.9s;
    }
    
    .product-card:nth-child(10), .service-card:nth-child(10) {
        animation-delay: 1.0s;
    }
    
    /* For cards beyond 10, use a general delay */
    .product-card:nth-child(n+11), .service-card:nth-child(n+11) {
        animation-delay: 1.1s;
    }
    
    @keyframes cardFadeIn {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    /* Button Press Animation */
    .action-btn {
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .action-btn:active {
        transform: scale(0.95);
    }
    </style>

    <script>
        // Shopping/Booking Toggle Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const shoppingBtn = document.getElementById('shopping-btn');
            const bookingBtn = document.getElementById('booking-btn');
            const shoppingContent = document.getElementById('shopping-content');
            const bookingContent = document.getElementById('booking-content');

            if (shoppingBtn && bookingBtn && shoppingContent && bookingContent) {
                
                // Function to animate content switch
                function switchContent(showContent, hideContent, activeBtn, inactiveBtn) {
                    // Prevent multiple clicks during animation
                    if (activeBtn.classList.contains('animating')) return;
                    activeBtn.classList.add('animating');
                    
                    // Update button states with animation
                    activeBtn.classList.add('active', 'border-wa-500', 'bg-wa-50');
                    activeBtn.classList.remove('border-gray-200', 'bg-white');
                    inactiveBtn.classList.remove('active', 'border-wa-500', 'bg-wa-50');
                    inactiveBtn.classList.add('border-gray-200', 'bg-white');
                    
                    // Add button press animation with bounce effect
                    activeBtn.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        activeBtn.style.transform = 'scale(1.02)';
                        setTimeout(() => {
                            activeBtn.style.transform = 'scale(1)';
                        }, 100);
                    }, 100);
                    
                    // Hide current content with fade out
                    if (!hideContent.classList.contains('hidden')) {
                        hideContent.classList.add('fade-out');
                        
                        // Reset card animations for current content
                        const currentCards = hideContent.querySelectorAll('.product-card, .service-card');
                        currentCards.forEach(card => {
                            card.style.animation = 'none';
                        });
                        
                        setTimeout(() => {
                            hideContent.classList.add('hidden');
                            hideContent.classList.remove('fade-out');
                        }, 250);
                    }
                    
                    // Show new content with slide in animation
                    setTimeout(() => {
                        showContent.classList.remove('hidden');
                        showContent.classList.add('slide-in');
                        
                        // Trigger card animations for new content
                        const newCards = showContent.querySelectorAll('.product-card, .service-card');
                        newCards.forEach((card, index) => {
                            card.style.animation = 'none';
                            card.offsetHeight; // Trigger reflow
                            card.style.animation = `cardFadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards`;
                            // Limit delay to prevent too long animation sequence
                            const delay = Math.min(0.1 + (index * 0.05), 1.0);
                            card.style.animationDelay = `${delay}s`;
                        });
                        
                        // Remove animation class after animation completes
                        setTimeout(() => {
                            showContent.classList.remove('slide-in');
                            activeBtn.classList.remove('animating');
                        }, 600);
                    }, 250);
                }
                
                // Shopping button click
                shoppingBtn.addEventListener('click', function() {
                    if (!shoppingBtn.classList.contains('active')) {
                        switchContent(shoppingContent, bookingContent, shoppingBtn, bookingBtn);
                    }
                });

                // Booking button click
                bookingBtn.addEventListener('click', function() {
                    if (!bookingBtn.classList.contains('active')) {
                        switchContent(bookingContent, shoppingContent, bookingBtn, shoppingBtn);
                    }
                });
            }
        });
    </script>

    </x-layouts.app>