<?php

namespace App\Helpers;

use App\Models\Booking;
use App\Models\ProductOrder;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Illuminate\Support\Facades\Log;

class PaymentHelper
{
    /**
     * Auto-check payment status untuk semua pending payments user
     */
    public static function autoCheckUserPayments($userId)
    {
        try {
            Configuration::setXenditKey(config('services.xendit.secret_key'));
            $invoiceApi = new InvoiceApi();

            // Check pending bookings
            $pendingBookings = Booking::where('user_id', $userId)
                ->where('payment_status', 'pending')
                ->whereNotNull('payment_id')
                ->get();

            Log::info("Auto-checking {$pendingBookings->count()} pending bookings for user {$userId}");

            foreach ($pendingBookings as $booking) {
                try {
                    $invoice = $invoiceApi->getInvoiceById($booking->payment_id);
                    
                    Log::info("Booking {$booking->id} - Xendit status: {$invoice['status']}");
                    
                    if ($invoice['status'] == 'PAID') {
                        $booking->update([
                            'payment_status' => 'paid',
                            'status' => 'completed',
                        ]);
                        Log::info("Booking {$booking->id} updated to PAID");
                    } elseif ($invoice['status'] == 'EXPIRED') {
                        $booking->update([
                            'payment_status' => 'expired',
                            'status' => 'cancelled',
                        ]);
                        Log::info("Booking {$booking->id} updated to EXPIRED");
                    }
                } catch (\Exception $e) {
                    Log::error("Error checking booking {$booking->id}: " . $e->getMessage());
                    continue;
                }
            }

            // Check pending product orders
            $pendingOrders = ProductOrder::where('user_id', $userId)
                ->where('payment_status', 'pending')
                ->whereNotNull('payment_id')
                ->get();

            Log::info("Auto-checking {$pendingOrders->count()} pending orders for user {$userId}");

            foreach ($pendingOrders as $order) {
                try {
                    $invoice = $invoiceApi->getInvoiceById($order->payment_id);
                    
                    Log::info("Order {$order->id} - Xendit status: {$invoice['status']}");
                    
                    if ($invoice['status'] == 'PAID') {
                        $order->update([
                            'payment_status' => 'paid',
                            'status' => 'completed',
                        ]);
                        Log::info("Order {$order->id} updated to PAID");
                    } elseif ($invoice['status'] == 'EXPIRED') {
                        $order->update([
                            'payment_status' => 'expired',
                            'status' => 'cancelled',
                        ]);
                        Log::info("Order {$order->id} updated to EXPIRED");
                    }
                } catch (\Exception $e) {
                    Log::error("Error checking order {$order->id}: " . $e->getMessage());
                    continue;
                }
            }
        } catch (\Exception $e) {
            Log::error("Error in autoCheckUserPayments: " . $e->getMessage());
        }
    }
}
