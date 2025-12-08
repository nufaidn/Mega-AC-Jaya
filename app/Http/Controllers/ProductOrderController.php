<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Auth;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;

class ProductOrderController extends Controller
{
    public function create(Request $request)
    {
        $productId = $request->query('product_id');
        $selectedProduct = Product::find($productId);
        
        if (!$selectedProduct) {
            return redirect()->route('product')->with('error', 'Produk tidak ditemukan.');
        }
        
        return view('product-orders.create', compact('selectedProduct'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);
        $totalPrice = $product->price * $request->quantity;

        // Create Xendit invoice
        Configuration::setXenditKey(config('services.xendit.secret_key'));

        $invoiceApi = new InvoiceApi();
        $create_invoice_request = [
            'external_id' => 'order-' . time() . '-' . Auth::id(),
            'amount' => $totalPrice,
            'description' => 'Pembelian ' . $product->name . ' (Qty: ' . $request->quantity . ')',
            'invoice_duration' => 86400, // 24 hours
            'currency' => 'IDR',
            'customer' => [
                'given_names' => $request->full_name,
                'email' => Auth::user()->email,
                'mobile_number' => $request->phone_number,
            ],
            'success_redirect_url' => route('product-orders.index'),
            'failure_redirect_url' => route('product-orders.index'),
        ];

        try {
            $invoice = $invoiceApi->createInvoice($create_invoice_request);

            ProductOrder::create([
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'quantity' => $request->quantity,
                'notes' => $request->notes,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'payment_id' => $invoice['id'],
                'payment_status' => 'pending',
                'payment_url' => $invoice['invoice_url'],
            ]);

            return redirect()->route('product-orders.index')->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran.');
        } catch (\Exception $e) {
            return redirect()->route('product')->with('error', 'Gagal membuat pesanan. Silakan coba lagi.');
        }
    }

    /**
     * Display a listing of the user's product orders.
     */
    public function userIndex()
    {
        $productOrders = ProductOrder::where('user_id', Auth::id())->get();
        return view('product-orders.index', compact('productOrders'));
    }

    /**
     * Check payment status from Xendit
     */
    public function checkPaymentStatus($id)
    {
        $order = ProductOrder::findOrFail($id);
        
        // Check if user owns this order
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Check if order has payment_id
        if (!$order->payment_id) {
            return redirect()->back()->with('error', 'Order ini belum memiliki payment ID.');
        }

        try {
            Configuration::setXenditKey(config('services.xendit.secret_key'));
            $invoiceApi = new InvoiceApi();
            
            // Get invoice from Xendit
            $invoice = $invoiceApi->getInvoiceById($order->payment_id);
            
            // Update order based on invoice status
            if ($invoice['status'] == 'PAID') {
                $order->update([
                    'payment_status' => 'paid',
                    'status' => 'completed',
                ]);
                return redirect()->back()->with('success', 'Pembayaran berhasil! Status order telah diupdate.');
            } elseif ($invoice['status'] == 'EXPIRED') {
                $order->update([
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
     * Generate payment URL for existing order
     */
    public function generatePayment($id)
    {
        $order = ProductOrder::findOrFail($id);
        
        // Check if user owns this order
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Check if order already has payment URL
        if ($order->payment_url && $order->payment_status === 'pending') {
            return redirect()->back()->with('info', 'Pesanan ini sudah memiliki link pembayaran.');
        }

        $product = Product::findOrFail($order->product_id);
        $totalPrice = $product->price * $order->quantity;
        $user = Auth::user();

        // Create Xendit invoice
        Configuration::setXenditKey(config('services.xendit.secret_key'));

        $invoiceApi = new InvoiceApi();
        $create_invoice_request = [
            'external_id' => 'order-' . $order->id . '-' . time(),
            'amount' => $totalPrice,
            'description' => 'Pembelian ' . $product->name . ' (Qty: ' . $order->quantity . ')',
            'invoice_duration' => 86400, // 24 hours
            'currency' => 'IDR',
            'customer' => [
                'given_names' => $order->full_name,
                'email' => $user->email,
                'mobile_number' => $order->phone_number,
            ],
            'success_redirect_url' => route('product-orders.index'),
            'failure_redirect_url' => route('product-orders.index'),
        ];

        try {
            $invoice = $invoiceApi->createInvoice($create_invoice_request);

            $order->update([
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
            $order = ProductOrder::where('payment_id', $data['id'])->first();

            if ($order) {
                if ($data['status'] == 'PAID') {
                    $order->update([
                        'payment_status' => 'paid',
                        'status' => 'completed', // Update order status to completed
                    ]);
                } elseif ($data['status'] == 'EXPIRED') {
                    $order->update([
                        'payment_status' => 'expired',
                        'status' => 'cancelled',
                    ]);
                }
            }
        }

        return response()->json(['status' => 'ok']);
    }
}
