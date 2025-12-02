<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery - CoolService AC</title>
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
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
<body class="bg-gray-50 text-gray-800">

       <!-- Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-wa rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                            </svg>
                        </div>
                        <span class="font-bold text-xl text-wa-700">Mega AC Jaya</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">About</a>
                    <a href="{{ route('gallery') }}" class="text-wa-700 font-semibold transition">Galeri</a>
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

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden lg:hidden absolute top-16 left-0 right-0 bg-white shadow-lg border-t border-gray-100 z-40">
                <nav class="flex flex-col py-4">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-wa-600 hover:bg-wa-50 font-medium transition py-3 px-6">About</a>
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
                Galery Kami
            </h1>
            <p class="text-xl text-gray-600 mb-10">
                Hasil dari Pekerjaan Kami Selama ini dengan Berbagai Merek AC
            </p>
        </div>
    </div>
</section>

  <!-- GALLERY GRID -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Item 1 -->
        <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
          <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1470" alt="Service AC Indoor" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition flex items-center justify-center">
            <h3 class="text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition">Service AC Indoor</h3>
          </div>
        </div>

        <!-- Item 2 -->
        <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
          <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=1470" alt="Pembersihan Outdoor" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition flex items-center justify-center">
            <h3 class="text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition">Pembersihan Outdoor Unit</h3>
          </div>
        </div>

        <!-- Item 3 -->
        <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
          <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=1470" alt="Pengisian Freon" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition flex items-center justify-center">
            <h3 class="text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition">Pengisian Freon</h3>
          </div>
        </div>

        <!-- Item 4 -->
        <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
          <img src="https://images.unsplash.com/photo-1581093588356-8c94b1d4e9e8?q=80&w=1470" alt="Perbaikan AC" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition flex items-center justify-center">
            <h3 class="text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition">Perbaikan Kebocoran</h3>
          </div>
        </div>

        <!-- Item 5 -->
        <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
          <img src="https://images.unsplash.com/photo-1621905252474-9e1e3b8f8b8b?q=80&w=1470" alt="Instalasi AC Baru" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition flex items-center justify-center">
            <h3 class="text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition">Instalasi AC Baru</h3>
          </div>
        </div>

        <!-- Item 6 -->
        <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
          <img src="https://images.unsplash.com/photo-1594026112284-02c4712479c4?q=80&w=1470" alt="Maintenance Rutin" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition flex items-center justify-center">
            <h3 class="text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition">Maintenance Rutin</h3>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-20 bg-wa-600 text-white text-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-4xl md:text-5xl font-bold mb-6">Butuh Service AC Sekarang?</h2>
      <p class="text-xl mb-10">Konsultasi gratis + teknisi siap datang hari ini juga!</p>
      <a href="https://wa.me/6281234567890" target="_blank" 
         class="inline-block bg-white text-wa-600 font-bold py-5 px-12 rounded-full text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-xl">
        Hubungi WhatsApp Sekarang
      </a>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-gray-900 text-white py-12 text-center">
    <p class="text-lg">&copy; 2025 <span class="font-bold text-wa-500">CoolService AC</span>. 
       Service AC Profesional • Cepat • Terpercaya • Area Jabodetabek</p>
  </footer>
</body>
</html>