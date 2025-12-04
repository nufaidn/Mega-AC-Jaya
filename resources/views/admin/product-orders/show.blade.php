<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Order Details') }} #{{ $productOrder->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Customer Information</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="mb-2"><span class="font-bold">Name:</span> {{ $productOrder->full_name }}</p>
                                <p class="mb-2"><span class="font-bold">Phone:</span> {{ $productOrder->phone_number }}</p>
                                <p class="mb-2"><span class="font-bold">Address:</span> {{ $productOrder->address }}</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Product Details</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex gap-3 mb-3">
                                    @if($productOrder->product->image)
                                        <img src="{{ asset('images/' . $productOrder->product->image) }}" alt="{{ $productOrder->product->name }}" class="w-20 h-20 object-cover rounded-lg">
                                    @else
                                        <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-bold text-lg">{{ $productOrder->product->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $productOrder->product->description }}</p>
                                    </div>
                                </div>
                                <p class="mb-2"><span class="font-bold">Unit Price:</span> Rp {{ number_format($productOrder->product->price, 0, ',', '.') }}</p>
                                <p class="mb-2"><span class="font-bold">Quantity:</span> {{ $productOrder->quantity }} unit</p>
                                <p class="mb-2"><span class="font-bold">Total Price:</span> <span class="text-lg font-bold text-green-600">Rp {{ number_format($productOrder->total_price, 0, ',', '.') }}</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Order Information</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="mb-2">
                                <span class="font-bold">Status:</span>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $productOrder->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                       ($productOrder->status === 'cancelled' ? 'bg-red-100 text-red-800' : 
                                       ($productOrder->status === 'confirmed' ? 'bg-blue-100 text-blue-800' :
                                       ($productOrder->status === 'processing' ? 'bg-purple-100 text-purple-800' : 'bg-yellow-100 text-yellow-800'))) }}">
                                    {{ ucfirst($productOrder->status) }}
                                </span>
                            </p>
                            <p class="mb-2"><span class="font-bold">Order Date:</span> {{ $productOrder->created_at->format('d F Y H:i') }}</p>
                            <p class="mb-2"><span class="font-bold">Last Updated:</span> {{ $productOrder->updated_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>

                    @if($productOrder->notes)
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Notes</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p>{{ $productOrder->notes }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('admin.product-orders.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Back</a>
                        <a href="{{ route('admin.product-orders.edit', $productOrder->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Edit Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
