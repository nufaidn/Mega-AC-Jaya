<x-layouts.app title="Detail Produk">
    <div class="flex h-full w-full flex-1 flex-col gap-4 md:gap-6 p-3 sm:p-4 md:p-6 bg-gray-50 min-h-screen">
        
        <!-- Header Section -->
        <div class="rounded-xl md:rounded-2xl bg-gradient-to-r from-wa-600 to-wa-700 p-4 sm:p-6 md:p-8 text-white relative overflow-hidden shadow-lg">
            <div class="absolute inset-0 bg-gradient-to-br from-wa-500/20 to-transparent"></div>
            <div class="relative z-10">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 md:gap-4">
                    <div>
                        <h1 class="text-xl sm:text-2xl md:text-3xl font-bold mb-1 md:mb-2">Detail Produk 📦</h1>
                        <p class="text-white/90 text-sm sm:text-base md:text-lg">Informasi lengkap produk {{ $product->name }}</p>
                    </div>
                    <div class="flex items-center gap-2 self-start sm:self-center">
                        <span class="text-xs sm:text-sm text-white/80">Dibuat</span>
                        <span class="px-2 sm:px-3 py-1 sm:py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-xs sm:text-sm font-medium">
                            {{ $product->created_at->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="absolute -bottom-6 md:-bottom-8 -right-6 md:-right-8 w-24 sm:w-32 md:w-40 h-24 sm:h-32 md:h-40 bg-wa-500/10 rounded-full blur-xl"></div>
            <div class="absolute -top-4 md:-top-6 -left-4 md:-left-6 w-20 sm:w-24 md:w-32 h-20 sm:h-24 md:h-32 bg-white/10 rounded-full blur-xl"></div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300 font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-wa-600 to-wa-700 text-white rounded-xl hover:from-wa-700 hover:to-wa-800 transition-all duration-300 hover:shadow-lg font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Produk
            </a>
        </div>

        <!-- Product Details -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
            
            <!-- Product Image -->
            <div class="rounded-xl md:rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-lg">
                <div class="p-4 sm:p-5 md:p-6 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-gradient-to-r from-wa-500/10 to-wa-600/10">
                            <svg class="w-5 h-5 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900">Gambar Produk</h3>
                    </div>
                </div>
                <div class="p-4 sm:p-5 md:p-6">
                    @if($product->image)
                    <div class="relative group">
                        @if($product->image)
                        <!-- Product Image -->
                        <div class="w-full h-64 sm:h-80 lg:h-96 bg-gray-100 rounded-xl overflow-hidden shadow-lg">
                            <img src="{{ asset('images/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            
                            <!-- Fallback placeholder -->
                            <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center" style="display: none;">
                                <div class="text-center">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-gray-500 font-medium">Gambar Tidak Ditemukan</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $product->image }}</p>
                                </div>
                            </div>
                        </div>
                        @else
                        <!-- No image placeholder -->
                        <div class="w-full h-64 sm:h-80 lg:h-96 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-gray-500 font-medium">Tidak Ada Gambar</p>
                            </div>
                        </div>
                        @endif
                        
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 rounded-xl transition-all duration-300"></div>
                    </div>
                    @else
                    <div class="w-full h-64 sm:h-80 lg:h-96 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 sm:w-20 sm:h-20 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-gray-500 font-medium">Tidak Ada Gambar</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Product Information -->
            <div class="space-y-4 md:space-y-6">
                
                <!-- Basic Info Card -->
                <div class="rounded-xl md:rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-lg">
                    <div class="p-4 sm:p-5 md:p-6 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-gradient-to-r from-wa-500/10 to-wa-600/10">
                                <svg class="w-5 h-5 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900">Informasi Produk</h3>
                        </div>
                    </div>
                    <div class="p-4 sm:p-5 md:p-6 space-y-4">
                        <!-- Product Name -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                            <span class="text-sm font-medium text-gray-500">Nama Produk</span>
                            <span class="text-base sm:text-lg font-bold text-gray-900">{{ $product->name }}</span>
                        </div>
                        
                        <!-- Description -->
                        <div class="border-t border-gray-100 pt-4">
                            <span class="text-sm font-medium text-gray-500 block mb-2">Deskripsi</span>
                            <p class="text-gray-900 leading-relaxed">{{ $product->description }}</p>
                        </div>
                        
                        <!-- Labels -->
                        @if($product->label)
                        <div class="border-t border-gray-100 pt-4">
                            <span class="text-sm font-medium text-gray-500 block mb-2">Label</span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 border border-blue-300">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                {{ $product->label }}
                            </span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Price Card -->
                <div class="rounded-xl md:rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-lg">
                    <div class="p-4 sm:p-5 md:p-6 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-gradient-to-r from-wa-500/10 to-wa-600/10">
                                <svg class="w-5 h-5 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900">Informasi Harga</h3>
                        </div>
                    </div>
                    <div class="p-4 sm:p-5 md:p-6">
                        @if($product->original_price && $product->discount_percentage)
                        <!-- Discounted Price -->
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-500">Harga Asli</span>
                                <span class="text-lg font-semibold text-gray-500 line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-500">Diskon</span>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-red-100 to-red-200 text-red-800 border border-red-300">
                                    {{ $product->discount_percentage }}% OFF
                                </span>
                            </div>
                            <div class="border-t border-gray-100 pt-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-base font-medium text-gray-900">Harga Sekarang</span>
                                    <span class="text-2xl sm:text-3xl font-bold text-wa-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        @else
                        <!-- Regular Price -->
                        <div class="flex items-center justify-between">
                            <span class="text-base font-medium text-gray-900">Harga Produk</span>
                            <span class="text-2xl sm:text-3xl font-bold text-wa-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Metadata Card -->
                <div class="rounded-xl md:rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-lg">
                    <div class="p-4 sm:p-5 md:p-6 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-gradient-to-r from-wa-500/10 to-wa-600/10">
                                <svg class="w-5 h-5 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900">Informasi Tambahan</h3>
                        </div>
                    </div>
                    <div class="p-4 sm:p-5 md:p-6 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500">Tanggal Dibuat</span>
                            <span class="text-sm font-medium text-gray-900">{{ $product->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500">Terakhir Diupdate</span>
                            <span class="text-sm font-medium text-gray-900">{{ $product->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500">ID Produk</span>
                            <span class="text-sm font-mono font-medium text-gray-900">#{{ $product->id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
    /* WhatsApp Green Colors */
    :root {
        --wa-50: #e8fdf2;
        --wa-100: #d1fae5;
        --wa-200: #a7f3d0;
        --wa-300: #6ee7b7;
        --wa-400: #34d399;
        --wa-500: #00d95f;
        --wa-600: #00ba54;
        --wa-700: #009944;
        --wa-800: #047857;
        --wa-light: #25D366;
        --wa-dark: #128C7E;
        --wa-darker: #075E54;
    }
    
    /* Apply colors to utility classes */
    .bg-wa-50 { background-color: var(--wa-50); }
    .bg-wa-100 { background-color: var(--wa-100); }
    .bg-wa-200 { background-color: var(--wa-200); }
    .bg-wa-500 { background-color: var(--wa-500); }
    .bg-wa-600 { background-color: var(--wa-600); }
    .bg-wa-700 { background-color: var(--wa-700); }
    .bg-wa-800 { background-color: var(--wa-800); }
    .bg-wa-light { background-color: var(--wa-light); }
    .bg-wa-dark { background-color: var(--wa-dark); }
    .bg-wa-darker { background-color: var(--wa-darker); }
    
    .text-wa-500 { color: var(--wa-500); }
    .text-wa-600 { color: var(--wa-600); }
    .text-wa-700 { color: var(--wa-700); }
    .text-wa-800 { color: var(--wa-800); }
    .text-wa-light { color: var(--wa-light); }
    .text-wa-dark { color: var(--wa-dark); }
    .text-wa-darker { color: var(--wa-darker); }
    
    .border-wa-300 { border-color: var(--wa-300); }
    
    .from-wa-light { --tw-gradient-from: var(--wa-light); }
    .from-wa-dark { --tw-gradient-from: var(--wa-dark); }
    .from-wa-500 { --tw-gradient-from: var(--wa-500); }
    .from-wa-600 { --tw-gradient-from: var(--wa-600); }
    .from-wa-700 { --tw-gradient-from: var(--wa-700); }
    .to-wa-dark { --tw-gradient-to: var(--wa-dark); }
    .to-wa-darker { --tw-gradient-to: var(--wa-darker); }
    .to-wa-600 { --tw-gradient-to: var(--wa-600); }
    .to-wa-700 { --tw-gradient-to: var(--wa-700); }
    .to-wa-800 { --tw-gradient-to: var(--wa-800); }
    
    .hover\:from-wa-700:hover { --tw-gradient-from: var(--wa-700); }
    .hover\:to-wa-800:hover { --tw-gradient-to: var(--wa-800); }
    
    /* Custom animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    </style>
</x-layouts.app>
