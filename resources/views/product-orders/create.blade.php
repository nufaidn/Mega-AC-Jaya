<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Produk - Mega AC Jaya</title>
    <meta name="description" content="Pesan produk AC berkualitas.">
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
                        <img src="/images/logo.jpg" alt="Logo" class="w-12 h-12 rounded-full">
                        <span class="font-bold text-xl text-wa-700">Mega AC Jaya</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Tentang</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Galeri</a>
                    <a href="{{ route('service') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Layanan</a>
                    <a href="{{ route('product') }}" class="text-wa-700 font-semibold transition">Produk</a>
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
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Pesan Produk</h2>

                    <!-- Product Info -->
                    <div class="bg-wa-50 border border-wa-100 rounded-lg p-4 mb-6">
                        <div class="flex gap-4">
                            @if($selectedProduct->image)
                                <img src="{{ asset('images/' . $selectedProduct->image) }}" alt="{{ $selectedProduct->name }}" class="w-24 h-24 object-cover rounded-lg">
                            @else
                                <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-wa-700">{{ $selectedProduct->name }}</h3>
                                <p class="text-sm text-gray-600 mb-2">{{ $selectedProduct->description }}</p>
                                <div class="flex items-center gap-2">
                                    @if($selectedProduct->original_price)
                                        <span class="text-sm text-gray-500 line-through">Rp {{ number_format($selectedProduct->original_price, 0, ',', '.') }}</span>
                                    @endif
                                    <span class="text-xl font-bold text-wa-600">Rp {{ number_format($selectedProduct->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('product-orders.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $selectedProduct->id }}">

                        <div>
                            <label for="full_name" class="block font-medium text-sm text-gray-700">{{ __('Nama Lengkap') }}</label>
                            <input id="full_name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="full_name" value="{{ old('full_name') }}" required autofocus />
                            @error('full_name')
                            <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone_number" class="block font-medium text-sm text-gray-700">{{ __('Nomor Telepon') }}</label>
                            <input id="phone_number" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="phone_number" value="{{ old('phone_number') }}" required />
                            @error('phone_number')
                            <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block font-medium text-sm text-gray-700">{{ __('Alamat Lengkap Pengiriman') }}</label>
                            <textarea id="address" name="address" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" required>{{ old('address') }}</textarea>
                            @error('address')
                            <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="quantity" class="block font-medium text-sm text-gray-700">{{ __('Jumlah Unit') }}</label>
                            <input id="quantity" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" required />
                            @error('quantity')
                            <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="notes" class="block font-medium text-sm text-gray-700">{{ __('Catatan (Opsional)') }}</label>
                            <textarea id="notes" name="notes" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('notes') }}</textarea>
                            @error('notes')
                            <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-600 mb-2">
                                <strong>Catatan:</strong> Instalasi AC tidak termasuk dalam pemesanan produk. 
                                Setelah produk diterima, Anda dapat booking layanan instalasi melalui halaman 
                                <a href="{{ route('service') }}" class="text-wa-600 hover:underline">Layanan</a>.
                            </p>
                        </div>

                        <div class="flex items-center justify-end mt-4 gap-3">
                            <a href="{{ route('product') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 transition">
                                {{ __('Batal') }}
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-wa-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-wa-700 focus:bg-wa-700 active:bg-wa-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Pesan Sekarang') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <p>&copy; 2025 Mega AC Jaya. Semua hak cipta dilindungi.</p>
        </div>
    </footer>
</body>

</html>
