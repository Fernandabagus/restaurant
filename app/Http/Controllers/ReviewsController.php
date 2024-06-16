<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewsController extends Controller
{
    public function index($id)
    {
        $menu = Product::find($id);
        $user = Auth::user()->id;
        $data = [
            // 'title'     => 'Test',
            'user'      => $user,
            'menu'      => $menu,
            // 'reviews'   => $user->reviews,
            'content'   => 'users/review/index'
        ];
        return view('users.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_product' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $user = $request->user();
        $review = $user->reviews()->create($request->all());
        // return redirect()->route('our-menu')->with('success', 'Review successfully added!')->with('review', $review);
        return redirect()->route('our-menu')->with('success', 'Review successfully added!')->with('review', $review);
    }
}
