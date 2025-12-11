<x-layouts.app title="Products">
    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">
                            Kelola Produk
                        </h1>
                        <p class="text-gray-600">Kelola semua produk AC Anda dalam satu tempat</p>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-gray-700 border border-gray-300 rounded-xl hover:bg-gray-50 transition-all duration-200 shadow-sm hover:shadow font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                        <a href="{{ route('admin.products.create') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-wa text-white rounded-xl hover:shadow-lg transition-all duration-200 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Produk Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Success Alert -->
            @if ($message = Session::get('success'))
            <div class="mb-6 p-4 rounded-xl border border-wa-200 bg-wa-50 shadow-sm" role="alert">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-wa-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-sm text-wa-700 flex-1 font-medium">{{ $message }}</p>
                    <button type="button" class="text-wa-600 hover:text-wa-700 transition-colors" onclick="this.parentElement.parentElement.remove()">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            @endif

            <!-- Products Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="px-6 py-5 border-b border-gray-100 bg-white">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Daftar Produk</h2>
                            <p class="text-sm text-gray-500 mt-1">Total: {{ count($products) }} produk</p>
                        </div>
                        <div class="relative">
                            <input type="text" id="search-input" placeholder="Cari produk..."
                                class="pl-11 pr-4 py-2.5 bg-white border border-gray-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-wa-500 focus:border-transparent w-full md:w-80 shadow-sm transition-all">
                            <svg class="absolute left-4 top-3 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Produk</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider hidden lg:table-cell">Deskripsi</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Gambar</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($products as $product)
                            <tr class="hover:bg-gray-50 transition-all duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-wa-100 to-wa-200 text-sm font-semibold text-wa-700">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900">{{ $product->name }}</div>
                                    <div class="text-xs text-gray-500 lg:hidden mt-1">
                                        {{ Str::limit($product->description, 40) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 hidden lg:table-cell">
                                    <div class="text-sm text-gray-600 max-w-xs">
                                        {{ Str::limit($product->description, 60) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($product->image)
                                    <img src="{{ asset('images/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="w-16 h-16 rounded-xl object-cover border-2 border-gray-200 shadow-md">
                                    @else
                                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-gray-100 to-gray-200 border-2 border-gray-300 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-wa-600">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </div>
                                    @if($product->original_price)
                                    <div class="text-xs text-gray-500 line-through mt-1">
                                        Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($product->label)
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold {{ $product->getLabelColorClass() }} text-white shadow-md">
                                        {{ $product->label }}
                                    </span>
                                    @else
                                    <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.products.show', $product->id) }}"
                                            class="p-2.5 text-wa-600 hover:bg-wa-50 rounded-lg transition-all duration-200 hover:scale-110"
                                            title="Lihat">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                            class="p-2.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-all duration-200 hover:scale-110"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2.5 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200 hover:scale-110"
                                                title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-16 text-center">
                                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-wa-100 to-wa-200 mb-4">
                                        <svg class="w-10 h-10 text-wa-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada produk</h3>
                                    <p class="text-sm text-gray-500 mb-6">Mulai dengan menambahkan produk pertama Anda untuk ditampilkan di toko.</p>
                                    <a href="{{ route('admin.products.create') }}"
                                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-wa text-white rounded-xl hover:shadow-lg transition-all duration-200 font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Tambah Produk Pertama
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Footer -->
                @if(count($products) > 0)
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="text-sm text-gray-600">
                            Menampilkan <span class="font-semibold text-gray-900">{{ count($products) }}</span> dari
                            <span class="font-semibold text-gray-900">{{ count($products) }}</span> produk
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-all disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                Sebelumnya
                            </button>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-gradient-wa rounded-lg shadow-md">
                                1
                            </button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-all disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                Selanjutnya
                            </button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const tableRows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();

                tableRows.forEach(row => {
                    const productName = row.querySelector('td:nth-child(2) div')?.textContent.toLowerCase() || '';
                    const productDescription = row.querySelector('td:nth-child(3) div')?.textContent.toLowerCase() || '';

                    if (productName.includes(searchTerm) || productDescription.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-layouts.app>
