<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Support\Facades\Auth;

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Testing Complete Booking Payment Flow\n";
echo "=====================================\n\n";

// Step 1: Create a test booking with payment
echo "Step 1: Creating booking with payment...\n";

$service = App\Models\Service::first(); // Get first service
$user = App\Models\User::first(); // Get first user

if (!$service || !$user) {
    echo "❌ No service or user found. Please seed the database first.\n";
    exit(1);
}

echo "Using Service: {$service->name} (Price: {$service->price})\n";
echo "Using User: {$user->email}\n\n";

// Simulate authenticated user
Auth::login($user);

// Create booking data
$bookingData = [
    'service' => $service->name,
    'full_name' => 'Test User',
    'phone_number' => '081234567890',
    'address' => 'Test Address',
    'date' => now()->addDays(1)->format('Y-m-d'),
    'time' => '10:00',
    'notes' => 'Test booking for payment integration',
];

$request = new Illuminate\Http\Request();
$request->merge($bookingData);

// Create controller and call store method
$controller = new App\Http\Controllers\BookingController();

try {
    $response = $controller->store($request);
    echo "✅ Booking created successfully!\n\n";
} catch (\Exception $e) {
    echo "❌ Failed to create booking: " . $e->getMessage() . "\n";
    exit(1);
}

// Step 2: Check the created booking
echo "Step 2: Checking created booking...\n";
$booking = App\Models\Booking::latest()->first();

if ($booking) {
    echo "Booking Details:\n";
    echo "- ID: {$booking->id}\n";
    echo "- Payment ID: {$booking->payment_id}\n";
    echo "- Payment Status: {$booking->payment_status}\n";
    echo "- Payment URL: {$booking->payment_url}\n";
    echo "- Total Price: {$booking->total_price}\n\n";
} else {
    echo "❌ No booking found!\n";
    exit(1);
}

// Step 3: Test payment callback
echo "Step 3: Testing payment callback...\n";

$callbackData = [
    'id' => $booking->payment_id,
    'status' => 'PAID'
];

echo "Simulating callback with data:\n";
echo json_encode($callbackData, JSON_PRETTY_PRINT) . "\n\n";

$callbackRequest = new Illuminate\Http\Request();
$callbackRequest->merge($callbackData);

$callbackResponse = $controller->paymentCallback($callbackRequest);
echo "Callback Response: " . $callbackResponse->getContent() . "\n\n";

// Step 4: Check updated booking status
echo "Step 4: Checking updated booking status...\n";
$updatedBooking = App\Models\Booking::find($booking->id);

if ($updatedBooking) {
    echo "Updated Booking Status:\n";
    echo "- Payment Status: {$updatedBooking->payment_status}\n";
    echo "- Booking Status: {$updatedBooking->status}\n\n";
}

echo "🎉 Complete payment flow test finished!\n";
