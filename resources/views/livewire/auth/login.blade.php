<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mega AC Jaya</title>
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
        
        /* Page transition animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .animate-fade-in-left {
            animation: fadeInLeft 0.6s ease-out;
        }
        
        .animate-fade-in-right {
            animation: fadeInRight 0.6s ease-out;
        }
        
        .animate-scale-in {
            animation: scaleIn 0.5s ease-out;
        }
        
        .animate-delay-100 {
            animation-delay: 0.1s;
            animation-fill-mode: both;
        }
        
        .animate-delay-200 {
            animation-delay: 0.2s;
            animation-fill-mode: both;
        }
        
        .animate-delay-300 {
            animation-delay: 0.3s;
            animation-fill-mode: both;
        }
        
        /* Page exit animation */
        body.page-exit {
            animation: fadeOut 0.3s ease-out forwards;
        }
        
        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: scale(0.98);
            }
        }
        
        /* Smooth link transition */
        a {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Left Side - Form -->
        <div class="flex-1 flex items-center justify-center px-4 py-8 sm:px-6 sm:py-12 lg:px-8 animate-fade-in-left">
            <div class="max-w-md w-full space-y-6 sm:space-y-8">
                <!-- Logo -->
                <div class="text-center animate-scale-in">
                    <a href="{{ route('home') }}" class="inline-flex flex-col items-center gap-2 sm:gap-3 mb-4 sm:mb-6">
                        <img src="/images/logo.jpg" alt="Logo" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full shadow-lg">
                        <span class="font-bold text-xl sm:text-2xl text-wa-700">Mega AC Jaya</span>
                    </a>
                    <h2 class="mt-4 sm:mt-6 text-2xl sm:text-3xl font-bold text-gray-900">
                        Masuk ke Akun Anda
                    </h2>
                    <p class="mt-2 text-sm sm:text-base text-gray-600">
                        Masukkan email dan password untuk login
                    </p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('login.store') }}" class="mt-6 sm:mt-8 space-y-4 sm:space-y-6 animate-fade-in-up animate-delay-100">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm sm:text-base font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="email"
                            placeholder="email@example.com"
                            class="appearance-none block w-full px-3 py-2.5 sm:px-4 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-wa-500 focus:border-transparent transition"
                        />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm sm:text-base font-medium text-gray-700">
                                Password
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs sm:text-sm text-wa-600 hover:text-wa-700 font-medium">
                                    Lupa password?
                                </a>
                            @endif
                        </div>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                            class="appearance-none block w-full px-3 py-2.5 sm:px-4 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-wa-500 focus:border-transparent transition"
                        />
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            {{ old('remember') ? 'checked' : '' }}
                            class="h-4 w-4 text-wa-600 focus:ring-wa-500 border-gray-300 rounded"
                        />
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button
                            type="submit"
                            data-test="login-button"
                            class="w-full flex justify-center py-2.5 sm:py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm sm:text-base font-medium text-white bg-gradient-wa hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-wa-500 transition"
                        >
                            Masuk
                        </button>
                    </div>
                </form>

                <!-- Register Link -->
                @if (Route::has('register'))
                    <div class="text-center text-xs sm:text-sm text-gray-600 animate-fade-in-up animate-delay-200">
                        <span>Belum punya akun?</span>
                        <a href="{{ route('register') }}" class="font-medium text-wa-600 hover:text-wa-700 ml-1">
                            Daftar sekarang
                        </a>
                    </div>
                @endif

                <!-- Back to Home -->
                <div class="text-center">
                    <a href="{{ route('home') }}" class="text-xs sm:text-sm text-gray-500 hover:text-gray-700">
                        ← Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Side - Image/Illustration -->
        <div class="hidden lg:block lg:flex-1 bg-gradient-wa relative overflow-hidden animate-fade-in-right">
            <div class="absolute inset-0 flex items-center justify-center p-8 xl:p-12">
                <div class="text-center text-white">
                    <h1 class="text-3xl xl:text-4xl font-bold mb-4">Selamat Datang Kembali!</h1>
                    <p class="text-lg xl:text-xl text-white/90 mb-6 xl:mb-8">
                        Kelola booking dan pesanan AC Anda dengan mudah
                    </p>
                    <div class="grid grid-cols-2 gap-4 xl:gap-6 max-w-md mx-auto">
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 xl:p-6">
                            <div class="text-2xl xl:text-3xl mb-2">🛠️</div>
                            <p class="font-medium text-sm xl:text-base">Service AC</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 xl:p-6">
                            <div class="text-2xl xl:text-3xl mb-2">🛒</div>
                            <p class="font-medium text-sm xl:text-base">Beli Produk</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 xl:p-6">
                            <div class="text-2xl xl:text-3xl mb-2">📅</div>
                            <p class="font-medium text-sm xl:text-base">Booking Mudah</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 xl:p-6">
                            <div class="text-2xl xl:text-3xl mb-2">💳</div>
                            <p class="font-medium text-sm xl:text-base">Bayar Online</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Decorative circles -->
            <div class="absolute top-10 right-10 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
            <div class="absolute bottom-10 left-10 w-40 h-40 bg-white/10 rounded-full blur-xl"></div>
        </div>
    </div>

    <script>
        // Smooth page transition
        document.addEventListener('DOMContentLoaded', function() {
            // Get all links that should have smooth transition
            const links = document.querySelectorAll('a[href*="register"], a[href*="login"], a[href*="home"]');
            
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Check if it's not an external link
                    if (this.hostname === window.location.hostname) {
                        e.preventDefault();
                        const href = this.getAttribute('href');
                        
                        // Add exit animation
                        document.body.classList.add('page-exit');
                        
                        // Navigate after animation
                        setTimeout(() => {
                            window.location.href = href;
                        }, 300);
                    }
                });
            });
        });
    </script>
</body>
</html>
