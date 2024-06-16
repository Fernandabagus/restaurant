<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foods;
use App\Models\Drinks;

use App\Models\Reviews;

class WebController extends Controller
{
    public function index()
    {
        $foods = Foods::all();
        $foodTop = Foods::first(); 
        $drinks = Drinks::all();
        $drinkTop = Drinks::first(); 
        $reviews = Reviews::all(); 

        $data = [
            'content' => 'users/home/index',
            'foods' => $foods,
            'foodTop' => $foodTop,
            'drinks' => $drinks,
            'drinkTop' => $drinkTop,
            'reviews' => $reviews,
        ];

        return view('users.layouts.wrapper', $data);

    }
}
