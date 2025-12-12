<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service AC Profesional | Bersih, Dingin, Nyaman</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
                            800: '#007a3d',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .bg-gradient-wa {
            background: linear-gradient(135deg, #00d95f 0%, #00ba54 100%);
        }
        .hero-bg {
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%2300d95f" fill-opacity="0.08" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') repeat-x bottom;
            animation: flow 7s linear infinite;
            /* background-size: cover; */
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
        @keyframes flow {
            0% {
                background-position: 0 bottom;
            }
            100% {
                background-position: 1440px bottom;
            }
        }
        .mobile-menu-enter {
            animation: slideDown 0.5s ease-out;
        }
    </style>
</head>
<body class="bg-wa-50 text-gray-800 antialiased">

    <!-- Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14 sm:h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex items-center gap-2 sm:gap-3">
                        <img src="/images/logo.jpg" alt="Logo" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full">
                        <span class="font-bold text-lg sm:text-xl text-wa-700">Mega AC Jaya</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-wa-700 font-semibold transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Tentang</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Galeri</a>
                    <a href="{{ route('service') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Layanan</a>
                    <a href="{{ route('product') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Produk</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Kontak</a>
                </nav>

                <!-- Login & Register -->
                <div class="flex items-center gap-2 sm:gap-3">
                    @if (Route::has('login'))
                        @auth
                            <!-- Desktop Dashboard Button -->
                            <a href="{{ url('/dashboard') }}" class="hidden sm:inline-block px-4 sm:px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition text-sm sm:text-base">
                                Dashboard
                            </a>
                            <!-- Mobile Dashboard Button - Minimalist -->
                            <a href="{{ url('/dashboard') }}" class="sm:hidden p-2 rounded-lg bg-wa-50 hover:bg-wa-100 border border-wa-200 transition group" title="Dashboard">
                                <svg class="w-5 h-5 text-wa-600 group-hover:text-wa-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                </svg>
                            </a>
                        @else
                            <!-- Register Button (tablet and desktop) -->
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="hidden sm:inline-block px-4 sm:px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition text-sm sm:text-base">
                                    Daftar
                                </a>
                            @endif
                            
                            <!-- Mobile Register Button - Minimalist -->
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="sm:hidden p-2 rounded-lg bg-wa-50 hover:bg-wa-100 border border-wa-200 transition group" title="Register">
                                    <svg class="w-5 h-5 text-wa-600 group-hover:text-wa-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                </a>
                            @endif
                        @endauth
                    @endif

                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition">
                        <svg id="menu-open-icon" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="menu-close-icon" class="w-5 h-5 sm:w-6 sm:h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Card - Minimalist -->
            <div id="mobile-menu" class="hidden lg:hidden absolute top-16 right-2 sm:right-4 w-44 sm:w-48 bg-white/95 backdrop-blur-md shadow-2xl rounded-2xl border border-gray-200/50 z-40 overflow-hidden">
                <nav class="flex flex-col py-3">
                    <!-- Navigation Links -->
                    <div class="px-2">
                        <a href="{{ route('home') }}" class="flex items-center text-gray-800 hover:text-wa-600 hover:bg-wa-50/80 font-medium transition-all duration-200 py-2.5 px-3 rounded-lg text-sm group">
                            <span class="w-1.5 h-1.5 bg-wa-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Home
                        </a>
                        <a href="{{ route('about') }}" class="flex items-center text-gray-800 hover:text-wa-600 hover:bg-wa-50/80 font-medium transition-all duration-200 py-2.5 px-3 rounded-lg text-sm group">
                            <span class="w-1.5 h-1.5 bg-wa-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Tentang
                        </a>
                        <a href="{{ route('gallery') }}" class="flex items-center text-gray-800 hover:text-wa-600 hover:bg-wa-50/80 font-medium transition-all duration-200 py-2.5 px-3 rounded-lg text-sm group">
                            <span class="w-1.5 h-1.5 bg-wa-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Galeri
                        </a>
                        <a href="{{ route('service') }}" class="flex items-center text-gray-800 hover:text-wa-600 hover:bg-wa-50/80 font-medium transition-all duration-200 py-2.5 px-3 rounded-lg text-sm group">
                            <span class="w-1.5 h-1.5 bg-wa-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Layanan
                        </a>
                        <a href="{{ route('product') }}" class="flex items-center text-gray-800 hover:text-wa-600 hover:bg-wa-50/80 font-medium transition-all duration-200 py-2.5 px-3 rounded-lg text-sm group">
                            <span class="w-1.5 h-1.5 bg-wa-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Produk
                        </a>
                        <a href="{{ route('contact') }}" class="flex items-center text-gray-800 hover:text-wa-600 hover:bg-wa-50/80 font-medium transition-all duration-200 py-2.5 px-3 rounded-lg text-sm group">
                            <span class="w-1.5 h-1.5 bg-wa-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Kontak
                        </a>
                    </div>
                    
                    @if (Route::has('login'))
                        @guest
                            <!-- Separator -->
                            <div class="h-px bg-gray-200/60 mx-4 my-3"></div>
                            
                            <!-- Auth Buttons -->
                            <div class="px-3 pb-2">
                                <a href="{{ route('login') }}" class="block w-full text-center py-2.5 px-4 text-wa-600 hover:text-wa-700 border border-wa-200 hover:border-wa-300 rounded-xl font-medium hover:bg-wa-50/50 transition-all duration-200 text-sm mb-2">
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block w-full text-center py-2.5 px-4 bg-gradient-wa text-white rounded-xl font-medium hover:shadow-lg hover:scale-[1.02] transition-all duration-200 text-sm">
                                        Register
                                    </a>
                                @endif
                            </div>
                        @endguest
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

    <!-- Hero Section -->
    <section id="home" class="hero-bg pt-16 pb-20 sm:pt-20 sm:pb-32 lg:pt-32 min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4 sm:mb-6 leading-tight">
                    Service AC Profesional<br class="hidden sm:block">
                    <span class="text-transparent bg-clip-text bg-gradient-wa">Bersih, Dingin, Hemat Listrik</span>
                </h1>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 mb-8 sm:mb-10 px-4 sm:px-0 leading-relaxed">
                    Teknisi berpengalaman • Garansi pengerjaan • Harga transparan • Cepat tanggap 24 jam
                </p>
                <div class="flex flex-row gap-3 sm:gap-4 justify-center px-4 sm:px-0">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 sm:gap-3 px-4 sm:px-6 md:px-8 py-3 sm:py-4 bg-gradient-wa text-white font-semibold rounded-xl hover:shadow-xl transition transform hover:scale-105 text-xs sm:text-sm md:text-base flex-1 sm:flex-none">
                        Daftar Sekarang
                    </a>
                    <a href="#layanan" class="px-4 sm:px-6 md:px-8 py-3 sm:py-4 border-2 border-wa-600 text-wa-600 font-semibold rounded-xl hover:bg-wa-600 hover:text-white transition text-xs sm:text-sm md:text-base flex-1 sm:flex-none">
                        Lihat Layanan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Kami - Full Screen -->
    <section id="layanan" class="min-h-screen flex items-center bg-white py-12 sm:py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-3 sm:mb-4 px-4 sm:px-0">Layanan Unggulan Kami</h2>
                <p class="text-lg sm:text-xl text-gray-600 px-4 sm:px-0">Solusi lengkap untuk semua masalah AC Anda</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-10 max-w-6xl mx-auto px-4 sm:px-0">
                <!-- Card 1 -->
                <div class="group bg-wa-50 rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 text-center hover:shadow-2xl hover:-translate-y-2 sm:hover:-translate-y-3 transition-all duration-300">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-gradient-wa rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6 group-hover:scale-110 transition">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 lg:w-14 lg:h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-4m-6 0H5"/>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3 sm:mb-4">Cuci AC</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Pembersihan menyeluruh indoor & outdoor unit, bebas debu, jamur & bakteri</p>
                </div>

                <!-- Card 2 -->
                <div class="group bg-wa-50 rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 text-center hover:shadow-2xl hover:-translate-y-2 sm:hover:-translate-y-3 transition-all duration-300">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-gradient-wa rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6 group-hover:scale-110 transition">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 lg:w-14 lg:h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3 sm:mb-4">Isi Freon</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Pengisian freon R32, R410A, R22 dengan takaran digital presisi</p>
                </div>

                <!-- Card 3 -->
                <div class="group bg-wa-50 rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 text-center hover:shadow-2xl hover:-translate-y-2 sm:hover:-translate-y-3 transition-all duration-300 sm:col-span-2 lg:col-span-1">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-gradient-wa rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6 group-hover:scale-110 transition">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 lg:w-14 lg:h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-4m-6 0H5"/>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3 sm:mb-4">Bongkar Pasang AC</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Pindah lokasi atau pasang AC baru, rapi, aman, dan bergaransi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-base sm:text-lg">&copy; {{ date('Y') }} Mega AC Jaya. Semua hak cipta dilindungi.</p>
            <p class="text-xs sm:text-sm text-gray-400 mt-2">Professional AC Service • Bersih • Dingin • Hemat</p>
        </div>
    </footer>

</body>
</html>
