<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $orders = Order::latest()->get();

        return view('orders.index', compact('products', 'orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'customer_name' => 'required' // ✅ ADD THIS
        ]);

        $product = Product::findOrFail($request->product_id);

        $total = $product->price * $request->quantity;

        Order::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_price' => $total,
            'customer_name' => $request->customer_name // ✅ ADD THIS
        ]);

        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}
