<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Testing Booking Payment Callback\n";
echo "================================\n\n";

// Simulate callback data for PAID status
$callbackData = [
    'id' => '67a8e4b8b2c6d8e9f0123456', // Payment ID from our test booking
    'status' => 'PAID'
];

echo "Simulating callback with data:\n";
echo json_encode($callbackData, JSON_PRETTY_PRINT) . "\n\n";

// Create a mock request
$request = new Illuminate\Http\Request();
$request->merge($callbackData);

// Create controller instance and call paymentCallback method
$controller = new App\Http\Controllers\BookingController();
$response = $controller->paymentCallback($request);

echo "Callback Response: " . $response->getContent() . "\n\n";

// Check if booking status was updated
$booking = App\Models\Booking::where('payment_id', $callbackData['id'])->first();

if ($booking) {
    echo "Booking Status After Callback:\n";
    echo "- ID: " . $booking->id . "\n";
    echo "- Payment Status: " . $booking->payment_status . "\n";
    echo "- Booking Status: " . $booking->status . "\n";
    echo "- Total Price: " . $booking->total_price . "\n";
} else {
    echo "Booking not found!\n";
}

echo "\nTesting EXPIRED status callback...\n\n";

// Test EXPIRED status
$expiredCallbackData = [
    'id' => '67a8e4b8b2c6d8e9f0123456',
    'status' => 'EXPIRED'
];

echo "Simulating EXPIRED callback with data:\n";
echo json_encode($expiredCallbackData, JSON_PRETTY_PRINT) . "\n\n";

$request2 = new Illuminate\Http\Request();
$request2->merge($expiredCallbackData);

$response2 = $controller->paymentCallback($request2);
echo "Callback Response: " . $response2->getContent() . "\n\n";

// Check booking status after EXPIRED callback
$booking2 = App\Models\Booking::where('payment_id', $expiredCallbackData['id'])->first();

if ($booking2) {
    echo "Booking Status After EXPIRED Callback:\n";
    echo "- ID: " . $booking2->id . "\n";
    echo "- Payment Status: " . $booking2->payment_status . "\n";
    echo "- Booking Status: " . $booking2->status . "\n";
}

echo "\nCallback testing completed!\n";
