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
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%2300d95f" fill-opacity="0.08" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') repeat-x 0 bottom;
      animation: wave-flow 7s linear infinite;
    }

    @keyframes wave-flow {
      0% {
        background-position-x: 0;
      }

      100% {
        background-position-x: 1440px;
      }
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
            <img src="/images/logo.jpg" alt="Logo" class="w-12 h-12 rounded-full">
            <span class="font-bold text-xl text-wa-700">Mega AC Jaya</span>
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
        @forelse($galleries as $gallery)
        <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
          <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition flex items-center justify-center">
            <h3 class="text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition px-4 text-center">{{ $gallery->title }}</h3>
          </div>
        </div>
        @empty
        <div class="col-span-full text-center py-10">
          <p class="text-gray-500 text-lg">Belum ada foto di galeri.</p>
        </div>
        @endforelse
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