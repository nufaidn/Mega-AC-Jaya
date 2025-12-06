<div>
<div class="p-4 md:p-6 bg-gradient-to-br from-wa-light/5 to-wa-dark/5 dark:from-neutral-900/50 dark:to-neutral-900 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8 md:mb-10">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 rounded-xl bg-gradient-to-r from-wa-light to-wa-dark">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Gallery Management</h2>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 ml-12">Upload and manage your gallery photos</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-gray-600 to-gray-700 text-white rounded-xl hover:from-gray-700 hover:to-gray-800 transition-all duration-300 hover:shadow-lg font-medium group">
                        <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Dashboard
                    </a>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if (session()->has('message'))
        <div class="mb-8 p-4 rounded-xl border border-wa-light/20 dark:border-wa-dark/30 bg-gradient-to-r from-wa-light/5 to-wa-dark/5 shadow-sm" role="alert">
            <div class="flex items-center gap-3">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-wa-light/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-wa-dark dark:text-wa-light">{{ session('message') }}</p>
                </div>
                <button type="button" class="text-wa-dark/70 hover:text-wa-dark dark:text-wa-light/70 dark:hover:text-wa-light" onclick="this.parentElement.parentElement.remove()">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        @endif

        <!-- Upload Form Card -->
        <div class="bg-white dark:bg-neutral-800 rounded-2xl border border-gray-200 dark:border-neutral-700 shadow-lg p-6 mb-8 md:mb-10 backdrop-blur-sm bg-white/95 dark:bg-neutral-800/95">
            <div class="flex items-center gap-3 mb-6">
                <div class="p-2 rounded-xl bg-gradient-to-r from-wa-light to-wa-dark">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-900 dark:text-white">Upload New Photo</h3>
            </div>

            <form wire:submit.prevent="save" class="space-y-6">
                <!-- Title Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Photo Title <span class="text-gray-400 dark:text-gray-500 text-sm font-normal">(Optional)</span>
                    </label>
                    <div class="relative">
                        <input type="text" wire:model="title" 
                               class="block w-full px-4 py-3 bg-white dark:bg-neutral-900 border border-gray-300 dark:border-neutral-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-light focus:border-transparent transition-all duration-200 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 hover:border-wa-light/50 dark:hover:border-wa-dark/50"
                               placeholder="Enter a title for your photo">
                        <div class="absolute right-3 top-3">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                    </div>
                    @error('title') 
                    <div class="mt-2 flex items-center gap-1 text-sm text-red-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <!-- File Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Select Photo
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 dark:border-neutral-600 rounded-xl hover:border-wa-light dark:hover:border-wa-dark transition-all duration-200 group cursor-pointer">
                        <div class="space-y-1 text-center">
                            <div class="mx-auto h-12 w-12 text-gray-400 group-hover:text-wa-light transition-colors">
                                <svg class="w-full h-full" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                <label for="file-upload" class="relative cursor-pointer rounded-md font-medium text-wa-dark dark:text-wa-light hover:text-wa-dark/80 dark:hover:text-wa-light/80 focus-within:outline-none">
                                    <span>Upload a file</span>
                                    <input id="file-upload" type="file" wire:model="photo" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                    @error('photo') 
                    <div class="mt-2 flex items-center gap-1 text-sm text-red-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <!-- Upload Progress -->
                <div wire:loading wire:target="photo" class="space-y-2">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600 dark:text-gray-400">Uploading...</span>
                        <span class="font-medium text-wa-dark dark:text-wa-light">0%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-neutral-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-wa-light to-wa-dark h-2 rounded-full animate-pulse" style="width: 45%"></div>
                    </div>
                </div>

                <!-- Preview Section -->
                @if ($photo)
                <div class="rounded-xl border border-gray-200 dark:border-neutral-700 overflow-hidden bg-gradient-to-br from-wa-light/5 to-wa-dark/5 dark:from-wa-dark/10 dark:to-wa-dark/5 p-4">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Preview
                    </p>
                    <div class="relative rounded-lg overflow-hidden border border-wa-light/20 dark:border-wa-dark/30">
                        <img src="{{ $photo->temporaryUrl() }}" 
                             class="w-full h-48 md:h-56 object-cover rounded-lg transition-transform duration-300 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-wa-dark/10 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>
                @endif

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" 
                            class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-wa-light to-wa-dark text-white font-medium rounded-xl hover:from-wa-light/90 hover:to-wa-dark/90 transition-all duration-300 hover:shadow-lg shadow-wa-dark/20 hover:shadow-wa-dark/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-wa-light disabled:opacity-50 disabled:cursor-not-allowed group/btn"
                            wire:loading.attr="disabled" 
                            wire:target="photo, save">
                        <svg class="w-4 h-4 group-hover/btn:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" wire:loading.remove wire:target="save">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24" wire:loading wire:target="save">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span wire:loading.remove wire:target="save">Save Photo</span>
                        <span wire:loading wire:target="save">Saving...</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Gallery Grid Section -->
        <div class="mb-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-gradient-to-r from-wa-light/10 to-wa-dark/10">
                            <svg class="w-5 h-5 text-wa-dark dark:text-wa-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-semibold text-gray-900 dark:text-white">Gallery Photos</h3>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 ml-12">{{ count($galleries) }} photos in gallery</p>
                </div>
                <div class="flex items-center gap-3">
                    <button class="p-2 text-gray-400 hover:text-wa-dark dark:hover:text-wa-light hover:bg-wa-light/10 dark:hover:bg-wa-dark/20 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                    </button>
                    <button class="p-2 text-gray-400 hover:text-wa-dark dark:hover:text-wa-light hover:bg-wa-light/10 dark:hover:bg-wa-dark/20 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>
                </div>
            </div>

            @if(count($galleries) === 0)
            <div class="text-center py-12 md:py-16 rounded-2xl border-2 border-dashed border-wa-light/30 dark:border-wa-dark/40 bg-gradient-to-br from-wa-light/5 to-wa-dark/5 dark:from-wa-dark/10 dark:to-wa-dark/5">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-wa-light/10 to-wa-dark/10 mb-4">
                    <svg class="w-8 h-8 text-wa-dark/50 dark:text-wa-light/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No photos yet</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">Upload your first photo to start building your gallery</p>
                <div class="w-48 h-1 mx-auto bg-gradient-to-r from-transparent via-wa-light to-transparent dark:via-wa-dark rounded-full"></div>
            </div>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach($galleries as $gallery)
                <div class="group relative bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 hover:border-wa-light/30 dark:hover:border-wa-dark/30">
                    <!-- Image -->
                    <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-wa-light/10 to-wa-dark/10 dark:from-wa-dark/20 dark:to-wa-dark/10">
                        <img src="{{ Storage::url($gallery->image_path) }}" 
                             alt="{{ $gallery->title }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-wa-dark/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Actions -->
                        <div class="absolute top-3 right-3 transform translate-x-2 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300 flex gap-2">
                            <button wire:click="confirmGalleryDeletion({{ $gallery->id }})" 
                                    class="p-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-lg group/btn"
                                    title="Delete Photo">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover/btn:opacity-100 transition-opacity duration-200 whitespace-nowrap">
                                    Delete
                                </span>
                            </button>
                        </div>
                        
                        <!-- Title Overlay -->
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-wa-dark/60 to-transparent transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            <h4 class="text-sm font-semibold text-white truncate">{{ $gallery->title ?: 'Untitled' }}</h4>
                        </div>
                    </div>
                    
                    <!-- Info -->
                    <div class="p-3 md:p-4">
                        <h4 class="text-sm font-medium text-gray-900 dark:text-white truncate mb-1">{{ $gallery->title ?: 'Untitled Photo' }}</h4>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $gallery->created_at->format('M d, Y') }}
                            </span>
                            <span class="text-xs px-2 py-1 rounded-full bg-wa-light/10 dark:bg-wa-dark/20 text-wa-dark dark:text-wa-light">
                                {{ $loop->iteration }} of {{ count($galleries) }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Delete Confirmation Modal -->
        @if($confirmingGalleryDeletion)
        <div class="fixed inset-0 z-[9999] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Overlay -->
                <div class="fixed inset-0 bg-gradient-to-br from-wa-dark/20 to-wa-light/10 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>
                
                <!-- Modal -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                
                <div class="inline-block align-bottom bg-white dark:bg-neutral-800 rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full relative z-10">
                    <div class="absolute top-4 right-4">
                        <button wire:click="$set('confirmingGalleryDeletion', false)" 
                                class="p-2 text-gray-400 hover:text-wa-dark dark:hover:text-wa-light hover:bg-wa-light/10 dark:hover:bg-wa-dark/20 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    
                    <div class="p-6 sm:p-8">
                        <div class="flex flex-col items-center text-center">
                            <!-- Warning Icon -->
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-full bg-red-100 dark:bg-red-900/30 mb-4">
                                <svg class="h-8 w-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            
                            <!-- Content -->
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2" id="modal-title">
                                Delete Photo
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-6">
                                Are you sure you want to delete this photo? This action cannot be undone.
                            </p>
                            
                            <!-- Actions -->
                            <div class="flex flex-col sm:flex-row gap-3 w-full">
                                <button wire:click="$set('confirmingGalleryDeletion', false)" 
                                        type="button"
                                        class="flex-1 px-6 py-3 border border-gray-300 dark:border-neutral-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-wa-light/5 dark:hover:bg-wa-dark/10 transition-colors duration-200 hover:border-wa-light/30 dark:hover:border-wa-dark/30">
                                    Cancel
                                </button>
                                <button wire:click="deleteGallery" 
                                        type="button"
                                        class="flex-1 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white font-medium rounded-xl hover:from-red-700 hover:to-red-800 transition-all duration-300 hover:shadow-lg shadow-red-500/20 hover:shadow-red-600/30">
                                    Delete Photo
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <style>
/* WhatsApp Green Colors (P3 color space for better saturation) */
:root {
    --wa-light: #25D366; /* WhatsApp green light */
    --wa-dark: #128C7E;  /* WhatsApp green dark */
    --wa-darker: #075E54; /* WhatsApp green darker */
}

.dark {
    --wa-light: #25D366;
    --wa-dark: #128C7E;
    --wa-darker: #075E54;
}

/* Apply colors to existing utility classes */
.bg-wa-light { background-color: var(--wa-light); }
.bg-wa-dark { background-color: var(--wa-dark); }
.bg-wa-darker { background-color: var(--wa-darker); }

.text-wa-light { color: var(--wa-light); }
.text-wa-dark { color: var(--wa-dark); }
.text-wa-darker { color: var(--wa-darker); }

.border-wa-light { border-color: var(--wa-light); }
.border-wa-dark { border-color: var(--wa-dark); }
.border-wa-darker { border-color: var(--wa-darker); }

.from-wa-light { --tw-gradient-from: var(--wa-light); }
.to-wa-dark { --tw-gradient-to: var(--wa-dark); }

.hover\:from-wa-light:hover { --tw-gradient-from: var(--wa-light); }
.hover\:to-wa-dark:hover { --tw-gradient-to: var(--wa-dark); }
</style>