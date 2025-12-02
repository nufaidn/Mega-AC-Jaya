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
        .hero-wave {
            /* background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%2300d95f' fill-opacity='0.1' d='M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E"); */
            background-repeat: no-repeat;
            background-position: bottom;

        }
        .walking-animation {
            position: absolute;
            bottom: 15%;
            left: -100px;
            animation: walk 15s linear infinite;
            z-index: 1;
        }
        @keyframes walk {
            0% { left: -100px; transform: translateY(0); }
            25% { transform: translateY(-10px); }
            50% { transform: translateY(0); }
            75% { transform: translateY(-10px); }
            100% { left: calc(100vw + 100px); transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-wa-50 text-gray-800 antialiased">

    <!-- Navbar -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-wa rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <span class="font-bold text-xl text-wa-700">Mega AC Jaya</span>
                </div>

                <nav class="hidden lg:flex items-center gap-8">
                    <a href="#home" class="text-gray-700 hover:text-wa-600 font-medium transition">Home</a>
                    <a href="#layanan" class="text-gray-700 hover:text-wa-600 font-medium transition">Layanan</a>
                    <a href="#tentang" class="text-gray-700 hover:text-wa-600 font-medium transition">Tentang</a>
                    <a href="#kontak" class="text-gray-700 hover:text-wa-600 font-medium transition">Kontak</a>
                </nav>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="hidden lg:block px-6 py-2.5 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="hidden lg:block px-6 py-2.5 border border-wa-600 text-wa-600 rounded-lg font-medium hover:bg-wa-50 transition">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="hidden lg:block px-6 py-2.5 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif

                    <button class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section - Full Screen + Perfect Center -->
    <section id="home" class="min-h-screen flex items-center justify-center relative hero-wave bg-wa-50 pt-20">
        <!-- Walking Animation -->
        <div class="walking-animation">
            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#00d95f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="7" r="4"></circle>
                <path d="M5.5 21v-2a4 4 0 0 1 4-4h5a4 4 0 0 1 4 4v2"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                <path d="M8 11.5a4 4 0 0 1 0-7.5"></path>
            </svg>
        </div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                    Service AC Profesional<br>
                    <span class="text-transparent bg-clip-text bg-gradient-wa">Bersih, Dingin, Hemat Listrik</span>
                </h1>
                <p class="text-lg sm:text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                    Teknisi berpengalaman 10+ tahun • Garansi pengerjaan • Harga transparan • Respons cepat 24 jam
                </p>
                <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
                    <a href="https://wa.me/6281234567890" target="_blank"
                       class="inline-flex items-center gap-3 px-8 py-5 bg-gradient-wa text-white font-bold text-lg rounded-xl hover:shadow-2xl transform hover:scale-105 transition duration-300">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.485"/>
                        </svg>
                        Hubungi via WhatsApp
                    </a>
                    <a href="#layanan" class="px-8 py-5 border-2 border-wa-600 text-wa-600 font-bold text-lg rounded-xl hover:bg-wa-600 hover:text-white transition duration-300">
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