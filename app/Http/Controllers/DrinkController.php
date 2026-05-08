<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    public function dashboard()
    {
        $totalDrinks = Drink::count();
        $totalStock = Drink::sum('stock');
        $lowStock = Drink::where('stock', '<=', 10)->count();

        return view('dashboard', compact('totalDrinks', 'totalStock', 'lowStock'));
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $drinks = Drink::where('name', 'LIKE', "%$search%")
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('drinks.index', compact('drinks'));
    }

    public function create()
    {
        return view('drinks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Drink::create($request->only(['name','price','stock']));

        return redirect()->route('drinks.index')
            ->with('success', 'Drink created successfully!');
    }

    public function show($id)
    {
        $drink = Drink::findOrFail($id);

        return view('drinks.show', compact('drink'));
    }

    public function edit($id)
    {
        $drink = Drink::findOrFail($id);

        return view('drinks.edit', compact('drink'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $drink = Drink::findOrFail($id);
        $drink->update($request->only(['name','price','stock']));

        return redirect()->route('drinks.index')
            ->with('success', 'Drink updated successfully!');
    }

    public function destroy($id)
    {
        Drink::findOrFail($id)->delete();

        return redirect()->route('drinks.index')
            ->with('success', 'Drink deleted successfully!');
    }
}
