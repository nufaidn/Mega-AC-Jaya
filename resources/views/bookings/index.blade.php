<x-layouts.app :title="__('My Bookings')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 md:p-6">
        <!-- Header Section -->
        <div class="rounded-2xl bg-gradient-to-r from-blue-500 to-purple-600 p-6 md:p-8 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
                <h1 class="text-2xl md:text-3xl font-bold mb-2">My Bookings</h1>
                <p class="text-blue-100 text-lg">Track and manage your service bookings</p>
            </div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-white/10 rounded-full"></div>
            <div class="absolute -top-4 -left-4 w-24 h-24 bg-white/10 rounded-full"></div>
        </div>

        <!-- Bookings List Section -->
        <div class="rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 overflow-hidden transition-all duration-300 hover:shadow-lg">
            <div class="p-5 md:p-6 border-b border-neutral-100 dark:border-neutral-700">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Your Bookings</h3>
                        <p class="text-sm text-gray-500 dark:text-neutral-400 mt-1">All your service bookings in one place</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center gap-2 px-4 py-3 bg-gradient-to-r from-gray-600 to-gray-700 text-white rounded-xl hover:from-gray-700 hover:to-gray-800 transition-all duration-300 hover:shadow-lg font-medium group">
                            Back
                        </a>
                        <a href="{{ route('service') }}" class="px-4 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg flex items-center gap-2 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            New Booking
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-5 md:p-6">
                <!-- Alert untuk pending payments -->
                @php
                    $hasPendingPayments = $bookings->where('payment_status', 'pending')->count() > 0;
                @endphp
                @if($hasPendingPayments)
                <div class="mb-4 p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-xl">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <div class="flex-1">
                            <h4 class="font-semibold text-yellow-800 dark:text-yellow-300 mb-1">Ada Pembayaran Pending</h4>
                            <p class="text-sm text-yellow-700 dark:text-yellow-400">Setelah melakukan pembayaran di Xendit, klik tombol <strong>"Cek Status"</strong> untuk memperbarui status booking Anda.</p>
                        </div>
                    </div>
                </div>
                @endif
                
                @if($bookings->isEmpty())
                <div class="text-center py-10 md:py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No bookings yet</h4>
                    <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">Start by booking your first service to see it here.</p>
                    <a href="{{ route('service') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Your First Booking
                    </a>
                </div>
                @else
                <div class="space-y-4">
                    @foreach($bookings as $booking)
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-neutral-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-neutral-700 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $booking->service }}</h4>
                                <p class="text-sm text-gray-500 dark:text-neutral-400">{{ $booking->date }} at {{ $booking->time }}</p>
                                <p class="text-sm text-gray-500 dark:text-neutral-400">{{ $booking->full_name }} • {{ $booking->phone_number }}</p>
                            </div>
                        </div>
                        <div class="text-right flex flex-col items-end gap-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ 
                                $booking->status === 'lunas' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 
                                ($booking->status === 'baru dp' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400' : 
                                ($booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' : 
                                'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400')) }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                            @if($booking->payment_status)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $booking->payment_status === 'paid' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : ($booking->payment_status === 'pending' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400' : 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400') }}">
                                Payment: {{ ucfirst($booking->payment_status) }}
                            </span>
                            @endif
                            @if($booking->payment_status === 'unpaid')
                            <div class="flex gap-2">
                                <a href="{{ route('bookings.payment-choice', $booking->id) }}" class="inline-flex items-center gap-1 px-3 py-1 bg-wa-600 text-white text-xs rounded-lg hover:bg-wa-700 transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    </svg>
                                    Pilih Pembayaran
                                </a>
                            </div>
                            @elseif($booking->payment_status === 'pending' && $booking->payment_url)
                            <div class="flex gap-2">
                                <a href="{{ $booking->payment_url }}" target="_blank" class="inline-flex items-center gap-1 px-3 py-1 bg-red-600 text-white text-xs rounded-lg hover:bg-red-700 transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    </svg>
                                    Bayar Sekarang
                                </a>
                                <form action="{{ route('bookings.check-payment', $booking->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center gap-1 px-3 py-1 bg-blue-600 text-white text-xs rounded-lg hover:bg-blue-700 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                        Cek Status
                                    </button>
                                </form>
                            </div>
                            @elseif($booking->payment_status === 'paid')
                            <div class="flex flex-col gap-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    @if($booking->payment_type === 'dp')
                                        DP Sudah Dibayar
                                    @else
                                        Sudah Dibayar Penuh
                                    @endif
                                </span>
                                @if($booking->payment_type === 'dp')
                                <span class="text-xs text-gray-500">
                                    DP: Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}
                                </span>
                                @endif
                            </div>
                            @elseif($booking->payment_status === 'expired')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Kadaluarsa
                            </span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
