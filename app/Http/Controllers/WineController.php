<?php

namespace App\Http\Controllers;

use App\Models\Wine;
use Illuminate\Http\Request;

class WineController extends Controller
{
    public function index()
    {
        $wines = Wine::all();
        return view('wines.index', compact('wines'));
    }

    public function create()
    {
        return view('wines.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|min:5|max:100',
            'age'=> 'required|integer|min:1'
        ]);

        Wine::create($request->all());

        return redirect()->route('wines.index');
    }
    
    public function show(string $id)
    {
        //
    }
    
    public function edit(string $id)
    {
        $wine = Wine::findOrFail($id);
        return view('wines.edit', compact('wine'));
    }
    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=> 'required|string|min:5|max:100',
            'age'=> 'required|integer|min:1'
        ]);

        $wine = Wine::findOrFail($id);

        $wine->update($request->all());

        return redirect()->route('wines.index');
    }

    public function destroy(string $id)
    {
        $wine = Wine::findOrFail($id);
        $wine->delete();
        return redirect()->route('wines.index');
    }
}
