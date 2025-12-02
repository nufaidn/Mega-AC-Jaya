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

        

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</head>
<body class="bg-wa-50 text-gray-800 antialiased">

     <!-- Navbar -->
     <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex items-center gap-3">
                        <img src="/images/logo.jpg" alt="Logo" class="w-12 h-12 rounded-full">
                    </div>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Home</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Galeri</a>
                    <a href="{{ route('service') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Layanan</a>
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
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden lg:hidden absolute top-16 right-0 bg-white shadow-lg border w-64 h-auto z-40">
                <nav class="flex flex-col gap-4 p-6">
                    <a href="{{ route('home') }}" class="bg-wa-50 border border-wa-200 rounded-lg text-gray-700 hover:text-wa-600 hover:bg-wa-100 font-medium transition py-3 px-4 shadow-sm hover:shadow-md">Home</a>
                    <a href="{{ route('gallery') }}" class="bg-wa-50 border border-wa-200 rounded-lg text-gray-700 hover:text-wa-600 hover:bg-wa-100 font-medium transition py-3 px-4 shadow-sm hover:shadow-md">Galeri</a>
                    <a href="{{ route('service') }}" class="bg-wa-50 border border-wa-200 rounded-lg text-gray-700 hover:text-wa-600 hover:bg-wa-100 font-medium transition py-3 px-4 shadow-sm hover:shadow-md">Layanan</a>
                    <a href="{{ route('contact') }}" class="bg-wa-50 border border-wa-200 rounded-lg text-gray-700 hover:text-wa-600 hover:bg-wa-100 font-medium transition py-3 px-4 shadow-sm hover:shadow-md">Kontak</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-wa-50 border border-wa-200 rounded-lg text-gray-700 hover:text-wa-600 hover:bg-wa-100 font-medium transition py-3 px-4 shadow-sm hover:shadow-md">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-wa-50 border border-wa-200 rounded-lg text-gray-700 hover:text-wa-600 hover:bg-wa-100 font-medium transition py-3 px-4 shadow-sm hover:shadow-md">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-wa-50 border border-wa-200 rounded-lg text-gray-700 hover:text-wa-600 hover:bg-wa-100 font-medium transition py-3 px-4 shadow-sm hover:shadow-md">Register</a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section - Full Screen + Perfect Center -->
<section id="home" class="min-h-screen flex items-center justify-center relative bg-wa-50 pt-20" style="background-image: url('/images/tukang-ac.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <!-- Overlay lebih gelap agar background lebih transparan/tidak terlalu dominan -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 drop-shadow-2xl 
                       [text-shadow:_0_4px_20px_rgba(0,0,0,0.8),_0_0_40px_rgba(0,217,95,0.4)]">
                Service AC Profesional<br>
                <span class="text-transparent bg-clip-text bg-gradient-wa">Bersih, Dingin, Hemat Listrik</span>
            </h1>
            <p class="text-lg sm:text-xl text-white mb-10 max-w-2xl mx-auto drop-shadow-xl 
                       [text-shadow:_0_2px_10px_rgba(0,0,0,0.9)]">
                Teknisi berpengalaman 10+ tahun • Garansi pengerjaan • Harga transparan • Respons cepat 24 jam
            </p>
            <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
                <a href="{{ route('about') }}"
                   class="inline-flex items-center gap-3 px-8 py-5 bg-gradient-wa text-white font-bold text-lg rounded-xl hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    Tentang Kami
                </a>
                <a href="{{ route('service') }}" class="px-8 py-5 border-2 border-wa-600 text-wa-600 font-bold text-lg rounded-xl hover:bg-wa-600 hover:text-white transition duration-300">
                    Lihat Layanan Kami
                </a>
            </div>
        </div>
    </div>
</section>
    <!-- Layanan Kami - Full Screen -->
    <section id="layanan" class="min-h-screen flex items-center bg-white py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-4">Layanan Unggulan Kami</h2>
                <p class="text-xl text-gray-600">Solusi lengkap untuk semua masalah AC Anda</p>
            </div>

            <div class="grid md:grid-cols-3 gap-10 max-w-6xl mx-auto">
                <!-- Card 1 -->
                <div class="group bg-wa-50 rounded-3xl p-10 text-center hover:shadow-2xl hover:-translate-y-3 transition-all duration-300">
                    <div class="w-24 h-24 bg-gradient-wa rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition">
                        <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-4m-6 0H5"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Cuci AC</h3>
                    <p class="text-gray-600 leading-relaxed">Pembersihan menyeluruh indoor & outdoor unit, bebas debu, jamur & bakteri</p>
                </div>

                <!-- Card 2 -->
                <div class="group bg-wa-50 rounded-3xl p-10 text-center hover:shadow-2xl hover:-translate-y-3 transition-all duration-300">
                    <div class="w-24 h-24 bg-gradient-wa rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition">
                        <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Isi Freon</h3>
                    <p class="text-gray-600 leading-relaxed">Pengisian freon R32, R410A, R22 dengan takaran digital presisi</p>
                </div>

                <!-- Card 3 -->
                <div class="group bg-wa-50 rounded-3xl p-10 text-center hover:shadow-2xl hover:-translate-y-3 transition-all duration-300">
                    <div class="w-24 h-24 bg-gradient-wa rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition">
                        <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-4m-6 0H5"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Bongkar Pasang AC</h3>
                    <p class="text-gray-600 leading-relaxed">Pindah lokasi atau pasang AC baru, rapi, aman, dan bergaransi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <p class="text-lg">&copy; {{ date('Y') }} Mega AC Jaya. Semua hak cipta dilindungi.</p>
            <p class="text-sm text-gray-400 mt-2">Professional AC Service • Bersih • Dingin • Hemat</p>
        </div>
    </footer>

</body>
</html>