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

                    <!-- Payment Information -->
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Payment Information</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="mb-2">
                                        <span class="font-bold">Payment Status:</span>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $productOrder->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 
                                               ($productOrder->payment_status === 'expired' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($productOrder->payment_status ?? 'N/A') }}
                                        </span>
                                    </p>
                                    <p class="mb-2"><span class="font-bold">Total Price:</span> Rp {{ number_format($productOrder->total_price ?? 0, 0, ',', '.') }}</p>
                                    @if($productOrder->payment_id)
                                    <p class="mb-2"><span class="font-bold">Payment ID:</span> <code class="text-xs bg-gray-200 px-2 py-1 rounded">{{ $productOrder->payment_id }}</code></p>
                                    @endif
                                </div>
                                
                                @if($invoiceData)
                                <div>
                                    <p class="mb-2">
                                        <span class="font-bold">Xendit Status:</span>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ in_array($invoiceData['status'], ['PAID', 'SETTLED']) ? 'bg-green-100 text-green-800' : 
                                               ($invoiceData['status'] === 'EXPIRED' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ $invoiceData['status'] }}
                                        </span>
                                    </p>
                                    @if(isset($invoiceData['paid_at']))
                                    <p class="mb-2"><span class="font-bold">Paid At:</span> {{ \Carbon\Carbon::parse($invoiceData['paid_at'])->format('d M Y, H:i') }}</p>
                                    @endif
                                    @if(isset($invoiceData['payment_method']))
                                    <p class="mb-2"><span class="font-bold">Payment Method:</span> {{ strtoupper($invoiceData['payment_method']) }}</p>
                                    @endif
                                    @if(isset($invoiceData['payment_channel']))
                                    <p class="mb-2"><span class="font-bold">Payment Channel:</span> {{ strtoupper($invoiceData['payment_channel']) }}</p>
                                    @endif
                                    @if($productOrder->payment_url)
                                    <p class="mb-2">
                                        <a href="{{ $productOrder->payment_url }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline text-sm">
                                            View Invoice →
                                        </a>
                                    </p>
                                    @endif
                                </div>
                                @else
                                    @if($productOrder->payment_id)
                                    <div>
                                        <p class="text-sm text-gray-500">Unable to fetch invoice details from Xendit.</p>
                                    </div>
                                    @else
                                    <div>
                                        <p class="text-sm text-gray-500">No payment information available.</p>
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Details (if available) -->
                    @if($invoiceData)
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Invoice Details</h3>
                        <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">External ID</p>
                                    <p class="font-medium">{{ $invoiceData['external_id'] ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Amount</p>
                                    <p class="font-medium">Rp {{ number_format($invoiceData['amount'] ?? 0, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Currency</p>
                                    <p class="font-medium">{{ $invoiceData['currency'] ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Created</p>
                                    <p class="font-medium">{{ isset($invoiceData['created']) ? \Carbon\Carbon::parse($invoiceData['created'])->format('d M Y, H:i') : '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Expiry Date</p>
                                    <p class="font-medium">{{ isset($invoiceData['expiry_date']) ? \Carbon\Carbon::parse($invoiceData['expiry_date'])->format('d M Y, H:i') : '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Description</p>
                                    <p class="font-medium text-sm">{{ $invoiceData['description'] ?? '-' }}</p>
                                </div>
                            </div>
                            
                            @if(isset($invoiceData['customer']))
                            <div class="mt-4 pt-4 border-t border-blue-200">
                                <p class="text-sm font-semibold text-gray-700 mb-2">Customer Info (from Xendit)</p>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    @if(isset($invoiceData['customer']['given_names']))
                                    <div>
                                        <p class="text-sm text-gray-600">Name</p>
                                        <p class="font-medium">{{ $invoiceData['customer']['given_names'] }}</p>
                                    </div>
                                    @endif
                                    @if(isset($invoiceData['customer']['email']))
                                    <div>
                                        <p class="text-sm text-gray-600">Email</p>
                                        <p class="font-medium">{{ $invoiceData['customer']['email'] }}</p>
                                    </div>
                                    @endif
                                    @if(isset($invoiceData['customer']['mobile_number']))
                                    <div>
                                        <p class="text-sm text-gray-600">Phone</p>
                                        <p class="font-medium">{{ $invoiceData['customer']['mobile_number'] }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
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
