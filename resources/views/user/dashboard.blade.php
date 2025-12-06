<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 md:p-6">
        <!-- Welcome Section -->
        <div class="rounded-2xl bg-gradient-to-r from-blue-500 to-purple-600 p-6 md:p-8 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
                <h1 class="text-2xl md:text-3xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="text-blue-100 text-lg">Here's what's happening with your account today.</p>
            </div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-white/10 rounded-full"></div>
            <div class="absolute -top-4 -left-4 w-24 h-24 bg-white/10 rounded-full"></div>
        </div>

        <!-- Stats Cards Section -->
        <div class="hidden md:grid auto-rows-min gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <!-- My Orders -->
            <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-blue-300 dark:hover:border-blue-700 hover:bg-gradient-to-br hover:from-white hover:to-blue-50 dark:hover:from-neutral-800 dark:hover:to-blue-900/20">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-blue-100 dark:bg-blue-900/30 group-hover:bg-blue-200 dark:group-hover:bg-blue-800/40 transition-colors">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300">Booking</span>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-neutral-400 mb-1">My Booking</h3>
                    <p class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $totalBookings ?? 0 }}</p>
                    <div class="mt-2 h-1 w-16 bg-gradient-to-r from-blue-500 to-blue-300 rounded-full"></div>
                </div>
                <a href="{{ route('bookings.index') }}" class="flex items-center justify-between text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors group/link">
                    <span>View Bookings</span>
                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <!-- Pending Orders -->
            <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-yellow-300 dark:hover:border-yellow-700 hover:bg-gradient-to-br hover:from-white hover:to-yellow-50 dark:hover:from-neutral-800 dark:hover:to-yellow-900/20">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-yellow-100 dark:bg-yellow-900/30 group-hover:bg-yellow-200 dark:group-hover:bg-yellow-800/40 transition-colors">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-yellow-100 dark:bg-yellow-900/40 text-yellow-700 dark:text-yellow-300">Order</span>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-neutral-400 mb-1">My Order</h3>
                    <p class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $totalOrders ?? 0 }}</p>
                    <div class="mt-2 h-1 w-16 bg-gradient-to-r from-yellow-500 to-yellow-300 rounded-full"></div>
                </div>
                <a href="{{ route('product-orders.index') }}" class="flex items-center justify-between text-sm font-medium text-yellow-600 dark:text-yellow-400 hover:text-yellow-800 dark:hover:text-yellow-300 transition-colors group/link">
                    <span>View Pending</span>
                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <!-- Completed Orders -->
            <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-green-300 dark:hover:border-green-700 hover:bg-gradient-to-br hover:from-white hover:to-green-50 dark:hover:from-neutral-800 dark:hover:to-green-900/20">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-green-100 dark:bg-green-900/30 group-hover:bg-green-200 dark:group-hover:bg-green-800/40 transition-colors">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300">Expedition</span>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-neutral-400 mb-1">My Expedition</h3>
                    <p class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $completedOrders ?? 0 }}</p>
                    <div class="mt-2 h-1 w-16 bg-gradient-to-r from-green-500 to-green-300 rounded-full"></div>
                </div>
                <a href="{{ route('product-orders.index') }}" class="flex items-center justify-between text-sm font-medium text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300 transition-colors group/link">
                    <span>View Completed</span>
                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Recent Orders Section -->
        @isset($recentOrders)
        <div class="rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 overflow-hidden transition-all duration-300 hover:shadow-lg">
            <div class="p-5 md:p-6 border-b border-neutral-100 dark:border-neutral-700">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Recent Orders</h3>
                        <p class="text-sm text-gray-500 dark:text-neutral-400 mt-1">Your latest product orders</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('product-orders.create') }}" class="px-4 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg flex items-center gap-2 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            New Order
                        </a>
                        <a href="{{ route('product-orders.index') }}" class="px-4 py-2.5 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg flex items-center gap-2 font-medium">
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
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No orders yet</h4>
                    <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">Start by placing your first product order to see it here.</p>
                    <a href="{{ route('product-orders.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Your First Order
                    </a>
                </div>
                @else
                <div class="space-y-4">
                    @foreach($recentOrders as $order)
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-neutral-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-neutral-700 transition-colors">
                        <div class="flex items-center gap-4">
                            @if($order->product->image)
                            <img src="{{ asset('images/' . $order->product->image) }}" alt="{{ $order->product->name }}" class="w-12 h-12 rounded-lg object-cover">
                            @else
                            <div class="w-12 h-12 rounded-lg bg-gray-200 dark:bg-neutral-600 flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            @endif
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $order->product->name }}</h4>
                                <p class="text-sm text-gray-500 dark:text-neutral-400">Qty: {{ $order->quantity }} • {{ $order->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-gray-900 dark:text-white">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $order->status === 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400') }}">
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
        <div class="rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 overflow-hidden transition-all duration-300 hover:shadow-lg">
            <div class="p-5 md:p-6 border-b border-neutral-100 dark:border-neutral-700">
                <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Quick Actions</h3>
                <p class="text-sm text-gray-500 dark:text-neutral-400 mt-1">Common tasks you can perform</p>
            </div>
            <div class="p-5 md:p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ route('bookings.create') }}" class="group p-4 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-xl border border-blue-200 dark:border-blue-800 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-blue-500 rounded-lg group-hover:bg-blue-600 transition-colors">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">Book Service</h4>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Schedule a service appointment</p>
                    </a>

                    <a href="{{ route('product-orders.create') }}" class="group p-4 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-xl border border-purple-200 dark:border-purple-800 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-purple-500 rounded-lg group-hover:bg-purple-600 transition-colors">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">Order Product</h4>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Purchase products online</p>
                    </a>

                    <a href="{{ route('product') }}" class="group p-4 bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-xl border border-green-200 dark:border-green-800 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-green-500 rounded-lg group-hover:bg-green-600 transition-colors">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">Browse Products</h4>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Explore available products</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
