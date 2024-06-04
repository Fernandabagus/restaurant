<?php

namespace App\Http\Controllers;

//import Model 
use App\Models\Drinks;

//return type View
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

class DrinksController extends Controller
{
    //
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get 
        $drinks = Drinks::latest()->paginate(5);

        //render view with 
        return view('drinks.index', compact('drinks'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('drinks.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:3',
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
    
        return redirect(route('drinks.index'));
    }

}
