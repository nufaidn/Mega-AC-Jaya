<x-layouts.app :title="__('Dashboard')">
        <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 md:p-6 bg-gradient-to-br from-wa-light/5 to-wa-dark/5 dark:from-neutral-900/50 dark:to-neutral-900 min-h-screen">
            <!-- Welcome Section -->
            <div class="rounded-2xl bg-gradient-to-r from-wa-dark to-wa-darker p-6 md:p-8 text-white relative overflow-hidden shadow-lg">
                <div class="absolute inset-0 bg-gradient-to-br from-wa-light/20 to-transparent"></div>
                <div class="relative z-10">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h1>
                            <p class="text-wa-light/90 text-lg">Here's what's happening with your account today.</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-wa-light/80">Today is</span>
                            <span class="px-3 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                                {{ now()->format('l, F j, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-wa-light/10 rounded-full blur-xl"></div>
                <div class="absolute -top-6 -left-6 w-32 h-32 bg-wa-dark/20 rounded-full blur-xl"></div>
                <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-wa-light/20 rounded-full blur-lg"></div>
            </div>
    
            <!-- Stats Cards Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                <!-- My Bookings -->
                <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-wa-light/30 dark:hover:border-wa-dark hover:bg-gradient-to-br hover:from-white hover:to-wa-light/5 dark:hover:from-neutral-800 dark:hover:to-wa-dark/10">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-wa-light/5 dark:bg-wa-dark/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-110 transition-transform duration-500"></div>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10 group-hover:from-wa-light/20 group-hover:to-wa-dark/20 transition-all duration-300">
                            <svg class="w-6 h-6 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-wa-light/10 dark:bg-wa-dark/20 text-wa-dark dark:text-wa-light">Booking</span>
                    </div>
                    <div class="mb-4 relative z-10">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-neutral-400 mb-1">My Booking</h3>
                        <p class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $totalBookings ?? 0 }}</p>
                        <div class="mt-2 h-1 w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                    </div>
                    <a href="{{ route('bookings.index') }}" class="flex items-center justify-between text-sm font-medium text-wa-dark dark:text-wa-light hover:text-wa-darker dark:hover:text-wa-light/80 transition-colors group/link relative z-10">
                        <span>View Bookings</span>
                        <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
    
                <!-- My Orders -->
                <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-wa-light/30 dark:hover:border-wa-dark hover:bg-gradient-to-br hover:from-white hover:to-wa-light/5 dark:hover:from-neutral-800 dark:hover:to-wa-dark/10">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-wa-light/5 dark:bg-wa-dark/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-110 transition-transform duration-500"></div>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10 group-hover:from-wa-light/20 group-hover:to-wa-dark/20 transition-all duration-300">
                            <svg class="w-6 h-6 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-wa-light/10 dark:bg-wa-dark/20 text-wa-dark dark:text-wa-light">Order</span>
                    </div>
                    <div class="mb-4 relative z-10">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-neutral-400 mb-1">My Order</h3>
                        <p class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $totalOrders ?? 0 }}</p>
                        <div class="mt-2 h-1 w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                    </div>
                    <a href="{{ route('product-orders.index') }}" class="flex items-center justify-between text-sm font-medium text-wa-dark dark:text-wa-light hover:text-wa-darker dark:hover:text-wa-light/80 transition-colors group/link relative z-10">
                        <span>View Pending</span>
                        <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
    
                <!-- My Expedition -->
                <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-wa-light/30 dark:hover:border-wa-dark hover:bg-gradient-to-br hover:from-white hover:to-wa-light/5 dark:hover:from-neutral-800 dark:hover:to-wa-dark/10">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-wa-light/5 dark:bg-wa-dark/5 rounded-full -translate-y-8 translate-x-8 group-hover:scale-110 transition-transform duration-500"></div>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-wa-light/10 to-wa-dark/10 group-hover:from-wa-light/20 group-hover:to-wa-dark/20 transition-all duration-300">
                            <svg class="w-6 h-6 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-wa-light/10 dark:bg-wa-dark/20 text-wa-dark dark:text-wa-light">Expedition</span>
                    </div>
                    <div class="mb-4 relative z-10">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-neutral-400 mb-1">My Expedition</h3>
                        <p class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $completedOrders ?? 0 }}</p>
                        <div class="mt-2 h-1 w-16 bg-gradient-to-r from-wa-light to-wa-dark rounded-full"></div>
                    </div>
                    <a href="{{ route('product-orders.index') }}" class="flex items-center justify-between text-sm font-medium text-wa-dark dark:text-wa-light hover:text-wa-darker dark:hover:text-wa-light/80 transition-colors group/link relative z-10">
                        <span>View Completed</span>
                        <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
    
            <!-- Recent Orders Section -->
            @isset($recentOrders)
            <div class="rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 overflow-hidden transition-all duration-300 hover:shadow-lg backdrop-blur-sm bg-white/95 dark:bg-neutral-800/95">
                <div class="p-5 md:p-6 border-b border-neutral-100 dark:border-neutral-700">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="p-2 rounded-lg bg-gradient-to-r from-wa-light/10 to-wa-dark/10">
                                    <svg class="w-5 h-5 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Recent Orders</h3>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-neutral-400 mt-1 ml-12">Your latest product orders</p>
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
                    <div class="text-center py-10 md:py-12">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-wa-light/10 to-wa-dark/10 mb-4">
                            <svg class="w-8 h-8 text-wa-dark/50 dark:text-wa-light/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No orders yet</h4>
                        <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">Start by placing your first product order to see it here.</p>
                        <a href="{{ route('product-orders.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-wa-light to-wa-dark text-white rounded-xl hover:from-wa-light/90 hover:to-wa-dark/90 transition-all duration-300 hover:shadow-lg font-medium group/btn">
                            <svg class="w-4 h-4 group-hover/btn:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Create Your First Order
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
    
            <!-- Quick Actions Section -->
            <div class="rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 overflow-hidden transition-all duration-300 hover:shadow-lg backdrop-blur-sm bg-white/95 dark:bg-neutral-800/95">
                <div class="p-5 md:p-6 border-b border-neutral-100 dark:border-neutral-700">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-gradient-to-r from-wa-light/10 to-wa-dark/10">
                            <svg class="w-5 h-5 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Quick Actions</h3>
                            <p class="text-sm text-gray-500 dark:text-neutral-400 mt-1">Common tasks you can perform</p>
                        </div>
                    </div>
                </div>
                <div class="p-5 md:p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Book Service -->
                        <a href="{{ route('service') }}" class="group p-4 bg-gradient-to-br from-wa-light/5 to-wa-dark/5 dark:from-wa-dark/10 dark:to-wa-darker/10 rounded-xl border border-wa-light/20 dark:border-wa-dark/20 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 hover:border-wa-light/40 dark:hover:border-wa-dark/40">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="p-2 bg-gradient-to-r from-wa-light to-wa-dark rounded-lg group-hover:from-wa-light/90 group-hover:to-wa-dark/90 transition-all duration-300">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 dark:text-white group-hover:text-wa-dark dark:group-hover:text-wa-light transition-colors">Book Service</h4>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Schedule a service appointment</p>
                            <div class="mt-3 pt-3 border-t border-wa-light/10 dark:border-wa-dark/20">
                                <span class="text-xs text-wa-dark dark:text-wa-light flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                    Click to book
                                </span>
                            </div>
                        </a>
    
                        <!-- Order Product -->
                        <a href="{{ route('product-orders.create') }}" class="group p-4 bg-gradient-to-br from-wa-light/5 to-wa-dark/5 dark:from-wa-dark/10 dark:to-wa-darker/10 rounded-xl border border-wa-light/20 dark:border-wa-dark/20 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 hover:border-wa-light/40 dark:hover:border-wa-dark/40">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="p-2 bg-gradient-to-r from-wa-light to-wa-dark rounded-lg group-hover:from-wa-light/90 group-hover:to-wa-dark/90 transition-all duration-300">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 dark:text-white group-hover:text-wa-dark dark:group-hover:text-wa-light transition-colors">Order Product</h4>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Purchase products online</p>
                            <div class="mt-3 pt-3 border-t border-wa-light/10 dark:border-wa-dark/20">
                                <span class="text-xs text-wa-dark dark:text-wa-light flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                    Click to order
                                </span>
                            </div>
                        </a>
    
                        <!-- Browse Products -->
                        <a href="{{ route('product') }}" class="group p-4 bg-gradient-to-br from-wa-light/5 to-wa-dark/5 dark:from-wa-dark/10 dark:to-wa-darker/10 rounded-xl border border-wa-light/20 dark:border-wa-dark/20 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 hover:border-wa-light/40 dark:hover:border-wa-dark/40">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="p-2 bg-gradient-to-r from-wa-light to-wa-dark rounded-lg group-hover:from-wa-light/90 group-hover:to-wa-dark/90 transition-all duration-300">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 dark:text-white group-hover:text-wa-dark dark:group-hover:text-wa-light transition-colors">Browse Products</h4>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Explore available products</p>
                            <div class="mt-3 pt-3 border-t border-wa-light/10 dark:border-wa-dark/20">
                                <span class="text-xs text-wa-dark dark:text-wa-light flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                    Click to browse
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    
            <!-- Recent Activity Section -->
            <div class="rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 overflow-hidden transition-all duration-300 hover:shadow-lg backdrop-blur-sm bg-white/95 dark:bg-neutral-800/95">
                <div class="p-5 md:p-6 border-b border-neutral-100 dark:border-neutral-700">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-gradient-to-r from-wa-light/10 to-wa-dark/10">
                            <svg class="w-5 h-5 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Recent Activity</h3>
                            <p class="text-sm text-gray-500 dark:text-neutral-400 mt-1">Your latest dashboard activities</p>
                        </div>
                    </div>
                </div>
                <div class="p-5 md:p-6">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 p-3 rounded-lg bg-gradient-to-r from-wa-light/5 to-wa-dark/5">
                            <div class="p-2 rounded-full bg-wa-light/10">
                                <svg class="w-4 h-4 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Welcome to your dashboard</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">You logged in successfully</p>
                            </div>
                            <span class="text-xs text-gray-400">{{ now()->format('h:i A') }}</span>
                        </div>
                        <div class="w-full h-1 bg-gradient-to-r from-wa-light/20 via-wa-dark/20 to-transparent rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>

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
            </style>
    </x-layouts.app>