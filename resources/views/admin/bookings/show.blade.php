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

                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('admin.bookings.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Back</a>
                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Edit Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>