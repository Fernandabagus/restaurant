<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foods;
use App\Models\Drinks;

class WebController extends Controller
{
    public function index()
    {
        $foods = Foods::all();
        $drinks = Drinks::all();

        $data = [
            // 'title'     => 'Test',
            'content'   => 'users/home/index'
        ];
        return view('users.layouts.wrapper', $data, compact('foods', 'drinks'));

    }
}
