<x-layouts.app :title="__('My Bookings')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 md:p-6 bg-gray-50 min-h-screen">
        <!-- Header Section -->
        <div class="rounded-2xl bg-gradient-to-r from-wa-600 to-wa-700 p-6 md:p-8 text-white relative overflow-hidden shadow-lg">
            <div class="absolute inset-0 bg-gradient-to-br from-wa-500/20 to-transparent"></div>
            <div class="relative z-10">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold mb-2">My Bookings 📅</h1>
                        <p class="text-white/90 text-lg">Kelola dan pantau semua booking service AC Anda</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-white/80">Total Booking</span>
                        <span class="px-3 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                            {{ $bookings->count() }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-wa-500/10 rounded-full blur-xl"></div>
            <div class="absolute -top-6 -left-6 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
        </div>

        <!-- Bookings List Section -->
        <div class="rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl">
            <div class="p-5 md:p-6 border-b border-gray-100">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-gradient-to-r from-wa-500/10 to-wa-600/10">
                                <svg class="w-5 h-5 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl md:text-2xl font-bold text-gray-900">Daftar Booking Anda</h3>
                        </div>
                        <p class="text-sm text-gray-500 mt-1 ml-12">Semua booking service AC dalam satu tempat</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center gap-2 px-4 py-2.5 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                        <a href="{{ route('bookings.create') }}" class="px-4 py-2.5 bg-gradient-to-r from-wa-600 to-wa-700 text-white rounded-xl hover:from-wa-700 hover:to-wa-800 transition-all duration-300 hover:shadow-lg flex items-center gap-2 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Booking Baru
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
                <div class="mb-6 p-4 bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl shadow-sm">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-yellow-100 rounded-lg">
                            <svg class="w-5 h-5 text-yellow-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-yellow-800 mb-1">💳 Ada Pembayaran Pending</h4>
                            <p class="text-sm text-yellow-700">Setelah melakukan pembayaran di Xendit, klik tombol <strong>"Cek Status"</strong> untuk memperbarui status booking Anda.</p>
                        </div>
                    </div>
                </div>
                @endif
                
                @if($bookings->isEmpty())
                <div class="text-center py-12 md:py-16">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-r from-wa-100 to-wa-200 mb-6">
                        <svg class="w-10 h-10 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Belum Ada Booking 📅</h4>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto text-lg">Mulai dengan membuat booking service AC pertama Anda untuk melihatnya di sini.</p>
                    <a href="{{ route('bookings.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-wa-600 to-wa-700 text-white rounded-xl hover:from-wa-700 hover:to-wa-800 transition-all duration-300 hover:shadow-lg font-medium text-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Buat Booking Pertama
                    </a>
                </div>
                @else
                <div class="space-y-4">
                    @foreach($bookings as $booking)
                    <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-5 md:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="p-3 rounded-xl bg-gradient-to-br from-wa-500/10 to-wa-600/10 flex-shrink-0">
                                    <svg class="w-6 h-6 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900 group-hover:text-wa-600 transition-colors">{{ $booking->service }}</h4>
                                    <div class="flex items-center gap-2 text-sm text-gray-600 mt-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>{{ $booking->date }} • {{ $booking->time }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600 mt-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>{{ $booking->full_name }} • {{ $booking->phone_number }}</span>
                                    </div>
                                    @if($booking->total_price)
                                    <div class="flex items-center gap-2 text-sm font-medium text-wa-600 mt-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                        </svg>
                                        <span>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col items-end gap-3 mt-4 md:mt-0">
                                <div class="flex flex-wrap gap-2 justify-end">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ 
                                        $booking->status === 'lunas' ? 'bg-gradient-to-r from-green-100 to-green-200 text-green-800 border border-green-300' : 
                                        ($booking->status === 'baru dp' ? 'bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 border border-blue-300' : 
                                        ($booking->status === 'pending' ? 'bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800 border border-yellow-300' : 
                                        'bg-gradient-to-r from-red-100 to-red-200 text-red-800 border border-red-300')) }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                    @if($booking->payment_status)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $booking->payment_status === 'paid' ? 'bg-gradient-to-r from-wa-100 to-wa-200 text-wa-800 border border-wa-300' : ($booking->payment_status === 'pending' ? 'bg-gradient-to-r from-orange-100 to-orange-200 text-orange-800 border border-orange-300' : 'bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 border border-gray-300') }}">
                                        💳 {{ ucfirst($booking->payment_status) }}
                                    </span>
                                    @endif
                                </div>
                                @if($booking->payment_status === 'unpaid')
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('bookings.payment-choice', $booking->id) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-wa-600 to-wa-700 text-white text-sm rounded-xl hover:from-wa-700 hover:to-wa-800 transition-all duration-300 hover:shadow-lg font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                        </svg>
                                        Pilih Pembayaran
                                    </a>
                                </div>
                                @elseif($booking->payment_status === 'pending' && $booking->payment_url)
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ $booking->payment_url }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white text-sm rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 hover:shadow-lg font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                        </svg>
                                        Bayar Sekarang
                                    </a>
                                    <form action="{{ route('bookings.check-payment', $booking->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg font-medium">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                            </svg>
                                            Cek Status
                                        </button>
                                    </form>
                                </div>
                                @elseif($booking->payment_status === 'paid')
                                <div class="flex flex-col gap-2">
                                    <div class="inline-flex items-center px-3 py-1.5 rounded-xl text-sm font-medium bg-gradient-to-r from-wa-100 to-wa-200 text-wa-800 border border-wa-300">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        @if($booking->payment_type === 'dp')
                                            ✅ DP Sudah Dibayar
                                        @else
                                            ✅ Sudah Dibayar Penuh
                                        @endif
                                    </div>
                                    @if($booking->payment_type === 'dp')
                                    <span class="text-sm text-gray-600 font-medium">
                                        DP: Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}
                                    </span>
                                    @endif
                                </div>
                                @elseif($booking->payment_status === 'expired')
                                <div class="inline-flex items-center px-3 py-1.5 rounded-xl text-sm font-medium bg-gradient-to-r from-red-100 to-red-200 text-red-800 border border-red-300">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    ⏰ Kadaluarsa
                                </div>
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
    }
    
    /* Apply colors to utility classes */
    .bg-wa-50 { background-color: var(--wa-50); }
    .bg-wa-100 { background-color: var(--wa-100); }
    .bg-wa-200 { background-color: var(--wa-200); }
    .bg-wa-500 { background-color: var(--wa-500); }
    .bg-wa-600 { background-color: var(--wa-600); }
    .bg-wa-700 { background-color: var(--wa-700); }
    .bg-wa-800 { background-color: var(--wa-800); }
    
    .text-wa-500 { color: var(--wa-500); }
    .text-wa-600 { color: var(--wa-600); }
    .text-wa-700 { color: var(--wa-700); }
    .text-wa-800 { color: var(--wa-800); }
    
    .border-wa-300 { border-color: var(--wa-300); }
    
    .from-wa-500 { --tw-gradient-from: var(--wa-500); }
    .from-wa-600 { --tw-gradient-from: var(--wa-600); }
    .from-wa-700 { --tw-gradient-from: var(--wa-700); }
    .to-wa-600 { --tw-gradient-to: var(--wa-600); }
    .to-wa-700 { --tw-gradient-to: var(--wa-700); }
    .to-wa-800 { --tw-gradient-to: var(--wa-800); }
    
    .hover\:from-wa-700:hover { --tw-gradient-from: var(--wa-700); }
    .hover\:to-wa-800:hover { --tw-gradient-to: var(--wa-800); }
    
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
