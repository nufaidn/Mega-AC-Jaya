<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductOrder;

class ProductOrderController extends Controller
{
    public function index()
    {
        $productOrders = ProductOrder::with('product')->orderBy('id', 'asc')->get();
        return view('admin.product-orders.index', compact('productOrders'));
    }

    public function show(string $id)
    {
        $productOrder = ProductOrder::with('product')->findOrFail($id);
        return view('admin.product-orders.show', compact('productOrder'));
    }

    public function edit(string $id)
    {
        $productOrder = ProductOrder::with('product')->findOrFail($id);
        return view('admin.product-orders.edit', compact('productOrder'));
    }

    public function update(Request $request, string $id)
    {
        $productOrder = ProductOrder::findOrFail($id);
        $productOrder->update($request->all());
        return redirect()->route('admin.product-orders.index')->with('success', 'Product order updated successfully.');
    }

    public function destroy(string $id)
    {
        $productOrder = ProductOrder::findOrFail($id);
        $productOrder->delete();
        return redirect()->route('admin.product-orders.index')->with('success', 'Product order deleted successfully.');
    }
}
