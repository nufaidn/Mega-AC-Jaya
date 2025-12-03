<x-layouts.app title="Create Product">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Create New Product
            </h2>
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back</a>
        </div>

        @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Whoops!</span> There were some problems with your input.<br><br>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
            @csrf

            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product Name" required>
            </div>

            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="height:150px" name="description" id="description" placeholder="Detail Description" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price:</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Price" required step="0.01">
            </div>

            <div class="mb-5">
                <label for="label" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Label (Optional):</label>
                <select name="label" id="label" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">-- Select Label --</option>
                    <option value="Promo" {{ old('label') == 'Promo' ? 'selected' : '' }}>Promo</option>
                    <option value="Best Seller" {{ old('label') == 'Best Seller' ? 'selected' : '' }}>Best Seller</option>
                    <option value="Flash Sale" {{ old('label') == 'Flash Sale' ? 'selected' : '' }}>Flash Sale</option>
                    <option value="New Arrival" {{ old('label') == 'New Arrival' ? 'selected' : '' }}>New Arrival</option>
                </select>
            </div>

            <div id="discount-fields" class="hidden">
                <div class="mb-5">
                    <label for="original_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Original Price:</label>
                    <input type="number" name="original_price" id="original_price" value="{{ old('original_price') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Original Price" step="0.01">
                </div>

                <div class="mb-5">
                    <label for="discount_percentage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount Percentage (%):</label>
                    <input type="number" name="discount_percentage" id="discount_percentage" value="{{ old('discount_percentage') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Discount Percentage" min="0" max="100">
                </div>
            </div>

            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image:</label>
                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const labelSelect = document.getElementById('label');
            const discountFields = document.getElementById('discount-fields');
            const discountLabels = ['Promo', 'Flash Sale'];

            function toggleDiscountFields() {
                const selectedLabel = labelSelect.value;
                if (discountLabels.includes(selectedLabel)) {
                    discountFields.classList.remove('hidden');
                } else {
                    discountFields.classList.add('hidden');
                }
            }

            // Check on page load (for old input after validation errors)
            toggleDiscountFields();

            // Listen for changes
            labelSelect.addEventListener('change', toggleDiscountFields);
        });
    </script>
</x-layouts.app>
