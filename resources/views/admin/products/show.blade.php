<x-layouts.app title="Show Product">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Show Product
            </h2>
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back</a>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <strong class="block text-gray-700 dark:text-gray-300">Name:</strong>
                        <span class="text-gray-900 dark:text-white">{{ $product->name }}</span>
                    </div>
                    <div class="mb-4">
                        <strong class="block text-gray-700 dark:text-gray-300">Description:</strong>
                        <span class="text-gray-900 dark:text-white">{{ $product->description }}</span>
                    </div>
                    <div class="mb-4">
                        <strong class="block text-gray-700 dark:text-gray-300">Price:</strong>
                        <span class="text-gray-900 dark:text-white">Rp {{ number_format($product->price, 2, ',', '.') }}</span>
                    </div>
                    
                    @if($product->hasLabel())
                    <div class="mb-4">
                        <strong class="block text-gray-700 dark:text-gray-300">Label:</strong>
                        <span class="inline-block px-3 py-1 text-sm font-semibold text-white rounded-full {{ $product->getLabelColorClass() }}">
                            {{ $product->label }}
                        </span>
                    </div>
                    @endif
                    
                    @if($product->hasDiscount())
                    <div class="mb-4">
                        <strong class="block text-gray-700 dark:text-gray-300">Original Price:</strong>
                        <span class="text-gray-900 dark:text-white line-through">Rp {{ number_format($product->original_price, 2, ',', '.') }}</span>
                    </div>
                    <div class="mb-4">
                        <strong class="block text-gray-700 dark:text-gray-300">Discount:</strong>
                        <span class="text-gray-900 dark:text-white">{{ $product->discount_percentage }}%</span>
                    </div>
                    @endif
                </div>
                <div>
                    <div class="mb-4">
                        <strong class="block text-gray-700 dark:text-gray-300">Image:</strong>
                        @if($product->image)
                        <img src="/images/{{ $product->image }}" class="rounded-lg shadow-md max-w-full h-auto">
                        @else
                        <span class="text-gray-500">No Image</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
