<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Metode Pembayaran - CoolService AC</title>
    <meta name="description" content="Pilih metode pembayaran untuk booking service AC.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        wa: {
                            50: '#e8fdf2',
                            100: '#d1fae5',
                            500: '#00d95f',
                            600: '#00ba54',
                            700: '#009944',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .bg-gradient-wa {
            background: linear-gradient(135deg, #00d95f 0%, #00ba54 100%);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900 antialiased">

    <!-- Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-wa rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                            </svg>
                        </div>
                        <span class="font-bold text-xl text-wa-700">Mega AC Jaya</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">About</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Galeri</a>
                    <a href="{{ route('service') }}" class="text-wa-700 font-semibold transition">Layanan</a>
                    <a href="{{ route('product') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Produk</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Kontak</a>
                </nav>

                <!-- Login & Register -->
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="hidden md:inline-block px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="hidden md:inline-block px-6 py-2 border border-wa-600 text-wa-600 rounded-lg font-medium hover:bg-wa-50 transition">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hidden md:inline-block px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">Register</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6 text-center">Pilih Metode Pembayaran</h2>

                    <!-- Booking Summary -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold mb-4">Ringkasan Booking</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-600">Service</p>
                                <p class="font-medium">{{ $booking->service }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Nama</p>
                                <p class="font-medium">{{ $booking->full_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Tanggal & Waktu</p>
                                <p class="font-medium">{{ $booking->date }} - {{ $booking->time }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Total Harga</p>
                                <p class="font-medium text-lg text-wa-700">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Options -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- DP Option -->
                        <div class="border-2 border-gray-200 rounded-lg p-6 hover:border-wa-500 transition-colors">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold mb-2">Bayar DP (30%)</h3>
                                <p class="text-3xl font-bold text-blue-600 mb-2">Rp {{ number_format($booking->total_price * 0.3, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-600 mb-6">Bayar 30% sekarang, sisanya saat service selesai</p>
                                
                                <form action="{{ route('bookings.process-payment', $booking->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_type" value="dp">
                                    <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors">
                                        Bayar DP Sekarang
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Full Payment Option -->
                        <div class="border-2 border-gray-200 rounded-lg p-6 hover:border-wa-500 transition-colors">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-wa-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold mb-2">Bayar Sekarang</h3>
                                <p class="text-3xl font-bold text-wa-600 mb-2">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-600 mb-6">Bayar penuh sekarang, tidak ada pembayaran lagi</p>
                                
                                <form action="{{ route('bookings.process-payment', $booking->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_type" value="full">
                                    <button type="submit" class="w-full px-6 py-3 bg-wa-600 text-white rounded-lg font-medium hover:bg-wa-700 transition-colors">
                                        Bayar Sekarang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="text-center mt-8">
                        <a href="{{ route('bookings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg font-medium hover:bg-gray-700 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke My Bookings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <p>&copy; 2025 CoolService AC. Semua hak cipta dilindungi.</p>
        </div>
    </footer>
</body>

</html>