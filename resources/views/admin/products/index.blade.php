<x-layouts.app title="Products">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 md:p-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white leading-tight">
                    {{ __('Manage Products') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage all your products in one place</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2 px-4 py-3 bg-gradient-to-r from-gray-600 to-gray-700 text-white rounded-xl hover:from-gray-700 hover:to-gray-800 transition-all duration-300 hover:shadow-lg font-medium group">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Dashboard
                </a>
                <a href="{{ route('admin.products.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg font-medium group">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Create New Product
                </a>
            </div>
        </div>

        <!-- Success Alert -->
        @if ($message = Session::get('success'))
        <div class="mb-6 p-4 rounded-xl border border-green-200 dark:border-green-800 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 shadow-sm" role="alert">
            <div class="flex items-center gap-3">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/40 flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-green-800 dark:text-green-300">Success!</h3>
                    <p class="text-sm text-green-700 dark:text-green-400 mt-1">{{ $message }}</p>
                </div>
                <button type="button" class="text-green-500 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300" onclick="this.parentElement.parentElement.remove()">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        @endif

        <!-- Products Table -->
        <div class="bg-white dark:bg-neutral-800 rounded-2xl border border-neutral-200 dark:border-neutral-700 shadow-sm overflow-hidden">
            <!-- Table Header -->
            <div class="p-4 md:p-6 border-b border-neutral-100 dark:border-neutral-700">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Product List</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Total Product: {{ count($products) }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <input type="text" placeholder="Search products..."
                                class="pl-10 pr-4 py-2 bg-gray-50 dark:bg-neutral-700 border border-gray-300 dark:border-neutral-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full sm:w-64">
                            <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-neutral-700/50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <span>#</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <span>Product</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider hidden md:table-cell">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        @foreach ($products as $product)
                        <tr class="hover:bg-gray-50 dark:hover:bg-neutral-700/50 transition-colors duration-200">
                            <!-- No -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $loop->iteration }}</span>
                                </div>
                            </td>

                            <!-- Name -->
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-900 dark:text-white">{{ $product->name }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400 md:hidden mt-1">
                                    {{ Str::limit($product->description, 30) }}
                                </div>
                            </td>

                            <!-- Description (Hidden on mobile) -->
                            <td class="px-6 py-4 hidden md:table-cell">
                                <div class="text-sm text-gray-600 dark:text-gray-300 max-w-xs truncate">{{ $product->description }}</div>
                            </td>

                            <!-- Image -->
                            <td class="px-6 py-4">
                                @if($product->image)
                                <div class="relative group">
                                    <img src="{{ asset('images/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="w-16 h-16 rounded-lg object-cover border border-gray-200 dark:border-neutral-600 shadow-sm group-hover:scale-105 transition-transform duration-200">
                                </div>
                                @else
                                <div class="w-16 h-16 rounded-lg bg-gray-100 dark:bg-neutral-700 border border-dashed border-gray-300 dark:border-neutral-600 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                @endif
                            </td>

                            <!-- Price -->
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-green-600 dark:text-green-400">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                                @if($product->original_price)
                                <div class="text-xs text-gray-500 dark:text-gray-400 line-through">
                                    Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                </div>
                                @endif
                            </td>

                            <!-- Label -->
                            <td class="px-6 py-4">
                                @if($product->label)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $product->getLabelColorClass() }} text-white shadow-sm">
                                    {{ $product->label }}
                                </span>
                                @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-neutral-700 text-gray-600 dark:text-gray-300">
                                    No Label
                                </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <!-- Show Action -->
                                    <a href="{{ route('admin.products.show',$product->id) }}"
                                        class="p-2 text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors duration-200 group relative"
                                        title="View Details">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">
                                            View
                                        </span>
                                    </a>

                                    <!-- Edit Action -->
                                    <a href="{{ route('admin.products.edit',$product->id) }}"
                                        class="p-2 text-yellow-600 dark:text-yellow-400 hover:text-yellow-800 dark:hover:text-yellow-300 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 rounded-lg transition-colors duration-200 group relative"
                                        title="Edit Product">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">
                                            Edit
                                        </span>
                                    </a>

                                    <!-- Delete Action -->
                                    <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.')"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors duration-200 group relative"
                                            title="Delete Product">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">
                                                Delete
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            @if(count($products) === 0)
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 dark:bg-neutral-700 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No products found</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">Start by adding your first product to showcase in your store.</p>
                <a href="{{ route('admin.products.create') }}"
                    class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Create Your First Product
                </a>
            </div>
            @endif

            <!-- Table Footer -->
            @if(count($products) > 0)
            <div class="px-6 py-4 border-t border-gray-200 dark:border-neutral-700 bg-gray-50 dark:bg-neutral-700/30">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        Showing <span class="font-semibold text-gray-700 dark:text-gray-300">1</span> to
                        <span class="font-semibold text-gray-700 dark:text-gray-300">{{ count($products) }}</span> of
                        <span class="font-semibold text-gray-700 dark:text-gray-300">{{ count($products) }}</span> products
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-neutral-700 border border-gray-300 dark:border-neutral-600 rounded-lg hover:bg-gray-50 dark:hover:bg-neutral-600 transition-colors">
                            Previous
                        </button>
                        <button class="px-3 py-1.5 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                            1
                        </button>
                        <button class="px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-neutral-700 border border-gray-300 dark:border-neutral-600 rounded-lg hover:bg-gray-50 dark:hover:bg-neutral-600 transition-colors">
                            Next
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-layouts.app>