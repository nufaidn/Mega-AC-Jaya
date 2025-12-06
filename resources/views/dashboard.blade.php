<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 md:p-6">
        <!-- Stats Cards Section -->
        <div class="hidden md:grid auto-rows-min gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @isset($totalServices)
            <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-blue-300 dark:hover:border-blue-700 hover:bg-gradient-to-br hover:from-white hover:to-blue-50 dark:hover:from-neutral-800 dark:hover:to-blue-900/20">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-blue-100 dark:bg-blue-900/30 group-hover:bg-blue-200 dark:group-hover:bg-blue-800/40 transition-colors">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300">Services</span>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-neutral-400 mb-1">Total Services</h3>
                    <p class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $totalServices }}</p>
                    <div class="mt-2 h-1 w-16 bg-gradient-to-r from-blue-500 to-blue-300 rounded-full"></div>
                </div>
                <a href="{{ route('admin.services.index') }}" class="flex items-center justify-between text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors group/link">
                    <span>Lihat Services</span>
                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @else
            <div class="relative aspect-square sm:aspect-video overflow-hidden rounded-2xl border-2 border-dashed border-neutral-300 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800/50 flex items-center justify-center">
                <div class="text-center p-6">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 dark:bg-neutral-700 mb-3">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-neutral-400">Add Services Data</p>
                </div>
            </div>
            @endisset

            @isset($totalGalleries)
            <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-green-300 dark:hover:border-green-700 hover:bg-gradient-to-br hover:from-white hover:to-green-50 dark:hover:from-neutral-800 dark:hover:to-green-900/20">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-green-100 dark:bg-green-900/30 group-hover:bg-green-200 dark:group-hover:bg-green-800/40 transition-colors">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300">Galleries</span>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-neutral-400 mb-1">Total Galleries</h3>
                    <p class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $totalGalleries }}</p>
                    <div class="mt-2 h-1 w-16 bg-gradient-to-r from-green-500 to-green-300 rounded-full"></div>
                </div>
                <a href="{{ route('admin.galleries.index') }}" class="flex items-center justify-between text-sm font-medium text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300 transition-colors group/link">
                    <span>Lihat Galleries</span>
                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @else
            <div class="relative aspect-square sm:aspect-video overflow-hidden rounded-2xl border-2 border-dashed border-neutral-300 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800/50 flex items-center justify-center">
                <div class="text-center p-6">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 dark:bg-neutral-700 mb-3">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-neutral-400">Add Galleries Data</p>
                </div>
            </div>
            @endisset

            @isset($totalProducts)
            <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5 md:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-purple-300 dark:hover:border-purple-700 hover:bg-gradient-to-br hover:from-white hover:to-purple-50 dark:hover:from-neutral-800 dark:hover:to-purple-900/20">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-purple-100 dark:bg-purple-900/30 group-hover:bg-purple-200 dark:group-hover:bg-purple-800/40 transition-colors">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-purple-100 dark:bg-purple-900/40 text-purple-700 dark:text-purple-300">Products</span>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-neutral-400 mb-1">Total Products</h3>
                    <p class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $totalProducts }}</p>
                    <div class="mt-2 h-1 w-16 bg-gradient-to-r from-purple-500 to-purple-300 rounded-full"></div>
                </div>
                <a href="{{ route('admin.products.index') }}" class="flex items-center justify-between text-sm font-medium text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300 transition-colors group/link">
                    <span>Lihat Products</span>
                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @else
            <div class="relative aspect-square sm:aspect-video overflow-hidden rounded-2xl border-2 border-dashed border-neutral-300 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800/50 flex items-center justify-center">
                <div class="text-center p-6">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 dark:bg-neutral-700 mb-3">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-neutral-400">Add Products Data</p>
                </div>
            </div>
            @endisset
        </div>

        <!-- Latest Products Section -->
        @isset($products)
        <div class="rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 overflow-hidden transition-all duration-300 hover:shadow-lg">
            <div class="p-5 md:p-6 border-b border-neutral-100 dark:border-neutral-700">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Our Products</h3>
                        <p class="text-sm text-gray-500 dark:text-neutral-400 mt-1">Recently added and updated products</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('admin.products.create') }}" class="px-4 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg flex items-center gap-2 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            New Product
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="px-4 py-2.5 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-300 hover:shadow-lg flex items-center gap-2 font-medium">
                            View All
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-5 md:p-6">
                @if($products->isEmpty())
                <div class="text-center py-10 md:py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No products yet</h4>
                    <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">Start by adding your first product to showcase in your store.</p>
                    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Your First Product
                    </a>
                </div>
                @else
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6">
                    @foreach($products as $product)
                    <div class="group relative bg-white dark:bg-neutral-800 rounded-xl border border-neutral-200 dark:border-neutral-700 overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                        <div class="relative overflow-hidden aspect-square">
                            @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900">
                                <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            @endif
                            @if($product->label)
                            <div class="absolute top-3 right-3 {{ $product->getLabelColorClass() }} text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                {{ $product->label }}
                            </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-3 left-3 right-3 flex justify-between items-center transform translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('admin.products.show', $product->id) }}" class="px-4 py-2 bg-white dark:bg-neutral-900 text-gray-800 dark:text-white rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800 transition-colors font-medium text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Details
                                </a>
                            </div>
                        </div>
                        <div class="p-4 md:p-5">
                            <h4 class="text-sm md:text-base font-bold text-gray-900 dark:text-white mb-2 line-clamp-1">{{ $product->name }}</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-xs mb-4 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>
                            <div class="flex items-center justify-between pt-4 border-t border-neutral-100 dark:border-neutral-700">
                                <div>
                                    @if($product->original_price)
                                    <p class="text-[10px] text-gray-500 dark:text-gray-400 line-through mb-1">Rp {{ number_format($product->original_price, 0, ',', '.') }}</p>
                                    @endif
                                    <p class="text-sm md:text-base font-bold text-green-600 dark:text-green-400">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        @endisset

        <!-- Empty Space for Future Content -->
        <div class="relative h-32 md:h-48 overflow-hidden rounded-2xl border-2 border-dashed border-neutral-300 dark:border-neutral-700 bg-gradient-to-br from-neutral-50 to-white dark:from-neutral-900/50 dark:to-neutral-800/50 flex flex-col items-center justify-center p-6">
            <svg class="w-12 h-12 text-neutral-400 dark:text-neutral-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <p class="text-sm text-neutral-500 dark:text-neutral-400 text-center">Additional content area<br>Ready for your next dashboard component</p>
        </div>
    </div>
</x-layouts.app>