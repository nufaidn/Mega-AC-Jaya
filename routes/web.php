<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\BookingController;
use App\Models\Service;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('about', 'pages.about')->name('about');
Route::get('gallery', function () {
    $galleries = \App\Models\Gallery::latest()->get();
    return view('pages.gallery', compact('galleries'));
})->name('gallery');
Route::get('service', function () {
    $services = Service::all();
    return view('pages.service', compact('services'));
})->name('service');
Route::get('product', [ProductController::class, 'index'])->name('product');
Route::view('contact', 'pages.contact')->name('contact');




Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::get('product-orders/create', [ProductOrderController::class, 'create'])->name('product-orders.create');
Route::post('product-orders', [ProductOrderController::class, 'store'])->name('product-orders.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('services', ServiceController::class);
    Route::resource('products', AdminProductController::class);
    Route::resource('bookings', BookingController::class)->except(['create', 'store']);
    Route::get('galleries', \App\Livewire\Admin\GalleryManager::class)->name('galleries.index');
    Route::resource('product-orders', \App\Http\Controllers\Admin\ProductOrderController::class)->except(['create', 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
