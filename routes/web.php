<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\BookingController;
use App\Models\Service;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\Admin\ProductOrderController as AdminProductOrderController;

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
Route::get('product', function () {
    $products = \App\Models\Product::all();
    return view('pages.product', compact('products'));
})->name('product');
Route::view('contact', 'pages.contact')->name('contact');




Route::get('dashboard', function () {
    if (Auth::check() && Auth::user()->usertype == 'admin') {
        $data = [];
        $data['totalServices'] = \App\Models\Service::count();
        $data['totalGalleries'] = \App\Models\Gallery::count();
        $data['totalProducts'] = \App\Models\Product::count();
        $data['totalBookings'] = \App\Models\Booking::count();
        $data['products'] = \App\Models\Product::latest()->take(6)->get(); // Get latest 6 products
        return view('dashboard', $data);
    } else {
        // User dashboard data
        $user = Auth::user();
        $data = [];
        $data['totalBookings'] = \App\Models\Booking::where('user_id', $user->id)->count();
        $data['totalOrders'] = \App\Models\ProductOrder::where('user_id', $user->id)->count();
        $data['pendingOrders'] = \App\Models\ProductOrder::where('user_id', $user->id)->where('status', 'pending')->count();
        $data['completedOrders'] = \App\Models\ProductOrder::where('user_id', $user->id)->where('status', 'completed')->count();
        $data['recentOrders'] = \App\Models\ProductOrder::with('product')->where('user_id', $user->id)->latest()->take(5)->get();
        return view('user.dashboard', $data);
    }
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('services', ServiceController::class);
    Route::resource('products', ProductController::class);
    Route::resource('bookings', BookingController::class)->except(['create', 'store']);
    Route::patch('bookings/{id}/verify-payment', [BookingController::class, 'verifyPayment'])->name('bookings.verify-payment');
    Route::get('galleries', \App\Livewire\Admin\GalleryManager::class)->name('galleries.index');
    Route::get('galleries/create', \App\Livewire\Admin\GalleryManager::class)->name('galleries.create');
    Route::resource('product-orders', \App\Http\Controllers\Admin\ProductOrderController::class)->except(['create', 'store']);
    Route::resource('product-orders', AdminProductOrderController::class);
    Route::redirect('settings', '/settings/profile')->name('settings');
});

Route::middleware(['auth'])->group(function () {
    Route::get('bookings', [BookingController::class, 'userIndex'])->name('bookings.index');
    Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::post('bookings/callback', [BookingController::class, 'paymentCallback'])->name('bookings.callback');
    Route::post('bookings/{id}/generate-payment', [BookingController::class, 'generatePayment'])->name('bookings.generate-payment');
    Route::post('bookings/{id}/check-payment', [BookingController::class, 'checkPaymentStatus'])->name('bookings.check-payment');
    Route::get('product-orders', [ProductOrderController::class, 'userIndex'])->name('product-orders.index');
    Route::get('product-orders/create', [ProductOrderController::class, 'create'])->name('product-orders.create');
    Route::post('product-orders', [ProductOrderController::class, 'store'])->name('product-orders.store');
    Route::post('product-orders/callback', [ProductOrderController::class, 'paymentCallback'])->name('product-orders.callback');
    Route::post('product-orders/{id}/generate-payment', [ProductOrderController::class, 'generatePayment'])->name('product-orders.generate-payment');
    Route::post('product-orders/{id}/check-payment', [ProductOrderController::class, 'checkPaymentStatus'])->name('product-orders.check-payment');

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
