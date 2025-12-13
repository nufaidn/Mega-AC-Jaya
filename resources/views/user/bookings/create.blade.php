@php
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Service - MEGA AC JAYA</title>
    <meta name="description" content="Booking layanan service AC profesional.">
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
        
        /* Custom radio button styling */
        input[type="radio"]:checked + div .radio-indicator {
            border-color: #00ba54;
            background-color: #00ba54;
        }
        
        input[type="radio"]:checked + div .radio-dot {
            opacity: 1;
        }
        
        input[type="radio"]:checked + div {
            border-color: #00ba54;
            background-color: #e8fdf2;
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
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">About</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Galeri</a>
                    <a href="{{ route('service') }}" class="text-wa-700 font-semibold transition">Layanan</a>
                    <a href="{{ route('product') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Produk</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-wa-600 font-medium transition">Kontak</a>
                </nav>

                <!-- Login & Register -->
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="hidden md:inline-block px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="hidden md:inline-block px-6 py-2 border border-wa-600 text-wa-600 rounded-lg font-medium hover:bg-wa-50 transition">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hidden md:inline-block px-6 py-2 bg-gradient-wa text-white rounded-lg font-medium hover:shadow-lg transition">Register</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Book a Service</h2>

                    <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="service" class="block font-medium text-sm text-gray-700 mb-3">{{ __('Pilih Service') }}</label>
                            
                            @if($selectedService)
                                <!-- Jika service sudah dipilih dari dashboard -->
                                <div class="bg-wa-50 border border-wa-100 rounded-lg p-4 mb-4">
                                    <p class="text-sm text-gray-600 mb-1">Service yang dipilih:</p>
                                    <h3 class="text-lg font-bold text-wa-700">{{ $selectedService }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">Ingin ganti service? Pilih dari daftar di bawah.</p>
                                </div>
                            @endif

                            <!-- Daftar Service -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @forelse($services as $service)
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="service" value="{{ $service->name }}" 
                                           class="sr-only peer" 
                                           {{ ($selectedService == $service->name || old('service') == $service->name) ? 'checked' : '' }}
                                           required>
                                    <div class="border-2 border-gray-200 rounded-lg p-4 peer-checked:border-wa-600 peer-checked:bg-wa-50 hover:border-wa-300 transition-all">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-900 mb-1">{{ $service->name }}</h4>
                                                <p class="text-sm text-gray-600 mb-2">{{ Str::limit($service->description, 80) }}</p>
                                                <p class="text-lg font-bold text-wa-600">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                                            </div>
                                            <div class="ml-3">
                                                <div class="w-5 h-5 border-2 border-gray-300 rounded-full radio-indicator flex items-center justify-center">
                                                    <div class="w-2 h-2 bg-white rounded-full opacity-0 radio-dot"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                                @empty
                                <div class="col-span-full text-center py-8">
                                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-gray-500">Belum ada service tersedia</p>
                                </div>
                                @endforelse
                            </div>
                            
                            @error('service')
                            <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="full_name" class="block font-medium text-sm text-gray-700">{{ __('Full Name') }}</label>
                            <input id="full_name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="full_name" value="{{ old('full_name') }}" required autofocus />
                            @error('full_name')
                            <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone_number" class="block font-medium text-sm text-gray-700">{{ __('Phone Number') }}</label>
                            <input id="phone_number" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="phone_number" value="{{ old('phone_number') }}" required />
                            @error('phone_number')
                            <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block font-medium text-sm text-gray-700">{{ __('Address') }}</label>
                            <textarea id="address" name="address" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" required>{{ old('address') }}</textarea>
                            @error('address')
                            <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="date" class="block font-medium text-sm text-gray-700">{{ __('Preferred Date') }}</label>
                                <input id="date" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="date" name="date" value="{{ old('date') }}" required />
                                @error('date')
                                <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="time" class="block font-medium text-sm text-gray-700">{{ __('Preferred Time') }}</label>
                                <select id="time" name="time" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="">-- Pilih Jam --</option>
                                    @foreach (range(8, 17) as $hour)
                                    @php $time = sprintf('%02d:00', $hour); @endphp
                                    <option value="{{ $time }}" {{ old('time') == $time ? 'selected' : '' }}>{{ $time }}</option>
                                    @endforeach
                                </select>
                                @error('time')
                                <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="notes" class="block font-medium text-sm text-gray-700">{{ __('Notes (Optional)') }}</label>
                            <textarea id="notes" name="notes" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('notes') }}</textarea>
                            @error('notes')
                            <p class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('dashboard') }}">Back</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-wa-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-wa-700 focus:bg-wa-700 active:bg-wa-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                                {{ __('Book Now') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <p>&copy; 2025 CoolService AC. Semua hak cipta dilindungi.</p>
        </div>
    </footer>
</body>

</html>