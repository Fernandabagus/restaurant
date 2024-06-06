<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foods;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Foods::all();
        return view('food.index', ['foods' => $foods]);
    }

    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'food_name' => 'required|string|max:255',
            'food_price' => 'required|integer|min:3',
            'description' => 'required|string',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);
        

        if ($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $folderPath = 'foods/' . date('Y') . '/' . date('m');
            $imagePath = $image->store($folderPath, 'public');
            $validatedData['img_url'] = 'storage/' . $imagePath;
        }

        $food = new Foods([
            'name' => $validatedData['food_name'],
            'price' => $validatedData['food_price'],
            'description' => $validatedData['description'],
            'img_url' => $validatedData['img_url'] ?? null,
        ]);

        $food->save();
        // FacadesAlert::success('Berhasil', 'Food added successfully!');
        return redirect(route('daftarFoods'));
    }

    public function show($id)
    {
        $food = Foods::findOrFail($id);
        return view('food.show', ['food' => $food]);
    }

    public function edit($id)
    {
        $food = Foods::findOrFail($id);
        return view('food.edit', ['food' => $food]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'food_name' => 'required|string|max:255',
            'food_price' => 'required|integer|min:3',
            'description' => 'required|string',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $food = Foods::findOrFail($id);

        if ($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $folderPath = 'foods/' . date('Y') . '/' . date('m');
            $imagePath = $image->store($folderPath, 'public');
            $validatedData['img_url'] = 'storage/' . $imagePath;
        }

        $food->name = $validatedData['food_name'];
        $food->price = $validatedData['food_price'];
        $food->description = $validatedData['description'];
        $food->img_url = $validatedData['img_url'] ?? $food->img_url;

        $food->save();
        FacadesAlert::success('Berhasil', 'Food updated successfully!');
        return redirect(route('daftarFoods'));
    }

    public function destroy($id)
    {
        $food = Foods::findOrFail($id);
        if ($food->img_url && file_exists(public_path($food->img_url))) {
            unlink(public_path($food->img_url));
        }
        $food->delete();
        FacadesAlert::success('Berhasil', 'Food deleted successfully!');
        return redirect(route('daftarFoods'));
    }

    public function trash()
    {
        $foods = Foods::onlyTrashed()->get();
        return view('food.trash', compact('foods'));
    }

    
    public function restore()
    {
                
            $food = Foods::onlyTrashed();
            $food->restore();
     
            return redirect('/food/trash');
    }

public function deleted($id)
{
    	// hapus permanen data guru
    	$food = Foods::onlyTrashed();
        // dd($food);
    	$food->forceDelete();
 
    	return redirect('/food/trash');
}
}
