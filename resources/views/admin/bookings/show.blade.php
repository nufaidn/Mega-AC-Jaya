<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Details') }} #{{ $booking->id }}
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
                                <p class="mb-2"><span class="font-bold">Name:</span> {{ $booking->full_name }}</p>
                                <p class="mb-2"><span class="font-bold">Phone:</span> {{ $booking->phone_number }}</p>
                                <p class="mb-2"><span class="font-bold">Address:</span> {{ $booking->address }}</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Service Details</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="mb-2"><span class="font-bold">Service:</span> {{ $booking->service }}</p>
                                <p class="mb-2"><span class="font-bold">Date:</span> {{ $booking->date }}</p>
                                <p class="mb-2"><span class="font-bold">Time:</span> {{ $booking->time }}</p>
                                <p class="mb-2">
                                    <span class="font-bold">Status:</span>
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $booking->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                           ($booking->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    @if($booking->notes)
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Notes</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p>{{ $booking->notes }}</p>
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
                                            {{ $booking->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 
                                               ($booking->payment_status === 'expired' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($booking->payment_status ?? 'N/A') }}
                                        </span>
                                    </p>
                                    <p class="mb-2"><span class="font-bold">Total Price:</span> Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</p>
                                    @if($booking->payment_id)
                                    <p class="mb-2"><span class="font-bold">Payment ID:</span> <code class="text-xs bg-gray-200 px-2 py-1 rounded">{{ $booking->payment_id }}</code></p>
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
                                    @if($booking->payment_url)
                                    <p class="mb-2">
                                        <a href="{{ $booking->payment_url }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline text-sm">
                                            View Invoice →
                                        </a>
                                    </p>
                                    @endif
                                </div>
                                @else
                                    @if($booking->payment_id)
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
                        <a href="{{ route('admin.bookings.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Back</a>
                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Edit Booking</a>
                        @if($booking->payment_id && $booking->payment_status === 'pending')
                        <form action="{{ route('admin.bookings.verify-payment', $booking->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                                Verify Payment
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>