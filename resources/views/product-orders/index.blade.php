<x-layouts.app :title="__('My Orders')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 md:p-6">
        <!-- Header Section -->
        <div class="rounded-2xl bg-gradient-to-r from-blue-500 to-purple-600 p-6 md:p-8 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
                <h1 class="text-2xl md:text-3xl font-bold mb-2">My Orders</h1>
                <p class="text-blue-100 text-lg">Track and manage your product orders</p>
            </div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-white/10 rounded-full"></div>
            <div class="absolute -top-4 -left-4 w-24 h-24 bg-white/10 rounded-full"></div>
        </div>

        <!-- Orders List Section -->
        <div class="rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 overflow-hidden transition-all duration-300 hover:shadow-lg">
            <div class="p-5 md:p-6 border-b border-neutral-100 dark:border-neutral-700">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Your Orders</h3>
                        <p class="text-sm text-gray-500 dark:text-neutral-400 mt-1">All your product orders in one place</p>
                    </div>
                    <a href="{{ route('product-orders.create') }}" class="px-4 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg flex items-center gap-2 font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        New Order
                    </a>
                </div>
            </div>

            <div class="p-5 md:p-6">
                @if($productOrders->isEmpty())
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
                    @foreach($productOrders as $order)
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
                                <p class="text-sm text-gray-500 dark:text-neutral-400">{{ $order->full_name }} • {{ $order->phone_number }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-gray-900 dark:text-white">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                            <div class="flex flex-col items-end gap-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $order->status === 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                                @if($order->payment_status === 'pending' && $order->payment_id)
                                <a href="#" onclick="window.open('{{ $order->payment_url ?? '#' }}', '_blank')" class="inline-flex items-center px-3 py-1 bg-blue-500 text-white text-xs rounded-lg hover:bg-blue-600 transition-colors">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    </svg>
                                    Bayar Sekarang
                                </a>
                                @elseif($order->payment_status === 'paid')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Sudah Dibayar
                                </span>
                                @elseif($order->payment_status === 'expired')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Kadaluarsa
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
