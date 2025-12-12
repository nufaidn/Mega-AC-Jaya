<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Mega AC Jaya</title>
    <meta name="description" content="{{ $product->description }}">
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
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .mobile-menu-enter {
            animation: slideDown 0.3s ease-out;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
                            <!-- Dashboard button removed -->
                        @else
                            <a href="{{ route('login') }}" class="hidden md:inline-block px-6 py-2 border border-wa-600 text-wa-600 rounded-lg font-medium hover:bg-wa-50 transition">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="hidden md:inline-block px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif

                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                        <svg id="menu-open-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="menu-close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Card -->
            <div id="mobile-menu" class="hidden lg:hidden absolute top-16 right-4 w-64 bg-white shadow-lg rounded-md border border-gray-100 z-40 overflow-hidden">
                <nav class="flex flex-col py-6">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Tentang</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Galeri</a>
                    <a href="{{ route('service') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Layanan</a>
                    <a href="{{ route('product') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Produk</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Kontak</a>
                    @if (Route::has('login'))
                        @auth
                            <!-- Dashboard button removed from mobile menu -->
                        @else
                            <a href="{{ route('login') }}" class="mx-6 mt-3 px-6 py-2 border border-wa-600 text-wa-600 rounded-lg font-medium hover:bg-wa-50 transition text-center">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="mx-6 mt-2 px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition text-center">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </div>
    </header>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');

        mobileMenuButton.addEventListener('click', () => {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('mobile-menu-enter');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('mobile-menu-enter');
            }
            menuOpenIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('hidden');
        });
    </script>

    <!-- Breadcrumb -->
    <section class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4">
            <nav class="flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-wa-600 transition">Home</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('product') }}" class="text-gray-500 hover:text-wa-600 transition">Produk</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-900 font-medium">{{ $product->name }}</span>
            </nav>
        </div>
    </section>

    <!-- Product Detail -->
    <section class="py-8 md:py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 md:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-6 md:gap-12">
                <!-- Product Image -->
                <div class="relative">
                    <div class="aspect-square rounded-2xl overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 shadow-lg border border-gray-100">
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-24 h-24 md:w-32 md:h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        @if($product->label)
                            <div class="absolute top-4 right-4 {{ $product->getLabelColorClass() }} text-white px-3 md:px-4 py-1.5 md:py-2 rounded-full text-sm font-semibold shadow-lg">
                                {{ $product->label }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Info -->
                <div class="flex flex-col justify-center">
                    <div class="mb-6">
                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight">{{ $product->name }}</h1>
                        <div class="flex flex-wrap items-center gap-3 mb-6">
                            @if($product->original_price)
                                <span class="text-lg md:text-xl text-gray-500 line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                            @endif
                            <span class="text-2xl md:text-3xl lg:text-4xl font-bold text-wa-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            @if($product->original_price)
                                <span class="bg-red-100 text-red-800 px-3 py-1.5 rounded-full text-sm font-semibold shadow-sm">
                                    Hemat {{ number_format((($product->original_price - $product->price) / $product->original_price) * 100, 0) }}%
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Deskripsi Produk
                        </h3>
                        <p class="text-gray-600 leading-relaxed text-base">{{ $product->description }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('product-orders.create', ['product_id' => $product->id]) }}" class="w-full px-6 py-4 bg-gradient-wa text-white rounded-xl font-semibold hover:shadow-xl transition-all duration-300 transform hover:scale-105 text-center">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Pesan Sekarang
                        </a>
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20{{ urlencode($product->name) }}" target="_blank" class="w-full px-6 py-4 border-2 border-wa-600 text-wa-600 rounded-xl font-semibold hover:bg-wa-50 transition-all duration-300 text-center">
                            <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.485"/>
                            </svg>
                            Tanya via WhatsApp
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    @php
        $relatedProducts = \App\Models\Product::where('id', '!=', $product->id)->take(2)->get();
    @endphp
    
    @if($relatedProducts->count() > 0)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Produk Lainnya</h2>
                <p class="text-xl text-gray-600">Lihat produk AC berkualitas lainnya</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 md:gap-8">
                @foreach($relatedProducts as $relatedProduct)
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group border border-gray-100 cursor-pointer hover:-translate-y-1" onclick="window.location.href='{{ route('product.detail', $relatedProduct->id) }}'">
                    <div class="relative overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 h-48 md:h-64">
                        @if($relatedProduct->image)
                            <img src="{{ asset('images/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 md:w-24 md:h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        @if($relatedProduct->label)
                            <div class="absolute top-3 md:top-4 right-3 md:right-4 {{ $relatedProduct->getLabelColorClass() }} text-white px-2 md:px-3 py-1 rounded-full text-xs md:text-sm font-semibold shadow-lg">
                                {{ $relatedProduct->label }}
                            </div>
                        @endif
                    </div>
                    <div class="p-4 md:p-6">
                        <div class="mb-3">
                            <h3 class="text-lg md:text-xl font-bold text-gray-900 group-hover:text-wa-600 transition-colors duration-200 line-clamp-2">{{ $relatedProduct->name }}</h3>
                        </div>
                        <p class="text-sm md:text-base text-gray-600 mb-4 line-clamp-2 leading-relaxed">{{ Str::limit($relatedProduct->description, 60) }}</p>
                        <div class="flex flex-col gap-3">
                            <div class="flex items-baseline gap-2">
                                @if($relatedProduct->original_price)
                                    <span class="text-xs md:text-sm text-gray-500 line-through">Rp {{ number_format($relatedProduct->original_price, 0, ',', '.') }}</span>
                                @endif
                                <span class="text-lg md:text-xl font-bold text-wa-600">Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}</span>
                            </div>
                            <a href="{{ route('product-orders.create', ['product_id' => $relatedProduct->id]) }}" class="w-full px-4 py-2.5 bg-gradient-wa text-white rounded-xl font-medium hover:shadow-lg hover:scale-105 transition-all duration-200 text-center text-sm" onclick="event.stopPropagation()">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-3 mb-6">
                <img src="/images/logo.jpg" alt="Logo" class="w-12 h-12 rounded-full">
                <span class="font-bold text-xl">Mega AC Jaya</span>
            </div>
            <p class="text-gray-400 mb-6">Solusi AC terpercaya untuk rumah dan kantor Anda</p>
            <div class="flex justify-center gap-6">
                <a href="https://wa.me/6281234567890" target="_blank" class="text-gray-400 hover:text-wa-500 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.485"/>
                    </svg>
                </a>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-gray-400 text-sm">
                <p>&copy; 2024 Mega AC Jaya. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>