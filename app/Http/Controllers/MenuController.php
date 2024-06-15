<?php

namespace App\Http\Controllers;

use App\Models\Drinks;
use App\Models\Foods;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Product::all();

        $data = [
            'content'   => 'users/menu/index',
            'menus'     => $menus,
        ];
        return view('users.layouts.wrapper', $data);
    }
}
