<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Nama Brand Kamu</title>
    <meta name="description" content="Tentang kami - Nama Brand Kamu">

    <!-- Tailwind dari Laravel Breeze/Jetstream (CDN version terbaru 2025) -->
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%2300d95f" fill-opacity="0.08" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') repeat-x 0 bottom;
            animation: wave-flow 10s linear infinite;
        }

        @keyframes wave-flow {
            0% { background-position-x: 0; }
            100% { background-position-x: 1440px; }
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

<body class="antialiased bg-gray-50 text-gray-900">

        <!-- Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex items-center gap-3">
                        <img src="/images/logo.jpg" alt="Logo" class="w-12 h-12 rounded-full">
                        <span class="font-bold text-xl text-wa-700">Mega Jaya AC</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Home</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Galeri</a>
                    <a href="{{ route('service') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Layanan</a>
                    <a href="{{ route('product') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Produk</a>
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
        </div>

        <!-- Mobile Menu Card -->
        <div id="mobile-menu" class="hidden lg:hidden absolute top-16 right-4 w-64 bg-white shadow-lg rounded-md border border-gray-100 z-40 overflow-hidden">
            <nav class="flex flex-col py-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Home</a>
                <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Galeri</a>
                <a href="{{ route('service') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Layanan</a>
                <a href="{{ route('product') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Product</a>
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
    <section class="hero-bg h-screen flex items-center justify-center">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6">
                    Tentang Kami
                </h1>
                <p class="text-xl text-gray-600 mb-10">
                    Kami adalah <span class="font-bold text-wa-700">CoolService AC</span> — hadir buat bikin hidup kamu lebih gampang, seru, dan bermakna.
                </p>
            </div>
        </div>
    </section>

    <!-- STORY -->
    <section class="h-screen bg-white flex items-center justify-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Cerita Kami Dimulai Dari Sini</h2>
                    <p class="text-lg leading-relaxed text-gray-600 mb-4">
                        Tahun 2023, kita semua lelah dengan [masalah yang kamu selesaikan]. Akhirnya iseng bikin solusi sendiri.
                    </p>
                    <p class="text-lg leading-relaxed text-gray-600">
                        Dari situ lahir <span class="font-bold text-wa-700">Mega AC Jaya</span>.
                        Bukan cuma bisnis, tapi solusi nyata buat masalah yang kita (dan kamu) rasakan tiap hari.
                    </p>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1470"
                         alt="Tim kami" class="rounded-xl shadow-2xl w-full object-cover h-96">
                </div>
            </div>
        </div>
    </section>

    <!-- VALUES -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Nilai yang Kami Pegang</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-wa-500 rounded-full mx-auto mb-6 flex items-center justify-center text-3xl text-white font-bold">1</div>
                    <h3 class="text-xl font-semibold mb-3">Jujur & Transparan</h3>
                    <p class="text-gray-600">Apa adanya, no tipu-tipu.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-wa-600 rounded-full mx-auto mb-6 flex items-center justify-center text-3xl text-white font-bold">2</div>
                    <h3 class="text-xl font-semibold mb-3">Kualitas Nomor Satu</h3>
                    <p class="text-gray-600">Setiap detail kami perhatikan banget.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-wa-700 rounded-full mx-auto mb-6 flex items-center justify-center text-3xl text-white font-bold">3</div>
                    <h3 class="text-xl font-semibold mb-3">Kamu Adalah Keluarga</h3>
                    <p class="text-gray-600">Pelanggan bukan raja, tapi keluarga.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="h-screen bg-wa-600 text-white text-center flex items-center justify-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Yuk Gabung Bareng Kami!</h2>
            <p class="text-xl mb-8">Mulai perjalanan seru bareng CoolService AC sekarang juga.</p>
            <a href="/" class="inline-block bg-white text-wa-600 hover:bg-gray-100 font-bold py-4 px-10 rounded-full transition">
                Kembali ke Beranda
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