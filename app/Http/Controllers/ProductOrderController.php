<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Auth;

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
            'delivery_date' => 'required|date',
            'delivery_time' => 'required',
            'notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);
        $totalPrice = $product->price * $request->quantity;

        ProductOrder::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'quantity' => $request->quantity,
            'delivery_date' => $request->delivery_date,
            'delivery_time' => $request->delivery_time,
            'notes' => $request->notes,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('product')->with('success', 'Pesanan berhasil dibuat!');
    }
}
