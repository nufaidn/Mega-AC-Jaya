<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product Order') }} #{{ $productOrder->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.product-orders.update', $productOrder->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="full_name" class="block font-medium text-sm text-gray-700">Full Name</label>
                                <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $productOrder->full_name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @error('full_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="phone_number" class="block font-medium text-sm text-gray-700">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $productOrder->phone_number) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="address" class="block font-medium text-sm text-gray-700">Address</label>
                                <textarea name="address" id="address" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('address', $productOrder->address) }}</textarea>
                                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-medium text-gray-900 mb-2">Product Information</h3>
                                <div class="flex gap-3">
                                    @if($productOrder->product->image)
                                        <img src="{{ asset('images/' . $productOrder->product->image) }}" alt="{{ $productOrder->product->name }}" class="w-16 h-16 object-cover rounded-lg">
                                    @endif
                                    <div>
                                        <p class="font-bold">{{ $productOrder->product->name }}</p>
                                        <p class="text-sm text-gray-600">Rp {{ number_format($productOrder->product->price, 0, ',', '.') }} per unit</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="quantity" class="block font-medium text-sm text-gray-700">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $productOrder->quantity) }}" min="1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="total_price" class="block font-medium text-sm text-gray-700">Total Price</label>
                                <input type="number" name="total_price" id="total_price" value="{{ old('total_price', $productOrder->total_price) }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @error('total_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="delivery_date" class="block font-medium text-sm text-gray-700">Delivery Date</label>
                                <input type="date" name="delivery_date" id="delivery_date" value="{{ old('delivery_date', $productOrder->delivery_date->format('Y-m-d')) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @error('delivery_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="delivery_time" class="block font-medium text-sm text-gray-700">Delivery Time</label>
                                <input type="time" name="delivery_time" id="delivery_time" value="{{ old('delivery_time', $productOrder->delivery_time) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @error('delivery_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="pending" {{ $productOrder->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $productOrder->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="processing" {{ $productOrder->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $productOrder->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $productOrder->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="notes" class="block font-medium text-sm text-gray-700">Notes</label>
                                <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('notes', $productOrder->notes) }}</textarea>
                                @error('notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-4">
                            <a href="{{ route('admin.product-orders.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Cancel</a>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
