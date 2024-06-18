<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Foods;
use App\Models\Drinks;

use App\Models\Reviews;

class WebController extends Controller
{
    public function index()
    {
        $foods = Foods::all();
        $product = Product::where('kategori', 'makanan')->paginate(3);
        $foodTop = Foods::first();
        $drinks = Drinks::all();
        $drinkTop = Drinks::first();
        $reviews = Reviews::orderBy('created_at', 'desc')->take(5)->get();

        $data = [
            'content' => 'users/home/index',
            'foods' => $foods,
            'foodTop' => $foodTop,
            'drinks' => $drinks,
            'drinkTop' => $drinkTop,
            'reviews' => $reviews,
            'product' => $product,
        ];

        return view('users.layouts.wrapper', $data);
        // a
    }
}
