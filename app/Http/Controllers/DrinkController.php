<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    public function index()
    {
        $drinks = Drink::all();
        return view('drinks.index', compact('drinks'));
    }

    public function create()
    {
        return view('drinks.create');
    }

    public function store(Request $request)
    {
        Drink::create($request->all());

        return redirect()->route('drinks.index');
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
        $drink = Drink::findOrFail($id);

        $drink->update($request->all());

        return redirect()->route('drinks.index');
    }

    public function destroy($id)
    {
        $drink = Drink::findOrFail($id);

        $drink->delete();

        return redirect()->route('drinks.index');
    }
}
