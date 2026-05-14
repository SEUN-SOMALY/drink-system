<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $orders = Order::with('product')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('customer_name', 'like', "%$search%")
                      ->orWhereHas('product', function ($p) use ($search) {
                          $p->where('name', 'like', "%$search%");
                      });
                });
            })
            ->latest()
            ->get();

        $products = Product::all();
        return view('orders.index', compact('orders', 'products'));
    }

    public function store(Request $request)
    {
        // ✅ VALIDATION
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        Order::create([
            'customer_name' => $request->customer_name,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Order created successfully');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all();

        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, $id)
    {
        // ✅ VALIDATION
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($id);
        $product = Product::findOrFail($request->product_id);

        $order->update([
            'customer_name' => $request->customer_name,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Order deleted successfully');
    }
}
