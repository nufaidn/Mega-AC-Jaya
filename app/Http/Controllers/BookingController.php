<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Display a listing of the user's bookings.
     */
    public function userIndex()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $services = Service::all();
        $selectedService = $request->query('service');
        return view('bookings.create', compact('services', 'selectedService'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable|string',
        ]);

        // Get service price
        $service = Service::where('name', $request->service)->first();
        if (!$service) {
            return redirect()->back()->with('error', 'Service tidak ditemukan.');
        }

        $totalPrice = $service->price;
        $user = Auth::user();

        // Create Xendit invoice
        Configuration::setXenditKey(config('services.xendit.secret_key'));

        $invoiceApi = new InvoiceApi();
        $create_invoice_request = [
            'external_id' => 'booking-' . time() . '-' . $user->id,
            'amount' => $totalPrice,
            'description' => 'Booking ' . $service->name . ' pada ' . $request->date . ' ' . $request->time,
            'invoice_duration' => 86400, // 24 hours
            'currency' => 'IDR',
            'customer' => [
                'given_names' => $request->full_name,
                'email' => $user->email,
                'mobile_number' => $request->phone_number,
            ],
            'success_redirect_url' => route('bookings.index'),
            'failure_redirect_url' => route('bookings.index'),
        ];

        try {
            $invoice = $invoiceApi->createInvoice($create_invoice_request);

            Booking::create([
                'user_id' => $user->id,
                'service' => $request->service,
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'date' => $request->date,
                'time' => $request->time,
                'notes' => $request->notes,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'payment_id' => $invoice['id'],
                'payment_status' => 'pending',
                'payment_url' => $invoice['invoice_url'],
            ]);

            return redirect($invoice['invoice_url']);
        } catch (\Exception $e) {
            return redirect()->route('service')->with('error', 'Gagal membuat booking. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $invoiceData = null;
        
        // Fetch invoice data from Xendit if payment_id exists
        if ($booking->payment_id) {
            try {
                Configuration::setXenditKey(config('services.xendit.secret_key'));
                $invoiceApi = new InvoiceApi();
                $invoiceData = $invoiceApi->getInvoiceById($booking->payment_id);
            } catch (\Exception $e) {
                // If error fetching invoice, just set to null
                $invoiceData = null;
            }
        }
        
        return view('admin.bookings.show', compact('booking', 'invoiceData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }

    /**
     * Delete all bookings (Admin only)
     */
    public function deleteAll()
    {
        try {
            $count = Booking::count();
            Booking::truncate();
            return redirect()->route('admin.bookings.index')->with('success', "Successfully deleted {$count} booking(s).");
        } catch (\Exception $e) {
            return redirect()->route('admin.bookings.index')->with('error', 'Failed to delete bookings: ' . $e->getMessage());
        }
    }

    /**
     * Verify payment status (Admin only)
     */
    public function verifyPayment($id)
    {
        $booking = Booking::findOrFail($id);

        // Check if booking has payment_id
        if (!$booking->payment_id) {
            return redirect()->route('admin.bookings.index')->with('error', 'Booking ini belum memiliki payment ID.');
        }

        try {
            Configuration::setXenditKey(config('services.xendit.secret_key'));
            $invoiceApi = new InvoiceApi();
            
            // Get invoice from Xendit
            $invoice = $invoiceApi->getInvoiceById($booking->payment_id);
            
            // Update booking based on invoice status
            if ($invoice['status'] == 'PAID') {
                $booking->update([
                    'payment_status' => 'paid',
                    'status' => 'completed',
                ]);
                return redirect()->route('admin.bookings.index')->with('success', 'Payment verified! Booking status updated to completed.');
            } elseif ($invoice['status'] == 'EXPIRED') {
                $booking->update([
                    'payment_status' => 'expired',
                    'status' => 'cancelled',
                ]);
                return redirect()->route('admin.bookings.index')->with('info', 'Invoice expired. Booking status updated to cancelled.');
            } else {
                return redirect()->route('admin.bookings.index')->with('info', 'Payment still pending. Status: ' . $invoice['status']);
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.bookings.index')->with('error', 'Failed to verify payment: ' . $e->getMessage());
        }
    }

    /**
     * Check payment status from Xendit
     */
    public function checkPaymentStatus($id)
    {
        $booking = Booking::findOrFail($id);
        
        // Check if user owns this booking
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Check if booking has payment_id
        if (!$booking->payment_id) {
            return redirect()->back()->with('error', 'Booking ini belum memiliki payment ID.');
        }

        try {
            Configuration::setXenditKey(config('services.xendit.secret_key'));
            $invoiceApi = new InvoiceApi();
            
            // Get invoice from Xendit
            $invoice = $invoiceApi->getInvoiceById($booking->payment_id);
            
            // Update booking based on invoice status
            if ($invoice['status'] == 'PAID') {
                $booking->update([
                    'payment_status' => 'paid',
                    'status' => 'completed',
                ]);
                return redirect()->back()->with('success', 'Pembayaran berhasil! Status booking telah diupdate.');
            } elseif ($invoice['status'] == 'EXPIRED') {
                $booking->update([
                    'payment_status' => 'expired',
                    'status' => 'cancelled',
                ]);
                return redirect()->back()->with('info', 'Invoice sudah expired. Silakan buat pembayaran baru.');
            } else {
                return redirect()->back()->with('info', 'Pembayaran masih pending. Status: ' . $invoice['status']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengecek status pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Generate payment URL for existing booking
     */
    public function generatePayment($id)
    {
        $booking = Booking::findOrFail($id);
        
        // Check if user owns this booking
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Check if booking already has payment URL
        if ($booking->payment_url && $booking->payment_status === 'pending') {
            return redirect()->back()->with('info', 'Booking ini sudah memiliki link pembayaran.');
        }

        // Get service price
        $service = Service::where('name', $booking->service)->first();
        if (!$service) {
            return redirect()->back()->with('error', 'Service tidak ditemukan.');
        }

        $totalPrice = $service->price;
        $user = Auth::user();

        // Create Xendit invoice
        Configuration::setXenditKey(config('services.xendit.secret_key'));

        $invoiceApi = new InvoiceApi();
        $create_invoice_request = [
            'external_id' => 'booking-' . $booking->id . '-' . time(),
            'amount' => $totalPrice,
            'description' => 'Booking ' . $booking->service . ' pada ' . $booking->date . ' ' . $booking->time,
            'invoice_duration' => 86400, // 24 hours
            'currency' => 'IDR',
            'customer' => [
                'given_names' => $booking->full_name,
                'email' => $user->email,
                'mobile_number' => $booking->phone_number,
            ],
            'success_redirect_url' => route('bookings.index'),
            'failure_redirect_url' => route('bookings.index'),
        ];

        try {
            $invoice = $invoiceApi->createInvoice($create_invoice_request);

            $booking->update([
                'payment_id' => $invoice['id'],
                'payment_status' => 'pending',
                'payment_url' => $invoice['invoice_url'],
                'total_price' => $totalPrice,
            ]);

            return redirect($invoice['invoice_url']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal membuat link pembayaran. Silakan coba lagi.');
        }
    }

    /**
     * Handle Xendit payment callback
     */
    public function paymentCallback(Request $request)
    {
        $data = $request->all();

        // Verify the callback is from Xendit (you should implement proper verification)
        if (isset($data['id']) && isset($data['status'])) {
            $booking = Booking::where('payment_id', $data['id'])->first();

            if ($booking) {
                if ($data['status'] == 'PAID') {
                    $booking->update([
                        'payment_status' => 'paid',
                        'status' => 'completed', // Update booking status to completed
                    ]);
                } elseif ($data['status'] == 'EXPIRED') {
                    $booking->update([
                        'payment_status' => 'expired',
                        'status' => 'cancelled',
                    ]);
                }
            }
        }

        return response()->json(['status' => 'ok']);
    }
}
