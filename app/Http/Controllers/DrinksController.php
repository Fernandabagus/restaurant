<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drinks;

class DrinksController extends Controller
{
    public function index()
    {
        $drinks = Drinks::all();
        return view('drinks.index', ['drinks' => $drinks]);
    }

    public function create()
    {
        return view('drinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'drink_name' => 'required|string|max:255',
            'drink_price' => 'required|integer|min:3',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folderPath = 'drinks/' . date('Y') . '/' . date('m');
            $imagePath = $image->store($folderPath, 'public');
            $validatedData['image'] = 'storage/' . $imagePath;
        }

        $drinks = new Drinks([
            'name' => $validatedData['drink_name'],
            'price' => $validatedData['drink_price'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? null,
        ]);

        $drinks->save();

        return redirect(route('daftarDrinks'))->with('success', 'Drink added successfully!');
    }

    public function show($id)
    {
        $drink = Drinks::findOrFail($id);
        return view('drink.show', ['drink' => $drink]);
    }

    public function edit($id)
    {
        $drinks = Drinks::findOrFail($id);
        return view('drinks.edit', ['drink' => $drinks]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'drink_name' => 'required|string|max:255',
            'drink_price' => 'required|integer|min:3',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $drinks = Drinks::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folderPath = 'drinks/' . date('Y') . '/' . date('m');
            $imagePath = $image->store($folderPath, 'public');
            $validatedData['image'] = 'storage/' . $imagePath;
        }

        $drinks->name = $validatedData['drink_name'];
        $drinks->price = $validatedData['drink_price'];
        $drinks->description = $validatedData['description'];
        $drinks->image = $validatedData['image'] ?? $drinks->image;

        $drinks->save();

        return redirect(route('daftarDrinks'))->with('success', 'Drink updated successfully!');
    }

    public function destroy($id)
    {
        $drink = Drinks::findOrFail($id);
        if ($drink->image && file_exists(public_path($drink->image))) {
            unlink(public_path($drink->image));
        }
        $drink->delete();

        return redirect(route('daftarDrinks'))->with('success', 'Drink deleted successfully!');
    }

    public function trash()
    {
        $drinks = Drinks::onlyTrashed()->get();
        return view('drinks.trash', compact('drinks'));
    }

    
    public function restore()
    {
                
            $drinks = Foods::onlyTrashed();
            $drinks->restore();
     
            return redirect('/drink/trash');
    }

public function deleted1($id)
{
    	// hapus permanen data guru
    	$drink = Drinks::onlyTrashed();
        // dd($food);
    	$drink->forceDelete();
 
    	return redirect('/drink/trash');
}
}