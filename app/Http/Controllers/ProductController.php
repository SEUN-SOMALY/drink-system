<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalStock = Product::sum('stock');
        $lowStock = Product::where('stock', '<=', 10)->count();

        return view('dashboard', compact('totalProducts', 'totalStock', 'lowStock'));
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::where('name', 'LIKE', "%$search%")
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    // ✅ STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'nullable',
            'image' => 'nullable|url',
        ]);

        Product::create($request->only([
            'name',
            'description',
            'price',
            'stock',
            'category',
            'image'
        ]));

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    // ✅ UPDATE (FIXED)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'nullable',
            'image' => 'nullable|url',
        ]);

        $product = Product::findOrFail($id); // 🔥 FIX MISSING VARIABLE

        $product->update($request->only([
            'name',
            'description',
            'price',
            'stock',
            'category',
            'image'
        ]));

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
