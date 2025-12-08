<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Checking Bookings Table Columns\n";
echo "===============================\n\n";

try {
    // Check if payment_id column exists
    $columns = \Illuminate\Support\Facades\Schema::getColumnListing('bookings');
    echo "Current columns in bookings table:\n";
    foreach ($columns as $column) {
        echo "- $column\n";
    }
    echo "\n";

    // Check for payment columns
    $paymentColumns = ['payment_id', 'payment_status', 'payment_url', 'total_price'];
    $missingColumns = [];

    foreach ($paymentColumns as $col) {
        if (!in_array($col, $columns)) {
            $missingColumns[] = $col;
        }
    }

    if (empty($missingColumns)) {
        echo "✅ All payment columns exist!\n";
    } else {
        echo "❌ Missing payment columns: " . implode(', ', $missingColumns) . "\n";
    }

    // Try to create a test booking to see if it works
    echo "\nTesting booking creation with payment fields...\n";

    $booking = new App\Models\Booking();
    $fillable = $booking->getFillable();
    echo "Booking fillable fields: " . implode(', ', $fillable) . "\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
