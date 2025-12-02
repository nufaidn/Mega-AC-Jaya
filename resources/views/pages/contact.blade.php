<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact - CoolService AC</title>
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
    body { font-family: 'Inter', sans-serif; }
    .bg-gradient-wa {
      background: linear-gradient(135deg, #00d95f 0%, #00ba54 100%);
    }
    .hero-bg {
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%2300d95f" fill-opacity="0.08" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
      background-size: cover;
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
                <button class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

  <!-- Hero Section -->
  <section class="bg-gradient-to-br from-wa-500 to-wa-700 text-white h-screen flex items-center justify-center">
    <div class="max-w-5xl mx-auto px-6 text-center">
      <h1 class="text-4xl md:text-6xl font-bold mb-6">Hubungi Kami</h1>
      <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
        Siap melayani kebutuhan service AC Anda. Hubungi kami untuk konsultasi gratis
      </p>
    </div>
  </section>

  <!-- Contact Form & Info -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12">
      <!-- Contact Form -->
      <div>
        <h2 class="text-3xl font-bold mb-8">Kirim Pesan</h2>
        <form class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-wa-500 focus:border-wa-500" placeholder="Masukkan nama lengkap">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-wa-500 focus:border-wa-500" placeholder="Masukkan email">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
            <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-wa-500 focus:border-wa-500" placeholder="Masukkan nomor telepon">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
            <textarea rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-wa-500 focus:border-wa-500" placeholder="Tulis pesan Anda"></textarea>
          </div>
          <button type="submit" class="w-full bg-wa-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-wa-700 transition">
            Kirim Pesan
          </button>
        </form>
      </div>

      <!-- Contact Info -->
      <div>
        <h2 class="text-3xl font-bold mb-8">Informasi Kontak</h2>
        <div class="space-y-6">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-wa-100 rounded-lg flex items-center justify-center flex-shrink-0">
              <svg class="w-6 h-6 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg">Telepon</h3>
              <p class="text-gray-600">+62 812-3456-7890</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-wa-100 rounded-lg flex items-center justify-center flex-shrink-0">
              <svg class="w-6 h-6 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg">Email</h3>
              <p class="text-gray-600">info@coolservice-ac.com</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-wa-100 rounded-lg flex items-center justify-center flex-shrink-0">
              <svg class="w-6 h-6 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg">Alamat</h3>
              <p class="text-gray-600">Jl. Sudirman No. 123<br>Jakarta Pusat, DKI Jakarta 10230</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-wa-100 rounded-lg flex items-center justify-center flex-shrink-0">
              <svg class="w-6 h-6 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg">Jam Operasional</h3>
              <p class="text-gray-600">08:00–20:00 WIB<br>Monday–Sunday</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-20 bg-wa-600 text-white text-center">
    <div class="max-w-4xl mx-auto px-6">
      <h2 class="text-3xl md:text-4xl font-bold mb-6">Butuh Service AC Segera?</h2>
      <p class="text-xl mb-8">Hubungi kami via WhatsApp untuk response cepat</p>
      <a href="https://wa.me/6281234567890" target="_blank" class="inline-block bg-white text-wa-600 font-bold py-4 px-10 rounded-full hover:bg-gray-100 transition">
        Hubungi WhatsApp
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
