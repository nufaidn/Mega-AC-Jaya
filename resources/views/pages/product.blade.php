<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk AC Berkualitas - Mega AC Jaya</title>
    <meta name="description" content="Jual AC berkualitas berbagai merek: Daikin, Panasonic, LG, Sharp, Gree. Harga terbaik, garansi resmi, gratis instalasi.">
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
        .hero-bg {
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%2300d95f" fill-opacity="0.08" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
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
                            <a href="{{ url('/dashboard') }}" class="hidden md:inline-block px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                                Dashboard
                            </a>
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
                            <a href="{{ url('/dashboard') }}" class="mx-6 mt-3 px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition text-center">
                                Dashboard
                            </a>
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

    <!-- HERO -->
    <section class="hero-bg pt-20 pb-32 lg:pt-32">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6">
                    Produk AC Berkualitas<br>
                    <span class="text-transparent bg-clip-text bg-gradient-wa">Harga Terbaik & Garansi Resmi</span>
                </h1>
                <p class="text-xl text-gray-600 mb-10">
                    Berbagai pilihan AC dari brand ternama dengan harga kompetitif. Gratis instalasi & garansi resmi.
                </p>
                <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-wa text-white font-semibold rounded-xl hover:shadow-xl transition transform hover:scale-105">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.485"/>
                    </svg>
                    Tanya Harga & Stok
                </a>
            </div>
        </div>
    </section>

    <!-- PRODUK AC -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Produk AC Kami</h2>
                <p class="text-xl text-gray-600">Pilihan AC berkualitas dari berbagai brand ternama</p>
            </div>
            
            @if($products->isEmpty())
                <div class="text-center py-20">
                    <div class="max-w-md mx-auto">
                        <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Produk Segera Hadir</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed">
                            Kami sedang mempersiapkan koleksi AC berkualitas terbaik untuk Anda. 
                            Silakan hubungi kami untuk informasi produk terbaru.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20menanyakan%20produk%20AC%20yang%20tersedia" target="_blank" class="inline-flex items-center justify-center gap-3 px-6 py-3 bg-gradient-wa text-white font-semibold rounded-xl hover:shadow-lg transition transform hover:scale-105">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.485"/>
                                </svg>
                                Tanya Produk via WhatsApp
                            </a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 border-2 border-wa-600 text-wa-600 font-semibold rounded-xl hover:bg-wa-50 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            @else
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
                @foreach($products as $product)
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group border border-gray-100 cursor-pointer hover:-translate-y-1" onclick="window.location.href='{{ route('product.detail', $product->id) }}'">
                    <div class="relative overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 h-48 md:h-64">
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 md:w-24 md:h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        @if($product->label)
                            <div class="absolute top-3 md:top-4 right-3 md:right-4 {{ $product->getLabelColorClass() }} text-white px-2 md:px-3 py-1 rounded-full text-xs md:text-sm font-semibold shadow-lg">
                                {{ $product->label }}
                            </div>
                        @endif
                    </div>
                    <div class="p-4 md:p-6">
                        <div class="mb-3">
                            <h3 class="text-lg md:text-xl font-bold text-gray-900 group-hover:text-wa-600 transition-colors duration-200 line-clamp-2">{{ $product->name }}</h3>
                        </div>
                        <p class="text-sm md:text-base text-gray-600 mb-4 line-clamp-2 leading-relaxed">{{ Str::limit($product->description, 60) }}</p>
                        <div class="flex flex-col gap-3">
                            <div class="flex items-baseline gap-2">
                                @if($product->original_price)
                                    <span class="text-xs md:text-sm text-gray-500 line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                                @endif
                                <span class="text-lg md:text-xl font-bold text-wa-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                            <a href="{{ route('product-orders.create', ['product_id' => $product->id]) }}" class="w-full px-4 py-2.5 bg-gradient-wa text-white rounded-xl font-medium hover:shadow-lg hover:scale-105 transition-all duration-200 text-center text-sm" onclick="event.stopPropagation()">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    <!-- OLD HARDCODED PRODUCTS - BACKUP (REMOVE AFTER TESTING) -->
    <section class="py-20 bg-white hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Produk AC Kami (Old)</h2>
                <p class="text-xl text-gray-600">Pilihan AC berkualitas dari berbagai brand ternama</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Product Card 1 - Daikin -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group border border-gray-100">
                    <div class="relative overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 h-64">
                        <img src="https://images.unsplash.com/photo-1585771724684-38269d6639fd?q=80&w=1470" alt="AC Daikin" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-wa-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Best Seller</div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-2xl font-bold text-gray-900">Daikin Inverter</h3>
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">1 PK</span>
                        </div>
                        <p class="text-gray-600 mb-4">AC Inverter hemat listrik dengan teknologi R32. Dingin cepat, senyap, dan ramah lingkungan.</p>
                        <ul class="text-sm text-gray-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Hemat listrik hingga 60%
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Garansi kompresor 10 tahun
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Gratis instalasi standar
                            </li>
                        </ul>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 line-through">Rp 5.500.000</p>
                                <p class="text-2xl font-bold text-wa-600">Rp 4.999.000</p>
                            </div>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20AC%20Daikin%20Inverter%201%20PK" target="_blank" class="px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 - Panasonic -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group border border-gray-100">
                    <div class="relative overflow-hidden bg-gradient-to-br from-indigo-50 to-indigo-100 h-64">
                        <img src="https://images.unsplash.com/photo-1631545806609-4b0e36d4d0a8?q=80&w=1470" alt="AC Panasonic" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-2xl font-bold text-gray-900">Panasonic Standard</h3>
                            <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-1 rounded">1/2 PK</span>
                        </div>
                        <p class="text-gray-600 mb-4">AC standar dengan performa handal. Cocok untuk kamar tidur dan ruang kerja kecil.</p>
                        <ul class="text-sm text-gray-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Konsumsi daya rendah
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Garansi resmi 1 tahun
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Gratis instalasi standar
                            </li>
                        </ul>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 line-through">Rp 2.800.000</p>
                                <p class="text-2xl font-bold text-wa-600">Rp 2.499.000</p>
                            </div>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20AC%20Panasonic%20Standard%201/2%20PK" target="_blank" class="px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 - LG -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group border border-gray-100">
                    <div class="relative overflow-hidden bg-gradient-to-br from-red-50 to-red-100 h-64">
                        <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?q=80&w=1470" alt="AC LG" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Promo</div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-2xl font-bold text-gray-900">LG Dual Cool</h3>
                            <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded">1 PK</span>
                        </div>
                        <p class="text-gray-600 mb-4">AC dengan teknologi Dual Inverter. Dingin 40% lebih cepat dengan suara super senyap.</p>
                        <ul class="text-sm text-gray-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Dual Inverter Compressor
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Garansi kompresor 10 tahun
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Gratis instalasi standar
                            </li>
                        </ul>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 line-through">Rp 4.800.000</p>
                                <p class="text-2xl font-bold text-wa-600">Rp 4.299.000</p>
                            </div>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20AC%20LG%20Dual%20Cool%201%20PK" target="_blank" class="px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 - Sharp -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group border border-gray-100">
                    <div class="relative overflow-hidden bg-gradient-to-br from-purple-50 to-purple-100 h-64">
                        <img src="https://images.unsplash.com/photo-1635274531661-1c5a7e0f5f1d?q=80&w=1470" alt="AC Sharp" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-2xl font-bold text-gray-900">Sharp Plasmacluster</h3>
                            <span class="text-xs bg-purple-100 text-purple-700 px-2 py-1 rounded">1.5 PK</span>
                        </div>
                        <p class="text-gray-600 mb-4">AC dengan teknologi Plasmacluster Ion untuk udara lebih bersih dan sehat.</p>
                        <ul class="text-sm text-gray-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Plasmacluster Ion Technology
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Filter anti bakteri
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Gratis instalasi standar
                            </li>
                        </ul>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 line-through">Rp 5.200.000</p>
                                <p class="text-2xl font-bold text-wa-600">Rp 4.799.000</p>
                            </div>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20AC%20Sharp%20Plasmacluster%201.5%20PK" target="_blank" class="px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product Card 5 - Gree -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group border border-gray-100">
                    <div class="relative overflow-hidden bg-gradient-to-br from-green-50 to-green-100 h-64">
                        <img src="https://images.unsplash.com/photo-1614252235316-8c857d38b5f4?q=80&w=1470" alt="AC Gree" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-2xl font-bold text-gray-900">Gree Inverter</h3>
                            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">2 PK</span>
                        </div>
                        <p class="text-gray-600 mb-4">AC inverter dengan kapasitas besar. Cocok untuk ruang tamu dan ruang meeting.</p>
                        <ul class="text-sm text-gray-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Inverter hemat energi
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Garansi resmi 3 tahun
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Gratis instalasi standar
                            </li>
                        </ul>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 line-through">Rp 6.500.000</p>
                                <p class="text-2xl font-bold text-wa-600">Rp 5.999.000</p>
                            </div>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20AC%20Gree%20Inverter%202%20PK" target="_blank" class="px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product Card 6 - Mitsubishi -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group border border-gray-100">
                    <div class="relative overflow-hidden bg-gradient-to-br from-orange-50 to-orange-100 h-64">
                        <img src="https://images.unsplash.com/photo-1628744448840-55bdb2497bd4?q=80&w=1470" alt="AC Mitsubishi" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-orange-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Premium</div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-2xl font-bold text-gray-900">Mitsubishi Electric</h3>
                            <span class="text-xs bg-orange-100 text-orange-700 px-2 py-1 rounded">1 PK</span>
                        </div>
                        <p class="text-gray-600 mb-4">AC premium dengan teknologi Jepang. Kualitas terbaik untuk kenyamanan maksimal.</p>
                        <ul class="text-sm text-gray-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Teknologi Jepang original
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Garansi kompresor 10 tahun
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wa-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Gratis instalasi standar
                            </li>
                        </ul>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 line-through">Rp 7.200.000</p>
                                <p class="text-2xl font-bold text-wa-600">Rp 6.799.000</p>
                            </div>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20AC%20Mitsubishi%20Electric%201%20PK" target="_blank" class="px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OLD HARDCODED PRODUCTS -->

    <!-- KEUNGGULAN BELI DI KAMI -->
    <section class="py-20 bg-wa-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Mengapa Beli AC di Kami?</h2>
                <p class="text-xl text-gray-600">Keuntungan berbelanja di Mega AC Jaya</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-wa-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Garansi Resmi</h3>
                    <p class="text-gray-600 text-sm">Semua produk bergaransi resmi dari distributor</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-wa-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Harga Terbaik</h3>
                    <p class="text-gray-600 text-sm">Harga kompetitif dengan kualitas terjamin</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-wa-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Gratis Instalasi</h3>
                    <p class="text-gray-600 text-sm">Instalasi standar gratis oleh teknisi berpengalaman</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-wa-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Pengiriman Cepat</h3>
                    <p class="text-gray-600 text-sm">Pengiriman dan instalasi maksimal 3 hari</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-wa-600 text-white text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Tertarik dengan Produk Kami?</h2>
            <p class="text-xl mb-8">Konsultasi gratis untuk memilih AC yang tepat sesuai kebutuhan Anda</p>
            <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center justify-center gap-3 bg-white text-wa-600 hover:bg-gray-100 font-bold py-4 px-10 rounded-full transition transform hover:scale-105">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.485"/>
                </svg>
                Hubungi WhatsApp Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <p>&copy; 2025 CoolService AC. Semua hak cipta dilindungi.</p>
        </div>
    </footer>

    <!-- Back to Dashboard Button -->
    @if (Route::has('login'))
    @auth
    <a href="{{ url('/dashboard') }}" class="fixed bottom-4 right-4 bg-wa-600 text-white px-4 py-2 rounded-full shadow-lg hover:shadow-xl transition flex items-center gap-2 z-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Dashboard
    </a>
    @endauth
    @endif
</body>
</html>
