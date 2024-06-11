<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drinks;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

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
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
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
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? null,
        ]);

        $drinks->save();
        // FacadesAlert::success('Berhasil', 'Drink added successfully!');
        return redirect(route('daftarDrinks'));
    }

    public function show($id)
    {
        $drinks = Drinks::findOrFail($id);
        return view('drinks.show', ['drink' => $drinks]);
    }

    public function edit($id)
    {
       
        $drinks = Drinks::findOrFail($id);
        return view('drinks.edit', ['drink' => $drinks]);

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:3',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $drinks = Drinks::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($request->image != null) {

                $image = $request->file('image');
                $imagePath = $drinks->image;
                $realLocation = $imagePath;

                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }
            $image = $request->file('image');
            $folderPath = 'drinks/' . date('Y') . '/' . date('m');
            $imagePath = $image->store($folderPath, 'public');
            $validatedData['image'] = 'storage/' . $imagePath;
        }

        $drinks->name = $validatedData['name'];
        $drinks->price = $validatedData['price'];
        $drinks->description = $validatedData['description'];
        $drinks->image = $validatedData['image'] ?? $drinks->image;

        $drinks->save();
        FacadesAlert::success('Berhasil', 'Drink updated successfully!');
        return redirect(route('daftarDrinks'));
    }

    public function destroy($id)
    {
        $drinks = Drinks::findOrFail($id);
        if ($drinks->image && file_exists(public_path($drinks->image))) {
            unlink(public_path($drinks->image));
        }
        $drinks->delete();
        FacadesAlert::success('Berhasil', 'Drink deleted successfully!');
        return redirect(route('daftarDrinks'));

    }

    public function trash()
    {
        $drinks = Drinks::onlyTrashed()->get();
        return view('drinks.trash', compact('drinks'));
    }


    public function restore()
    {

        $drinks = Drinks::onlyTrashed();
        $drinks->restore();

        return redirect('/drink/trash');
    }

    public function deleted($id)
    {
        // hapus permanen data guru
        $drinks = Drinks::onlyTrashed();
        // dd($drinks);
        $drinks->forceDelete();

        return redirect('/drink/trash');
    }
}