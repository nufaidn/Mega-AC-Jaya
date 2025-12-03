<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Service AC Profesional - CoolService AC</title>
    <meta name="description"
        content="Layanan service AC profesional: Cuci AC, Isi Freon, Bongkar Pasang, Perbaikan AC. Garansi, harga transparan, teknisi berpengalaman.">
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
                    <a href="{{ route('home') }}"
                        class="text-gray-700 hover:text-wa-600 font-medium transition">Home</a>
                    <a href="{{ route('about') }}"
                        class="text-gray-700 hover:text-wa-600 font-medium transition">About</a>
                    <a href="{{ route('gallery') }}"
                        class="text-gray-700 hover:text-wa-600 font-medium transition">Galeri</a>
                    <a href="{{ route('service') }}"
                        class="text-wa-700 font-semibold transition">Layanan</a>
                    <a href="{{ route('product') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Produk</a>
                    <a href="{{ route('contact') }}"
                        class="text-gray-700 hover:text-wa-600 font-medium transition">Kontak</a>
                </nav>

                <!-- Login & Register -->
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="hidden md:inline-block px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="hidden md:inline-block px-6 py-2 border border-wa-600 text-wa-600 rounded-lg font-medium hover:bg-wa-50 transition">
                        Login
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="hidden md:inline-block px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                        Register
                    </a>
                    @endif
                    @endauth
                    @endif

                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                        <svg id="menu-open-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="menu-close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu"
                class="hidden lg:hidden absolute top-16 left-0 right-0 bg-white shadow-lg border-t border-gray-100 z-40">
                <nav class="flex flex-col py-4">
                    <a href="{{ route('home') }}"
                        class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Home</a>
                    <a href="{{ route('about') }}"
                        class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">About</a>
                    <a href="{{ route('gallery') }}"
                        class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Galeri</a>
                    <a href="{{ route('service') }}"
                        class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Layanan</a>
                    <a href="{{ route('product') }}"
                        class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Produk</a>
                    <a href="{{ route('contact') }}"
                        class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Kontak</a>
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="mx-6 mt-3 px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition text-center">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="mx-6 mt-3 px-6 py-2 border border-wa-600 text-wa-600 rounded-lg font-medium hover:bg-wa-50 transition text-center">
                        Login
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="mx-6 mt-2 px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition text-center">
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
                    Layanan Service AC<br>
                    <span class="text-transparent bg-clip-text bg-gradient-wa">Profesional & Terpercaya</span>
                </h1>
                <p class="text-xl text-gray-600 mb-10">
                    Solusi lengkap untuk semua kebutuhan AC Anda. Dari pembersihan hingga perbaikan, kami siap membantu.
                </p>
                <a href="https://wa.me/6281234567890" target="_blank"
                    class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-wa text-white font-semibold rounded-xl hover:shadow-xl transition transform hover:scale-105">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.485" />
                    </svg>
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </section>

    <!-- LAYANAN UTAMA -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Layanan Kami</h2>
                <p class="text-xl text-gray-600">Solusi lengkap untuk segala masalah AC Anda</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                <div class="bg-wa-50 rounded-2xl p-8 hover:shadow-xl transition group">
                    <div class="w-20 h-20 bg-gradient-wa rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition">
                        @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover rounded-full">
                        @else
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        @endif
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-center">{{ $service->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                    <p class="text-wa-600 font-semibold mb-4 text-center">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                    <a href="{{ route('bookings.create', ['service_id' => $service->id]) }}" class="block w-full text-center bg-wa-600 text-white py-2 rounded-lg hover:bg-wa-700 transition">
                        Book Now
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN -->
    <section class="py-20 bg-wa-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Mengapa Memilih Kami?</h2>
                <p class="text-xl text-gray-600">Komitmen kami untuk pelayanan terbaik</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-wa-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Cepat Tanggap</h3>
                    <p class="text-gray-600 text-sm">Datang maksimal 2 jam setelah konfirmasi</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-wa-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Garansi Service</h3>
                    <p class="text-gray-600 text-sm">Garansi 3-6 bulan untuk setiap layanan</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-wa-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Harga Transparan</h3>
                    <p class="text-gray-600 text-sm">Tidak ada biaya tersembunyi</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-wa-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Teknisi Berpengalaman</h3>
                    <p class="text-gray-600 text-sm">Minimal 5 tahun pengalaman service AC</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-wa-600 text-white text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Butuh Service AC Sekarang?</h2>
            <p class="text-xl mb-8">Konsultasi gratis + teknisi siap datang hari ini juga!</p>
            <a href="https://wa.me/6281234567890" target="_blank"
                class="inline-flex items-center justify-center gap-3 bg-white text-wa-600 hover:bg-gray-100 font-bold py-4 px-10 rounded-full transition transform hover:scale-105">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.485" />
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
</body>

</html>