<?php

namespace App\Http\Controllers;

//import Model 
use App\Models\Drinks;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;
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
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required',
            'price'     => 'required',
            'description'   => 'required'
        ]);

        //create post
        Drinks::create([
            'name'     => $request->name,
            'price'   => $request->price,
            'description'   => $request->description,
        ]);

        //redirect to index
        return redirect()->route('drinks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

}
