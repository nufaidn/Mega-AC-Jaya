<x-layouts.app title="Products">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create New Product</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success!</span> {{ $message }}
        </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Image</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Label</th>
                        <th scope="col" class="px-6 py-3" width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ Str::limit($product->description, 50) }}</td>
                        <td class="px-6 py-4">
                            @if($product->image)
                            <img src="/images/{{ $product->image }}" width="100px" class="rounded">
                            @else
                            No Image
                            @endif
                        </td>
                        <td class="px-6 py-4">Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            @if($product->label)
                            <span class="px-2 py-1 text-xs font-semibold text-white rounded {{ $product->getLabelColorClass() }}">
                                {{ $product->label }}
                            </span>
                            @else
                            -
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST" class="flex gap-2">
                                <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('admin.products.show',$product->id) }}">Show</a>
                                <a class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline" href="{{ route('admin.products.edit',$product->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
